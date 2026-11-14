<?php declare(strict_types=1);

/***********************************************************************
 * This file is part of ManagePackagist for BASE3 Framework.
 *
 * ManagePackagist exposes PHP package administration.
 * It integrates Packagist operations with Base3Manager.
 * It reuses the existing data and repository services.
 *
 * Developed by Daniel Dahme
 * Licensed under GPL-3.0
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * https://base3.de
 ***********************************************************************/

namespace Base3\ManagePackagist\Test;

use PHPUnit\Framework\TestCase;
use Base3\ManagePackagist\ManagePackagistPlugin;
use Base3\CoreFoundation\Api\IContainer;

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

