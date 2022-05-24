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
  /**
   * @var string
   */
  public $apiEndpoint;
  protected $availableVersionType = Version::class;
  protected $availableVersionDataType = 'array';
  /**
   * @var string
   */
  public $createTime;
  protected $cryptoKeyConfigType = CryptoKeyConfig::class;
  protected $cryptoKeyConfigDataType = '';
  /**
   * @var string
   */
  public $dataprocServiceAccount;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $disabledReason;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $enableRbac;
  /**
   * @var bool
   */
  public $enableStackdriverLogging;
  /**
   * @var bool
   */
  public $enableStackdriverMonitoring;
  protected $eventPublishConfigType = EventPublishConfig::class;
  protected $eventPublishConfigDataType = '';
  /**
   * @var string
   */
  public $gcsBucket;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $networkConfigType = NetworkConfig::class;
  protected $networkConfigDataType = '';
  /**
   * @var string[]
   */
  public $options;
  /**
   * @var string
   */
  public $p4ServiceAccount;
  /**
   * @var bool
   */
  public $privateInstance;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $serviceEndpoint;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $stateMessage;
  /**
   * @var string
   */
  public $tenantProjectId;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $version;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setApiEndpoint($apiEndpoint)
  {
    $this->apiEndpoint = $apiEndpoint;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDataprocServiceAccount($dataprocServiceAccount)
  {
    $this->dataprocServiceAccount = $dataprocServiceAccount;
  }
  /**
   * @return string
   */
  public function getDataprocServiceAccount()
  {
    return $this->dataprocServiceAccount;
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
  public function setDisabledReason($disabledReason)
  {
    $this->disabledReason = $disabledReason;
  }
  /**
   * @return string[]
   */
  public function getDisabledReason()
  {
    return $this->disabledReason;
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
   * @param bool
   */
  public function setEnableRbac($enableRbac)
  {
    $this->enableRbac = $enableRbac;
  }
  /**
   * @return bool
   */
  public function getEnableRbac()
  {
    return $this->enableRbac;
  }
  /**
   * @param bool
   */
  public function setEnableStackdriverLogging($enableStackdriverLogging)
  {
    $this->enableStackdriverLogging = $enableStackdriverLogging;
  }
  /**
   * @return bool
   */
  public function getEnableStackdriverLogging()
  {
    return $this->enableStackdriverLogging;
  }
  /**
   * @param bool
   */
  public function setEnableStackdriverMonitoring($enableStackdriverMonitoring)
  {
    $this->enableStackdriverMonitoring = $enableStackdriverMonitoring;
  }
  /**
   * @return bool
   */
  public function getEnableStackdriverMonitoring()
  {
    return $this->enableStackdriverMonitoring;
  }
  /**
   * @param EventPublishConfig
   */
  public function setEventPublishConfig(EventPublishConfig $eventPublishConfig)
  {
    $this->eventPublishConfig = $eventPublishConfig;
  }
  /**
   * @return EventPublishConfig
   */
  public function getEventPublishConfig()
  {
    return $this->eventPublishConfig;
  }
  /**
   * @param string
   */
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  /**
   * @return string
   */
  public function getGcsBucket()
  {
    return $this->gcsBucket;
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
  /**
   * @param string[]
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return string[]
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setP4ServiceAccount($p4ServiceAccount)
  {
    $this->p4ServiceAccount = $p4ServiceAccount;
  }
  /**
   * @return string
   */
  public function getP4ServiceAccount()
  {
    return $this->p4ServiceAccount;
  }
  /**
   * @param bool
   */
  public function setPrivateInstance($privateInstance)
  {
    $this->privateInstance = $privateInstance;
  }
  /**
   * @return bool
   */
  public function getPrivateInstance()
  {
    return $this->privateInstance;
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
  public function setServiceEndpoint($serviceEndpoint)
  {
    $this->serviceEndpoint = $serviceEndpoint;
  }
  /**
   * @return string
   */
  public function getServiceEndpoint()
  {
    return $this->serviceEndpoint;
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
  public function setStateMessage($stateMessage)
  {
    $this->stateMessage = $stateMessage;
  }
  /**
   * @return string
   */
  public function getStateMessage()
  {
    return $this->stateMessage;
  }
  /**
   * @param string
   */
  public function setTenantProjectId($tenantProjectId)
  {
    $this->tenantProjectId = $tenantProjectId;
  }
  /**
   * @return string
   */
  public function getTenantProjectId()
  {
    return $this->tenantProjectId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
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
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_DataFusion_Instance');
