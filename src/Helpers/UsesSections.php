<?php
/**
 * Copyright (c) 2018. Brett Cao.
 *
 * The license can be found in the package and online at https://mit-license.org/.
 *
 * @copyright 2018 Brett Cao
 * @license https://mit-license.org/ MIT License
 * @version 7.0.0
 */

namespace Moddns\BladeExtensions\Helpers;

use Illuminate\Contracts\View\Factory;

/**
 * Trait SectionsTrait.
 *
 * @author      Brett Cao
 * @license     MIT
 * @copyright   2011-2015, Brett Cao
 * @link        http://Moddns.mit-license.org
 */
trait UsesSections
{
    /**
     * @var array
     */
    protected $sections = [];

    /**
     * @var array
     */
    protected $sectionStack = [];

    /**
     * @var \Illuminate\View\Factory
     */
    protected $viewFactory;

    /**
     * setViewFactory.
     *
     * @param \Illuminate\Contracts\View\Factory $factory
     * @return $this
     */
    public function setViewFactory(Factory $factory)
    {
        $this->viewFactory = $factory;

        return $this;
    }

    /**
     * Get the value of viewFactory.
     *
     * @return \Illuminate\View\Factory
     */
    public function getViewFactory()
    {
        return $this->viewFactory;
    }

    /**
     * Start injecting content into a section.
     *
     * @param  string $section
     * @param  string $content
     * @return void
     */
    public function startSection($section, $content = '')
    {
        if ($content === '') {
            if (ob_start()) {
                $this->sectionStack[] = $section;
            }
        } else {
            $this->extendSection($section, $content);
        }
    }

    /**
     * Inject inline content into a section.
     *
     * @param  string $section
     * @param  string $content
     * @return SectionsTrait
     */
    public function inject($section, $content)
    {
        $this->startSection($section, $content);

        return $this;
    }

    /**
     * Stop injecting content into a section and return its contents.
     *
     * @return string
     */
    public function yieldSection()
    {
        return $this->yieldContent($this->stopSection());
    }

    /**
     * Stop injecting content into a section.
     *
     * @param  bool $overwrite
     * @return string
     */
    public function stopSection($overwrite = false)
    {
        $last = array_pop($this->sectionStack);

        if ($overwrite) {
            $this->sections[$last] = ob_get_clean();
        } else {
            $this->extendSection($last, ob_get_clean());
        }

        return $last;
    }

    /**
     * Stop injecting content into a section and append it.
     *
     * @return string
     */
    public function appendSection()
    {
        $last = array_pop($this->sectionStack);

        if (isset($this->sections[$last])) {
            $this->sections[$last] .= ob_get_clean();
        } else {
            $this->sections[$last] = ob_get_clean();
        }

        return $last;
    }

    /**
     * Append content to a given section.
     *
     * @param  string $section
     * @param  string $content
     * @return SectionsTrait
     */
    protected function extendSection($section, $content)
    {
        if (isset($this->sections[$section])) {
            $content = str_replace('@parent', $content, $this->sections[$section]);
        }

        $this->sections[$section] = $content;

        return $this;
    }

    /**
     * Get the string contents of a section.
     *
     * @param  string $section
     * @param  string $default
     * @return string
     */
    public function yieldContent($section, $default = '')
    {
        $sectionContent = $default;

        if (isset($this->sections[$section])) {
            $sectionContent = $this->sections[$section];
        }

        $sectionContent = str_replace('@@parent', '--parent--holder--', $sectionContent);

        return str_replace(
            '--parent--holder--',
            '@parent',
            str_replace('@parent', '', $sectionContent)
        );
    }

    /**
     * Flush all of the section contents.
     *
     * @return SectionsTrait
     */
    public function flushSections()
    {
        $this->sections = [];

        $this->sectionStack = [];

        return $this;
    }

    /**
     * Flush all of the section contents if done rendering.
     *
     * @return SectionsTrait
     */
    public function flushSectionsIfDoneRendering()
    {
        if ($this->viewFactory->doneRendering()) {
            $this->flushSections();

            return $this;
        }
    }

    /**
     * Get the entire array of sections.
     *
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Check if section exists.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasSection($name)
    {
        return array_key_exists($name, $this->sections);
    }
}
