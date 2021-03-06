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

namespace Moddns\Tests\BladeExtensions\Helpers;

use Mockery as m;
use Moddns\BladeExtensions\Helpers\Stacker;
use Moddns\Tests\BladeExtensions\TestCase;

class FixtureStacker extends Stacker
{
    /**
     * create.
     *
     * @return mixed
     */
    protected function create($args = [])
    {
        $stack = m::mock('Moddns\\Tests\\BladeExtensions\\Helpers\FixtureStack', $args);
        $stack->shouldReceive('start')->andReturnSelf()
            ->getMock()->shouldReceive('end')->andReturnSelf();

        return $stack;
    }
}

class StackerTest extends TestCase
{
    /**
     * @var \Mockery\MockInterface
     */
    protected $container;

    /**
     * @var \Moddns\BladeExtensions\Helpers\Stacker
     */
    protected $stacker;

    protected function start()
    {
        $this->container = m::mock('Illuminate\Contracts\Container\Container');
        $this->stacker = new FixtureStacker($this->container);
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
        $this->stacker->start();
        $this->assertCount(1, $this->stacker->getStack());
    }

    public function testResetEndStack()
    {
        $this->stacker->start();
        $this->assertCount(1, $this->stacker->getStack());
        $this->stacker->reset();
        $this->assertCount(0, $this->stacker->getStack());
    }

    public function testGetCurrentOrEmptyStack()
    {
        $stackItem = $this->stacker->start();
        $currentItem = $this->stacker->current();
        $this->assertEquals($stackItem, $currentItem);
        $this->assertFalse($this->stacker->isEmpty());
        $this->stacker->end();
        $this->assertFalse($this->stacker->current());
        $this->assertTrue($this->stacker->isEmpty());
    }
}
