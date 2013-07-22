<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\PersistentObject;

/**
 * Account class.
 * 
 * @extends AbstractResource
 * @implements ResourceInterface
 */
class Account extends AbstractResource implements ResourceInterface
{

    public $metadata;
    public $webhook_token;

    protected static $json_name = 'account';
    protected static $url_resource = 'account';

    protected static $requiredKeys = array(
        'id',
        'metadata',
        'webhook_token'
    );

    public function baseUrl()
    {
        return $this->Parent()->Url($this->ResourceName());
    }
    
    public function updateUrl()
    {
        return $this->Url();
    }
    
    public function Create($params = array())
    {
        $this->NoCreate();
    }
    
    public function Delete()
    {
        $this->NoDelete();
    }
    
}