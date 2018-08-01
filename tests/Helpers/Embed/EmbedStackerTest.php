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

namespace Moddns\Tests\BladeExtensions\Helpers\Embed;

use Mockery as m;
use Moddns\BladeExtensions\Helpers\Embed\EmbedHelper;
use Moddns\Tests\BladeExtensions\TestCase;

class EmbedStackerTest extends TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $container;

    /**
     * @var \Mockery\MockInterface
     */
    protected $stacker;

    /**
     * @var \Mockery\MockInterface
     */
    protected $stack;

    protected function start()
    {
        $this->container = m::mock('Illuminate\Contracts\Container\Container');
        $this->stacker = new EmbedHelper($this->container);
        $this->container->shouldReceive('make')->andReturn($this->stack = m::mock('Moddns\\BladeExtensions\\Helpers\\EmbedStack'));
        $this->stack->shouldReceive('start')->andReturnSelf()->getMock()->shouldReceive('end')->andReturnSelf();
    }

    public function testGetSetContainer()
    {
        $this->assertInstanceOf('Illuminate\Contracts\Container\Container', $this->stacker->getContainer());
        $container = $this->stacker->setContainer($this->container)->getContainer();
        $this->assertInstanceOf('Illuminate\Contracts\Container\Container', $container);
    }

    public function testGetStartStack()
    {
        $this->assertCount(0, $this->stacker->getStack());
        $this->stacker->start('viewpath', ['arg1', 'arg2']);
        $this->assertCount(1, $this->stacker->getStack());
    }

    public function testResetEndStack()
    {
        $this->stacker->start('viewpath', ['arg1', 'arg2']);
        $this->assertCount(1, $this->stacker->getStack());
        $this->stack->shouldReceive('reset')->andReturn();
        $this->stacker->reset();
        $this->assertCount(0, $this->stacker->getStack());
    }

    public function testGetCurrentOrEmptyStack()
    {
        $stackItem = $this->stacker->start('viewpath', ['arg1', 'arg2']);
        $currentItem = $this->stacker->current();
        $this->assertEquals($stackItem, $currentItem);
        $this->assertFalse($this->stacker->isEmpty());
        $this->stacker->end();
        $this->assertFalse($this->stacker->current());
        $this->assertTrue($this->stacker->isEmpty());
    }
}
