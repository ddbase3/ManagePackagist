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


namespace Base3\ManagePackagist\ContentControl;

use Base3\CoreFoundation\Api\IClassMap;
use Base3\CoreFoundation\Api\IDisplay;
use Base3\CoreFoundation\Api\IMvcView;
use Base3\Base3Manager\Service\Base3Manager;
use Base3\Base3Manager\ContentControl\AbstractContentControl;

class PackagistSchemaContentControl extends AbstractContentControl {

	public function __construct(
		protected IMvcView $view,
		protected Base3Manager $base3manager,
		private readonly IClassMap $classmap
	) {
		parent::__construct($view, $base3manager);
	}

        // Implementation of IBase

        public static function getName(): string {
                return "packagistschemacontentcontrol";
        }

	// Implementation of AbstractContentControl

        protected function getPath(): string {
                return DIR_PLUGIN . 'ManagePackagist';
        }

        protected function getTemplate(): string {
                return 'ContentControl/PackagistSchemaContentControl.php';
        }

	protected function fillView() {
		$content = 'Unable to load content.';
		$display = $this->classmap->getInstanceByInterfaceName(IDisplay::class, 'datahawkschemadisplay');
		if ($display != null) {
			$display->setData(['domain' => 'packagist']);
			$content = $display->getOutput();
		}
		$this->view->assign('content', $content);
	}
}

