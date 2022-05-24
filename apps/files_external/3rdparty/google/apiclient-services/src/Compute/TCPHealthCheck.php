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

class TCPHealthCheck extends \Google\Model
{
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $portName;
  /**
   * @var string
   */
  public $portSpecification;
  /**
   * @var string
   */
  public $proxyHeader;
  /**
   * @var string
   */
  public $request;
  /**
   * @var string
   */
  public $response;

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
  public function setPortName($portName)
  {
    $this->portName = $portName;
  }
  /**
   * @return string
   */
  public function getPortName()
  {
    return $this->portName;
  }
  /**
   * @param string
   */
  public function setPortSpecification($portSpecification)
  {
    $this->portSpecification = $portSpecification;
  }
  /**
   * @return string
   */
  public function getPortSpecification()
  {
    return $this->portSpecification;
  }
  /**
   * @param string
   */
  public function setProxyHeader($proxyHeader)
  {
    $this->proxyHeader = $proxyHeader;
  }
  /**
   * @return string
   */
  public function getProxyHeader()
  {
    return $this->proxyHeader;
  }
  /**
   * @param string
   */
  public function setRequest($request)
  {
    $this->request = $request;
  }
  /**
   * @return string
   */
  public function getRequest()
  {
    return $this->request;
  }
  /**
   * @param string
   */
  public function setResponse($response)
  {
    $this->response = $response;
  }
  /**
   * @return string
   */
  public function getResponse()
  {
    return $this->response;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TCPHealthCheck::class, 'Google_Service_Compute_TCPHealthCheck');
