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

namespace Google\Service\AndroidPublisher;

class User extends \Google\Collection
{
  protected $collection_key = 'grants';
  /**
   * @var string
   */
  public $accessState;
  /**
   * @var string[]
   */
  public $developerAccountPermissions;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $expirationTime;
  protected $grantsType = Grant::class;
  protected $grantsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $partial;

  /**
   * @param string
   */
  public function setAccessState($accessState)
  {
    $this->accessState = $accessState;
  }
  /**
   * @return string
   */
  public function getAccessState()
  {
    return $this->accessState;
  }
  /**
   * @param string[]
   */
  public function setDeveloperAccountPermissions($developerAccountPermissions)
  {
    $this->developerAccountPermissions = $developerAccountPermissions;
  }
  /**
   * @return string[]
   */
  public function getDeveloperAccountPermissions()
  {
    return $this->developerAccountPermissions;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  /**
   * @return string
   */
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  /**
   * @param Grant[]
   */
  public function setGrants($grants)
  {
    $this->grants = $grants;
  }
  /**
   * @return Grant[]
   */
  public function getGrants()
  {
    return $this->grants;
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
   * @param bool
   */
  public function setPartial($partial)
  {
    $this->partial = $partial;
  }
  /**
   * @return bool
   */
  public function getPartial()
  {
    return $this->partial;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(User::class, 'Google_Service_AndroidPublisher_User');
