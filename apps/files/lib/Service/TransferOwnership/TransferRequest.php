<?php
/**
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

namespace OCA\Files\Service\TransferOwnership;

use OCP\AppFramework\Db\Entity;

/**
 * Class TransferRequest
 *
 * @method integer getId()
 * @method string getSourceUserId()
 * @method string getDestinationUserId()
 * @method integer getFileId()
 * @method integer getAcceptedTime()
 * @method integer getRejectedTime()
 * @method integer getRequestedTime()
 * @method integer getActionedTime()
 * @method setSourceUserId(string)
 * @method setDestinationUserId(string)
 * @method setFileId(integer)
 * @method setAcceptedTime(integer)
 * @method setRejectedTime(integer)
 * @method setRequestedTime(integer)
 * @method setActionedTime(integer)
 *
 * @package OCA\Files\Service\TransferOwnership
 */
class TransferRequest extends Entity {

	protected $sourceUserId;
	protected $destinationUserId;
	protected $fileId;
	protected $requestedTime;
	protected $acceptedTime;
	protected $rejectedTime;
	protected $actionedTime;

}
