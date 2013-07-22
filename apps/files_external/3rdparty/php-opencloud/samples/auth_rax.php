<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

// my credentials
define('AUTHURL', RACKSPACE_US);
$mysecret = array(
    'username' => '{username}',
    'apiKey' => '{apiKey}'
);

// establish our credentials
$connection = new \OpenCloud\Rackspace(AUTHURL, $mysecret);
