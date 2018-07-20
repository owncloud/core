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
use OCP\IL10N;
use OCP\IUser;

class SMB extends ExternalBackend {
	use LegacyDependencyCheckPolyfill;

	public function __construct(IL10N $l) {
		$this
			->setIdentifier('smb')
			->addIdentifierAlias('\OC\Files\Storage\SMB') // legacy compat
			->setStorageClass('\OCA\Files_External\Lib\Storage\SMB')
			->setText($l->t('SMB / CIFS'))
			->addParameters([
				(new DefinitionParameter('host', $l->t('Host'))),
				(new DefinitionParameter('share', $l->t('Share'))),
				(new DefinitionParameter('root', $l->t('Remote subfolder')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
				(new DefinitionParameter('domain', $l->t('Domain')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
			])
			->addAuthScheme(AuthMechanism::SCHEME_PASSWORD)
		;
	}

	/**
	 * @param StorageConfig $storage
	 * @param IUser $user
	 */
	public function manipulateStorageConfig(IStorageConfig &$storage, IUser $user = null) {
		$user = $storage->getBackendOption('user');
		if ($domain = $storage->getBackendOption('domain')) {
			$storage->setBackendOption('user', $domain.'\\'.$user);
		}
	}
}
