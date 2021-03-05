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

class Google_Service_CloudDatabaseMigrationService_MySqlConnectionProfile extends Google_Model
{
  public $cloudSqlId;
  public $host;
  public $password;
  public $passwordSet;
  public $port;
  protected $sslType = 'Google_Service_CloudDatabaseMigrationService_SslConfig';
  protected $sslDataType = '';
  public $username;

  public function setCloudSqlId($cloudSqlId)
  {
    $this->cloudSqlId = $cloudSqlId;
  }
  public function getCloudSqlId()
  {
    return $this->cloudSqlId;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setPasswordSet($passwordSet)
  {
    $this->passwordSet = $passwordSet;
  }
  public function getPasswordSet()
  {
    return $this->passwordSet;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param Google_Service_CloudDatabaseMigrationService_SslConfig
   */
  public function setSsl(Google_Service_CloudDatabaseMigrationService_SslConfig $ssl)
  {
    $this->ssl = $ssl;
  }
  /**
   * @return Google_Service_CloudDatabaseMigrationService_SslConfig
   */
  public function getSsl()
  {
    return $this->ssl;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}
