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
  /**
   * @var string
   */
  public $authorizedNetwork;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $discoveryEndpoint;
  /**
   * @var string
   */
  public $displayName;
  protected $instanceMessagesType = InstanceMessage::class;
  protected $instanceMessagesDataType = 'array';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $memcacheFullVersion;
  protected $memcacheNodesType = Node::class;
  protected $memcacheNodesDataType = 'array';
  /**
   * @var string
   */
  public $memcacheVersion;
  /**
   * @var string
   */
  public $name;
  protected $nodeConfigType = NodeConfig::class;
  protected $nodeConfigDataType = '';
  /**
   * @var int
   */
  public $nodeCount;
  protected $parametersType = MemcacheParameters::class;
  protected $parametersDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string[]
   */
  public $zones;

  /**
   * @param string
   */
  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  /**
   * @return string
   */
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDiscoveryEndpoint($discoveryEndpoint)
  {
    $this->discoveryEndpoint = $discoveryEndpoint;
  }
  /**
   * @return string
   */
  public function getDiscoveryEndpoint()
  {
    return $this->discoveryEndpoint;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setMemcacheFullVersion($memcacheFullVersion)
  {
    $this->memcacheFullVersion = $memcacheFullVersion;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setMemcacheVersion($memcacheVersion)
  {
    $this->memcacheVersion = $memcacheVersion;
  }
  /**
   * @return string
   */
  public function getMemcacheVersion()
  {
    return $this->memcacheVersion;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
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
  /**
   * @param int
   */
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  /**
   * @return int
   */
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
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string[]
   */
  public function setZones($zones)
  {
    $this->zones = $zones;
  }
  /**
   * @return string[]
   */
  public function getZones()
  {
    return $this->zones;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_CloudMemorystoreforMemcached_Instance');
