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

class Account extends \Google\Model
{
  public $accountName;
  public $accountNumber;
  public $name;
  protected $organizationInfoType = OrganizationInfo::class;
  protected $organizationInfoDataType = '';
  public $permissionLevel;
  public $primaryOwner;
  public $role;
  public $type;
  public $verificationState;
  public $vettedState;

  public function setAccountName($accountName)
  {
    $this->accountName = $accountName;
  }
  public function getAccountName()
  {
    return $this->accountName;
  }
  public function setAccountNumber($accountNumber)
  {
    $this->accountNumber = $accountNumber;
  }
  public function getAccountNumber()
  {
    return $this->accountNumber;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param OrganizationInfo
   */
  public function setOrganizationInfo(OrganizationInfo $organizationInfo)
  {
    $this->organizationInfo = $organizationInfo;
  }
  /**
   * @return OrganizationInfo
   */
  public function getOrganizationInfo()
  {
    return $this->organizationInfo;
  }
  public function setPermissionLevel($permissionLevel)
  {
    $this->permissionLevel = $permissionLevel;
  }
  public function getPermissionLevel()
  {
    return $this->permissionLevel;
  }
  public function setPrimaryOwner($primaryOwner)
  {
    $this->primaryOwner = $primaryOwner;
  }
  public function getPrimaryOwner()
  {
    return $this->primaryOwner;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVerificationState($verificationState)
  {
    $this->verificationState = $verificationState;
  }
  public function getVerificationState()
  {
    return $this->verificationState;
  }
  public function setVettedState($vettedState)
  {
    $this->vettedState = $vettedState;
  }
  public function getVettedState()
  {
    return $this->vettedState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Account::class, 'Google_Service_MyBusinessAccountManagement_Account');
