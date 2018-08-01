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

class BreakpointDirectiveTest extends DirectiveTestCase
{
    /**
     * getDirectiveClass method.
     * @return string
     */
    protected function getDirectiveClass()
    {
        return 'Moddns\BladeExtensions\Directives\BreakpointDirective';
    }

    /**
     * Test the set directive.
     */
    public function testView()
    {
        $this->assertEquals($this->render('directives.breakpoint'), '');
    }

    public function testReplace()
    {
        $this->assertEquals(
            $this->getDirective()->setName('breakpoint')->handle('@breakpoint'),
            '<?php if(function_exists("xdebug_break")){ xdebug_break(); } ?>'
        );
    }
}
