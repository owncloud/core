<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_External\Lib\Backend;

use OCA\Files_External\Lib\LegacyDependencyCheckPolyfill;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\Backend\Backend as ExternalBackend;
use OCP\Files\External\DefinitionParameter;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\IStoragesBackendService;
use OCP\IL10N;
use OCP\IUser;

/**
 * Deprecated SMB_OC class - use SMB with the password::sessioncredentials auth mechanism
 */
class SMB_OC extends ExternalBackend {
	use LegacyDependencyCheckPolyfill;

	public function __construct(IL10N $l, SMB $smbBackend) {
		$this
			->setIdentifier('\OC\Files\Storage\SMB_OC')
			->setStorageClass('\OCA\Files_External\Lib\Storage\SMB')
			->setText($l->t('SMB / CIFS using OC login'))
			->addParameters([
				(new DefinitionParameter('host', $l->t('Host'))),
				(new DefinitionParameter('username_as_share', $l->t('Username as share')))
					->setType(DefinitionParameter::VALUE_BOOLEAN),
				(new DefinitionParameter('share', $l->t('Share')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
				(new DefinitionParameter('root', $l->t('Remote subfolder')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
			])
			->setPriority(IStoragesBackendService::PRIORITY_DEFAULT - 10)
			->addAuthScheme(AuthMechanism::SCHEME_PASSWORD)
			->deprecateTo($smbBackend)
		;
	}

	public function manipulateStorageConfig(IStorageConfig &$storage, IUser $user = null) {
		$username_as_share = ($storage->getBackendOption('username_as_share') === true);

		if ($username_as_share) {
			$share = '/' . $storage->getBackendOption('user');
			$storage->setBackendOption('share', $share);
		}
	}
}
