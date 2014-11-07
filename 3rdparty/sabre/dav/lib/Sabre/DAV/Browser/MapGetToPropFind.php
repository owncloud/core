<?php

namespace Sabre\DAV\Browser;

use Sabre\DAV;

/**
 * This is a simple plugin that will map any GET request for non-files to
 * PROPFIND allprops-requests.
 *
 * This should allow easy debugging of PROPFIND
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MapGetToPropFind extends DAV\ServerPlugin {

    /**
     * reference to server class
     *
     * @var Sabre\DAV\Server
     */
    protected $server;

    /**
     * Initializes the plugin and subscribes to events
     *
     * @param DAV\Server $server
     * @return void
     */
    public function initialize(DAV\Server $server) {

        $this->server = $server;
        $this->server->subscribeEvent('beforeMethod',array($this,'httpGetInterceptor'));
    }

    /**
     * This method intercepts GET requests to non-files, and changes it into an HTTP PROPFIND request
     *
     * @param string $method
     * @param string $uri
     * @return bool
     */
    public function httpGetInterceptor($method, $uri) {

        if ($method!='GET') return true;

        $node = $this->server->tree->getNodeForPath($uri);
        if ($node instanceof DAV\IFile) return;

        $this->server->invokeMethod('PROPFIND',$uri);
        return false;

    }

}
