<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * CheckType class.
 * 
 * @extends AbstractResource
 */
class CheckType extends ReadOnlyResource implements ResourceInterface
{
	
	public $id;
	public $type;
	public $fields;
	public $supported_platforms;

    protected static $json_name = 'check_types';
    protected static $url_resource = 'check_types';
    protected static $json_collection_name = 'values';

    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }

}