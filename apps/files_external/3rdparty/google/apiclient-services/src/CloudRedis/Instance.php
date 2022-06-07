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

class Instance extends \Google\Collection
{
  protected $collection_key = 'suspensionReasons';
  /**
   * @var string
   */
  public $alternativeLocationId;
  /**
   * @var bool
   */
  public $authEnabled;
  /**
   * @var string
   */
  public $authorizedNetwork;
  /**
   * @var string
   */
  public $connectMode;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $currentLocationId;
  /**
   * @var string
   */
  public $customerManagedKey;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $locationId;
  protected $maintenancePolicyType = MaintenancePolicy::class;
  protected $maintenancePolicyDataType = '';
  protected $maintenanceScheduleType = MaintenanceSchedule::class;
  protected $maintenanceScheduleDataType = '';
  /**
   * @var int
   */
  public $memorySizeGb;
  /**
   * @var string
   */
  public $name;
  protected $nodesType = NodeInfo::class;
  protected $nodesDataType = 'array';
  protected $persistenceConfigType = PersistenceConfig::class;
  protected $persistenceConfigDataType = '';
  /**
   * @var string
   */
  public $persistenceIamIdentity;
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $readEndpoint;
  /**
   * @var int
   */
  public $readEndpointPort;
  /**
   * @var string
   */
  public $readReplicasMode;
  /**
   * @var string[]
   */
  public $redisConfigs;
  /**
   * @var string
   */
  public $redisVersion;
  /**
   * @var int
   */
  public $replicaCount;
  /**
   * @var string
   */
  public $reservedIpRange;
  /**
   * @var string
   */
  public $secondaryIpRange;
  protected $serverCaCertsType = TlsCertificate::class;
  protected $serverCaCertsDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $statusMessage;
  /**
   * @var string[]
   */
  public $suspensionReasons;
  /**
   * @var string
   */
  public $tier;
  /**
   * @var string
   */
  public $transitEncryptionMode;

  /**
   * @param string
   */
  public function setAlternativeLocationId($alternativeLocationId)
  {
    $this->alternativeLocationId = $alternativeLocationId;
  }
  /**
   * @return string
   */
  public function getAlternativeLocationId()
  {
    return $this->alternativeLocationId;
  }
  /**
   * @param bool
   */
  public function setAuthEnabled($authEnabled)
  {
    $this->authEnabled = $authEnabled;
  }
  /**
   * @return bool
   */
  public function getAuthEnabled()
  {
    return $this->authEnabled;
  }
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
  public function setConnectMode($connectMode)
  {
    $this->connectMode = $connectMode;
  }
  /**
   * @return string
   */
  public function getConnectMode()
  {
    return $this->connectMode;
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
  public function setCurrentLocationId($currentLocationId)
  {
    $this->currentLocationId = $currentLocationId;
  }
  /**
   * @return string
   */
  public function getCurrentLocationId()
  {
    return $this->currentLocationId;
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
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
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
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param MaintenancePolicy
   */
  public function setMaintenancePolicy(MaintenancePolicy $maintenancePolicy)
  {
    $this->maintenancePolicy = $maintenancePolicy;
  }
  /**
   * @return MaintenancePolicy
   */
  public function getMaintenancePolicy()
  {
    return $this->maintenancePolicy;
  }
  /**
   * @param MaintenanceSchedule
   */
  public function setMaintenanceSchedule(MaintenanceSchedule $maintenanceSchedule)
  {
    $this->maintenanceSchedule = $maintenanceSchedule;
  }
  /**
   * @return MaintenanceSchedule
   */
  public function getMaintenanceSchedule()
  {
    return $this->maintenanceSchedule;
  }
  /**
   * @param int
   */
  public function setMemorySizeGb($memorySizeGb)
  {
    $this->memorySizeGb = $memorySizeGb;
  }
  /**
   * @return int
   */
  public function getMemorySizeGb()
  {
    return $this->memorySizeGb;
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
   * @param NodeInfo[]
   */
  public function setNodes($nodes)
  {
    $this->nodes = $nodes;
  }
  /**
   * @return NodeInfo[]
   */
  public function getNodes()
  {
    return $this->nodes;
  }
  /**
   * @param PersistenceConfig
   */
  public function setPersistenceConfig(PersistenceConfig $persistenceConfig)
  {
    $this->persistenceConfig = $persistenceConfig;
  }
  /**
   * @return PersistenceConfig
   */
  public function getPersistenceConfig()
  {
    return $this->persistenceConfig;
  }
  /**
   * @param string
   */
  public function setPersistenceIamIdentity($persistenceIamIdentity)
  {
    $this->persistenceIamIdentity = $persistenceIamIdentity;
  }
  /**
   * @return string
   */
  public function getPersistenceIamIdentity()
  {
    return $this->persistenceIamIdentity;
  }
  /**
   * @param int
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return int
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setReadEndpoint($readEndpoint)
  {
    $this->readEndpoint = $readEndpoint;
  }
  /**
   * @return string
   */
  public function getReadEndpoint()
  {
    return $this->readEndpoint;
  }
  /**
   * @param int
   */
  public function setReadEndpointPort($readEndpointPort)
  {
    $this->readEndpointPort = $readEndpointPort;
  }
  /**
   * @return int
   */
  public function getReadEndpointPort()
  {
    return $this->readEndpointPort;
  }
  /**
   * @param string
   */
  public function setReadReplicasMode($readReplicasMode)
  {
    $this->readReplicasMode = $readReplicasMode;
  }
  /**
   * @return string
   */
  public function getReadReplicasMode()
  {
    return $this->readReplicasMode;
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
   * @param string
   */
  public function setRedisVersion($redisVersion)
  {
    $this->redisVersion = $redisVersion;
  }
  /**
   * @return string
   */
  public function getRedisVersion()
  {
    return $this->redisVersion;
  }
  /**
   * @param int
   */
  public function setReplicaCount($replicaCount)
  {
    $this->replicaCount = $replicaCount;
  }
  /**
   * @return int
   */
  public function getReplicaCount()
  {
    return $this->replicaCount;
  }
  /**
   * @param string
   */
  public function setReservedIpRange($reservedIpRange)
  {
    $this->reservedIpRange = $reservedIpRange;
  }
  /**
   * @return string
   */
  public function getReservedIpRange()
  {
    return $this->reservedIpRange;
  }
  /**
   * @param string
   */
  public function setSecondaryIpRange($secondaryIpRange)
  {
    $this->secondaryIpRange = $secondaryIpRange;
  }
  /**
   * @return string
   */
  public function getSecondaryIpRange()
  {
    return $this->secondaryIpRange;
  }
  /**
   * @param TlsCertificate[]
   */
  public function setServerCaCerts($serverCaCerts)
  {
    $this->serverCaCerts = $serverCaCerts;
  }
  /**
   * @return TlsCertificate[]
   */
  public function getServerCaCerts()
  {
    return $this->serverCaCerts;
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
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  /**
   * @return string
   */
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  /**
   * @param string[]
   */
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  /**
   * @return string[]
   */
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param string
   */
  public function setTransitEncryptionMode($transitEncryptionMode)
  {
    $this->transitEncryptionMode = $transitEncryptionMode;
  }
  /**
   * @return string
   */
  public function getTransitEncryptionMode()
  {
    return $this->transitEncryptionMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_CloudRedis_Instance');
