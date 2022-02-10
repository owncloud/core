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

namespace Google\Service\CloudShell;

class Environment extends \Google\Collection
{
  protected $collection_key = 'publicKeys';
  /**
   * @var string
   */
  public $dockerImage;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $publicKeys;
  /**
   * @var string
   */
  public $sshHost;
  /**
   * @var int
   */
  public $sshPort;
  /**
   * @var string
   */
  public $sshUsername;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $webHost;

  /**
   * @param string
   */
  public function setDockerImage($dockerImage)
  {
    $this->dockerImage = $dockerImage;
  }
  /**
   * @return string
   */
  public function getDockerImage()
  {
    return $this->dockerImage;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPublicKeys($publicKeys)
  {
    $this->publicKeys = $publicKeys;
  }
  /**
   * @return string[]
   */
  public function getPublicKeys()
  {
    return $this->publicKeys;
  }
  /**
   * @param string
   */
  public function setSshHost($sshHost)
  {
    $this->sshHost = $sshHost;
  }
  /**
   * @return string
   */
  public function getSshHost()
  {
    return $this->sshHost;
  }
  /**
   * @param int
   */
  public function setSshPort($sshPort)
  {
    $this->sshPort = $sshPort;
  }
  /**
   * @return int
   */
  public function getSshPort()
  {
    return $this->sshPort;
  }
  /**
   * @param string
   */
  public function setSshUsername($sshUsername)
  {
    $this->sshUsername = $sshUsername;
  }
  /**
   * @return string
   */
  public function getSshUsername()
  {
    return $this->sshUsername;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setWebHost($webHost)
  {
    $this->webHost = $webHost;
  }
  /**
   * @return string
   */
  public function getWebHost()
  {
    return $this->webHost;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_CloudShell_Environment');
