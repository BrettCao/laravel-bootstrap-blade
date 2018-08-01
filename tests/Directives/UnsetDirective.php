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

class UnsetAbstractDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\\w)(\\s*)@NAME(?:\\s*)\\((?:\\s*)(?:\\$|(?:\'|\\"|))(.*?)(?:\'|\\"|)(?:\\s*)\\)/';

    protected $replace = '$1<?php unset(\$$2); ?>';
}
