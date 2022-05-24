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

namespace Google\Service\CloudTasks;

class HttpRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $body;
  /**
   * @var string[]
   */
  public $headers;
  /**
   * @var string
   */
  public $httpMethod;
  protected $oauthTokenType = OAuthToken::class;
  protected $oauthTokenDataType = '';
  protected $oidcTokenType = OidcToken::class;
  protected $oidcTokenDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setBody($body)
  {
    $this->body = $body;
  }
  /**
   * @return string
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return string[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param string
   */
  public function setHttpMethod($httpMethod)
  {
    $this->httpMethod = $httpMethod;
  }
  /**
   * @return string
   */
  public function getHttpMethod()
  {
    return $this->httpMethod;
  }
  /**
   * @param OAuthToken
   */
  public function setOauthToken(OAuthToken $oauthToken)
  {
    $this->oauthToken = $oauthToken;
  }
  /**
   * @return OAuthToken
   */
  public function getOauthToken()
  {
    return $this->oauthToken;
  }
  /**
   * @param OidcToken
   */
  public function setOidcToken(OidcToken $oidcToken)
  {
    $this->oidcToken = $oidcToken;
  }
  /**
   * @return OidcToken
   */
  public function getOidcToken()
  {
    return $this->oidcToken;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRequest::class, 'Google_Service_CloudTasks_HttpRequest');
