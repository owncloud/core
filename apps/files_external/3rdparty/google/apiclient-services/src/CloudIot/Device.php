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
  /**
   * @var bool
   */
  public $blocked;
  protected $configType = DeviceConfig::class;
  protected $configDataType = '';
  protected $credentialsType = DeviceCredential::class;
  protected $credentialsDataType = 'array';
  protected $gatewayConfigType = GatewayConfig::class;
  protected $gatewayConfigDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $lastConfigAckTime;
  /**
   * @var string
   */
  public $lastConfigSendTime;
  protected $lastErrorStatusType = Status::class;
  protected $lastErrorStatusDataType = '';
  /**
   * @var string
   */
  public $lastErrorTime;
  /**
   * @var string
   */
  public $lastEventTime;
  /**
   * @var string
   */
  public $lastHeartbeatTime;
  /**
   * @var string
   */
  public $lastStateTime;
  /**
   * @var string
   */
  public $logLevel;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $numId;
  protected $stateType = DeviceState::class;
  protected $stateDataType = '';

  /**
   * @param bool
   */
  public function setBlocked($blocked)
  {
    $this->blocked = $blocked;
  }
  /**
   * @return bool
   */
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
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setLastConfigAckTime($lastConfigAckTime)
  {
    $this->lastConfigAckTime = $lastConfigAckTime;
  }
  /**
   * @return string
   */
  public function getLastConfigAckTime()
  {
    return $this->lastConfigAckTime;
  }
  /**
   * @param string
   */
  public function setLastConfigSendTime($lastConfigSendTime)
  {
    $this->lastConfigSendTime = $lastConfigSendTime;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setLastErrorTime($lastErrorTime)
  {
    $this->lastErrorTime = $lastErrorTime;
  }
  /**
   * @return string
   */
  public function getLastErrorTime()
  {
    return $this->lastErrorTime;
  }
  /**
   * @param string
   */
  public function setLastEventTime($lastEventTime)
  {
    $this->lastEventTime = $lastEventTime;
  }
  /**
   * @return string
   */
  public function getLastEventTime()
  {
    return $this->lastEventTime;
  }
  /**
   * @param string
   */
  public function setLastHeartbeatTime($lastHeartbeatTime)
  {
    $this->lastHeartbeatTime = $lastHeartbeatTime;
  }
  /**
   * @return string
   */
  public function getLastHeartbeatTime()
  {
    return $this->lastHeartbeatTime;
  }
  /**
   * @param string
   */
  public function setLastStateTime($lastStateTime)
  {
    $this->lastStateTime = $lastStateTime;
  }
  /**
   * @return string
   */
  public function getLastStateTime()
  {
    return $this->lastStateTime;
  }
  /**
   * @param string
   */
  public function setLogLevel($logLevel)
  {
    $this->logLevel = $logLevel;
  }
  /**
   * @return string
   */
  public function getLogLevel()
  {
    return $this->logLevel;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
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
   * @param string
   */
  public function setNumId($numId)
  {
    $this->numId = $numId;
  }
  /**
   * @return string
   */
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
