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

namespace Moddns\BladeExtensions\Directives;

class SetAbstractDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\w)(\s*)@NAME\s*\(\s*\${0,1}[\'"\s]*(.*?)[\'"\s]*,\s*([\W\w^]*?)\)\s*$/m';

    protected $replace = '$1<?php \$$2 = $3; $__data[\'$2\'] = $3; ?>';
}
