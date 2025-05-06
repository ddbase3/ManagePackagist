<?php declare(strict_types=1);

namespace ManagePackagist\ContentControl;

use Base3Manager\ContentControl\AbstractContentControl;

class PackagistContentControl extends AbstractContentControl {

        // Implementation of IBase

        public function getName(): string {
                return "packagistcontentcontrol";
        }

	// Implementation of AbstractContentControl

        protected function getPath(): string {
                return DIR_PLUGIN . 'ManagePackagist';
        }

        protected function getTemplate(): string {
                return 'ContentControl/PackagistContentControl.php';
        }

}

