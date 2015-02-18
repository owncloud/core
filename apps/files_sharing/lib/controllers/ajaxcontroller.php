<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
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
namespace OCA\Files_Sharing\Controllers;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCA\Files_Sharing\Helper2;
use OC\Files\Filesystem;
use OCP\IConfig;
use OCP\ISession;
use OCP\ILogger;
use OCA\Files_Sharing\Exceptions\InvalidTokenException;
use OCA\Files_Sharing\Exceptions\AuthenticationException;

/**
 * Class AjaxController
 *
 * @package OCA\Files_Sharing\Controllers
 */
class AjaxController extends Controller {

	/** @var IConfig */
	protected $config;
	/** @var ISession */
	protected $session;
	/** @var ILogger */
	protected $logger;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IConfig $config
	 * @param ISession $session
	 * @param ILogger $logger
	 */
	public function __construct($appName,
								IRequest $request,
								IConfig $config,
								ISession $session,
								ILogger $logger
								) {
		parent::__construct($appName, $request);

		$this->config = $config;
		$this->session = $session;
		$this->logger = $logger;
	}

	/**
	 * @NoAdminRequired
	 * @PublicPage
	 *
	 * @param string $t Token of the share
	 * @param string $dir Subdirectory requested
	 * @param string $sort Sort attribute
	 * @param string $sortdirection Sort direction
	 *
	 * @return DataResponse
	 */
	public function getList($t, $dir, $sort = 'name', $sortdirection = 'desc') {
		if (is_null($t)) {
			return new DataResponse([], Http::STATUS_BAD_REQUEST);
		}

		$sortAttribute = $sort;
		$sortDirection = ($sortdirection === 'desc');

		$helper = new Helper2($this->session, $this->logger);
		try {
			$data = $helper->setupFromToken($t, $dir);
		} catch (InvalidTokenException $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		} catch (AuthenticationException $e) {
			return new DataResponse([], Http::STATUS_FORBIDDEN);
		} catch (\Exception $e) {
			return new DataResponse([], Http::STATUS_INTERNAL_SERVER_ERROR);
		}

		$linkItem = $data['linkItem'];
		$absDir = $data['realPath'];
		$absDir = Filesystem::normalizePath($absDir);

		if (!Filesystem::is_dir($absDir . '/')) {
			return new DataResponse(
				[
					'status' => 'error',
					'data' => [
						'success' => false
					]
				],
				Http::STATUS_NOT_FOUND
			);
		}

		$data = [];
		$files = \OCA\Files\Helper::getFiles($absDir, $sortAttribute, $sortDirection);

		$formattedFiles = [];
		foreach ($files as $file) {
			$entry = \OCA\Files\Helper::formatFileInfo($file);
			// for now
			unset($entry['directory']);
			// do not disclose share owner
			unset($entry['shareOwner']);
			// do not disclose if something is a remote shares
			unset($entry['mountType']);
			unset($entry['icon']);
			$entry['permissions'] = \OCP\Constants::PERMISSION_READ;
			$formattedFiles[] = $entry;
		}

		$data['directory'] = $dir;
		$data['files'] = $formattedFiles;
		$data['dirToken'] = $linkItem['token'];

		$permissions = $linkItem['permissions'];
		if ($this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes') === 'no') {
			$permissions = \OCP\Constants::PERMISSION_READ;
		}
		$data['permissions'] = $permissions;

		return new DataResponse(
			[
				'status' => 'success',
				'data' => $data
			]
		);
	}
}
