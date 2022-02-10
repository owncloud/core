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

class IdentitytoolkitRelyingpartySetAccountInfoRequest extends \Google\Collection
{
  protected $collection_key = 'provider';
  /**
   * @var string
   */
  public $captchaChallenge;
  /**
   * @var string
   */
  public $captchaResponse;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $customAttributes;
  /**
   * @var string
   */
  public $delegatedProjectNumber;
  /**
   * @var string[]
   */
  public $deleteAttribute;
  /**
   * @var string[]
   */
  public $deleteProvider;
  /**
   * @var bool
   */
  public $disableUser;
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
  public $idToken;
  /**
   * @var string
   */
  public $instanceId;
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
  public $oobCode;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $photoUrl;
  /**
   * @var string[]
   */
  public $provider;
  /**
   * @var bool
   */
  public $returnSecureToken;
  /**
   * @var bool
   */
  public $upgradeToFederatedLogin;
  /**
   * @var string
   */
  public $validSince;

  /**
   * @param string
   */
  public function setCaptchaChallenge($captchaChallenge)
  {
    $this->captchaChallenge = $captchaChallenge;
  }
  /**
   * @return string
   */
  public function getCaptchaChallenge()
  {
    return $this->captchaChallenge;
  }
  /**
   * @param string
   */
  public function setCaptchaResponse($captchaResponse)
  {
    $this->captchaResponse = $captchaResponse;
  }
  /**
   * @return string
   */
  public function getCaptchaResponse()
  {
    return $this->captchaResponse;
  }
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
   * @param string
   */
  public function setDelegatedProjectNumber($delegatedProjectNumber)
  {
    $this->delegatedProjectNumber = $delegatedProjectNumber;
  }
  /**
   * @return string
   */
  public function getDelegatedProjectNumber()
  {
    return $this->delegatedProjectNumber;
  }
  /**
   * @param string[]
   */
  public function setDeleteAttribute($deleteAttribute)
  {
    $this->deleteAttribute = $deleteAttribute;
  }
  /**
   * @return string[]
   */
  public function getDeleteAttribute()
  {
    return $this->deleteAttribute;
  }
  /**
   * @param string[]
   */
  public function setDeleteProvider($deleteProvider)
  {
    $this->deleteProvider = $deleteProvider;
  }
  /**
   * @return string[]
   */
  public function getDeleteProvider()
  {
    return $this->deleteProvider;
  }
  /**
   * @param bool
   */
  public function setDisableUser($disableUser)
  {
    $this->disableUser = $disableUser;
  }
  /**
   * @return bool
   */
  public function getDisableUser()
  {
    return $this->disableUser;
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
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  /**
   * @return string
   */
  public function getIdToken()
  {
    return $this->idToken;
  }
  /**
   * @param string
   */
  public function setInstanceId($instanceId)
  {
    $this->instanceId = $instanceId;
  }
  /**
   * @return string
   */
  public function getInstanceId()
  {
    return $this->instanceId;
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
  public function setOobCode($oobCode)
  {
    $this->oobCode = $oobCode;
  }
  /**
   * @return string
   */
  public function getOobCode()
  {
    return $this->oobCode;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
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
   * @param string[]
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
  }
  /**
   * @return string[]
   */
  public function getProvider()
  {
    return $this->provider;
  }
  /**
   * @param bool
   */
  public function setReturnSecureToken($returnSecureToken)
  {
    $this->returnSecureToken = $returnSecureToken;
  }
  /**
   * @return bool
   */
  public function getReturnSecureToken()
  {
    return $this->returnSecureToken;
  }
  /**
   * @param bool
   */
  public function setUpgradeToFederatedLogin($upgradeToFederatedLogin)
  {
    $this->upgradeToFederatedLogin = $upgradeToFederatedLogin;
  }
  /**
   * @return bool
   */
  public function getUpgradeToFederatedLogin()
  {
    return $this->upgradeToFederatedLogin;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartySetAccountInfoRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySetAccountInfoRequest');
