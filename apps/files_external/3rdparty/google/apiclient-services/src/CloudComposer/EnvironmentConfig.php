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
  public $airflowUri;
  public $dagGcsPrefix;
  protected $databaseConfigType = DatabaseConfig::class;
  protected $databaseConfigDataType = '';
  protected $encryptionConfigType = EncryptionConfig::class;
  protected $encryptionConfigDataType = '';
  public $gkeCluster;
  protected $nodeConfigType = NodeConfig::class;
  protected $nodeConfigDataType = '';
  public $nodeCount;
  protected $privateEnvironmentConfigType = PrivateEnvironmentConfig::class;
  protected $privateEnvironmentConfigDataType = '';
  protected $softwareConfigType = SoftwareConfig::class;
  protected $softwareConfigDataType = '';
  protected $webServerConfigType = WebServerConfig::class;
  protected $webServerConfigDataType = '';
  protected $webServerNetworkAccessControlType = WebServerNetworkAccessControl::class;
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
  public function setGkeCluster($gkeCluster)
  {
    $this->gkeCluster = $gkeCluster;
  }
  public function getGkeCluster()
  {
    return $this->gkeCluster;
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
  public function setNodeCount($nodeCount)
  {
    $this->nodeCount = $nodeCount;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnvironmentConfig::class, 'Google_Service_CloudComposer_EnvironmentConfig');
