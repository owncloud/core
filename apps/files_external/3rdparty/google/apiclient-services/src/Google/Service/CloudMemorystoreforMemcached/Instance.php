<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_CloudMemorystoreforMemcached_Instance extends Google_Collection
{
  protected $collection_key = 'zones';
  public $authorizedNetwork;
  public $createTime;
  public $discoveryEndpoint;
  public $displayName;
  protected $instanceMessagesType = 'Google_Service_CloudMemorystoreforMemcached_InstanceMessage';
  protected $instanceMessagesDataType = 'array';
  public $labels;
  public $memcacheFullVersion;
  protected $memcacheNodesType = 'Google_Service_CloudMemorystoreforMemcached_Node';
  protected $memcacheNodesDataType = 'array';
  public $memcacheVersion;
  public $name;
  protected $nodeConfigType = 'Google_Service_CloudMemorystoreforMemcached_NodeConfig';
  protected $nodeConfigDataType = '';
  public $nodeCount;
  protected $parametersType = 'Google_Service_CloudMemorystoreforMemcached_MemcacheParameters';
  protected $parametersDataType = '';
  public $state;
  public $updateTime;
  public $zones;

  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDiscoveryEndpoint($discoveryEndpoint)
  {
    $this->discoveryEndpoint = $discoveryEndpoint;
  }
  public function getDiscoveryEndpoint()
  {
    return $this->discoveryEndpoint;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_CloudMemorystoreforMemcached_InstanceMessage
   */
  public function setInstanceMessages($instanceMessages)
  {
    $this->instanceMessages = $instanceMessages;
  }
  /**
   * @return Google_Service_CloudMemorystoreforMemcached_InstanceMessage
   */
  public function getInstanceMessages()
  {
    return $this->instanceMessages;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMemcacheFullVersion($memcacheFullVersion)
  {
    $this->memcacheFullVersion = $memcacheFullVersion;
  }
  public function getMemcacheFullVersion()
  {
    return $this->memcacheFullVersion;
  }
  /**
   * @param Google_Service_CloudMemorystoreforMemcached_Node
   */
  public function setMemcacheNodes($memcacheNodes)
  {
    $this->memcacheNodes = $memcacheNodes;
  }
  /**
   * @return Google_Service_CloudMemorystoreforMemcached_Node
   */
  public function getMemcacheNodes()
  {
    return $this->memcacheNodes;
  }
  public function setMemcacheVersion($memcacheVersion)
  {
    $this->memcacheVersion = $memcacheVersion;
  }
  public function getMemcacheVersion()
  {
    return $this->memcacheVersion;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudMemorystoreforMemcached_NodeConfig
   */
  public function setNodeConfig(Google_Service_CloudMemorystoreforMemcached_NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return Google_Service_CloudMemorystoreforMemcached_NodeConfig
   */
  public function getNodeConfig()
  {
    return $this->nodeConfig;
  }
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  public function getNodeCount()
  {
    return $this->nodeCount;
  }
  /**
   * @param Google_Service_CloudMemorystoreforMemcached_MemcacheParameters
   */
  public function setParameters(Google_Service_CloudMemorystoreforMemcached_MemcacheParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_CloudMemorystoreforMemcached_MemcacheParameters
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setZones($zones)
  {
    $this->zones = $zones;
  }
  public function getZones()
  {
    return $this->zones;
  }
}
