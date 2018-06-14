<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Encryption\Exceptions\GenericEncryptionException;
use OCP\Files\ForbiddenException;
use OCP\Files\IPreviewNode;
use OCP\Files\StorageNotAvailableException;
use OCP\IPreview;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

class PreviewPlugin extends ServerPlugin {

	/** @var Server */
	protected $server;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var IPreview */
	private $previewManager;

	/**
	 * PreviewPlugin constructor.
	 *
	 * @param ITimeFactory $timeFactory
	 * @param IPreview $previewManager
	 */
	public function __construct(ITimeFactory $timeFactory, IPreview $previewManager) {
		$this->timeFactory = $timeFactory;
		$this->previewManager = $previewManager;
	}

	/**
	 * Initializes the plugin and registers event handlers
	 *
	 * @param Server $server
	 * @return void
	 */
	public function initialize(Server $server) {
		$this->server = $server;
		$this->server->on('method:GET', [$this, 'httpGet'], 90);
	}

	/**
	 * Intercepts GET requests on node urls ending with ?preview.
	 * The node has to implement IPreviewNode
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool
	 * @throws NotFound
	 * @throws \Sabre\DAVACL\Exception\NeedPrivileges
	 * @throws \Sabre\DAV\Exception\NotAuthenticated
	 * @throws Forbidden
	 * @throws FileLocked
	 * @throws ServiceUnavailable
	 */
	public function httpGet(RequestInterface $request, ResponseInterface $response) {
		$queryParams = $request->getQueryParameters();
		if (!\array_key_exists('preview', $queryParams)) {
			return true;
		}

		$path = $request->getPath();
		$node = $this->server->tree->getNodeForPath($path);

		if (!$node instanceof IFileNode) {
			return false;
		}
		$fileNode = $node->getNode();
		if (!$fileNode instanceof IPreviewNode) {
			return false;
		}

		// Checking ACL, if available.
		if ($aclPlugin = $this->server->getPlugin('acl')) {
			/** @var \Sabre\DAVACL\Plugin $aclPlugin */
			$aclPlugin->checkPrivileges($path, '{DAV:}read');
		}

		try {
			if (!$this->previewManager->isAvailable($fileNode)) {
				// no preview available or preview disabled
				throw new NotFound();
			}
			if ($image = $fileNode->getThumbnail($queryParams)) {
				if ($image === null || !$image->valid()) {
					throw new NotFound();
				}
				$type = $image->mimeType();
				if (!\in_array($type, ['image/png', 'image/jpeg', 'image/gif'])) {
					$type = 'application/octet-stream';
				}

				// Enable output buffering
				\ob_start();
				// Capture the output
				$image->show();
				$imageData = \ob_get_contents();
				// Clear the output buffer
				\ob_end_clean();

				$response->setHeader('Content-Type', $type);
				$response->setHeader('Content-Disposition', 'attachment');
				// cache 24h
				$response->setHeader('Cache-Control', 'max-age=86400, must-revalidate');
				$response->setHeader('Expires', \gmdate("D, d M Y H:i:s", $this->timeFactory->getTime() + 86400) . " GMT");

				$response->setStatus(200);
				$response->setBody($imageData);

				// Returning false to break the event chain
				return false;
			}
		} catch (GenericEncryptionException $e) {
			// returning 403 because some apps stops syncing if 503 is returned.
			throw new Forbidden('Encryption not ready: ' . $e->getMessage());
		} catch (StorageNotAvailableException $e) {
			throw new ServiceUnavailable('Failed to open file: ' . $e->getMessage());
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		} catch (LockedException $e) {
			throw new FileLocked($e->getMessage(), $e->getCode(), $e);
		}
		// TODO: add forceIcon handling .... if still needed
		throw new NotFound();
	}
}
