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

namespace Google\Service\SQLAdmin;

class ConnectSettings extends \Google\Collection
{
  protected $collection_key = 'ipAddresses';
  public $backendType;
  public $databaseVersion;
  protected $ipAddressesType = IpMapping::class;
  protected $ipAddressesDataType = 'array';
  public $kind;
  public $region;
  protected $serverCaCertType = SslCert::class;
  protected $serverCaCertDataType = '';

  public function setBackendType($backendType)
  {
    $this->backendType = $backendType;
  }
  public function getBackendType()
  {
    return $this->backendType;
  }
  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }
  public function getDatabaseVersion()
  {
    return $this->databaseVersion;
  }
  /**
   * @param IpMapping[]
   */
  public function setIpAddresses($ipAddresses)
  {
    $this->ipAddresses = $ipAddresses;
  }
  /**
   * @return IpMapping[]
   */
  public function getIpAddresses()
  {
    return $this->ipAddresses;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param SslCert
   */
  public function setServerCaCert(SslCert $serverCaCert)
  {
    $this->serverCaCert = $serverCaCert;
  }
  /**
   * @return SslCert
   */
  public function getServerCaCert()
  {
    return $this->serverCaCert;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectSettings::class, 'Google_Service_SQLAdmin_ConnectSettings');
