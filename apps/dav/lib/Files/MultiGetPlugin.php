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

namespace OCA\DAV\Files;

use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Files\Xml\MultiGetRequest;
use OCP\Files\NotPermittedException;
use OCP\IUserSession;
use Sabre\DAV\Exception\Locked;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\INode;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use ZipStreamer\ZipStreamer;

class MultiGetPlugin extends ServerPlugin {
	public const NS_OWNCLOUD = 'http://owncloud.org/ns';
	public const REPORT_NAME = '{http://owncloud.org/ns}files-multiget';

	/** @var Server */
	protected $server;
	/**
	 * @var IUserSession
	 */
	private $userSession;

	public function __construct(IUserSession $userSession) {
		$this->userSession = $userSession;
	}

	/**
	 * Initializes the plugin and registers event handlers
	 *
	 * @param Server $server
	 * @return void
	 */
	public function initialize(Server $server) {
		$server->xml->namespaceMap[self::NS_OWNCLOUD] = 'oc';

		$server->xml->elementMap[self::REPORT_NAME] = MultiGetRequest::class;

		$this->server = $server;
		$this->server->on('report', [$this, 'onReport']);
	}

	/**
	 * Returns a list of reports this plugin supports.
	 *
	 * This will be used in the {DAV:}supported-report-set property.
	 *
	 * @param string $uri
	 * @return array
	 */
	public function getSupportedReportSet($uri) {
		return [self::REPORT_NAME];
	}

	/**
	 * @param string $reportName
	 * @param MultiGetRequest $report
	 * @param string $uri
	 * @throws Forbidden
	 * @throws Locked
	 * @throws NotPermittedException
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @throws NotFound
	 *
	 * @codeCoverageIgnore
	 */
	public function onReport($reportName, $report, $uri): void {
		$reportTargetNode = $this->server->tree->getNodeForPath($uri);
		if (!$reportTargetNode instanceof Directory || $reportName !== self::REPORT_NAME) {
			return;
		}

		// Only ZIP for now ....
		$streamer = new ZipStreamer(['zip64' => PHP_INT_SIZE !== 4]);
		$streamer->sendHeaders();

		// send cors headers
		$requesterDomain = $this->server->httpRequest->getHeader('origin');
		$userId = null;
		if ($this->userSession->getUser() !== null) {
			$userId = $this->userSession->getUser()->getUID();
		}
		$headers = \OC_Response::setCorsHeaders($userId, $requesterDomain);
		foreach ($headers as $key => $value) {
			$value = \implode(',', $value);
			\header("$key: $value");
		}

		foreach ($report->resources as $resource) {
			$path = $this->server->calculateUri($resource);
			$node = $this->server->tree->getNodeForPath($path);
			$this->addNodeToZipStreamer($node, $streamer);
		}
		$streamer->finalize();

		// response is sent out already -> terminate here
		exit();
	}

	/**
	 * @param INode $node
	 * @param ZipStreamer $streamer
	 * @param string $basePath
	 * @throws Forbidden
	 * @throws NotPermittedException
	 * @throws Locked
	 */
	private function addNodeToZipStreamer(INode $node, ZipStreamer $streamer, string $basePath = ''): void {
		if ($node instanceof Directory) {
			$streamer->addEmptyDir($basePath, ['timestamp' => $node->getLastModified()]);
			$children = $node->getChildren();
			foreach ($children as $child) {
				$this->addNodeToZipStreamer($child, $streamer, $basePath . '/' . $node->getName());
			}
		}

		if ($node instanceof File) {
			$file = $node->getNode();
			if ($file instanceof \OCP\Files\File) {
				$stream = $file->fopen('r');
				if (\is_resource($stream)) {
					$streamer->addFileFromStream($stream, $basePath . '/' . $file->getName(), ['timestamp' => $node->getLastModified()]);
				}
			}
		}
	}
}
