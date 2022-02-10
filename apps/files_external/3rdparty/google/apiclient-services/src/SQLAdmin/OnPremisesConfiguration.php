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

class OnPremisesConfiguration extends \Google\Model
{
  /**
   * @var string
   */
  public $caCertificate;
  /**
   * @var string
   */
  public $clientCertificate;
  /**
   * @var string
   */
  public $clientKey;
  /**
   * @var string
   */
  public $dumpFilePath;
  /**
   * @var string
   */
  public $hostPort;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $password;
  protected $sourceInstanceType = InstanceReference::class;
  protected $sourceInstanceDataType = '';
  /**
   * @var string
   */
  public $username;

  /**
   * @param string
   */
  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  /**
   * @return string
   */
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  /**
   * @param string
   */
  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  /**
   * @return string
   */
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  /**
   * @param string
   */
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  /**
   * @return string
   */
  public function getClientKey()
  {
    return $this->clientKey;
  }
  /**
   * @param string
   */
  public function setDumpFilePath($dumpFilePath)
  {
    $this->dumpFilePath = $dumpFilePath;
  }
  /**
   * @return string
   */
  public function getDumpFilePath()
  {
    return $this->dumpFilePath;
  }
  /**
   * @param string
   */
  public function setHostPort($hostPort)
  {
    $this->hostPort = $hostPort;
  }
  /**
   * @return string
   */
  public function getHostPort()
  {
    return $this->hostPort;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param InstanceReference
   */
  public function setSourceInstance(InstanceReference $sourceInstance)
  {
    $this->sourceInstance = $sourceInstance;
  }
  /**
   * @return InstanceReference
   */
  public function getSourceInstance()
  {
    return $this->sourceInstance;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OnPremisesConfiguration::class, 'Google_Service_SQLAdmin_OnPremisesConfiguration');
