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

namespace Google\Service\DataFusion;

class Instance extends \Google\Collection
{
  protected $collection_key = 'disabledReason';
  protected $acceleratorsType = Accelerator::class;
  protected $acceleratorsDataType = 'array';
  public $apiEndpoint;
  protected $availableVersionType = Version::class;
  protected $availableVersionDataType = 'array';
  public $createTime;
  protected $cryptoKeyConfigType = CryptoKeyConfig::class;
  protected $cryptoKeyConfigDataType = '';
  public $dataprocServiceAccount;
  public $description;
  public $disabledReason;
  public $displayName;
  public $enableRbac;
  public $enableStackdriverLogging;
  public $enableStackdriverMonitoring;
  public $gcsBucket;
  public $labels;
  public $name;
  protected $networkConfigType = NetworkConfig::class;
  protected $networkConfigDataType = '';
  public $options;
  public $p4ServiceAccount;
  public $privateInstance;
  public $serviceAccount;
  public $serviceEndpoint;
  public $state;
  public $stateMessage;
  public $tenantProjectId;
  public $type;
  public $updateTime;
  public $version;
  public $zone;

  /**
   * @param Accelerator[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return Accelerator[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
  }
  public function setApiEndpoint($apiEndpoint)
  {
    $this->apiEndpoint = $apiEndpoint;
  }
  public function getApiEndpoint()
  {
    return $this->apiEndpoint;
  }
  /**
   * @param Version[]
   */
  public function setAvailableVersion($availableVersion)
  {
    $this->availableVersion = $availableVersion;
  }
  /**
   * @return Version[]
   */
  public function getAvailableVersion()
  {
    return $this->availableVersion;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param CryptoKeyConfig
   */
  public function setCryptoKeyConfig(CryptoKeyConfig $cryptoKeyConfig)
  {
    $this->cryptoKeyConfig = $cryptoKeyConfig;
  }
  /**
   * @return CryptoKeyConfig
   */
  public function getCryptoKeyConfig()
  {
    return $this->cryptoKeyConfig;
  }
  public function setDataprocServiceAccount($dataprocServiceAccount)
  {
    $this->dataprocServiceAccount = $dataprocServiceAccount;
  }
  public function getDataprocServiceAccount()
  {
    return $this->dataprocServiceAccount;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisabledReason($disabledReason)
  {
    $this->disabledReason = $disabledReason;
  }
  public function getDisabledReason()
  {
    return $this->disabledReason;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnableRbac($enableRbac)
  {
    $this->enableRbac = $enableRbac;
  }
  public function getEnableRbac()
  {
    return $this->enableRbac;
  }
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
  public function setEnableStackdriverMonitoring($enableStackdriverMonitoring)
  {
    $this->enableStackdriverMonitoring = $enableStackdriverMonitoring;
  }
  public function getEnableStackdriverMonitoring()
  {
    return $this->enableStackdriverMonitoring;
  }
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  public function getGcsBucket()
  {
    return $this->gcsBucket;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
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
   * @param NetworkConfig
   */
  public function setNetworkConfig(NetworkConfig $networkConfig)
  {
    $this->networkConfig = $networkConfig;
  }
  /**
   * @return NetworkConfig
   */
  public function getNetworkConfig()
  {
    return $this->networkConfig;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setP4ServiceAccount($p4ServiceAccount)
  {
    $this->p4ServiceAccount = $p4ServiceAccount;
  }
  public function getP4ServiceAccount()
  {
    return $this->p4ServiceAccount;
  }
  public function setPrivateInstance($privateInstance)
  {
    $this->privateInstance = $privateInstance;
  }
  public function getPrivateInstance()
  {
    return $this->privateInstance;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setServiceEndpoint($serviceEndpoint)
  {
    $this->serviceEndpoint = $serviceEndpoint;
  }
  public function getServiceEndpoint()
  {
    return $this->serviceEndpoint;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateMessage($stateMessage)
  {
    $this->stateMessage = $stateMessage;
  }
  public function getStateMessage()
  {
    return $this->stateMessage;
  }
  public function setTenantProjectId($tenantProjectId)
  {
    $this->tenantProjectId = $tenantProjectId;
  }
  public function getTenantProjectId()
  {
    return $this->tenantProjectId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_DataFusion_Instance');
