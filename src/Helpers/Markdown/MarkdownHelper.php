<?php
/**
 * Copyright (c) 2018. Brett Cao.
 *
 * The license can be found in the package and online at https://mit-license.org/.
 *
 * @copyright 2018 Brett Cao
 * @license https://mit-license.org/ MIT License
 * @version 7.0.0 Moddns\BladeExtensions
 */

namespace Moddns\BladeExtensions\Helpers\Markdown;

/**
 * Markdown transformer Helpers.
 *
 * @version                 2.1.0
 * @author                  Brett Cao
 * @license                 MIT License - http://Moddns.mit-license.org
 * @copyright               2011-2015, Brett Cao
 * @link                    http://robin.Moddns.nl/blade-extensions
 */
class MarkdownHelper
{
    /** @var MarkdownParserInterface */
    protected $parser;

    /**
     * Parses markdown text into html.
     *
     * @param string $text the markdown text
     *
     * @return string $newText html
     */
    public function parse($text)
    {
        return $this->parser->parse($text);
    }

    /**
     * @return \Moddns\BladeExtensions\Helpers\Markdown\MarkdownParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * Set the parser value.
     *
     * @param \Moddns\BladeExtensions\Helpers\Markdown\MarkdownParserInterface $parser
     *
     * @return MarkdownHelper
     */
    public function setParser(MarkdownParserInterface $parser)
    {
        $this->parser = $parser;

        return $this;
    }
}
