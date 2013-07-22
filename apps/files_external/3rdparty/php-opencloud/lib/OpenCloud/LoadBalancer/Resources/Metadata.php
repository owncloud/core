<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage Metadata
 */
class Metadata extends SubResource 
{

    public $id;
    public $key;
    public $value;

    protected static $json_name = 'meta';
    protected static $json_collection_name = 'metadata';
    protected static $url_resource = 'metadata';

    protected $_create_keys = array('key', 'value');

    public function Name() 
    {
        return $this->key;
    }

}
