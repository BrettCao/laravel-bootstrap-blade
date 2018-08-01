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

/**
 * Class ViewTest.
 *
 * @author     Brett Cao
 * @group      blade-extensions
 */
class SetDirectiveTest extends DirectiveTestCase
{
    /**
     * getDirectiveClass method.
     * @return string
     */
    protected function getDirectiveClass()
    {
        return 'Moddns\BladeExtensions\Directives\SetDirective';
    }

    /**
     * Test the set directive.
     */
    public function testView()
    {
        $this->render('directives.set', [
            'dataString'        => 'hello',
            'dataArray'         => static::getData()->getValues()[ 'names' ],
            'dataClassInstance' => static::getData(),
            'dataClassName'     => 'DataGenerator',
        ]);
    }
}
