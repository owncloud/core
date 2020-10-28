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

class Google_Service_CloudShell_Environment extends Google_Collection
{
  protected $collection_key = 'publicKeys';
  public $dockerImage;
  public $id;
  public $name;
  public $publicKeys;
  public $sshHost;
  public $sshPort;
  public $sshUsername;
  public $state;
  public $webHost;

  public function setDockerImage($dockerImage)
  {
    $this->dockerImage = $dockerImage;
  }
  public function getDockerImage()
  {
    return $this->dockerImage;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPublicKeys($publicKeys)
  {
    $this->publicKeys = $publicKeys;
  }
  public function getPublicKeys()
  {
    return $this->publicKeys;
  }
  public function setSshHost($sshHost)
  {
    $this->sshHost = $sshHost;
  }
  public function getSshHost()
  {
    return $this->sshHost;
  }
  public function setSshPort($sshPort)
  {
    $this->sshPort = $sshPort;
  }
  public function getSshPort()
  {
    return $this->sshPort;
  }
  public function setSshUsername($sshUsername)
  {
    $this->sshUsername = $sshUsername;
  }
  public function getSshUsername()
  {
    return $this->sshUsername;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setWebHost($webHost)
  {
    $this->webHost = $webHost;
  }
  public function getWebHost()
  {
    return $this->webHost;
  }
}
