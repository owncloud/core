<?php
namespace OC\Connector\Sabre;

/**
 * ownCloud / SabreDAV
 *
 * @author Markus Goetz
 *
 * @copyright Copyright (C) 2007-2013 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */

use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

/**
 * Class \OC\Connector\Sabre\Server
 *
 * This class overrides some methods from @see \Sabre\DAV\Server.
 *
 * @see \Sabre\DAV\Server
 */
class Server extends \Sabre\DAV\Server {

	/**
	 * @var string
	 */
	private $overLoadedUri = null;

	/**
	 * @var boolean
	 */
	private $ignoreRangeHeader = false;

	/**
	 * @see \Sabre\DAV\Server
	 */
	public function __construct($treeOrNode = null) {
		parent::__construct($treeOrNode);
		self::$exposeVersion = false;
		$this->enablePropfindDepthInfinity = true;
	}

	public function getRequestUri() {

		if (!is_null($this->overLoadedUri)) {
			return $this->overLoadedUri;
		}

		return parent::getRequestUri();
	}

	public function checkPreconditions(RequestInterface $request, ResponseInterface $response) {
		// chunked upload handling
		if (!is_null($request->getHeader('OC-CHUNKED'))) {
			$filePath = parent::getRequestUri();
			list($path, $name) = \Sabre\HTTP\URLUtil::splitPath($filePath);
			$info = \OC_FileChunking::decodeName($name);
			if (!empty($info)) {
				$filePath = $path . '/' . $info['name'];
				$this->overLoadedUri = $filePath;
			}
		}

		$result = parent::checkPreconditions($request, $response);
		$this->overLoadedUri = null;
		return $result;
	}

}
