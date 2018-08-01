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
namespace Moddns\Tests\BladeExtensions\Directives;

use Moddns\BladeExtensions\Directives\AbstractDirective;
use Moddns\Tests\BladeExtensions\DirectiveTestCase;

class IfSectionDirectiveTest extends DirectiveTestCase
{
    protected $testSetPattern = AbstractDirective::OPEN_MATCHER;

    /**
     * getDirectiveClass method.
     *
     * @return string
     */
    protected function getDirectiveClass()
    {
        return 'Moddns\BladeExtensions\Directives\IfSectionDirective';
    }

    public function testView()
    {
        $this->assertIfSection('title', [ 'title:title' ]);
        $this->assertIfSection('title-content', [ 'title:title', 'content:content' ]);
        $this->assertIfSection('title-sidebar-content', [ 'title:title', 'sidebar:sidebar', 'content:content' ]);
    }

    protected function assertIfSection($view, array $arr)
    {
        $out = explode(';', preg_replace("/\n/", "", $this->render('directives.if-section.' . $view)));
        array_pop($out);
        $this->assertEquals($arr, $out);
    }
}
