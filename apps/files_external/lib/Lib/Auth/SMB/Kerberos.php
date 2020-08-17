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

namespace OCA\Files_External\Lib\Auth\SMB;

use OCP\Files\External\Auth\AuthMechanism;
use OCP\IL10N;

/**
 * SMB Kerberos authentication
 */
class Kerberos extends AuthMechanism {
	public function __construct(IL10N $l) {
		$this
			->setIdentifier('smb::kerberos')
			->setScheme(self::SCHEME_SMB)
			->setText($l->t('Kerberos ticket'));
	}
}
