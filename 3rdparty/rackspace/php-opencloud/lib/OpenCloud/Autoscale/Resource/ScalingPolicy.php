<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Autoscale\Resource;

/**
 * Description of ScalingPolicy
 * 
 * @link 
 */
class ScalingPolicy extends AbstractResource
{
    
    public $id;
    public $links;
    public $name;
    public $change;
    public $cooldown;
    public $type;
    public $metadata;
    
    protected static $json_name = 'policy';
    protected static $json_collection_name = 'policies';
    protected static $url_resource = 'policies';
    
    public $createKeys = array(
        'name',
        'change',
        'cooldown',
        'type'
    );
    
    public function getWebhookList()
    {
        return $this->getService()->resourceList('Webhook', null, $this);
    }
    
    public function getWebhook($id = null)
    {
        $webhook = new Webhook();
        $webhook->setParent($this);
        $webhook->setService($this->getService());
        if ($id) {
            $webhook->populate($id);
        }
        return $webhook;
    }

    public function execute()
    {
        return $this->getClient()->post($this->url('execute'))->send();
    }
    
}