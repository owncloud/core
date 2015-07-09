<?php

namespace OCA\DAV;

use Sabre\DAV\SimpleCollection;

class RootCollection extends SimpleCollection {

	public function __construct() {
		$children = [
			new SimpleCollection('files'),
			new SimpleCollection('uploads'),
			new SimpleCollection('blocks')
		];
		parent::__construct('root', $children);
	}

}
