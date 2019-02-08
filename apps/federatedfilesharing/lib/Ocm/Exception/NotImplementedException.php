<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Ocm\Exception;

use OCP\AppFramework\Http;

/**
 * Exception that used when
 * 1. Federated file sharing is disabled
 * 2. Protocol is not supported
 * 3. Resource Type is not supported
 * 4. Share Type is not supported
 *
 * @package OCA\FederatedFileSharing\Exception
 */
class NotImplementedException extends OcmException {
	/**
	 * @return int
	 */
	public function getHttpStatusCode() {
		return Http::STATUS_NOT_IMPLEMENTED;
	}
}
