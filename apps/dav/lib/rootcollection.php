<?php

namespace OCA\DAV;

use OC\Connector\Sabre\Principal;
use Sabre\CalDAV\Principal\Collection;
use Sabre\DAV\SimpleCollection;

class RootCollection extends SimpleCollection {

	public function __construct() {
		$principalBackend = new Principal(
			\OC::$server->getConfig(),
			\OC::$server->getUserManager()
		);
		$principalCollection = new Collection($principalBackend);
//		$principalCollection->disableListing = true;

		$children = [
			$principalCollection,
			new Files\RootCollection(),
			new Upload\RootCollection(),
			new SimpleCollection('blocks')
		];
		parent::__construct('root', $children);
	}

}
