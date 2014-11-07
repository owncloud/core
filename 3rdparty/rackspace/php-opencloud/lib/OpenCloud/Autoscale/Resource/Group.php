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

use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * An autoscaling group is monitored by Rackspace CloudMonitoring. When
 * Monitoring triggers an alarm for high utilization within the autoscaling 
 * group, a webhook is triggered. The webhook stimulates the autoscale service 
 * which consults a policy in accordance with the webhook. The policy determines 
 * how many additional cloud servers should be added or removed in accordance 
 * with the alarm.
 * 
 * There are three components to Autoscale:
 * 
 * - The Scaling Group Configuration ($this->groupConfiguration)
 * - The Scaling Group's Launch Configuration ($this->launchConfiguration)
 * - The Scaling Group's Policies ($this->scalingPolicies)
 * 
 * @link https://github.com/rackerlabs/otter/blob/master/doc/getting_started.rst
 * @link http://docs.autoscale.apiary.io/
 */
class Group extends AbstractResource
{
    private $id;
    private $links;
    private $groupConfiguration;
    private $launchConfiguration;
    private $scalingPolicies;
    private $name;
    protected $metadata;
    
    private $active;
    private $activeCapacity;
    private $pendingCapacity;
    private $desiredCapacity;
    private $paused;
    
    protected static $json_name = 'group';
    protected static $url_resource = 'groups';
    protected static $json_collection_name = 'groups';
    
    /**
     * {@inheritDoc}
     */
    public $createKeys = array(
        'groupConfiguration',
        'launchConfiguration',
        'scalingPolicies'
    );
    
    /**
     * {@inheritDoc}
     */
    public $associatedResources = array(
        'groupConfiguration'  => 'GroupConfiguration',
        'launchConfiguration' => 'LaunchConfiguration',
        
    );
    
    /**
     * {@inheritDoc}
     */
    public $associatedCollections = array(
        'scalingPolicies' => 'ScalingPolicy'
    );
        
    /**
     * {@inheritDoc}
     */
    public function update($params = array())
    {
        return $this->noUpdate();
    }
    
    /**
     * Get the current state of the scaling group, including the current set of 
     * active entities, the number of pending entities, and the desired number 
     * of entities.
     * 
     * @return object|boolean
     * @throws Exceptions\HttpError
     * @throws Exceptions\ServerActionError
     */
    public function getState()
    {
        $response = $this->getService()
            ->getClient()
            ->get($this->url('state'))
            ->send();

        $body = Formatter::decode($response);

        return (!empty($body->group)) ? $body->group : false;
    }
    
    /**
     * Get the group configuration for this autoscale group.
     * 
     * @return GroupConfiguration
     */
    public function getGroupConfig()
    {
        if (($config = $this->getProperty('groupConfiguration')) instanceof GroupConfiguration) {
            return $config;
        }
        
        $config = $this->getService()->resource('GroupConfiguration');
        $config->setParent($this);
        if ($this->getId()) {
            $config->refresh(null, $config->url());
        }
        return $config;
    }
    
    /**
     * Get the launch configuration for this autoscale group.
     * 
     * @return LaunchConfiguration
     */
    public function getLaunchConfig()
    {
        if (($config = $this->getProperty('launchConfiguration')) instanceof LaunchConfiguration) {
            return $config;
        }
        
        $config = $this->getService()->resource('LaunchConfiguration');
        $config->setParent($this);
        if ($this->getId()) {
            $config->refresh(null, $config->url());
        }
        return $config;
    }
    
    /**
     * NB: NOT SUPPORTED YET.
     * 
     * @codeCoverageIgnore
     */
    public function pause()
    {
        return $this->getService()->getClient()->post($this->url('pause'))->send();
    }
    
    /**
     * NB: NOT SUPPORTED YET.
     * 
     * @codeCoverageIgnore
     */
    public function resume()
    {
        return $this->getService()->getClient()->post($this->url('resume'))->send();
    }
    
    /**
     * Get the scaling policies associated with this autoscale group.
     * 
     * @return Collection
     */
    public function getScalingPolicies($override = false)
    {
        if (null === $this->scalingPolicies || $override === true) {
            $this->scalingPolicies = $this->getService()->resourceList('ScalingPolicy', null, $this);
        }
        return $this->scalingPolicies;
    }
    
    /**
     * Get a particular scaling policy for this autoscale group.
     * 
     * @param  object|int $id
     * @return ScalingPolicy
     */
    public function getScalingPolicy($id = null)
    {
        $config = $this->getService()->resource('ScalingPolicy');
        $config->setParent($this);
        if ($id) {
            $config->populate($id);
        }
        return $config;
    }
    
}