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

class Google_Service_DataprocMetastore_Service extends Google_Model
{
  public $artifactGcsUri;
  public $createTime;
  public $endpointUri;
  protected $hiveMetastoreConfigType = 'Google_Service_DataprocMetastore_HiveMetastoreConfig';
  protected $hiveMetastoreConfigDataType = '';
  public $labels;
  protected $maintenanceWindowType = 'Google_Service_DataprocMetastore_MaintenanceWindow';
  protected $maintenanceWindowDataType = '';
  protected $metadataIntegrationType = 'Google_Service_DataprocMetastore_MetadataIntegration';
  protected $metadataIntegrationDataType = '';
  protected $metadataManagementActivityType = 'Google_Service_DataprocMetastore_MetadataManagementActivity';
  protected $metadataManagementActivityDataType = '';
  public $name;
  public $network;
  public $port;
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
  public function setEndpointUri($endpointUri)
  {
    $this->endpointUri = $endpointUri;
  }
  public function getEndpointUri()
  {
    return $this->endpointUri;
  }
  /**
   * @param Google_Service_DataprocMetastore_HiveMetastoreConfig
   */
  public function setHiveMetastoreConfig(Google_Service_DataprocMetastore_HiveMetastoreConfig $hiveMetastoreConfig)
  {
    $this->hiveMetastoreConfig = $hiveMetastoreConfig;
  }
  /**
   * @return Google_Service_DataprocMetastore_HiveMetastoreConfig
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
   * @param Google_Service_DataprocMetastore_MaintenanceWindow
   */
  public function setMaintenanceWindow(Google_Service_DataprocMetastore_MaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return Google_Service_DataprocMetastore_MaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
  }
  /**
   * @param Google_Service_DataprocMetastore_MetadataIntegration
   */
  public function setMetadataIntegration(Google_Service_DataprocMetastore_MetadataIntegration $metadataIntegration)
  {
    $this->metadataIntegration = $metadataIntegration;
  }
  /**
   * @return Google_Service_DataprocMetastore_MetadataIntegration
   */
  public function getMetadataIntegration()
  {
    return $this->metadataIntegration;
  }
  /**
   * @param Google_Service_DataprocMetastore_MetadataManagementActivity
   */
  public function setMetadataManagementActivity(Google_Service_DataprocMetastore_MetadataManagementActivity $metadataManagementActivity)
  {
    $this->metadataManagementActivity = $metadataManagementActivity;
  }
  /**
   * @return Google_Service_DataprocMetastore_MetadataManagementActivity
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
