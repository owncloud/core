<?php

/**
 * Copyright (c) 2014 Jörn Friedrich Dreyer jfd@ownCloud.com
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OC\Search\Sabre;

use Elastica\Search;
use Sabre\DAV;

/**
 * Search plugin
 *
 * a 100% correct query would be:
 * curl --request SEARCH  --user admin:admin -v --header "Content-Type: text/xml" --header "Brief:t" --data "<D:searchrequest xmlns:D='DAV:'><D:basicsearch><D:where><D:or><D:like caseless='yes'><D:prop><D:href/></D:prop><D:literal>foo</D:literal></D:like><D:contains>foo</D:contains></D:or></D:where></D:basicsearch></D:searchrequest>" http://localhost/core/remote.php/webdav/
 * to make it simpler we allow
 * curl --request SEARCH  --user admin:admin -v --header "Content-Type: text/xml" --header "Brief:t" --data "<D:searchrequest xmlns:D='DAV:'><D:basicsearch><D:where><D:like><D:propall/><D:literal>foo</D:literal></D:like></D:where></D:basicsearch></D:searchrequest>" http://localhost/core/remote.php/webdav/
 *
 * This plugin provides search support via WebDAV rfc 5323 to owncloud
 * @link http://tools.ietf.org/html/rfc5323.
 */
class Plugin extends DAV\ServerPlugin {

	/**
	 * server
	 *
	 * @var DAV\Server
	 */
	protected $server;


	/**
	 * Initializes the plugin
	 *
	 * This method is automatically called by the Server class after addPlugin.
	 *
	 * @param DAV\Server $server
	 * @return void
	 */
	public function initialize(DAV\Server $server) {

		\OC_App::loadApps();

		$this->server = $server;
		$server->subscribeEvent('unknownMethod',array($this,'unknownMethod'));

	}

	/**
	 * Returns a plugin name.
	 *
	 * Using this name other plugins will be able to access other plugins
	 * using DAV\Server::getPlugin
	 *
	 * @return string
	 */
	public function getPluginName() {

		return 'search';

	}

	/**
	 * This method is called by the Server if the user used an HTTP method
	 * the server didn't recognize.
	 *
	 * This plugin intercepts the SEARCH method.
	 *
	 * @param string $method
	 * @param string $uri
	 * @return bool
	 */
	public function unknownMethod($method, $uri) {

		if ($method === 'SEARCH') {
			$this->httpSearch($uri);
			return false;
		}

	}

	/**
	 * Use this method to tell the server this plugin defines additional
	 * HTTP methods.
	 *
	 * This method is passed a uri. It should only return HTTP methods that are
	 * available for the specified uri.
	 *
	 * @param string $uri
	 * @return array
	 */
	public function getHTTPMethods($uri) {

			return array('SEARCH');

	}

	/**
	 * Returns a list of features for the HTTP OPTIONS Dav: header.
	 *
	 * In this case this is only the number 2. The 2 in the Dav: header
	 * indicates the server supports locks.
	 *
	 * @return array
	 */
	public function getFeatures() {

		return array(2);

	}

	/**
	 * Locks an uri
	 *
	 * The WebDAV lock request can be operated to either create a new lock on a file, or to refresh an existing lock
	 * If a new lock is created, a full XML body should be supplied, containing information about the lock such as the type
	 * of lock (shared or exclusive) and the owner of the lock
	 *
	 * If a lock is to be refreshed, no body should be supplied and there should be a valid If header containing the lock
	 *
	 * Additionally, a lock can be requested for a non-existent file. In these case we're obligated to create an empty file as per RFC4918:S7.3
	 *
	 * @param string $uri
	 * @return void
	 */
	protected function httpSearch($uri) {

		if ($body = $this->server->httpRequest->getBody(true)) {
			// This is a new search request
			$query = $this->parseSearchRequest($body);

		} else {

			// There was no search body
			throw new DAV\Exception\BadRequest('An xml body is required for search requests');

		}

		$search = \OC::$server->getSearch();
		$results = $search->search($query->where, $query->from);

		$this->server->httpResponse->setHeader('Content-Type','application/xml; charset=utf-8');
		$this->server->httpResponse->sendStatus(207); // Multistatus
		$this->server->httpResponse->sendBody($this->generateSearchResponse($results));

	}

	/**
	 * Generates the response for successful SEARCH requests
	 *
	 * @param \OCP\Search\Result[] $results
	 * @return string
	 */
	protected function generateSearchResponse(array $results) {

		$nodes = array();
		foreach ($results as $result) {
			if ($result->type === 'files') {
				$node = $this->server->getPropertiesForPath(ltrim($result->path, '/'), array(), 1);
				$nodes[] = $node[0];
			} else {
				// meh ... this needs to be extendable by apps like calendar,
				// contacts, bookmarks and basically any search provider
			}
		}

		$prefer = $this->server->getHTTPPrefer();
		$minimal = $prefer['return-minimal'];

		$data = $this->server->generateMultiStatus($nodes, $minimal);
		return $data;

	}

	/**
	 * Parses a webdav lock xml body, and returns a string query
	 *
	 * @param string $body
	 * @return \OC\Search\Query
	 */
	protected function parseSearchRequest($body) {

		// Fixes an XXE vulnerability on PHP versions older than 5.3.23 or
		// 5.4.13.
		$previous = libxml_disable_entity_loader(true);

		$xml = simplexml_load_string(
			DAV\XMLUtil::convertDAVNamespace($body),
			null,
			LIBXML_NOWARNING);
		libxml_disable_entity_loader($previous);

		$xml->registerXPathNamespace('d','urn:DAV');
		$query = new \OC\Search\Query();
		$query->select = \OC\Search\Query::ALL_PROPS;
		$propall = $xml->xpath('d:basicsearch/d:where/d:like/d:propall');
		$like = $xml->xpath('d:basicsearch/d:where/d:like/d:literal');
		if (isset($propall[0]) && isset($like[0])) {
			$query->where = $like[0]->__toString();
		} else {
			throw new DAV\Exception\BadRequest('Currently only a very specific query is available: curl --request SEARCH --user admin:admin -v --header "Content-Type: text/xml" --header "Brief:t" --data "<D:searchrequest xmlns:D=\'DAV:\'><D:basicsearch><D:where><D:like><D:propall/><D:literal>foo</D:literal></D:like></D:where></D:basicsearch></D:searchrequest>" http://localhost/core/remote.php/webdav/');
		}

		$query->from = array();
		$scopes = $xml->xpath('d:basicsearch/d:from/d:scope/d:href');
		foreach ($scopes as $scope) {
			$query->from[] = $scope->__toString();
		}

		$query->orderBy = array(array('mtime','desc'));

		return $query;

	}


}
