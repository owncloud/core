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

namespace Google\Service\DatabaseMigrationService;

class MySqlConnectionProfile extends \Google\Model
{
  /**
   * @var string
   */
  public $cloudSqlId;
  /**
   * @var string
   */
  public $host;
  /**
   * @var string
   */
  public $password;
  /**
   * @var bool
   */
  public $passwordSet;
  /**
   * @var int
   */
  public $port;
  protected $sslType = SslConfig::class;
  protected $sslDataType = '';
  /**
   * @var string
   */
  public $username;

  /**
   * @param string
   */
  public function setCloudSqlId($cloudSqlId)
  {
    $this->cloudSqlId = $cloudSqlId;
  }
  /**
   * @return string
   */
  public function getCloudSqlId()
  {
    return $this->cloudSqlId;
  }
  /**
   * @param string
   */
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
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
   * @param bool
   */
  public function setPasswordSet($passwordSet)
  {
    $this->passwordSet = $passwordSet;
  }
  /**
   * @return bool
   */
  public function getPasswordSet()
  {
    return $this->passwordSet;
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
   * @param SslConfig
   */
  public function setSsl(SslConfig $ssl)
  {
    $this->ssl = $ssl;
  }
  /**
   * @return SslConfig
   */
  public function getSsl()
  {
    return $this->ssl;
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
class_alias(MySqlConnectionProfile::class, 'Google_Service_DatabaseMigrationService_MySqlConnectionProfile');
