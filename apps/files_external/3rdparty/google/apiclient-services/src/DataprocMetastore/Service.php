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
  /**
   * @var string
   */
  public $artifactGcsUri;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $databaseType;
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  /**
   * @var string
   */
  public $endpointUri;
  protected $hiveMetastoreConfigType = HiveMetastoreConfig::class;
  protected $hiveMetastoreConfigDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  protected $metadataIntegrationType = MetadataIntegration::class;
  protected $metadataIntegrationDataType = '';
  protected $metadataManagementActivityType = MetadataManagementActivity::class;
  protected $metadataManagementActivityDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  protected $networkConfigType = NetworkConfig::class;
  protected $networkConfigDataType = '';
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $releaseChannel;
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
  public $tier;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setArtifactGcsUri($artifactGcsUri)
  {
    $this->artifactGcsUri = $artifactGcsUri;
  }
  /**
   * @return string
   */
  public function getArtifactGcsUri()
  {
    return $this->artifactGcsUri;
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
  public function setDatabaseType($databaseType)
  {
    $this->databaseType = $databaseType;
  }
  /**
   * @return string
   */
  public function getDatabaseType()
  {
    return $this->databaseType;
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
   * @param string
   */
  public function setEndpointUri($endpointUri)
  {
    $this->endpointUri = $endpointUri;
  }
  /**
   * @return string
   */
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
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
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
   * @param int
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return int
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setReleaseChannel($releaseChannel)
  {
    $this->releaseChannel = $releaseChannel;
  }
  /**
   * @return string
   */
  public function getReleaseChannel()
  {
    return $this->releaseChannel;
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
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
class_alias(Service::class, 'Google_Service_DataprocMetastore_Service');
