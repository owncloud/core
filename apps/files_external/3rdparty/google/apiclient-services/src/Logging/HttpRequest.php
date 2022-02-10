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

namespace Google\Service\Logging;

class HttpRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $cacheFillBytes;
  /**
   * @var bool
   */
  public $cacheHit;
  /**
   * @var bool
   */
  public $cacheLookup;
  /**
   * @var bool
   */
  public $cacheValidatedWithOriginServer;
  /**
   * @var string
   */
  public $latency;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $referer;
  /**
   * @var string
   */
  public $remoteIp;
  /**
   * @var string
   */
  public $requestMethod;
  /**
   * @var string
   */
  public $requestSize;
  /**
   * @var string
   */
  public $requestUrl;
  /**
   * @var string
   */
  public $responseSize;
  /**
   * @var string
   */
  public $serverIp;
  /**
   * @var int
   */
  public $status;
  /**
   * @var string
   */
  public $userAgent;

  /**
   * @param string
   */
  public function setCacheFillBytes($cacheFillBytes)
  {
    $this->cacheFillBytes = $cacheFillBytes;
  }
  /**
   * @return string
   */
  public function getCacheFillBytes()
  {
    return $this->cacheFillBytes;
  }
  /**
   * @param bool
   */
  public function setCacheHit($cacheHit)
  {
    $this->cacheHit = $cacheHit;
  }
  /**
   * @return bool
   */
  public function getCacheHit()
  {
    return $this->cacheHit;
  }
  /**
   * @param bool
   */
  public function setCacheLookup($cacheLookup)
  {
    $this->cacheLookup = $cacheLookup;
  }
  /**
   * @return bool
   */
  public function getCacheLookup()
  {
    return $this->cacheLookup;
  }
  /**
   * @param bool
   */
  public function setCacheValidatedWithOriginServer($cacheValidatedWithOriginServer)
  {
    $this->cacheValidatedWithOriginServer = $cacheValidatedWithOriginServer;
  }
  /**
   * @return bool
   */
  public function getCacheValidatedWithOriginServer()
  {
    return $this->cacheValidatedWithOriginServer;
  }
  /**
   * @param string
   */
  public function setLatency($latency)
  {
    $this->latency = $latency;
  }
  /**
   * @return string
   */
  public function getLatency()
  {
    return $this->latency;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param string
   */
  public function setReferer($referer)
  {
    $this->referer = $referer;
  }
  /**
   * @return string
   */
  public function getReferer()
  {
    return $this->referer;
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
   * @param string
   */
  public function setRequestMethod($requestMethod)
  {
    $this->requestMethod = $requestMethod;
  }
  /**
   * @return string
   */
  public function getRequestMethod()
  {
    return $this->requestMethod;
  }
  /**
   * @param string
   */
  public function setRequestSize($requestSize)
  {
    $this->requestSize = $requestSize;
  }
  /**
   * @return string
   */
  public function getRequestSize()
  {
    return $this->requestSize;
  }
  /**
   * @param string
   */
  public function setRequestUrl($requestUrl)
  {
    $this->requestUrl = $requestUrl;
  }
  /**
   * @return string
   */
  public function getRequestUrl()
  {
    return $this->requestUrl;
  }
  /**
   * @param string
   */
  public function setResponseSize($responseSize)
  {
    $this->responseSize = $responseSize;
  }
  /**
   * @return string
   */
  public function getResponseSize()
  {
    return $this->responseSize;
  }
  /**
   * @param string
   */
  public function setServerIp($serverIp)
  {
    $this->serverIp = $serverIp;
  }
  /**
   * @return string
   */
  public function getServerIp()
  {
    return $this->serverIp;
  }
  /**
   * @param int
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return int
   */
  public function getStatus()
  {
    return $this->status;
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
class_alias(HttpRequest::class, 'Google_Service_Logging_HttpRequest');
