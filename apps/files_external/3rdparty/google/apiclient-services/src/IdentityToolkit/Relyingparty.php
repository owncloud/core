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

class Relyingparty extends \Google\Model
{
  /**
   * @var bool
   */
  public $androidInstallApp;
  /**
   * @var string
   */
  public $androidMinimumVersion;
  /**
   * @var string
   */
  public $androidPackageName;
  /**
   * @var bool
   */
  public $canHandleCodeInApp;
  /**
   * @var string
   */
  public $captchaResp;
  /**
   * @var string
   */
  public $challenge;
  /**
   * @var string
   */
  public $continueUrl;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $iOSAppStoreId;
  /**
   * @var string
   */
  public $iOSBundleId;
  /**
   * @var string
   */
  public $idToken;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $newEmail;
  /**
   * @var string
   */
  public $requestType;
  /**
   * @var string
   */
  public $userIp;

  /**
   * @param bool
   */
  public function setAndroidInstallApp($androidInstallApp)
  {
    $this->androidInstallApp = $androidInstallApp;
  }
  /**
   * @return bool
   */
  public function getAndroidInstallApp()
  {
    return $this->androidInstallApp;
  }
  /**
   * @param string
   */
  public function setAndroidMinimumVersion($androidMinimumVersion)
  {
    $this->androidMinimumVersion = $androidMinimumVersion;
  }
  /**
   * @return string
   */
  public function getAndroidMinimumVersion()
  {
    return $this->androidMinimumVersion;
  }
  /**
   * @param string
   */
  public function setAndroidPackageName($androidPackageName)
  {
    $this->androidPackageName = $androidPackageName;
  }
  /**
   * @return string
   */
  public function getAndroidPackageName()
  {
    return $this->androidPackageName;
  }
  /**
   * @param bool
   */
  public function setCanHandleCodeInApp($canHandleCodeInApp)
  {
    $this->canHandleCodeInApp = $canHandleCodeInApp;
  }
  /**
   * @return bool
   */
  public function getCanHandleCodeInApp()
  {
    return $this->canHandleCodeInApp;
  }
  /**
   * @param string
   */
  public function setCaptchaResp($captchaResp)
  {
    $this->captchaResp = $captchaResp;
  }
  /**
   * @return string
   */
  public function getCaptchaResp()
  {
    return $this->captchaResp;
  }
  /**
   * @param string
   */
  public function setChallenge($challenge)
  {
    $this->challenge = $challenge;
  }
  /**
   * @return string
   */
  public function getChallenge()
  {
    return $this->challenge;
  }
  /**
   * @param string
   */
  public function setContinueUrl($continueUrl)
  {
    $this->continueUrl = $continueUrl;
  }
  /**
   * @return string
   */
  public function getContinueUrl()
  {
    return $this->continueUrl;
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
  public function setIOSAppStoreId($iOSAppStoreId)
  {
    $this->iOSAppStoreId = $iOSAppStoreId;
  }
  /**
   * @return string
   */
  public function getIOSAppStoreId()
  {
    return $this->iOSAppStoreId;
  }
  /**
   * @param string
   */
  public function setIOSBundleId($iOSBundleId)
  {
    $this->iOSBundleId = $iOSBundleId;
  }
  /**
   * @return string
   */
  public function getIOSBundleId()
  {
    return $this->iOSBundleId;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setNewEmail($newEmail)
  {
    $this->newEmail = $newEmail;
  }
  /**
   * @return string
   */
  public function getNewEmail()
  {
    return $this->newEmail;
  }
  /**
   * @param string
   */
  public function setRequestType($requestType)
  {
    $this->requestType = $requestType;
  }
  /**
   * @return string
   */
  public function getRequestType()
  {
    return $this->requestType;
  }
  /**
   * @param string
   */
  public function setUserIp($userIp)
  {
    $this->userIp = $userIp;
  }
  /**
   * @return string
   */
  public function getUserIp()
  {
    return $this->userIp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Relyingparty::class, 'Google_Service_IdentityToolkit_Relyingparty');
