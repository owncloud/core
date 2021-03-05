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

class Google_Service_MyBusinessAccountManagement_Invitation extends Google_Model
{
  public $name;
  public $role;
  protected $targetAccountType = 'Google_Service_MyBusinessAccountManagement_Account';
  protected $targetAccountDataType = '';
  protected $targetLocationType = 'Google_Service_MyBusinessAccountManagement_TargetLocation';
  protected $targetLocationDataType = '';
  public $targetType;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param Google_Service_MyBusinessAccountManagement_Account
   */
  public function setTargetAccount(Google_Service_MyBusinessAccountManagement_Account $targetAccount)
  {
    $this->targetAccount = $targetAccount;
  }
  /**
   * @return Google_Service_MyBusinessAccountManagement_Account
   */
  public function getTargetAccount()
  {
    return $this->targetAccount;
  }
  /**
   * @param Google_Service_MyBusinessAccountManagement_TargetLocation
   */
  public function setTargetLocation(Google_Service_MyBusinessAccountManagement_TargetLocation $targetLocation)
  {
    $this->targetLocation = $targetLocation;
  }
  /**
   * @return Google_Service_MyBusinessAccountManagement_TargetLocation
   */
  public function getTargetLocation()
  {
    return $this->targetLocation;
  }
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  public function getTargetType()
  {
    return $this->targetType;
  }
}
