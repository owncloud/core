<?php
/**
 * @author Caleb Boylan <caleb.boylan@dreamhost.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

use \OCP\IL10N;
use \OCA\Files_External\Lib\Backend\Backend;
use \OCA\Files_External\Lib\DefinitionParameter;
use \OCA\Files_External\Lib\Auth\AuthMechanism;
use \OCA\Files_External\Service\BackendService;
use \OCA\Files_External\Lib\LegacyDependencyCheckPolyfill;

use \OCA\Files_External\Lib\Auth\AmazonS3\AccessKey;

class DreamObjects extends Backend {

	public function __construct(IL10N $l, AccessKey $legacyAuth) {
		$this
			->setIdentifier('DreamObjects')
			->addIdentifierAlias('\OC\Files\Storage\DreamObjects') // legacy compat
			->setStorageClass('\OC\Files\Storage\DreamObjects')
			->setText($l->t('DreamObjects'))
			->addParameters([
				(new DefinitionParameter('bucket', $l->t('Bucket'))),
				(new DefinitionParameter('port', $l->t('Port')))
					->setFlag(DefinitionParameter::FLAG_OPTIONAL),
				(new DefinitionParameter('use_ssl', $l->t('Enable SSL')))
					->setType(DefinitionParameter::VALUE_BOOLEAN),
				(new DefinitionParameter('use_path_style', $l->t('Enable Path Style')))
					->setType(DefinitionParameter::VALUE_BOOLEAN),
			])
			->addAuthScheme(AccessKey::SCHEME_AMAZONS3_ACCESSKEY)
			->setLegacyAuthMechanism($legacyAuth)
		;
	}

}
