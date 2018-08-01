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

use Laradic\Testing\Laravel\Traits\ServiceProviderTester;

/**
 * Class ViewTest.
 *
 * @author     Brett Cao
 * @group blade-extensions
 */
class BladeExtensionsServiceProviderTest extends TestCase
{
    use ServiceProviderTester;

    /**
     * {@inheritdoc}
     */
    protected function start()
    {
        $this->registerServiceProvider();
    }

    public function testServiceProviderRegister()
    {
        $this->runServiceProviderRegisterTest('Moddns\BladeExtensions\BladeExtensionsServiceProvider');
    }

    protected function getPackageRootPath()
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..';
    }
}
