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

use cebe\markdown\GithubMarkdown;

/**
 * This is the class CebeMarkdownParser.
 *
 * @author  Brett Cao
 */
class CebeMarkdownParser implements MarkdownParserInterface
{
    protected $markdown;

    /**
     * CebeMarkdownParser constructor.
     *
     * @param \cebe\markdown\GithubMarkdown $markdown
     */
    public function __construct(GithubMarkdown $markdown)
    {
        $this->markdown = $markdown;
        $markdown->html5 = true;
    }

    /**
     * {@inheritdoc}
     */
    /**
     * parse method.
     *
     * @param string $text
     *
     * @return string
     */
    public function parse($text)
    {
        return $this->markdown->parse($text);
    }
}
