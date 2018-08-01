<?php
/**
 * Copyright (c) 2018. Brett Cao.
 *
 * The license can be found in the package and online at https://mit-license.org/.
 *
 * @copyright 2018 Brett Cao
 * @license https://mit-license.org/ MIT License
 * @version 1.0.0 brettcao/laravel-bootstrap-blade
 */

namespace Moddns\BladeExtensions\Contracts;

/**
 * Provides 'features' methods that are usefull when working with Blade templates.
 *
 * @author  Brett Cao
 */
interface BladeExtensions
{
    /**
     * Compile blade syntax to string.
     *
     * @api
     *
     * @param string $string String with blade syntax to compile
     * @param array  $vars   Optional variables
     *
     * @return string
     */
    public function compileString($string, array $vars = []);

    /**
     * pushToStack method.
     *
     * @api
     *
     * @param string          $stackName   The name of the stack
     * @param string|string[] $targetViews The view which contains the stack
     * @param string|\Closure $content     the content to push
     *
     * @return $this
     */
    public function pushToStack($stackName, $targetViews, $content);
}
