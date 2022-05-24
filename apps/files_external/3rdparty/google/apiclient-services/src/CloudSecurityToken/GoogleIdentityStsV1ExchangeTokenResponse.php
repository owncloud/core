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

namespace Google\Service\CloudSecurityToken;

class GoogleIdentityStsV1ExchangeTokenResponse extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "accessToken" => "access_token",
        "expiresIn" => "expires_in",
        "issuedTokenType" => "issued_token_type",
        "tokenType" => "token_type",
  ];
  /**
   * @var string
   */
  public $accessToken;
  /**
   * @var int
   */
  public $expiresIn;
  /**
   * @var string
   */
  public $issuedTokenType;
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
   * @param int
   */
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  /**
   * @return int
   */
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  /**
   * @param string
   */
  public function setIssuedTokenType($issuedTokenType)
  {
    $this->issuedTokenType = $issuedTokenType;
  }
  /**
   * @return string
   */
  public function getIssuedTokenType()
  {
    return $this->issuedTokenType;
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
class_alias(GoogleIdentityStsV1ExchangeTokenResponse::class, 'Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenResponse');
