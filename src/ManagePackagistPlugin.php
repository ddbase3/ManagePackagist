<?php declare(strict_types=1);

namespace ManagePackagist;

use Base3\Api\IContainer;
use Base3Manager\Plugin\AbstractPlugin;

class ManagePackagistPlugin extends AbstractPlugin {

	// Implementation of IPlugin

	public function init() {

		$this->container
			->set($this->getName(), $this, IContainer::SHARED)
			;
	}

	// Implementation of ICheck

	public function checkDependencies(): array {
		return array(
			"Check" => "Ok"
		);
	}

}
