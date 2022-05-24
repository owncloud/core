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

namespace Google\Service\CloudRedis;

class Cluster extends \Google\Collection
{
  protected $collection_key = 'slots';
  /**
   * @var string
   */
  public $clusterUid;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $customerManagedKey;
  /**
   * @var int
   */
  public $defaultReplicaCount;
  /**
   * @var string
   */
  public $displayName;
  protected $endpointsType = Endpoint::class;
  protected $endpointsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $privateServiceConnectType = PrivateServiceConnect::class;
  protected $privateServiceConnectDataType = '';
  /**
   * @var string[]
   */
  public $redisConfigs;
  protected $slotsType = ClusterSlots::class;
  protected $slotsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var int
   */
  public $totalMemorySizeGb;

  /**
   * @param string
   */
  public function setClusterUid($clusterUid)
  {
    $this->clusterUid = $clusterUid;
  }
  /**
   * @return string
   */
  public function getClusterUid()
  {
    return $this->clusterUid;
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
  public function setCustomerManagedKey($customerManagedKey)
  {
    $this->customerManagedKey = $customerManagedKey;
  }
  /**
   * @return string
   */
  public function getCustomerManagedKey()
  {
    return $this->customerManagedKey;
  }
  /**
   * @param int
   */
  public function setDefaultReplicaCount($defaultReplicaCount)
  {
    $this->defaultReplicaCount = $defaultReplicaCount;
  }
  /**
   * @return int
   */
  public function getDefaultReplicaCount()
  {
    return $this->defaultReplicaCount;
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
   * @param Endpoint[]
   */
  public function setEndpoints($endpoints)
  {
    $this->endpoints = $endpoints;
  }
  /**
   * @return Endpoint[]
   */
  public function getEndpoints()
  {
    return $this->endpoints;
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
   * @param PrivateServiceConnect
   */
  public function setPrivateServiceConnect(PrivateServiceConnect $privateServiceConnect)
  {
    $this->privateServiceConnect = $privateServiceConnect;
  }
  /**
   * @return PrivateServiceConnect
   */
  public function getPrivateServiceConnect()
  {
    return $this->privateServiceConnect;
  }
  /**
   * @param string[]
   */
  public function setRedisConfigs($redisConfigs)
  {
    $this->redisConfigs = $redisConfigs;
  }
  /**
   * @return string[]
   */
  public function getRedisConfigs()
  {
    return $this->redisConfigs;
  }
  /**
   * @param ClusterSlots[]
   */
  public function setSlots($slots)
  {
    $this->slots = $slots;
  }
  /**
   * @return ClusterSlots[]
   */
  public function getSlots()
  {
    return $this->slots;
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
   * @param int
   */
  public function setTotalMemorySizeGb($totalMemorySizeGb)
  {
    $this->totalMemorySizeGb = $totalMemorySizeGb;
  }
  /**
   * @return int
   */
  public function getTotalMemorySizeGb()
  {
    return $this->totalMemorySizeGb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cluster::class, 'Google_Service_CloudRedis_Cluster');
