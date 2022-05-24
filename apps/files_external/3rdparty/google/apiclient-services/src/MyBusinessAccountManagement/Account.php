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
  /**
   * @var string
   */
  public $accountName;
  /**
   * @var string
   */
  public $accountNumber;
  /**
   * @var string
   */
  public $name;
  protected $organizationInfoType = OrganizationInfo::class;
  protected $organizationInfoDataType = '';
  /**
   * @var string
   */
  public $permissionLevel;
  /**
   * @var string
   */
  public $primaryOwner;
  /**
   * @var string
   */
  public $role;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $verificationState;
  /**
   * @var string
   */
  public $vettedState;

  /**
   * @param string
   */
  public function setAccountName($accountName)
  {
    $this->accountName = $accountName;
  }
  /**
   * @return string
   */
  public function getAccountName()
  {
    return $this->accountName;
  }
  /**
   * @param string
   */
  public function setAccountNumber($accountNumber)
  {
    $this->accountNumber = $accountNumber;
  }
  /**
   * @return string
   */
  public function getAccountNumber()
  {
    return $this->accountNumber;
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
  /**
   * @param string
   */
  public function setPermissionLevel($permissionLevel)
  {
    $this->permissionLevel = $permissionLevel;
  }
  /**
   * @return string
   */
  public function getPermissionLevel()
  {
    return $this->permissionLevel;
  }
  /**
   * @param string
   */
  public function setPrimaryOwner($primaryOwner)
  {
    $this->primaryOwner = $primaryOwner;
  }
  /**
   * @return string
   */
  public function getPrimaryOwner()
  {
    return $this->primaryOwner;
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
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setVerificationState($verificationState)
  {
    $this->verificationState = $verificationState;
  }
  /**
   * @return string
   */
  public function getVerificationState()
  {
    return $this->verificationState;
  }
  /**
   * @param string
   */
  public function setVettedState($vettedState)
  {
    $this->vettedState = $vettedState;
  }
  /**
   * @return string
   */
  public function getVettedState()
  {
    return $this->vettedState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Account::class, 'Google_Service_MyBusinessAccountManagement_Account');
