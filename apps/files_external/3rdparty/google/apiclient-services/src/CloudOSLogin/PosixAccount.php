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

namespace Google\Service\CloudOSLogin;

class PosixAccount extends \Google\Model
{
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $gecos;
  /**
   * @var string
   */
  public $gid;
  /**
   * @var string
   */
  public $homeDirectory;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $operatingSystemType;
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var string
   */
  public $shell;
  /**
   * @var string
   */
  public $systemId;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $username;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setGecos($gecos)
  {
    $this->gecos = $gecos;
  }
  /**
   * @return string
   */
  public function getGecos()
  {
    return $this->gecos;
  }
  /**
   * @param string
   */
  public function setGid($gid)
  {
    $this->gid = $gid;
  }
  /**
   * @return string
   */
  public function getGid()
  {
    return $this->gid;
  }
  /**
   * @param string
   */
  public function setHomeDirectory($homeDirectory)
  {
    $this->homeDirectory = $homeDirectory;
  }
  /**
   * @return string
   */
  public function getHomeDirectory()
  {
    return $this->homeDirectory;
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
   * @param string
   */
  public function setOperatingSystemType($operatingSystemType)
  {
    $this->operatingSystemType = $operatingSystemType;
  }
  /**
   * @return string
   */
  public function getOperatingSystemType()
  {
    return $this->operatingSystemType;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param string
   */
  public function setShell($shell)
  {
    $this->shell = $shell;
  }
  /**
   * @return string
   */
  public function getShell()
  {
    return $this->shell;
  }
  /**
   * @param string
   */
  public function setSystemId($systemId)
  {
    $this->systemId = $systemId;
  }
  /**
   * @return string
   */
  public function getSystemId()
  {
    return $this->systemId;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
class_alias(PosixAccount::class, 'Google_Service_CloudOSLogin_PosixAccount');
