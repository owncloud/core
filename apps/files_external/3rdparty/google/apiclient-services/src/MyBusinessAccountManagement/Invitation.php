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

namespace Google\Service\MyBusinessAccountManagement;

class Invitation extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $role;
  protected $targetAccountType = Account::class;
  protected $targetAccountDataType = '';
  protected $targetLocationType = TargetLocation::class;
  protected $targetLocationDataType = '';
  /**
   * @var string
   */
  public $targetType;

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
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param Account
   */
  public function setTargetAccount(Account $targetAccount)
  {
    $this->targetAccount = $targetAccount;
  }
  /**
   * @return Account
   */
  public function getTargetAccount()
  {
    return $this->targetAccount;
  }
  /**
   * @param TargetLocation
   */
  public function setTargetLocation(TargetLocation $targetLocation)
  {
    $this->targetLocation = $targetLocation;
  }
  /**
   * @return TargetLocation
   */
  public function getTargetLocation()
  {
    return $this->targetLocation;
  }
  /**
   * @param string
   */
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  /**
   * @return string
   */
  public function getTargetType()
  {
    return $this->targetType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Invitation::class, 'Google_Service_MyBusinessAccountManagement_Invitation');
