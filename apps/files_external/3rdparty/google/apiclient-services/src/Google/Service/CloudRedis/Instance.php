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

class Google_Service_CloudRedis_Instance extends Google_Model
{
  public $alternativeLocationId;
  public $authorizedNetwork;
  public $connectMode;
  public $createTime;
  public $currentLocationId;
  public $displayName;
  public $host;
  public $labels;
  public $locationId;
  public $memorySizeGb;
  public $name;
  public $persistenceIamIdentity;
  public $port;
  public $redisConfigs;
  public $redisVersion;
  public $reservedIpRange;
  public $state;
  public $statusMessage;
  public $tier;

  public function setAlternativeLocationId($alternativeLocationId)
  {
    $this->alternativeLocationId = $alternativeLocationId;
  }
  public function getAlternativeLocationId()
  {
    return $this->alternativeLocationId;
  }
  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  public function setConnectMode($connectMode)
  {
    $this->connectMode = $connectMode;
  }
  public function getConnectMode()
  {
    return $this->connectMode;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCurrentLocationId($currentLocationId)
  {
    $this->currentLocationId = $currentLocationId;
  }
  public function getCurrentLocationId()
  {
    return $this->currentLocationId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setMemorySizeGb($memorySizeGb)
  {
    $this->memorySizeGb = $memorySizeGb;
  }
  public function getMemorySizeGb()
  {
    return $this->memorySizeGb;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPersistenceIamIdentity($persistenceIamIdentity)
  {
    $this->persistenceIamIdentity = $persistenceIamIdentity;
  }
  public function getPersistenceIamIdentity()
  {
    return $this->persistenceIamIdentity;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setRedisConfigs($redisConfigs)
  {
    $this->redisConfigs = $redisConfigs;
  }
  public function getRedisConfigs()
  {
    return $this->redisConfigs;
  }
  public function setRedisVersion($redisVersion)
  {
    $this->redisVersion = $redisVersion;
  }
  public function getRedisVersion()
  {
    return $this->redisVersion;
  }
  public function setReservedIpRange($reservedIpRange)
  {
    $this->reservedIpRange = $reservedIpRange;
  }
  public function getReservedIpRange()
  {
    return $this->reservedIpRange;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }
  public function getStatusMessage()
  {
    return $this->statusMessage;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}
