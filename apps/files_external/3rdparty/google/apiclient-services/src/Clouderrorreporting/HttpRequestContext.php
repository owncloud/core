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

namespace Google\Service\Clouderrorreporting;

class HttpRequestContext extends \Google\Model
{
  /**
   * @var string
   */
  public $method;
  /**
   * @var string
   */
  public $referrer;
  /**
   * @var string
   */
  public $remoteIp;
  /**
   * @var int
   */
  public $responseStatusCode;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $userAgent;

  /**
   * @param string
   */
  public function setMethod($method)
  {
    $this->method = $method;
  }
  /**
   * @return string
   */
  public function getMethod()
  {
    return $this->method;
  }
  /**
   * @param string
   */
  public function setReferrer($referrer)
  {
    $this->referrer = $referrer;
  }
  /**
   * @return string
   */
  public function getReferrer()
  {
    return $this->referrer;
  }
  /**
   * @param string
   */
  public function setRemoteIp($remoteIp)
  {
    $this->remoteIp = $remoteIp;
  }
  /**
   * @return string
   */
  public function getRemoteIp()
  {
    return $this->remoteIp;
  }
  /**
   * @param int
   */
  public function setResponseStatusCode($responseStatusCode)
  {
    $this->responseStatusCode = $responseStatusCode;
  }
  /**
   * @return int
   */
  public function getResponseStatusCode()
  {
    return $this->responseStatusCode;
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
  /**
   * @param string
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return string
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRequestContext::class, 'Google_Service_Clouderrorreporting_HttpRequestContext');
