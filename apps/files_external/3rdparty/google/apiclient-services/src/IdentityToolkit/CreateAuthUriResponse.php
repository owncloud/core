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

class CreateAuthUriResponse extends \Google\Collection
{
  protected $collection_key = 'signinMethods';
  /**
   * @var string[]
   */
  public $allProviders;
  /**
   * @var string
   */
  public $authUri;
  /**
   * @var bool
   */
  public $captchaRequired;
  /**
   * @var bool
   */
  public $forExistingProvider;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $providerId;
  /**
   * @var bool
   */
  public $registered;
  /**
   * @var string
   */
  public $sessionId;
  /**
   * @var string[]
   */
  public $signinMethods;

  /**
   * @param string[]
   */
  public function setAllProviders($allProviders)
  {
    $this->allProviders = $allProviders;
  }
  /**
   * @return string[]
   */
  public function getAllProviders()
  {
    return $this->allProviders;
  }
  /**
   * @param string
   */
  public function setAuthUri($authUri)
  {
    $this->authUri = $authUri;
  }
  /**
   * @return string
   */
  public function getAuthUri()
  {
    return $this->authUri;
  }
  /**
   * @param bool
   */
  public function setCaptchaRequired($captchaRequired)
  {
    $this->captchaRequired = $captchaRequired;
  }
  /**
   * @return bool
   */
  public function getCaptchaRequired()
  {
    return $this->captchaRequired;
  }
  /**
   * @param bool
   */
  public function setForExistingProvider($forExistingProvider)
  {
    $this->forExistingProvider = $forExistingProvider;
  }
  /**
   * @return bool
   */
  public function getForExistingProvider()
  {
    return $this->forExistingProvider;
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
  /**
   * @param string
   */
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  /**
   * @return string
   */
  public function getSessionId()
  {
    return $this->sessionId;
  }
  /**
   * @param string[]
   */
  public function setSigninMethods($signinMethods)
  {
    $this->signinMethods = $signinMethods;
  }
  /**
   * @return string[]
   */
  public function getSigninMethods()
  {
    return $this->signinMethods;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateAuthUriResponse::class, 'Google_Service_IdentityToolkit_CreateAuthUriResponse');
