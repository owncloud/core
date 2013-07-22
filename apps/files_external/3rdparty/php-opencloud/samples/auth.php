<?php
/**
 * Authentication Sample
 *
 * @copyright 2012-2013-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package samples
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 *
 * A very simple example showing how to authenticate using the OpenCloud\OpenStack
 * connection object. Replace values {in brackets} with your URL, username, and 
 * password. 
 */

require_once "php-opencloud.php";

// my credentials
define('AUTHURL', '{your authorization URL}');
$mysecret = array(
    'username' => '{username}',
    'password' => '{password}'
);

// establish our credentials
$connection = new \OpenCloud\OpenStack(AUTHURL, $mysecret);
