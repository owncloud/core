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

class Google_Service_Apigee_GoogleCloudApigeeV1SmtpConfig extends Google_Model
{
  public $authType;
  public $fromEmail;
  public $host;
  public $id;
  public $password;
  public $port;
  public $secure;
  public $securePassword;
  public $siteId;
  public $username;

  public function setAuthType($authType)
  {
    $this->authType = $authType;
  }
  public function getAuthType()
  {
    return $this->authType;
  }
  public function setFromEmail($fromEmail)
  {
    $this->fromEmail = $fromEmail;
  }
  public function getFromEmail()
  {
    return $this->fromEmail;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setSecure($secure)
  {
    $this->secure = $secure;
  }
  public function getSecure()
  {
    return $this->secure;
  }
  public function setSecurePassword($securePassword)
  {
    $this->securePassword = $securePassword;
  }
  public function getSecurePassword()
  {
    return $this->securePassword;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
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
