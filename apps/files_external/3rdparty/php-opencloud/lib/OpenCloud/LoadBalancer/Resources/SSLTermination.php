<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage SSL termination
 */
class SSLTermination extends SubResource 
{

    public $certificate;
    public $enabled;
    public $secureTrafficOnly;
    public $privatekey;
    public $intermediateCertificate;
    public $securePort;
    
    protected static $json_name = "sslTermination";
    protected static $url_resource = "ssltermination";
    
    protected $_create_keys = array(
        'certificate',
        'enabled',
        'secureTrafficOnly',
        'privatekey',
        'intermediateCertificate',
        'securePort'
    );

    public function Create($params = array()) 
    { 
        $this->Update($params); 
    }

}
