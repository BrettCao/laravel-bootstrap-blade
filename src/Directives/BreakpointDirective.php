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

namespace Moddns\BladeExtensions\Directives;

/**
 * This is the class BreakpointDirective.
 *
 * @blade-directive @breakpoint
 * @author  Brett Cao
 */
class BreakpointDirective extends AbstractDirective
{
    public static $functionName = 'xdebug_break';

    protected $replace = '$1<?php if(function_exists("FUNCTION_NAME")){ FUNCTION_NAME(); } ?>$2';

    /**
     * {@inheritdoc}
     *
     * @see BreakpointAbstractDirective::$functionName The function name to use to invoke a breakpoint
     */
    public function getReplace()
    {
        return preg_replace('/FUNCTION_NAME/', static::$functionName, parent::getReplace());
    }
}
