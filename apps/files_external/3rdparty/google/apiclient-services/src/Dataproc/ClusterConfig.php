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

namespace Google\Service\Dataproc;

class ClusterConfig extends \Google\Collection
{
  protected $collection_key = 'initializationActions';
  protected $autoscalingConfigType = AutoscalingConfig::class;
  protected $autoscalingConfigDataType = '';
  public $configBucket;
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  protected $endpointConfigType = EndpointConfig::class;
  protected $endpointConfigDataType = '';
  protected $gceClusterConfigType = GceClusterConfig::class;
  protected $gceClusterConfigDataType = '';
  protected $gkeClusterConfigType = GkeClusterConfig::class;
  protected $gkeClusterConfigDataType = '';
  protected $initializationActionsType = NodeInitializationAction::class;
  protected $initializationActionsDataType = 'array';
  protected $lifecycleConfigType = LifecycleConfig::class;
  protected $lifecycleConfigDataType = '';
  protected $masterConfigType = InstanceGroupConfig::class;
  protected $masterConfigDataType = '';
  protected $metastoreConfigType = MetastoreConfig::class;
  protected $metastoreConfigDataType = '';
  protected $secondaryWorkerConfigType = InstanceGroupConfig::class;
  protected $secondaryWorkerConfigDataType = '';
  protected $securityConfigType = SecurityConfig::class;
  protected $securityConfigDataType = '';
  protected $softwareConfigType = SoftwareConfig::class;
  protected $softwareConfigDataType = '';
  public $tempBucket;
  protected $workerConfigType = InstanceGroupConfig::class;
  protected $workerConfigDataType = '';

  /**
   * @param AutoscalingConfig
   */
  public function setAutoscalingConfig(AutoscalingConfig $autoscalingConfig)
  {
    $this->autoscalingConfig = $autoscalingConfig;
  }
  /**
   * @return AutoscalingConfig
   */
  public function getAutoscalingConfig()
  {
    return $this->autoscalingConfig;
  }
  public function setConfigBucket($configBucket)
  {
    $this->configBucket = $configBucket;
  }
  public function getConfigBucket()
  {
    return $this->configBucket;
  }
  /**
   * @param EncryptionConfig
   */
  public function setEncryptionConfig(EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param EndpointConfig
   */
  public function setEndpointConfig(EndpointConfig $endpointConfig)
  {
    $this->endpointConfig = $endpointConfig;
  }
  /**
   * @return EndpointConfig
   */
  public function getEndpointConfig()
  {
    return $this->endpointConfig;
  }
  /**
   * @param GceClusterConfig
   */
  public function setGceClusterConfig(GceClusterConfig $gceClusterConfig)
  {
    $this->gceClusterConfig = $gceClusterConfig;
  }
  /**
   * @return GceClusterConfig
   */
  public function getGceClusterConfig()
  {
    return $this->gceClusterConfig;
  }
  /**
   * @param GkeClusterConfig
   */
  public function setGkeClusterConfig(GkeClusterConfig $gkeClusterConfig)
  {
    $this->gkeClusterConfig = $gkeClusterConfig;
  }
  /**
   * @return GkeClusterConfig
   */
  public function getGkeClusterConfig()
  {
    return $this->gkeClusterConfig;
  }
  /**
   * @param NodeInitializationAction[]
   */
  public function setInitializationActions($initializationActions)
  {
    $this->initializationActions = $initializationActions;
  }
  /**
   * @return NodeInitializationAction[]
   */
  public function getInitializationActions()
  {
    return $this->initializationActions;
  }
  /**
   * @param LifecycleConfig
   */
  public function setLifecycleConfig(LifecycleConfig $lifecycleConfig)
  {
    $this->lifecycleConfig = $lifecycleConfig;
  }
  /**
   * @return LifecycleConfig
   */
  public function getLifecycleConfig()
  {
    return $this->lifecycleConfig;
  }
  /**
   * @param InstanceGroupConfig
   */
  public function setMasterConfig(InstanceGroupConfig $masterConfig)
  {
    $this->masterConfig = $masterConfig;
  }
  /**
   * @return InstanceGroupConfig
   */
  public function getMasterConfig()
  {
    return $this->masterConfig;
  }
  /**
   * @param MetastoreConfig
   */
  public function setMetastoreConfig(MetastoreConfig $metastoreConfig)
  {
    $this->metastoreConfig = $metastoreConfig;
  }
  /**
   * @return MetastoreConfig
   */
  public function getMetastoreConfig()
  {
    return $this->metastoreConfig;
  }
  /**
   * @param InstanceGroupConfig
   */
  public function setSecondaryWorkerConfig(InstanceGroupConfig $secondaryWorkerConfig)
  {
    $this->secondaryWorkerConfig = $secondaryWorkerConfig;
  }
  /**
   * @return InstanceGroupConfig
   */
  public function getSecondaryWorkerConfig()
  {
    return $this->secondaryWorkerConfig;
  }
  /**
   * @param SecurityConfig
   */
  public function setSecurityConfig(SecurityConfig $securityConfig)
  {
    $this->securityConfig = $securityConfig;
  }
  /**
   * @return SecurityConfig
   */
  public function getSecurityConfig()
  {
    return $this->securityConfig;
  }
  /**
   * @param SoftwareConfig
   */
  public function setSoftwareConfig(SoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  /**
   * @return SoftwareConfig
   */
  public function getSoftwareConfig()
  {
    return $this->softwareConfig;
  }
  public function setTempBucket($tempBucket)
  {
    $this->tempBucket = $tempBucket;
  }
  public function getTempBucket()
  {
    return $this->tempBucket;
  }
  /**
   * @param InstanceGroupConfig
   */
  public function setWorkerConfig(InstanceGroupConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return InstanceGroupConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterConfig::class, 'Google_Service_Dataproc_ClusterConfig');
