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

class DeviceRegistry extends \Google\Collection
{
  protected $collection_key = 'eventNotificationConfigs';
  protected $credentialsType = RegistryCredential::class;
  protected $credentialsDataType = 'array';
  protected $eventNotificationConfigsType = EventNotificationConfig::class;
  protected $eventNotificationConfigsDataType = 'array';
  protected $httpConfigType = HttpConfig::class;
  protected $httpConfigDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $logLevel;
  protected $mqttConfigType = MqttConfig::class;
  protected $mqttConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $stateNotificationConfigType = StateNotificationConfig::class;
  protected $stateNotificationConfigDataType = '';

  /**
   * @param RegistryCredential[]
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return RegistryCredential[]
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  /**
   * @param EventNotificationConfig[]
   */
  public function setEventNotificationConfigs($eventNotificationConfigs)
  {
    $this->eventNotificationConfigs = $eventNotificationConfigs;
  }
  /**
   * @return EventNotificationConfig[]
   */
  public function getEventNotificationConfigs()
  {
    return $this->eventNotificationConfigs;
  }
  /**
   * @param HttpConfig
   */
  public function setHttpConfig(HttpConfig $httpConfig)
  {
    $this->httpConfig = $httpConfig;
  }
  /**
   * @return HttpConfig
   */
  public function getHttpConfig()
  {
    return $this->httpConfig;
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
   * @param MqttConfig
   */
  public function setMqttConfig(MqttConfig $mqttConfig)
  {
    $this->mqttConfig = $mqttConfig;
  }
  /**
   * @return MqttConfig
   */
  public function getMqttConfig()
  {
    return $this->mqttConfig;
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
   * @param StateNotificationConfig
   */
  public function setStateNotificationConfig(StateNotificationConfig $stateNotificationConfig)
  {
    $this->stateNotificationConfig = $stateNotificationConfig;
  }
  /**
   * @return StateNotificationConfig
   */
  public function getStateNotificationConfig()
  {
    return $this->stateNotificationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceRegistry::class, 'Google_Service_CloudIot_DeviceRegistry');
