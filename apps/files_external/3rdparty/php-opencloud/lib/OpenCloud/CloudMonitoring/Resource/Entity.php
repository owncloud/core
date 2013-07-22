<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;

/**
 * Entity class.
 * 
 * @extends AbstractResource
 */
class Entity extends AbstractResource
{
	public $id;
	public $label;
	public $agent_id;
	public $ip_addresses;
	public $metadata;

    protected static $json_name = 'entities';
    protected static $url_resource = 'entities';
    protected static $json_collection_name = 'values';

    protected static $emptyObject = array(
        'label',
        'agent_id',
        'ip_addresses',
        'metadata'
    );

    protected static $requiredKeys = array(
        'label'
    );

    public function baseUrl()
    {
        return $this->Parent()->Url($this->ResourceName());
    }

}