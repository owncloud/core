<?php
/**
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Core\Preview;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\DataDisplayResponse;
use OCP\IPreview;
use OCP\Files\Folder;
use OCP\IRequest;
use OCP\IL10N;

/**
 * Class PreviewController
 *
 * @package OC\Core\Preview
 */
class PreviewController extends Controller {

	/** @var IPreview */
	protected $previewManager;

	/** @var Folder */
	protected $userFolder;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IPreview $previewManager
	 * @param Folder $userFolder
	 */
	public function __construct($appName,
								IRequest $request,
								IPreview $previewManager,
								Folder $userFolder) {
		parent::__construct($appName, $request);

		$this->previewManager = $previewManager;
		$this->userFolder = $userFolder;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param string $file
	 * @param int $x The max X
	 * @param int $y The max Y
	 * @param bool $scalingUp
	 * @param bool $a Keep aspect ratio
	 * @param bool $forceIcon
	 * @return DataResponse|DataDisplayResponse
	 */
	public function getPreview($file = '',
	                           $x = 36,
	                           $y = 35,
	                           $scalingUp = true,
	                           $a = false) {

		if ($file === '') {
			return new DataResponse([], Http::STATUS_BAD_REQUEST);
		}

		if ($x === 0 || $y === 0) {
			return new DataResponse([], Http::STATUS_BAD_REQUEST);
		}

		try {
			$info = $this->userFolder->get($file);
		} catch (\OCP\Files\NotFoundException $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}

		if ($this->previewManager->isAvailable($info) === false) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}

		$preview = $this->previewManager->createPreview($this->userFolder->getParent()->getRelativePath($info->getPath()), $x, $y, $scalingUp, $a);

		if ($preview->valid() === false) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}

		return new DataDisplayResponse($preview->data(), 
		                               Http::STATUS_OK,
		                               ['Content-Type' => $preview->mimeType()]
		);
	}
}
