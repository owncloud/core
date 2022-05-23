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

namespace Google\Service\CloudComposer;

class EnvironmentConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $airflowUri;
  /**
   * @var string
   */
  public $dagGcsPrefix;
  protected $databaseConfigType = DatabaseConfig::class;
  protected $databaseConfigDataType = '';
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  /**
   * @var string
   */
  public $environmentSize;
  /**
   * @var string
   */
  public $gkeCluster;
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  protected $masterAuthorizedNetworksConfigType = MasterAuthorizedNetworksConfig::class;
  protected $masterAuthorizedNetworksConfigDataType = '';
  protected $nodeConfigType = NodeConfig::class;
  protected $nodeConfigDataType = '';
  /**
   * @var int
   */
  public $nodeCount;
  protected $privateEnvironmentConfigType = PrivateEnvironmentConfig::class;
  protected $privateEnvironmentConfigDataType = '';
  protected $softwareConfigType = SoftwareConfig::class;
  protected $softwareConfigDataType = '';
  protected $webServerConfigType = WebServerConfig::class;
  protected $webServerConfigDataType = '';
  protected $webServerNetworkAccessControlType = WebServerNetworkAccessControl::class;
  protected $webServerNetworkAccessControlDataType = '';
  protected $workloadsConfigType = WorkloadsConfig::class;
  protected $workloadsConfigDataType = '';

  /**
   * @param string
   */
  public function setAirflowUri($airflowUri)
  {
    $this->airflowUri = $airflowUri;
  }
  /**
   * @return string
   */
  public function getAirflowUri()
  {
    return $this->airflowUri;
  }
  /**
   * @param string
   */
  public function setDagGcsPrefix($dagGcsPrefix)
  {
    $this->dagGcsPrefix = $dagGcsPrefix;
  }
  /**
   * @return string
   */
  public function getDagGcsPrefix()
  {
    return $this->dagGcsPrefix;
  }
  /**
   * @param DatabaseConfig
   */
  public function setDatabaseConfig(DatabaseConfig $databaseConfig)
  {
    $this->databaseConfig = $databaseConfig;
  }
  /**
   * @return DatabaseConfig
   */
  public function getDatabaseConfig()
  {
    return $this->databaseConfig;
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
  public function setEnvironmentSize($environmentSize)
  {
    $this->environmentSize = $environmentSize;
  }
  /**
   * @return string
   */
  public function getEnvironmentSize()
  {
    return $this->environmentSize;
  }
  /**
   * @param string
   */
  public function setGkeCluster($gkeCluster)
  {
    $this->gkeCluster = $gkeCluster;
  }
  /**
   * @return string
   */
  public function getGkeCluster()
  {
    return $this->gkeCluster;
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
   * @param MasterAuthorizedNetworksConfig
   */
  public function setMasterAuthorizedNetworksConfig(MasterAuthorizedNetworksConfig $masterAuthorizedNetworksConfig)
  {
    $this->masterAuthorizedNetworksConfig = $masterAuthorizedNetworksConfig;
  }
  /**
   * @return MasterAuthorizedNetworksConfig
   */
  public function getMasterAuthorizedNetworksConfig()
  {
    return $this->masterAuthorizedNetworksConfig;
  }
  /**
   * @param NodeConfig
   */
  public function setNodeConfig(NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return NodeConfig
   */
  public function getNodeConfig()
  {
    return $this->nodeConfig;
  }
  /**
   * @param int
   */
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  /**
   * @return int
   */
  public function getNodeCount()
  {
    return $this->nodeCount;
  }
  /**
   * @param PrivateEnvironmentConfig
   */
  public function setPrivateEnvironmentConfig(PrivateEnvironmentConfig $privateEnvironmentConfig)
  {
    $this->privateEnvironmentConfig = $privateEnvironmentConfig;
  }
  /**
   * @return PrivateEnvironmentConfig
   */
  public function getPrivateEnvironmentConfig()
  {
    return $this->privateEnvironmentConfig;
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
  /**
   * @param WebServerConfig
   */
  public function setWebServerConfig(WebServerConfig $webServerConfig)
  {
    $this->webServerConfig = $webServerConfig;
  }
  /**
   * @return WebServerConfig
   */
  public function getWebServerConfig()
  {
    return $this->webServerConfig;
  }
  /**
   * @param WebServerNetworkAccessControl
   */
  public function setWebServerNetworkAccessControl(WebServerNetworkAccessControl $webServerNetworkAccessControl)
  {
    $this->webServerNetworkAccessControl = $webServerNetworkAccessControl;
  }
  /**
   * @return WebServerNetworkAccessControl
   */
  public function getWebServerNetworkAccessControl()
  {
    return $this->webServerNetworkAccessControl;
  }
  /**
   * @param WorkloadsConfig
   */
  public function setWorkloadsConfig(WorkloadsConfig $workloadsConfig)
  {
    $this->workloadsConfig = $workloadsConfig;
  }
  /**
   * @return WorkloadsConfig
   */
  public function getWorkloadsConfig()
  {
    return $this->workloadsConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnvironmentConfig::class, 'Google_Service_CloudComposer_EnvironmentConfig');
