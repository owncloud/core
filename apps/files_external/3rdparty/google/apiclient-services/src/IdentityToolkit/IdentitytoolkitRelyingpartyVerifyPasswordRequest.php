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

class IdentitytoolkitRelyingpartyVerifyPasswordRequest extends \Google\Model
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
   * @var string
   */
  public $delegatedProjectNumber;
  /**
   * @var string
   */
  public $email;
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
  public $password;
  /**
   * @var string
   */
  public $pendingIdToken;
  /**
   * @var bool
   */
  public $returnSecureToken;
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
  public function setPendingIdToken($pendingIdToken)
  {
    $this->pendingIdToken = $pendingIdToken;
  }
  /**
   * @return string
   */
  public function getPendingIdToken()
  {
    return $this->pendingIdToken;
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
class_alias(IdentitytoolkitRelyingpartyVerifyPasswordRequest::class, 'Google_Service_IdentityToolkit_IdentitytoolkitRelyingpartyVerifyPasswordRequest');
