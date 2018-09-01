<?php

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
