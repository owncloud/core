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

class Google_Service_CloudComposer_EnvironmentConfig extends Google_Model
{
  public $airflowUri;
  public $dagGcsPrefix;
  protected $databaseConfigType = 'Google_Service_CloudComposer_DatabaseConfig';
  protected $databaseConfigDataType = '';
  protected $encryptionConfigType = 'Google_Service_CloudComposer_EncryptionConfig';
  protected $encryptionConfigDataType = '';
  public $gkeCluster;
  protected $nodeConfigType = 'Google_Service_CloudComposer_NodeConfig';
  protected $nodeConfigDataType = '';
  public $nodeCount;
  protected $privateEnvironmentConfigType = 'Google_Service_CloudComposer_PrivateEnvironmentConfig';
  protected $privateEnvironmentConfigDataType = '';
  protected $softwareConfigType = 'Google_Service_CloudComposer_SoftwareConfig';
  protected $softwareConfigDataType = '';
  protected $webServerConfigType = 'Google_Service_CloudComposer_WebServerConfig';
  protected $webServerConfigDataType = '';
  protected $webServerNetworkAccessControlType = 'Google_Service_CloudComposer_WebServerNetworkAccessControl';
  protected $webServerNetworkAccessControlDataType = '';

  public function setAirflowUri($airflowUri)
  {
    $this->airflowUri = $airflowUri;
  }
  public function getAirflowUri()
  {
    return $this->airflowUri;
  }
  public function setDagGcsPrefix($dagGcsPrefix)
  {
    $this->dagGcsPrefix = $dagGcsPrefix;
  }
  public function getDagGcsPrefix()
  {
    return $this->dagGcsPrefix;
  }
  /**
   * @param Google_Service_CloudComposer_DatabaseConfig
   */
  public function setDatabaseConfig(Google_Service_CloudComposer_DatabaseConfig $databaseConfig)
  {
    $this->databaseConfig = $databaseConfig;
  }
  /**
   * @return Google_Service_CloudComposer_DatabaseConfig
   */
  public function getDatabaseConfig()
  {
    return $this->databaseConfig;
  }
  /**
   * @param Google_Service_CloudComposer_EncryptionConfig
   */
  public function setEncryptionConfig(Google_Service_CloudComposer_EncryptionConfig $encryptionConfig)
  {
    $this->encryptionConfig = $encryptionConfig;
  }
  /**
   * @return Google_Service_CloudComposer_EncryptionConfig
   */
  public function getEncryptionConfig()
  {
    return $this->encryptionConfig;
  }
  public function setGkeCluster($gkeCluster)
  {
    $this->gkeCluster = $gkeCluster;
  }
  public function getGkeCluster()
  {
    return $this->gkeCluster;
  }
  /**
   * @param Google_Service_CloudComposer_NodeConfig
   */
  public function setNodeConfig(Google_Service_CloudComposer_NodeConfig $nodeConfig)
  {
    $this->nodeConfig = $nodeConfig;
  }
  /**
   * @return Google_Service_CloudComposer_NodeConfig
   */
  public function getNodeConfig()
  {
    return $this->nodeConfig;
  }
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
  public function getNodeCount()
  {
    return $this->nodeCount;
  }
  /**
   * @param Google_Service_CloudComposer_PrivateEnvironmentConfig
   */
  public function setPrivateEnvironmentConfig(Google_Service_CloudComposer_PrivateEnvironmentConfig $privateEnvironmentConfig)
  {
    $this->privateEnvironmentConfig = $privateEnvironmentConfig;
  }
  /**
   * @return Google_Service_CloudComposer_PrivateEnvironmentConfig
   */
  public function getPrivateEnvironmentConfig()
  {
    return $this->privateEnvironmentConfig;
  }
  /**
   * @param Google_Service_CloudComposer_SoftwareConfig
   */
  public function setSoftwareConfig(Google_Service_CloudComposer_SoftwareConfig $softwareConfig)
  {
    $this->softwareConfig = $softwareConfig;
  }
  /**
   * @return Google_Service_CloudComposer_SoftwareConfig
   */
  public function getSoftwareConfig()
  {
    return $this->softwareConfig;
  }
  /**
   * @param Google_Service_CloudComposer_WebServerConfig
   */
  public function setWebServerConfig(Google_Service_CloudComposer_WebServerConfig $webServerConfig)
  {
    $this->webServerConfig = $webServerConfig;
  }
  /**
   * @return Google_Service_CloudComposer_WebServerConfig
   */
  public function getWebServerConfig()
  {
    return $this->webServerConfig;
  }
  /**
   * @param Google_Service_CloudComposer_WebServerNetworkAccessControl
   */
  public function setWebServerNetworkAccessControl(Google_Service_CloudComposer_WebServerNetworkAccessControl $webServerNetworkAccessControl)
  {
    $this->webServerNetworkAccessControl = $webServerNetworkAccessControl;
  }
  /**
   * @return Google_Service_CloudComposer_WebServerNetworkAccessControl
   */
  public function getWebServerNetworkAccessControl()
  {
    return $this->webServerNetworkAccessControl;
  }
}
