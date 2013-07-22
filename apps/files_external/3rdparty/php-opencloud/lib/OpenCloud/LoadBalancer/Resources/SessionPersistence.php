<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage session persistence setting
 */
class SessionPersistence extends SubResource 
{
    
    public $persistenceType;
    protected static $json_name = 'sessionPersistence';
    protected static $url_resource = 'sessionpersistence';
    private $_create_keys = array('persistenceType');

}
