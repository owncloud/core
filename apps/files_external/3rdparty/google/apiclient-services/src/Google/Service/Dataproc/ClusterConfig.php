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

class Google_Service_Dataproc_ClusterConfig extends Google_Collection
{
  protected $collection_key = 'initializationActions';
  protected $autoscalingConfigType = 'Google_Service_Dataproc_AutoscalingConfig';
  protected $autoscalingConfigDataType = '';
  public $configBucket;
  protected $encryptionConfigType = 'Google_Service_Dataproc_EncryptionConfig';
  protected $encryptionConfigDataType = '';
  protected $gceClusterConfigType = 'Google_Service_Dataproc_GceClusterConfig';
  protected $gceClusterConfigDataType = '';
  protected $initializationActionsType = 'Google_Service_Dataproc_NodeInitializationAction';
  protected $initializationActionsDataType = 'array';
  protected $lifecycleConfigType = 'Google_Service_Dataproc_LifecycleConfig';
  protected $lifecycleConfigDataType = '';
  protected $masterConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $masterConfigDataType = '';
  protected $secondaryWorkerConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $secondaryWorkerConfigDataType = '';
  protected $securityConfigType = 'Google_Service_Dataproc_SecurityConfig';
  protected $securityConfigDataType = '';
  protected $softwareConfigType = 'Google_Service_Dataproc_SoftwareConfig';
  protected $softwareConfigDataType = '';
  protected $workerConfigType = 'Google_Service_Dataproc_InstanceGroupConfig';
  protected $workerConfigDataType = '';

  /**
   * @param Google_Service_Dataproc_AutoscalingConfig
   */
  public function setAutoscalingConfig(Google_Service_Dataproc_AutoscalingConfig $autoscalingConfig)
  {
    $this->autoscalingConfig = $autoscalingConfig;
  }
  /**
   * @return Google_Service_Dataproc_AutoscalingConfig
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
   * @param Google_Service_Dataproc_EncryptionConfig
   */
  public function setEncryptionConfig(Google_Service_Dataproc_EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return Google_Service_Dataproc_EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  /**
   * @param Google_Service_Dataproc_GceClusterConfig
   */
  public function setGceClusterConfig(Google_Service_Dataproc_GceClusterConfig $gceClusterConfig)
  {
    $this->gceClusterConfig = $gceClusterConfig;
  }
  /**
   * @return Google_Service_Dataproc_GceClusterConfig
   */
  public function getGceClusterConfig()
  {
    return $this->gceClusterConfig;
  }
  /**
   * @param Google_Service_Dataproc_NodeInitializationAction
   */
  public function setInitializationActions($initializationActions)
  {
    $this->initializationActions = $initializationActions;
  }
  /**
   * @return Google_Service_Dataproc_NodeInitializationAction
   */
  public function getInitializationActions()
  {
    return $this->initializationActions;
  }
  /**
   * @param Google_Service_Dataproc_LifecycleConfig
   */
  public function setLifecycleConfig(Google_Service_Dataproc_LifecycleConfig $lifecycleConfig)
  {
    $this->lifecycleConfig = $lifecycleConfig;
  }
  /**
   * @return Google_Service_Dataproc_LifecycleConfig
   */
  public function getLifecycleConfig()
  {
    return $this->lifecycleConfig;
  }
  /**
   * @param Google_Service_Dataproc_InstanceGroupConfig
   */
  public function setMasterConfig(Google_Service_Dataproc_InstanceGroupConfig $masterConfig)
  {
    $this->masterConfig = $masterConfig;
  }
  /**
   * @return Google_Service_Dataproc_InstanceGroupConfig
   */
  public function getMasterConfig()
  {
    return $this->masterConfig;
  }
  /**
   * @param Google_Service_Dataproc_InstanceGroupConfig
   */
  public function setSecondaryWorkerConfig(Google_Service_Dataproc_InstanceGroupConfig $secondaryWorkerConfig)
  {
    $this->secondaryWorkerConfig = $secondaryWorkerConfig;
  }
  /**
   * @return Google_Service_Dataproc_InstanceGroupConfig
   */
  public function getSecondaryWorkerConfig()
  {
    return $this->secondaryWorkerConfig;
  }
  /**
   * @param Google_Service_Dataproc_SecurityConfig
   */
  public function setSecurityConfig(Google_Service_Dataproc_SecurityConfig $securityConfig)
  {
    $this->securityConfig = $securityConfig;
  }
  /**
   * @return Google_Service_Dataproc_SecurityConfig
   */
  public function getSecurityConfig()
  {
    return $this->securityConfig;
  }
  /**
   * @param Google_Service_Dataproc_SoftwareConfig
   */
  public function setSoftwareConfig(Google_Service_Dataproc_SoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  /**
   * @return Google_Service_Dataproc_SoftwareConfig
   */
  public function getSoftwareConfig()
  {
    return $this->softwareConfig;
  }
  /**
   * @param Google_Service_Dataproc_InstanceGroupConfig
   */
  public function setWorkerConfig(Google_Service_Dataproc_InstanceGroupConfig $workerConfig)
  {
    $this->workerConfig = $workerConfig;
  }
  /**
   * @return Google_Service_Dataproc_InstanceGroupConfig
   */
  public function getWorkerConfig()
  {
    return $this->workerConfig;
  }
}
