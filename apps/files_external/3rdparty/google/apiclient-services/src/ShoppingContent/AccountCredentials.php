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

namespace Google\Service\ShoppingContent;

class AccountCredentials extends \Google\Model
{
  /**
   * @var string
   */
  public $accessToken;
  /**
   * @var string
   */
  public $expiresIn;
  /**
   * @var string
   */
  public $purpose;

  /**
   * @param string
   */
  public function setAccessToken($accessToken)
  {
    $this->accessToken = $accessToken;
  }
  /**
   * @return string
   */
  public function getAccessToken()
  {
    return $this->accessToken;
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
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  /**
   * @return string
   */
  public function getPurpose()
  {
    return $this->purpose;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountCredentials::class, 'Google_Service_ShoppingContent_AccountCredentials');
