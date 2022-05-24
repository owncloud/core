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

class VerifyAssertionResponse extends \Google\Collection
{
  protected $collection_key = 'verifiedProvider';
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $appInstallationUrl;
  /**
   * @var string
   */
  public $appScheme;
  /**
   * @var string
   */
  public $context;
  /**
   * @var string
   */
  public $dateOfBirth;
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
  public $emailRecycled;
  /**
   * @var bool
   */
  public $emailVerified;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $expiresIn;
  /**
   * @var string
   */
  public $federatedId;
  /**
   * @var string
   */
  public $firstName;
  /**
   * @var string
   */
  public $fullName;
  /**
   * @var string
   */
  public $idToken;
  /**
   * @var string
   */
  public $inputEmail;
  /**
   * @var bool
   */
  public $isNewUser;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $lastName;
  /**
   * @var string
   */
  public $localId;
  /**
   * @var bool
   */
  public $needConfirmation;
  /**
   * @var bool
   */
  public $needEmail;
  /**
   * @var string
   */
  public $nickName;
  /**
   * @var string
   */
  public $oauthAccessToken;
  /**
   * @var string
   */
  public $oauthAuthorizationCode;
  /**
   * @var int
   */
  public $oauthExpireIn;
  /**
   * @var string
   */
  public $oauthIdToken;
  /**
   * @var string
   */
  public $oauthRequestToken;
  /**
   * @var string
   */
  public $oauthScope;
  /**
   * @var string
   */
  public $oauthTokenSecret;
  /**
   * @var string
   */
  public $originalEmail;
  /**
   * @var string
   */
  public $photoUrl;
  /**
   * @var string
   */
  public $providerId;
  /**
   * @var string
   */
  public $rawUserInfo;
  /**
   * @var string
   */
  public $refreshToken;
  /**
   * @var string
   */
  public $screenName;
  /**
   * @var string
   */
  public $timeZone;
  /**
   * @var string[]
   */
  public $verifiedProvider;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setAppInstallationUrl($appInstallationUrl)
  {
    $this->appInstallationUrl = $appInstallationUrl;
  }
  /**
   * @return string
   */
  public function getAppInstallationUrl()
  {
    return $this->appInstallationUrl;
  }
  /**
   * @param string
   */
  public function setAppScheme($appScheme)
  {
    $this->appScheme = $appScheme;
  }
  /**
   * @return string
   */
  public function getAppScheme()
  {
    return $this->appScheme;
  }
  /**
   * @param string
   */
  public function setContext($context)
  {
    $this->context = $context;
  }
  /**
   * @return string
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param string
   */
  public function setDateOfBirth($dateOfBirth)
  {
    $this->dateOfBirth = $dateOfBirth;
  }
  /**
   * @return string
   */
  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
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
  public function setEmailRecycled($emailRecycled)
  {
    $this->emailRecycled = $emailRecycled;
  }
  /**
   * @return bool
   */
  public function getEmailRecycled()
  {
    return $this->emailRecycled;
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
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  /**
   * @param string
   */
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  /**
   * @return string
   */
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  /**
   * @param string
   */
  public function setFederatedId($federatedId)
  {
    $this->federatedId = $federatedId;
  }
  /**
   * @return string
   */
  public function getFederatedId()
  {
    return $this->federatedId;
  }
  /**
   * @param string
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }
  /**
   * @param string
   */
  public function setFullName($fullName)
  {
    $this->fullName = $fullName;
  }
  /**
   * @return string
   */
  public function getFullName()
  {
    return $this->fullName;
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
  public function setInputEmail($inputEmail)
  {
    $this->inputEmail = $inputEmail;
  }
  /**
   * @return string
   */
  public function getInputEmail()
  {
    return $this->inputEmail;
  }
  /**
   * @param bool
   */
  public function setIsNewUser($isNewUser)
  {
    $this->isNewUser = $isNewUser;
  }
  /**
   * @return bool
   */
  public function getIsNewUser()
  {
    return $this->isNewUser;
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
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
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
   * @param bool
   */
  public function setNeedConfirmation($needConfirmation)
  {
    $this->needConfirmation = $needConfirmation;
  }
  /**
   * @return bool
   */
  public function getNeedConfirmation()
  {
    return $this->needConfirmation;
  }
  /**
   * @param bool
   */
  public function setNeedEmail($needEmail)
  {
    $this->needEmail = $needEmail;
  }
  /**
   * @return bool
   */
  public function getNeedEmail()
  {
    return $this->needEmail;
  }
  /**
   * @param string
   */
  public function setNickName($nickName)
  {
    $this->nickName = $nickName;
  }
  /**
   * @return string
   */
  public function getNickName()
  {
    return $this->nickName;
  }
  /**
   * @param string
   */
  public function setOauthAccessToken($oauthAccessToken)
  {
    $this->oauthAccessToken = $oauthAccessToken;
  }
  /**
   * @return string
   */
  public function getOauthAccessToken()
  {
    return $this->oauthAccessToken;
  }
  /**
   * @param string
   */
  public function setOauthAuthorizationCode($oauthAuthorizationCode)
  {
    $this->oauthAuthorizationCode = $oauthAuthorizationCode;
  }
  /**
   * @return string
   */
  public function getOauthAuthorizationCode()
  {
    return $this->oauthAuthorizationCode;
  }
  /**
   * @param int
   */
  public function setOauthExpireIn($oauthExpireIn)
  {
    $this->oauthExpireIn = $oauthExpireIn;
  }
  /**
   * @return int
   */
  public function getOauthExpireIn()
  {
    return $this->oauthExpireIn;
  }
  /**
   * @param string
   */
  public function setOauthIdToken($oauthIdToken)
  {
    $this->oauthIdToken = $oauthIdToken;
  }
  /**
   * @return string
   */
  public function getOauthIdToken()
  {
    return $this->oauthIdToken;
  }
  /**
   * @param string
   */
  public function setOauthRequestToken($oauthRequestToken)
  {
    $this->oauthRequestToken = $oauthRequestToken;
  }
  /**
   * @return string
   */
  public function getOauthRequestToken()
  {
    return $this->oauthRequestToken;
  }
  /**
   * @param string
   */
  public function setOauthScope($oauthScope)
  {
    $this->oauthScope = $oauthScope;
  }
  /**
   * @return string
   */
  public function getOauthScope()
  {
    return $this->oauthScope;
  }
  /**
   * @param string
   */
  public function setOauthTokenSecret($oauthTokenSecret)
  {
    $this->oauthTokenSecret = $oauthTokenSecret;
  }
  /**
   * @return string
   */
  public function getOauthTokenSecret()
  {
    return $this->oauthTokenSecret;
  }
  /**
   * @param string
   */
  public function setOriginalEmail($originalEmail)
  {
    $this->originalEmail = $originalEmail;
  }
  /**
   * @return string
   */
  public function getOriginalEmail()
  {
    return $this->originalEmail;
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
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return string
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
  /**
   * @param string
   */
  public function setRawUserInfo($rawUserInfo)
  {
    $this->rawUserInfo = $rawUserInfo;
  }
  /**
   * @return string
   */
  public function getRawUserInfo()
  {
    return $this->rawUserInfo;
  }
  /**
   * @param string
   */
  public function setRefreshToken($refreshToken)
  {
    $this->refreshToken = $refreshToken;
  }
  /**
   * @return string
   */
  public function getRefreshToken()
  {
    return $this->refreshToken;
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
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param string[]
   */
  public function setVerifiedProvider($verifiedProvider)
  {
    $this->verifiedProvider = $verifiedProvider;
  }
  /**
   * @return string[]
   */
  public function getVerifiedProvider()
  {
    return $this->verifiedProvider;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerifyAssertionResponse::class, 'Google_Service_IdentityToolkit_VerifyAssertionResponse');
