<?php

/**
 * ownCloud
 *
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller <deepdiver@owncloud.com>
 *
 * @license AGPL3
 */

class OC_Connector_Sabre_ChunkingPlugin extends \Sabre\DAV\ServerPlugin
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
		$this->server->subscribeEvent('beforeMethod', array($this, 'beforeMethod'), 10);
	}

	/**
	 * For chunked upload we remove the If-Match header to prevent SabreDAV to fire a 412/PreconditionFailed.
	 * The header is saved in another header in order to keep it's value for later reuse.
	 *
	 * @return bool
	 */
	public function beforeMethod() {
		if ($this->server->httpRequest->getHeader('OC-CHUNKED')) {
			if (isset($_SERVER['HTTP_IF_MATCH'])) {
				$_SERVER['HTTP_IF_MATCH_SAVED'] = $_SERVER['HTTP_IF_MATCH'];
				unset($_SERVER['HTTP_IF_MATCH']);
				$this->server->httpRequest = new OC_Connector_Sabre_Request();
			}
		}

		return true;
	}
}
