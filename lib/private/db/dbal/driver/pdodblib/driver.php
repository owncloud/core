<?php

namespace OC\DB\DBAL\Driver\PDODblib;

use OC\DB\DBAL\Platforms\DblibPlatform;

class Driver extends \Realestate\MssqlBundle\Driver\PDODblib\Driver
{

    public function getDatabasePlatform()
    {
        return new DblibPlatform();
    }

}
