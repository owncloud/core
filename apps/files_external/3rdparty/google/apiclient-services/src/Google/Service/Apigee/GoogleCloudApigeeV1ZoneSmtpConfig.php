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

class Google_Service_Apigee_GoogleCloudApigeeV1ZoneSmtpConfig extends Google_Model
{
  public $secureAuthType;
  public $sender;
  public $serverHost;
  public $serverPassword;
  public $serverPort;
  public $serverUsername;

  public function setSecureAuthType($secureAuthType)
  {
    $this->secureAuthType = $secureAuthType;
  }
  public function getSecureAuthType()
  {
    return $this->secureAuthType;
  }
  public function setSender($sender)
  {
    $this->sender = $sender;
  }
  public function getSender()
  {
    return $this->sender;
  }
  public function setServerHost($serverHost)
  {
    $this->serverHost = $serverHost;
  }
  public function getServerHost()
  {
    return $this->serverHost;
  }
  public function setServerPassword($serverPassword)
  {
    $this->serverPassword = $serverPassword;
  }
  public function getServerPassword()
  {
    return $this->serverPassword;
  }
  public function setServerPort($serverPort)
  {
    $this->serverPort = $serverPort;
  }
  public function getServerPort()
  {
    return $this->serverPort;
  }
  public function setServerUsername($serverUsername)
  {
    $this->serverUsername = $serverUsername;
  }
  public function getServerUsername()
  {
    return $this->serverUsername;
  }
}
