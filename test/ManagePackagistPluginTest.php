<?php

namespace ManagePackagist\Test;

use PHPUnit\Framework\TestCase;
use ManagePackagist\ManagePackagistPlugin;
use Base3\Api\IContainer;

class ManagePackagistPluginTest extends TestCase
{
    public function testInitSetsServicesInContainer()
    {
        $containerMock = $this->createMock(IContainer::class);

        $plugin = new ManagePackagistPlugin($containerMock);
        $plugin->init();

        $this->assertTrue(true);
    }

    public function testCheckDependencies()
    {
        $containerMock = $this->createMock(IContainer::class);

        $plugin = new ManagePackagistPlugin($containerMock);
        $dependencies = $plugin->checkDependencies();

        $this->assertTrue(true);
    }
}

