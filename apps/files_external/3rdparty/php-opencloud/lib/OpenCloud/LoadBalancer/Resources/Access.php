<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage access lists
 *
 * @api
 */
class Access extends SubResource 
{

    public $id;
    public $type;
    public $address;

    protected static $json_name = "accessList";
    protected static $url_resource = "accesslist";

    protected $_create_keys = array(
        'type', 
        'address'
    );

    public function Update($params = array()) 
    { 
        $this->NoUpdate(); 
    }

}
