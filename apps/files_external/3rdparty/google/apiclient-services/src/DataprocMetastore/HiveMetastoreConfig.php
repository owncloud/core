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

class HiveMetastoreConfig extends \Google\Model
{
  protected $auxiliaryVersionsType = AuxiliaryVersionConfig::class;
  protected $auxiliaryVersionsDataType = 'map';
  /**
   * @var string[]
   */
  public $configOverrides;
  /**
   * @var string
   */
  public $endpointProtocol;
  protected $kerberosConfigType = KerberosConfig::class;
  protected $kerberosConfigDataType = '';
  /**
   * @var string
   */
  public $version;

  /**
   * @param AuxiliaryVersionConfig[]
   */
  public function setAuxiliaryVersions($auxiliaryVersions)
  {
    $this->auxiliaryVersions = $auxiliaryVersions;
  }
  /**
   * @return AuxiliaryVersionConfig[]
   */
  public function getAuxiliaryVersions()
  {
    return $this->auxiliaryVersions;
  }
  /**
   * @param string[]
   */
  public function setConfigOverrides($configOverrides)
  {
    $this->configOverrides = $configOverrides;
  }
  /**
   * @return string[]
   */
  public function getConfigOverrides()
  {
    return $this->configOverrides;
  }
  /**
   * @param string
   */
  public function setEndpointProtocol($endpointProtocol)
  {
    $this->endpointProtocol = $endpointProtocol;
  }
  /**
   * @return string
   */
  public function getEndpointProtocol()
  {
    return $this->endpointProtocol;
  }
  /**
   * @param KerberosConfig
   */
  public function setKerberosConfig(KerberosConfig $kerberosConfig)
  {
    $this->kerberosConfig = $kerberosConfig;
  }
  /**
   * @return KerberosConfig
   */
  public function getKerberosConfig()
  {
    return $this->kerberosConfig;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HiveMetastoreConfig::class, 'Google_Service_DataprocMetastore_HiveMetastoreConfig');
