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

namespace Moddns\BladeExtensions\Helpers;

/**
 * This is the class BladeMatchers.
 *
 * @author  Brett Cao
 */
trait BladeMatchers
{
    public static $createMatcher = '/(?<!\w)(\s*)@NAME(\s*\(.*\))/';
    public static $createOpenMatcher = '/(?<!\w)(\s*)@NAME(\s*\(.*\))/';
    public static $createPlainMatcher = '/(?<!\w)(\s*)@NAME(\s*)/';

    /**
     * Get the regular expression for a generic Blade function.
     *
     * @param  string $function
     *
     * @return string
     */
    public function createMatcher($function = 'NAME')
    {
        return '/(?<!\w)(\s*)@'.$function.'(\s*\(.*\))/';
    }

    /**
     * Get the regular expression for a generic Blade function.
     *
     * @param  string $function
     *
     * @return string
     */
    public function createOpenMatcher($function = 'NAME')
    {
        return '/(?<!\w)(\s*)@'.$function.'(\s*\(.*)\)/';
    }

    /**
     * Create a plain Blade matcher.
     *
     * @param  string $function
     *
     * @return string
     */
    public function createPlainMatcher($function = 'NAME')
    {
        return '/(?<!\w)(\s*)@'.$function.'(\s*)/';
    }
}
