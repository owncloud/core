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

class VerifyCustomTokenResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $expiresIn;
  /**
   * @var string
   */
  public $idToken;
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
  public $refreshToken;

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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerifyCustomTokenResponse::class, 'Google_Service_IdentityToolkit_VerifyCustomTokenResponse');
