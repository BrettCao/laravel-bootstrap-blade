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
 * Interface MarkdownParserInterface.
 *
 * @author  Brett Cao
 */
interface MarkdownParserInterface
{
    /**
     * Parses Markdown into HTML.
     *
     * @param string $text The Markdown text
     *
     * @return string
     */
    public function parse($text);
}
