<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCA\Files\Controller;

use OCP\IRequest;
use OCP\Files\Folder;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\IUserSession;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\DataDisplayResponse;
use OCP\AppFramework\Http\Response;
use OCP\AppFramework\Controller;
use \Exception;

class ZsyncApiController extends Controller {
	/* @var Folder */
	private $rootFolder;
	/* @var Folder */
	private $zsyncFolder;

	public function __construct($AppName,
								IRequest $request,
								IUserSession $userSession,
								Folder $rootFolder){
		parent::__construct($AppName, $request);
		$userId = $userSession->getUser()->getUID();
		$this->rootFolder = $rootFolder->get($userId);
		$dir = 'files_zsync';
		try {
			$folder = $this->rootFolder->get($dir);
		} catch (NotFoundException $e) {
			$folder = $this->rootFolder->newFolder($dir);
		}
		$this->zsyncFolder = $folder;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 *
	 * @param string $path
	 */
	public function show($path) {
		/* If basefile not found this is an error */
		try {
			$node = $this->rootFolder->get('files/'.$path);
		} catch (Exception $exception) {
			return new JSONResponse([], Http::STATUS_NOT_FOUND);
		}

		$zsyncFile = $path . '.zsync';
		try {
			$node = $this->zsyncFolder->get($zsyncFile);
			$content = $node->getContent();
			return new DataDisplayResponse($content);
		} catch (NotFoundException $exception) {
			return new JSONResponse([], Http::STATUS_NOT_FOUND);
		} catch (NotPermittedException $e) {
			return new JSONResponse([], Http::STATUS_FORBIDDEN);
		}
	}
}
