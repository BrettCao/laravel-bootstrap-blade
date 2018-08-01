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

namespace Moddns\Tests\BladeExtensions;

use Laradic\Testing\Native\AbstractTestCase;
use Moddns\BladeExtensions\HelperRepository;
use Moddns\BladeExtensions\Helpers\Embed\EmbedHelper;
use Moddns\BladeExtensions\Helpers\Loop\LoopHelper;
use Moddns\BladeExtensions\Helpers\Markdown\MarkdownHelper;
use Moddns\BladeExtensions\Helpers\Minifier\MinifierHelper;

class HelperRepositoryTest extends AbstractTestCase
{
    public function test_can_create_instance()
    {
        $this->assertInstanceOf(HelperRepository::class, new HelperRepository());
    }

    /**
     * @var \Mockery\MockInterface
     */
    protected $container;

    /**
     * @var
     */
    protected $helperMocks;

    protected $helperClasses;

    protected function setUp()
    {
        parent::setUp();

        $this->helperMocks = [];

        $this->helperClasses = [
            'loop'     => LoopHelper::class,
            'embed'    => EmbedHelper::class,
            'markdown' => MarkdownHelper::class,
            'minifier' => MinifierHelper::class,
        ];
    }

    protected function _createHelperRepository()
    {
        $h = new HelperRepository();

        foreach ($this->helperClasses as $name => $class) {
            $this->helperMocks[ $name ] = \Mockery::mock($class);
            $h->put($name, $this->helperMocks[ $name ]);
        }

        return $h;
    }

    public function testGetHelperClassInstances()
    {
        $repository = $this->_createHelperRepository();
        foreach ($this->helperMocks as $name => $m) {
            $helper = $repository->get($name, false);
            $this->assertNotFalse($helper);
            $this->assertInstanceOf($this->helperClasses[$name], $helper);
            $this->assertTrue($repository->has($name));
        }
        $repository->put('test', 'testClass');
        $this->assertEquals('testClass', $repository->get('test'));
    }
}
