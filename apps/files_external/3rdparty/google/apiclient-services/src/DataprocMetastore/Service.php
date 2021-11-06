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

namespace Google\Service\DataprocMetastore;

class Service extends \Google\Model
{
  public $artifactGcsUri;
  public $createTime;
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  public $endpointUri;
  protected $hiveMetastoreConfigType = HiveMetastoreConfig::class;
  protected $hiveMetastoreConfigDataType = '';
  public $labels;
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  protected $metadataIntegrationType = MetadataIntegration::class;
  protected $metadataIntegrationDataType = '';
  protected $metadataManagementActivityType = MetadataManagementActivity::class;
  protected $metadataManagementActivityDataType = '';
  public $name;
  public $network;
  public $port;
  public $releaseChannel;
  public $state;
  public $stateMessage;
  public $tier;
  public $uid;
  public $updateTime;

  public function setArtifactGcsUri($artifactGcsUri)
  {
    $this->artifactGcsUri = $artifactGcsUri;
  }
  public function getArtifactGcsUri()
  {
    return $this->artifactGcsUri;
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
  public function setEndpointUri($endpointUri)
  {
    $this->endpointUri = $endpointUri;
  }
  public function getEndpointUri()
  {
    return $this->endpointUri;
  }
  /**
   * @param HiveMetastoreConfig
   */
  public function setHiveMetastoreConfig(HiveMetastoreConfig $hiveMetastoreConfig)
  {
    $this->hiveMetastoreConfig = $hiveMetastoreConfig;
  }
  /**
   * @return HiveMetastoreConfig
   */
  public function getHiveMetastoreConfig()
  {
    return $this->hiveMetastoreConfig;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param MaintenanceWindow
   */
  public function setMaintenanceWindow(MaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return MaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
  }
  /**
   * @param MetadataIntegration
   */
  public function setMetadataIntegration(MetadataIntegration $metadataIntegration)
  {
    $this->metadataIntegration = $metadataIntegration;
  }
  /**
   * @return MetadataIntegration
   */
  public function getMetadataIntegration()
  {
    return $this->metadataIntegration;
  }
  /**
   * @param MetadataManagementActivity
   */
  public function setMetadataManagementActivity(MetadataManagementActivity $metadataManagementActivity)
  {
    $this->metadataManagementActivity = $metadataManagementActivity;
  }
  /**
   * @return MetadataManagementActivity
   */
  public function getMetadataManagementActivity()
  {
    return $this->metadataManagementActivity;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setReleaseChannel($releaseChannel)
  {
    $this->releaseChannel = $releaseChannel;
  }
  public function getReleaseChannel()
  {
    return $this->releaseChannel;
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
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Service::class, 'Google_Service_DataprocMetastore_Service');
