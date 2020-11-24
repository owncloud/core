<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

class SMB2 extends ExternalBackend {
	use LegacyDependencyCheckPolyfill;

	public function __construct(IL10N $l) {
		$this
			->setIdentifier('smb-coll')
			->setStorageClass('\OCA\Files_External\Lib\Storage\SMB2')
			->setText($l->t('SMB Collaborative (shared file IDs)'))
			->addParameters([
				(new DefinitionParameter('host', $l->t('Host'))),
				(new DefinitionParameter('share', $l->t('Share'))),
				(new DefinitionParameter('root', $l->t('Remote subfolder')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
				(new DefinitionParameter('domain', $l->t('Domain')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
				(new DefinitionParameter('service-account', $l->t('Service Account'))),
				(new DefinitionParameter('service-account-password', $l->t('Service Account Password')))
					->setType(DefinitionParameter::VALUE_PASSWORD),
			])
			// only password::sessioncredentials is reasonable
			->addAuthScheme('password::sessioncredentials')
			->setVisibility(IStoragesBackendService::VISIBILITY_ADMIN)
			->setAllowedVisibility(IStoragesBackendService::VISIBILITY_ADMIN)
		;
	}

	public function manipulateStorageConfig(IStorageConfig &$storage, IUser $user = null) {
		$userFromBackendOption = $storage->getBackendOption('user');
		if ($domain = $storage->getBackendOption('domain')) {
			$storage->setBackendOption('user', $domain.'\\'.$userFromBackendOption);
		}
	}
}
