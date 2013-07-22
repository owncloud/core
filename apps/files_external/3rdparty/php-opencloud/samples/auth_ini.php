<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once "php-opencloud.php";

define('INIFILE', 'auth.ini');

/**
 * Load the .INI file into an associative array. The second parameter causes it
 * to store the various [sections] of the .ini file. In our example, the
 * [Identity] section contains the auth secret info.
 */
$ini = parse_ini_file(INIFILE, TRUE);
if (!$ini) {
    printf("Unable to load .ini file [%s]\n", INIFILE);
    exit;
}

// establish our credentials
$RAX = new \OpenCloud\Rackspace(
    $ini['Identity']['url'], $ini['Identity']);
$RAX->SetDefaults('Compute',
    $ini['Compute']['serviceName'],
    $ini['Compute']['region'],
    $ini['Compute']['urltype']
);
$compute = $RAX->Compute();
$serverlist = $compute->ServerList();
while($server = $serverlist->Next())
    print($server->name."\n");
