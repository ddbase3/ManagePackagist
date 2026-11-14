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

use Base3\Base3Manager\ContentControl\AbstractContentControl;

class PackagistContentControl extends AbstractContentControl {

        // Implementation of IBase

        public static function getName(): string {
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

