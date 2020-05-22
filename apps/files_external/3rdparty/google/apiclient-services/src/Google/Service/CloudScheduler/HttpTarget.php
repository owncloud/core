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

class Google_Service_CloudScheduler_HttpTarget extends Google_Model
{
  public $body;
  public $headers;
  public $httpMethod;
  protected $oauthTokenType = 'Google_Service_CloudScheduler_OAuthToken';
  protected $oauthTokenDataType = '';
  protected $oidcTokenType = 'Google_Service_CloudScheduler_OidcToken';
  protected $oidcTokenDataType = '';
  public $uri;

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setHttpMethod($httpMethod)
  {
    $this->httpMethod = $httpMethod;
  }
  public function getHttpMethod()
  {
    return $this->httpMethod;
  }
  /**
   * @param Google_Service_CloudScheduler_OAuthToken
   */
  public function setOauthToken(Google_Service_CloudScheduler_OAuthToken $oauthToken)
  {
    $this->oauthToken = $oauthToken;
  }
  /**
   * @return Google_Service_CloudScheduler_OAuthToken
   */
  public function getOauthToken()
  {
    return $this->oauthToken;
  }
  /**
   * @param Google_Service_CloudScheduler_OidcToken
   */
  public function setOidcToken(Google_Service_CloudScheduler_OidcToken $oidcToken)
  {
    $this->oidcToken = $oidcToken;
  }
  /**
   * @return Google_Service_CloudScheduler_OidcToken
   */
  public function getOidcToken()
  {
    return $this->oidcToken;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}
