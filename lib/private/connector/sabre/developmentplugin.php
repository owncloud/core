<?php

namespace OC\Connector\Sabre;

use Sabre\DAV\Exception\Forbidden;

class DevelopmentPlugin extends \Sabre\DAV\ServerPlugin
{

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by \Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param \Sabre\DAV\Server $server
	 * @return void
	 */
	public function initialize(\Sabre\DAV\Server $server) {

		$this->server = $server;
		$this->server->subscribeEvent('beforeMethod', array($this, 'intercept'), 10);
	}

	/**
	 * 'beforeMethod' event handler
	 *
	 * @param string $method
	 * @param string $uri
	 * @return bool
	 */
	public function beforeMethod($method, $uri) {
		/*
		 * example to return a specific http error code for PROPFIND on a certain path
		 */

		if ($method !== 'PROPFIND') {
			// true will continue regular operations
			return true;
		}

		if ($uri === 'folder/file.txt') {
			throw new Forbidden();
		}

		return true;
	}
}
