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

class VerifyPasswordResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $expiresIn;
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
  public $localId;
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
  public $photoUrl;
  /**
   * @var string
   */
  public $refreshToken;
  /**
   * @var bool
   */
  public $registered;

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
   * @param bool
   */
  public function setRegistered($registered)
  {
    $this->registered = $registered;
  }
  /**
   * @return bool
   */
  public function getRegistered()
  {
    return $this->registered;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerifyPasswordResponse::class, 'Google_Service_IdentityToolkit_VerifyPasswordResponse');
