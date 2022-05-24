<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\User;

use OCP\AppFramework\Db\Entity;

/**
 * Class AccountTerm
 *
 * @method int getAccountId()
 * @method void setAccountId(int $accountId)
 * @method string getTerm()
 * @method void setTerm(string $term)
 *
 * @package OC\User
 */
class AccountTerm extends Entity {
	protected $accountId;
	protected $term;
	public function __construct() {
		$this->addType('accountId', 'integer');
	}
}
