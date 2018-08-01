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

namespace Moddns\Tests\BladeExtensions;

use Laradic\Testing\Laravel\Traits\ViewTester;
use PHPUnit\Framework\Assert;

/**
 * Class ViewTest.
 *
 * @author     Brett Cao
 * {@inheritdoc}
 */
abstract class TestCase extends \Laradic\Testing\Laravel\AbstractTestCase
{
    use ViewTester;

    /** {@inheritdoc} */
    public function setUp()
    {
        parent::setUp();
    }

    /** @var DataGenerator */
    public static $data;

    /**
     * @return DataGenerator
     */
    public static function getData()
    {
        if (! isset(static::$data)) {
            static::$data = new DataGenerator();
        }

        return static::$data;
    }

    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return 'Moddns\BladeExtensions\BladeExtensionsServiceProvider';
    }

    protected function getPackageRootPath()
    {
        return realpath(__DIR__.'/..');
    }

    public function testTest()
    {
        $this->assertTrue(true);
    }

    /**
     * assertValidRegularExpression method.
     *
     * @param mixed  $value
     * @param string $message
     *
     * @return void
     */
    public function assertValidRegularExpression($value, $message = '')
    {
        // http://stackoverflow.com/questions/4440626/how-can-i-validate-regex
        Assert::assertThat(@preg_match($value, null), Assert::logicalNot(Assert::isFalse()), $message);
    }
}
