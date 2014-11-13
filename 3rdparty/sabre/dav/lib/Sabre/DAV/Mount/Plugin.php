<?php

namespace Sabre\DAV\Mount;

use Sabre\DAV;

/**
 * This plugin provides support for RFC4709: Mounting WebDAV servers
 *
 * Simply append ?mount to any collection to generate the davmount response.
 *
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends DAV\ServerPlugin {

    /**
     * Reference to Server class
     *
     * @var Sabre\DAV\Server
     */
    protected $server;

    /**
     * Initializes the plugin and registers event handles
     *
     * @param DAV\Server $server
     * @return void
     */
    public function initialize(DAV\Server $server) {

        $this->server = $server;
        $this->server->subscribeEvent('beforeMethod',array($this,'beforeMethod'), 90);

    }

    /**
     * 'beforeMethod' event handles. This event handles intercepts GET requests ending
     * with ?mount
     *
     * @param string $method
     * @param string $uri
     * @return bool
     */
    public function beforeMethod($method, $uri) {

        if ($method!='GET') return;
        if ($this->server->httpRequest->getQueryString()!='mount') return;

        $currentUri = $this->server->httpRequest->getAbsoluteUri();

        // Stripping off everything after the ?
        list($currentUri) = explode('?',$currentUri);

        $this->davMount($currentUri);

        // Returning false to break the event chain
        return false;

    }

    /**
     * Generates the davmount response
     *
     * @param string $uri absolute uri
     * @return void
     */
    public function davMount($uri) {

        $this->server->httpResponse->sendStatus(200);
        $this->server->httpResponse->setHeader('Content-Type','application/davmount+xml');
        ob_start();
        echo '<?xml version="1.0"?>', "\n";
        echo "<dm:mount xmlns:dm=\"http://purl.org/NET/webdav/mount\">\n";
        echo "  <dm:url>", htmlspecialchars($uri, ENT_NOQUOTES, 'UTF-8'), "</dm:url>\n";
        echo "</dm:mount>";
        $this->server->httpResponse->sendBody(ob_get_clean());

    }


}
