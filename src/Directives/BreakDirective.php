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
 * This is the class BreakDirective.
 *
 * @author  Brett Cao
 */
class BreakDirective extends AbstractDirective
{
    protected $replace = '$1<?php break; ?>$2';
}
