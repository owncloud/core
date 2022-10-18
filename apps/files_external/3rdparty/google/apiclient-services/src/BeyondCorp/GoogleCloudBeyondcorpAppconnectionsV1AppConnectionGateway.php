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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectionsV1AppConnectionGateway extends \Google\Model
{
  /**
   * @var string
   */
  public $appGateway;
  /**
   * @var int
   */
  public $ingressPort;
  /**
   * @var string
   */
  public $l7psc;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setAppGateway($appGateway)
  {
    $this->appGateway = $appGateway;
  }
  /**
   * @return string
   */
  public function getAppGateway()
  {
    return $this->appGateway;
  }
  /**
   * @param int
   */
  public function setIngressPort($ingressPort)
  {
    $this->ingressPort = $ingressPort;
  }
  /**
   * @return int
   */
  public function getIngressPort()
  {
    return $this->ingressPort;
  }
  /**
   * @param string
   */
  public function setL7psc($l7psc)
  {
    $this->l7psc = $l7psc;
  }
  /**
   * @return string
   */
  public function getL7psc()
  {
    return $this->l7psc;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBeyondcorpAppconnectionsV1AppConnectionGateway::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectionsV1AppConnectionGateway');
