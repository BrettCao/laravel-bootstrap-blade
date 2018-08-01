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
 * This is the class IfSectionDirective.
 *
 * @author  Brett Cao
 */
class IfSectionDirective extends AbstractDirective
{
    /** @var string */
    protected $replace = '$1<?php if( $__env->hasSection$2 ) : ?>$3';

    protected $pattern = self::OPEN_MATCHER;
}
