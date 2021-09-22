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

namespace Google\Service\CloudIot;

class Device extends \Google\Collection
{
  protected $collection_key = 'credentials';
  public $blocked;
  protected $configType = DeviceConfig::class;
  protected $configDataType = '';
  protected $credentialsType = DeviceCredential::class;
  protected $credentialsDataType = 'array';
  protected $gatewayConfigType = GatewayConfig::class;
  protected $gatewayConfigDataType = '';
  public $id;
  public $lastConfigAckTime;
  public $lastConfigSendTime;
  protected $lastErrorStatusType = Status::class;
  protected $lastErrorStatusDataType = '';
  public $lastErrorTime;
  public $lastEventTime;
  public $lastHeartbeatTime;
  public $lastStateTime;
  public $logLevel;
  public $metadata;
  public $name;
  public $numId;
  protected $stateType = DeviceState::class;
  protected $stateDataType = '';

  public function setBlocked($blocked)
  {
    $this->blocked = $blocked;
  }
  public function getBlocked()
  {
    return $this->blocked;
  }
  /**
   * @param DeviceConfig
   */
  public function setConfig(DeviceConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return DeviceConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param DeviceCredential[]
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return DeviceCredential[]
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  /**
   * @param GatewayConfig
   */
  public function setGatewayConfig(GatewayConfig $gatewayConfig)
  {
    $this->gatewayConfig = $gatewayConfig;
  }
  /**
   * @return GatewayConfig
   */
  public function getGatewayConfig()
  {
    return $this->gatewayConfig;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLastConfigAckTime($lastConfigAckTime)
  {
    $this->lastConfigAckTime = $lastConfigAckTime;
  }
  public function getLastConfigAckTime()
  {
    return $this->lastConfigAckTime;
  }
  public function setLastConfigSendTime($lastConfigSendTime)
  {
    $this->lastConfigSendTime = $lastConfigSendTime;
  }
  public function getLastConfigSendTime()
  {
    return $this->lastConfigSendTime;
  }
  /**
   * @param Status
   */
  public function setLastErrorStatus(Status $lastErrorStatus)
  {
    $this->lastErrorStatus = $lastErrorStatus;
  }
  /**
   * @return Status
   */
  public function getLastErrorStatus()
  {
    return $this->lastErrorStatus;
  }
  public function setLastErrorTime($lastErrorTime)
  {
    $this->lastErrorTime = $lastErrorTime;
  }
  public function getLastErrorTime()
  {
    return $this->lastErrorTime;
  }
  public function setLastEventTime($lastEventTime)
  {
    $this->lastEventTime = $lastEventTime;
  }
  public function getLastEventTime()
  {
    return $this->lastEventTime;
  }
  public function setLastHeartbeatTime($lastHeartbeatTime)
  {
    $this->lastHeartbeatTime = $lastHeartbeatTime;
  }
  public function getLastHeartbeatTime()
  {
    return $this->lastHeartbeatTime;
  }
  public function setLastStateTime($lastStateTime)
  {
    $this->lastStateTime = $lastStateTime;
  }
  public function getLastStateTime()
  {
    return $this->lastStateTime;
  }
  public function setLogLevel($logLevel)
  {
    $this->logLevel = $logLevel;
  }
  public function getLogLevel()
  {
    return $this->logLevel;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumId($numId)
  {
    $this->numId = $numId;
  }
  public function getNumId()
  {
    return $this->numId;
  }
  /**
   * @param DeviceState
   */
  public function setState(DeviceState $state)
  {
    $this->state = $state;
  }
  /**
   * @return DeviceState
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Device::class, 'Google_Service_CloudIot_Device');
