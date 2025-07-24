<?php declare(strict_types=1);

namespace ManagePackagist;

use Base3\Api\IContainer;
use Base3Manager\Plugin\AbstractPlugin;
use DataHawk\Api\IReportQueryService;
use DataHawk\Api\IReportSchemaProvider;
use DataHawk\Service\DataHawkMicroservice;
use DataHawk\Schema\DataHawkSchemaMicroservice;

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
