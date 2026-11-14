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


namespace Base3\ManagePackagist;

use Base3\CoreFoundation\Api\IContainer;
use Base3\Base3Manager\Plugin\AbstractPlugin;
use Base3\DataHawk\Api\IReportQueryService;
use Base3\DataHawk\Api\IReportSchemaProvider;
use Base3\DataHawk\Service\DataHawkMicroservice;
use Base3\DataHawk\Schema\DataHawkSchemaMicroservice;

class ManagePackagistPlugin extends AbstractPlugin {

	// Implementation of IPlugin

	public function init() {
		$this->container
			->set(self::getName(), $this, IContainer::SHARED)

			->set(
				IReportQueryService::class,
				fn($c) => new DataHawkMicroservice(
					$c->get('microserviceserializedhelper')->get('Data', IReportQueryService::class, 'datahawkmicroservice')),
				IContainer::SHARED)

			->set(
				IReportSchemaProvider::class,
				fn($c) => new DataHawkSchemaMicroservice(
					$c->get('microserviceserializedhelper')->get('Data', IReportSchemaProvider::class, 'datahawkschemamicroservice')),
				IContainer::SHARED);
	}

	// Implementation of ICheck

	public function checkDependencies(): array {
		return array(
			'datahawkplugin_installed' => $this->container->get('datahawkplugin') ? "Ok" : "datahawkplugin not installed"
		);
	}
}
