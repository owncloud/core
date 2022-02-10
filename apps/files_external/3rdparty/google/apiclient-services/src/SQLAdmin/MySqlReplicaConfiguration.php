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

class MySqlReplicaConfiguration extends \Google\Model
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
   * @var int
   */
  public $connectRetryInterval;
  /**
   * @var string
   */
  public $dumpFilePath;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $masterHeartbeatPeriod;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $sslCipher;
  /**
   * @var string
   */
  public $username;
  /**
   * @var bool
   */
  public $verifyServerCertificate;

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
   * @param int
   */
  public function setConnectRetryInterval($connectRetryInterval)
  {
    $this->connectRetryInterval = $connectRetryInterval;
  }
  /**
   * @return int
   */
  public function getConnectRetryInterval()
  {
    return $this->connectRetryInterval;
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
  public function setMasterHeartbeatPeriod($masterHeartbeatPeriod)
  {
    $this->masterHeartbeatPeriod = $masterHeartbeatPeriod;
  }
  /**
   * @return string
   */
  public function getMasterHeartbeatPeriod()
  {
    return $this->masterHeartbeatPeriod;
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
   * @param string
   */
  public function setSslCipher($sslCipher)
  {
    $this->sslCipher = $sslCipher;
  }
  /**
   * @return string
   */
  public function getSslCipher()
  {
    return $this->sslCipher;
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
  /**
   * @param bool
   */
  public function setVerifyServerCertificate($verifyServerCertificate)
  {
    $this->verifyServerCertificate = $verifyServerCertificate;
  }
  /**
   * @return bool
   */
  public function getVerifyServerCertificate()
  {
    return $this->verifyServerCertificate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MySqlReplicaConfiguration::class, 'Google_Service_SQLAdmin_MySqlReplicaConfiguration');
