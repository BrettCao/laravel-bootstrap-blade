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

namespace Moddns\Tests\BladeExtensions\Directives;

use Moddns\Tests\BladeExtensions\DirectiveTestCase;

class MinifyDirectiveTest extends DirectiveTestCase
{
    protected function getDirectiveClass()
    {
        return 'Moddns\BladeExtensions\Directives\MinifyDirective';
    }
}
