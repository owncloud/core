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

namespace Google\Service\IdentityToolkit;

class UserInfo extends \Google\Collection
{
  protected $collection_key = 'providerUserInfo';
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $customAttributes;
  /**
   * @var bool
   */
  public $customAuth;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $email;
  /**
   * @var bool
   */
  public $emailVerified;
  /**
   * @var string
   */
  public $lastLoginAt;
  /**
   * @var string
   */
  public $localId;
  /**
   * @var string
   */
  public $passwordHash;
  public $passwordUpdatedAt;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $photoUrl;
  protected $providerUserInfoType = UserInfoProviderUserInfo::class;
  protected $providerUserInfoDataType = 'array';
  /**
   * @var string
   */
  public $rawPassword;
  /**
   * @var string
   */
  public $salt;
  /**
   * @var string
   */
  public $screenName;
  /**
   * @var string
   */
  public $validSince;
  /**
   * @var int
   */
  public $version;

  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  /**
   * @param string
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return string
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  /**
   * @param bool
   */
  public function setCustomAuth($customAuth)
  {
    $this->customAuth = $customAuth;
  }
  /**
   * @return bool
   */
  public function getCustomAuth()
  {
    return $this->customAuth;
  }
  /**
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
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
   * @param bool
   */
  public function setEmailVerified($emailVerified)
  {
    $this->emailVerified = $emailVerified;
  }
  /**
   * @return bool
   */
  public function getEmailVerified()
  {
    return $this->emailVerified;
  }
  /**
   * @param string
   */
  public function setLastLoginAt($lastLoginAt)
  {
    $this->lastLoginAt = $lastLoginAt;
  }
  /**
   * @return string
   */
  public function getLastLoginAt()
  {
    return $this->lastLoginAt;
  }
  /**
   * @param string
   */
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  /**
   * @return string
   */
  public function getLocalId()
  {
    return $this->localId;
  }
  /**
   * @param string
   */
  public function setPasswordHash($passwordHash)
  {
    $this->passwordHash = $passwordHash;
  }
  /**
   * @return string
   */
  public function getPasswordHash()
  {
    return $this->passwordHash;
  }
  public function setPasswordUpdatedAt($passwordUpdatedAt)
  {
    $this->passwordUpdatedAt = $passwordUpdatedAt;
  }
  public function getPasswordUpdatedAt()
  {
    return $this->passwordUpdatedAt;
  }
  /**
   * @param string
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  /**
   * @return string
   */
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  /**
   * @param UserInfoProviderUserInfo[]
   */
  public function setProviderUserInfo($providerUserInfo)
  {
    $this->providerUserInfo = $providerUserInfo;
  }
  /**
   * @return UserInfoProviderUserInfo[]
   */
  public function getProviderUserInfo()
  {
    return $this->providerUserInfo;
  }
  /**
   * @param string
   */
  public function setRawPassword($rawPassword)
  {
    $this->rawPassword = $rawPassword;
  }
  /**
   * @return string
   */
  public function getRawPassword()
  {
    return $this->rawPassword;
  }
  /**
   * @param string
   */
  public function setSalt($salt)
  {
    $this->salt = $salt;
  }
  /**
   * @return string
   */
  public function getSalt()
  {
    return $this->salt;
  }
  /**
   * @param string
   */
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  /**
   * @return string
   */
  public function getScreenName()
  {
    return $this->screenName;
  }
  /**
   * @param string
   */
  public function setValidSince($validSince)
  {
    $this->validSince = $validSince;
  }
  /**
   * @return string
   */
  public function getValidSince()
  {
    return $this->validSince;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserInfo::class, 'Google_Service_IdentityToolkit_UserInfo');
