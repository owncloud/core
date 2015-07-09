<?php

namespace OCA\DAV;

use OC\Connector\Sabre\Auth;
use OC\Connector\Sabre\BlockLegacyClientPlugin;
use OCP\IRequest;
use Sabre\DAV\Auth\Plugin;
use Sabre\DAV\Tree;
use Sabre\HTTP\URLUtil;
use Sabre\HTTP\Util;

class Server {

	/** @var IRequest */
	private $request;

	public function __construct(IRequest $request, $baseUri) {
		$this->request = $request;
		$this->baseUri = $baseUri;
		$root = new RootCollection();
		$this->server = new \OC\Connector\Sabre\Server($root);

		// Backends
		$authBackend = new Auth();

		// Set URL explicitly due to reverse-proxy situations
		$this->server->httpRequest->setUrl($this->request->getRequestUri());
		$this->server->setBaseUri($this->baseUri);

		$this->server->addPlugin(new BlockLegacyClientPlugin(\OC::$server->getConfig()));
		$this->server->addPlugin(new Plugin($authBackend, 'ownCloud'));
	}

	public function exec() {
		$this->server->exec();
	}
}
