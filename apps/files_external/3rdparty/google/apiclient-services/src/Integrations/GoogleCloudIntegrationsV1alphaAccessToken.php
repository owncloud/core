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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaAccessToken extends \Google\Model
{
  /**
   * @var string
   */
  public $accessToken;
  /**
   * @var string
   */
  public $accessTokenExpireTime;
  /**
   * @var string
   */
  public $refreshToken;
  /**
   * @var string
   */
  public $refreshTokenExpireTime;
  /**
   * @var string
   */
  public $tokenType;

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
  public function setAccessTokenExpireTime($accessTokenExpireTime)
  {
    $this->accessTokenExpireTime = $accessTokenExpireTime;
  }
  /**
   * @return string
   */
  public function getAccessTokenExpireTime()
  {
    return $this->accessTokenExpireTime;
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
  public function setRefreshTokenExpireTime($refreshTokenExpireTime)
  {
    $this->refreshTokenExpireTime = $refreshTokenExpireTime;
  }
  /**
   * @return string
   */
  public function getRefreshTokenExpireTime()
  {
    return $this->refreshTokenExpireTime;
  }
  /**
   * @param string
   */
  public function setTokenType($tokenType)
  {
    $this->tokenType = $tokenType;
  }
  /**
   * @return string
   */
  public function getTokenType()
  {
    return $this->tokenType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaAccessToken::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaAccessToken');
