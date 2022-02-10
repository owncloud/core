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

class IdentitytoolkitRelyingpartySignupNewUserRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $captchaChallenge;
  /**
   * @var string
   */
  public $captchaResponse;
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
  public $idToken;
  /**
   * @var string
   */
  public $instanceId;
  /**
   * @var string
   */
  public $localId;
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
   * @var string
   */
  public $tenantId;
  /**
   * @var string
   */
  public $tenantProjectNumber;

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
   * @param string
   */
  public function setTenantId($tenantId)
  {
    $this->tenantId = $tenantId;
  }
  /**
   * @return string
   */
  public function getTenantId()
  {
    return $this->tenantId;
  }
  /**
   * @param string
   */
  public function setTenantProjectNumber($tenantProjectNumber)
  {
    $this->tenantProjectNumber = $tenantProjectNumber;
  }
  /**
   * @return string
   */
  public function getTenantProjectNumber()
  {
    return $this->tenantProjectNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IdentitytoolkitRelyingpartySignupNewUserRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartySignupNewUserRequest');
