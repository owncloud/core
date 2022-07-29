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

namespace Google\Service\Monitoring;

class HttpCheck extends \Google\Collection
{
  protected $collection_key = 'acceptedResponseStatusCodes';
  protected $acceptedResponseStatusCodesType = ResponseStatusCode::class;
  protected $acceptedResponseStatusCodesDataType = 'array';
  protected $authInfoType = BasicAuthentication::class;
  protected $authInfoDataType = '';
  /**
   * @var string
   */
  public $body;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string[]
   */
  public $headers;
  /**
   * @var bool
   */
  public $maskHeaders;
  /**
   * @var string
   */
  public $path;
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $requestMethod;
  /**
   * @var bool
   */
  public $useSsl;
  /**
   * @var bool
   */
  public $validateSsl;

  /**
   * @param ResponseStatusCode[]
   */
  public function setAcceptedResponseStatusCodes($acceptedResponseStatusCodes)
  {
    $this->acceptedResponseStatusCodes = $acceptedResponseStatusCodes;
  }
  /**
   * @return ResponseStatusCode[]
   */
  public function getAcceptedResponseStatusCodes()
  {
    return $this->acceptedResponseStatusCodes;
  }
  /**
   * @param BasicAuthentication
   */
  public function setAuthInfo(BasicAuthentication $authInfo)
  {
    $this->authInfo = $authInfo;
  }
  /**
   * @return BasicAuthentication
   */
  public function getAuthInfo()
  {
    return $this->authInfo;
  }
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
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
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
   * @param bool
   */
  public function setMaskHeaders($maskHeaders)
  {
    $this->maskHeaders = $maskHeaders;
  }
  /**
   * @return bool
   */
  public function getMaskHeaders()
  {
    return $this->maskHeaders;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param int
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return int
   */
  public function getPort()
  {
    return $this->port;
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
   * @param bool
   */
  public function setUseSsl($useSsl)
  {
    $this->useSsl = $useSsl;
  }
  /**
   * @return bool
   */
  public function getUseSsl()
  {
    return $this->useSsl;
  }
  /**
   * @param bool
   */
  public function setValidateSsl($validateSsl)
  {
    $this->validateSsl = $validateSsl;
  }
  /**
   * @return bool
   */
  public function getValidateSsl()
  {
    return $this->validateSsl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpCheck::class, 'Google_Service_Monitoring_HttpCheck');
