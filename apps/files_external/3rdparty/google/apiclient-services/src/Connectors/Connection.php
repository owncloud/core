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

namespace Google\Service\Connectors;

class Connection extends \Google\Collection
{
  protected $collection_key = 'egressBackends';
  protected $authConfigType = AuthConfig::class;
  protected $authConfigDataType = '';
  protected $configVariablesType = ConfigVariable::class;
  protected $configVariablesDataType = 'array';
  /**
   * @var string
   */
  public $connectorVersion;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $egressBackends;
  /**
   * @var string
   */
  public $envoyImageLocation;
  /**
   * @var string
   */
  public $imageLocation;
  /**
   * @var string[]
   */
  public $labels;
  protected $lockConfigType = LockConfig::class;
  protected $lockConfigDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $serviceDirectory;
  protected $statusType = ConnectionStatus::class;
  protected $statusDataType = '';
  /**
   * @var bool
   */
  public $suspended;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param AuthConfig
   */
  public function setAuthConfig(AuthConfig $authConfig)
  {
    $this->authConfig = $authConfig;
  }
  /**
   * @return AuthConfig
   */
  public function getAuthConfig()
  {
    return $this->authConfig;
  }
  /**
   * @param ConfigVariable[]
   */
  public function setConfigVariables($configVariables)
  {
    $this->configVariables = $configVariables;
  }
  /**
   * @return ConfigVariable[]
   */
  public function getConfigVariables()
  {
    return $this->configVariables;
  }
  /**
   * @param string
   */
  public function setConnectorVersion($connectorVersion)
  {
    $this->connectorVersion = $connectorVersion;
  }
  /**
   * @return string
   */
  public function getConnectorVersion()
  {
    return $this->connectorVersion;
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string[]
   */
  public function setEgressBackends($egressBackends)
  {
    $this->egressBackends = $egressBackends;
  }
  /**
   * @return string[]
   */
  public function getEgressBackends()
  {
    return $this->egressBackends;
  }
  /**
   * @param string
   */
  public function setEnvoyImageLocation($envoyImageLocation)
  {
    $this->envoyImageLocation = $envoyImageLocation;
  }
  /**
   * @return string
   */
  public function getEnvoyImageLocation()
  {
    return $this->envoyImageLocation;
  }
  /**
   * @param string
   */
  public function setImageLocation($imageLocation)
  {
    $this->imageLocation = $imageLocation;
  }
  /**
   * @return string
   */
  public function getImageLocation()
  {
    return $this->imageLocation;
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
   * @param LockConfig
   */
  public function setLockConfig(LockConfig $lockConfig)
  {
    $this->lockConfig = $lockConfig;
  }
  /**
   * @return LockConfig
   */
  public function getLockConfig()
  {
    return $this->lockConfig;
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
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setServiceDirectory($serviceDirectory)
  {
    $this->serviceDirectory = $serviceDirectory;
  }
  /**
   * @return string
   */
  public function getServiceDirectory()
  {
    return $this->serviceDirectory;
  }
  /**
   * @param ConnectionStatus
   */
  public function setStatus(ConnectionStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return ConnectionStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param bool
   */
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  /**
   * @return bool
   */
  public function getSuspended()
  {
    return $this->suspended;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Connection::class, 'Google_Service_Connectors_Connection');
