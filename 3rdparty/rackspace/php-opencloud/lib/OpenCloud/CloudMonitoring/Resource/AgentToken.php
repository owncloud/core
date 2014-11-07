<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Agent class.
 */
class AgentToken extends AbstractResource
{
    private $id;
    private $token;
    private $label;
    
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agent_tokens';
    
    protected static $emptyObject = array(
        'label',
        'token'
    );

    protected static $requiredKeys = array();

}