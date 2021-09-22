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

namespace Google\Service\Compute;

class HTTP2HealthCheck extends \Google\Model
{
  public $host;
  public $port;
  public $portName;
  public $portSpecification;
  public $proxyHeader;
  public $requestPath;
  public $response;

  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setPortName($portName)
  {
    $this->portName = $portName;
  }
  public function getPortName()
  {
    return $this->portName;
  }
  public function setPortSpecification($portSpecification)
  {
    $this->portSpecification = $portSpecification;
  }
  public function getPortSpecification()
  {
    return $this->portSpecification;
  }
  public function setProxyHeader($proxyHeader)
  {
    $this->proxyHeader = $proxyHeader;
  }
  public function getProxyHeader()
  {
    return $this->proxyHeader;
  }
  public function setRequestPath($requestPath)
  {
    $this->requestPath = $requestPath;
  }
  public function getRequestPath()
  {
    return $this->requestPath;
  }
  public function setResponse($response)
  {
    $this->response = $response;
  }
  public function getResponse()
  {
    return $this->response;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HTTP2HealthCheck::class, 'Google_Service_Compute_HTTP2HealthCheck');
