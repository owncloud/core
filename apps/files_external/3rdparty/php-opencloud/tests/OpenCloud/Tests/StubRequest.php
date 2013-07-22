<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

namespace OpenCloud\Tests;

use OpenCloud\Common\Request\Curl;
use OpenCloud\Common\Request\Response\Blank;

/**
 * stub classes for testing the request() method (which is overridden in the
 * StubConnection class used for testing everything else).
 */
class StubRequest extends Curl 
{
    public $url;

    public function __construct($url, $method = 'GET') 
    {
        $this->url = $url;
        parent::__construct($url, $method);
    }

    public function Execute() 
    {
        switch($this->url) {
        case '401':
        case '403':
        case '413':
            return new Blank(array(
                'status' => $this->url + 0
           ));
        default:
            return new Blank(array(
                'status' => 200
           ));
        }
    }

}