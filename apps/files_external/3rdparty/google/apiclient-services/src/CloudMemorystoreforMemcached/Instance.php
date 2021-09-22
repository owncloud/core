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

namespace Google\Service\CloudMemorystoreforMemcached;

class Instance extends \Google\Collection
{
  protected $collection_key = 'zones';
  public $authorizedNetwork;
  public $createTime;
  public $discoveryEndpoint;
  public $displayName;
  protected $instanceMessagesType = InstanceMessage::class;
  protected $instanceMessagesDataType = 'array';
  public $labels;
  public $memcacheFullVersion;
  protected $memcacheNodesType = Node::class;
  protected $memcacheNodesDataType = 'array';
  public $memcacheVersion;
  public $name;
  protected $nodeConfigType = NodeConfig::class;
  protected $nodeConfigDataType = '';
  public $nodeCount;
  protected $parametersType = MemcacheParameters::class;
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
   * @param InstanceMessage[]
   */
  public function setInstanceMessages($instanceMessages)
  {
    $this->instanceMessages = $instanceMessages;
  }
  /**
   * @return InstanceMessage[]
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
   * @param Node[]
   */
  public function setMemcacheNodes($memcacheNodes)
  {
    $this->memcacheNodes = $memcacheNodes;
  }
  /**
   * @return Node[]
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
   * @param NodeConfig
   */
  public function setNodeConfig(NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return NodeConfig
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
   * @param MemcacheParameters
   */
  public function setParameters(MemcacheParameters $parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return MemcacheParameters
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_CloudMemorystoreforMemcached_Instance');
