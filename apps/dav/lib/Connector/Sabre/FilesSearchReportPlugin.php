<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgear.es>
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

namespace OCA\DAV\Connector\Sabre;

use Sabre\DAV\Server as DavServer;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\PropFind;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Exception\NotImplemented;
use OCA\DAV\Files\Xml\SearchRequest;
use OCP\ISearch;
use OC\Search\Result\File as FileResult;

class FilesSearchReportPlugin extends ServerPlugin {
	// namespace
	const NS_OWNCLOUD = 'http://owncloud.org/ns';
	const REPORT_NAME = '{http://owncloud.org/ns}search-files';

	/**
	 * Reference to main server object
	 *
	 * @var DavServer
	 */
	private $server;

	/** @var ISearch */
	private $searchService;

	public function __construct(ISearch $searchService) {
		$this->searchService = $searchService;
	}

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by \Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param DavServer $server
	 * @return void
	 */
	public function initialize(DavServer $server) {
		$server->xml->namespaceMap[self::NS_OWNCLOUD] = 'oc';

		$server->xml->elementMap[self::REPORT_NAME] = SearchRequest::class;

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
		$reportTargetNode = $this->server->tree->getNodeForPath($uri);
		if ($reportTargetNode instanceof Directory && $reportTargetNode->getPath() === '/') {
			return [self::REPORT_NAME];
		} else {
			return [];
		}
	}

	/**
	 * REPORT operations to look for files
	 *
	 * @param string $reportName
	 * @param mixed $report
	 * @param string $uri
	 * @return bool
	 * @throws BadRequest
	 * @throws NotImplemented
	 * @internal param $ [] $report
	 */
	public function onReport($reportName, $report, $uri) {
		$reportTargetNode = $this->server->tree->getNodeForPath($uri);
		if (!$reportTargetNode instanceof Directory ||
				$reportName !== self::REPORT_NAME) {
			return;
		}

		if ($reportTargetNode->getPath() !== '/') {
			throw new NotImplemented('Search report only available in the root folder of the user');
		}

		$requestedProps = $report->properties;
		$searchInfo = $report->searchInfo;

		if (!isset($searchInfo['pattern'])) {
			throw new BadRequest('Search pattern cannot be empty');
		}

		$limit = 30;
		if (isset($searchInfo['limit'])) {
			$limit = $searchInfo['limit'];
		}

		$searchResults = $this->searchService->searchPaged(
			$searchInfo['pattern'],
			['files'],
			1,
			$limit
		);

		$filesUri = $this->getFilesBaseUri($uri, $reportTargetNode->getPath());

		// use the $limit again to make sure we respect the limit while
		// returning the results. The search service might have return more
		// results than the limit if there are more than one provider
		$xml = $this->server->generateMultiStatus(
			$this->getSearchResultIterator($filesUri, $searchResults, $requestedProps, $limit)
		);
		$this->server->httpResponse->setStatus(207);
		$this->server->httpResponse->setHeader(
			'Content-Type',
			'application/xml; charset=utf-8'
		);
		$this->server->httpResponse->setBody($xml);

		return false;
	}

	/**
	 * @param string $filesUri the base uri for this user's files directory,
	 * usually /files/username
	 * @param File[] $searchResults the results coming from the search service,
	 * within the files app
	 * @param array $requestedProps the list of requested webDAV properties
	 * @param int $maxResults the maximum number of results the generator should generate based on the $searchResults
	 * @return \Generator a generator to traverse over the properties of the
	 * search result, suitable for server's multistatus response
	 */
	private function getSearchResultIterator($filesUri, $searchResults, $requestedProps, $maxResults) {
		$paths = \array_map(function ($searchResult) use ($filesUri) {
			return $filesUri . $searchResult->path;
		}, $searchResults);

		$nodes = $this->server->tree->getMultipleNodes($paths);

		$propFindType = $requestedProps ? PropFind::NORMAL : PropFind::ALLPROPS;

		// make sure we limit the results
		$returnedElements = 0;

		foreach ($nodes as $path => $node) {
			if ($returnedElements >= $maxResults) {
				break;
			}

			$propFind = new PropFind(
				$path,
				$requestedProps,
				0,
				$propFindType
			);
			$this->server->getPropertiesByNode($propFind, $node);

			$result = $propFind->getResultForMultiStatus();
			$result['href'] = $propFind->getPath();
			yield $result;

			$returnedElements++;
		}
	}

	/**
	 * Returns the base uri of the files root by removing
	 * the subpath from the URI
	 *
	 * @param string $uri URI from this request
	 * @param string $subPath subpath to remove from the URI
	 *
	 * @return string files base uri
	 */
	private function getFilesBaseUri($uri, $subPath) {
		$uri = \trim($uri, '/');
		$subPath = \trim($subPath, '/');
		if ($subPath === '') {
			$filesUri = $uri;
		} else {
			$filesUri = \substr($uri, 0, \strlen($uri) - \strlen($subPath));
		}
		$filesUri = \trim($filesUri, '/');
		if ($filesUri === '') {
			return '';
		}
		return '/' . $filesUri;
	}
}
