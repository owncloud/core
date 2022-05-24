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

namespace Google\Service\NetworkManagement;

class EndpointInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $destinationIp;
  /**
   * @var string
   */
  public $destinationNetworkUri;
  /**
   * @var int
   */
  public $destinationPort;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $sourceIp;
  /**
   * @var string
   */
  public $sourceNetworkUri;
  /**
   * @var int
   */
  public $sourcePort;

  /**
   * @param string
   */
  public function setDestinationIp($destinationIp)
  {
    $this->destinationIp = $destinationIp;
  }
  /**
   * @return string
   */
  public function getDestinationIp()
  {
    return $this->destinationIp;
  }
  /**
   * @param string
   */
  public function setDestinationNetworkUri($destinationNetworkUri)
  {
    $this->destinationNetworkUri = $destinationNetworkUri;
  }
  /**
   * @return string
   */
  public function getDestinationNetworkUri()
  {
    return $this->destinationNetworkUri;
  }
  /**
   * @param int
   */
  public function setDestinationPort($destinationPort)
  {
    $this->destinationPort = $destinationPort;
  }
  /**
   * @return int
   */
  public function getDestinationPort()
  {
    return $this->destinationPort;
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
  public function setSourceIp($sourceIp)
  {
    $this->sourceIp = $sourceIp;
  }
  /**
   * @return string
   */
  public function getSourceIp()
  {
    return $this->sourceIp;
  }
  /**
   * @param string
   */
  public function setSourceNetworkUri($sourceNetworkUri)
  {
    $this->sourceNetworkUri = $sourceNetworkUri;
  }
  /**
   * @return string
   */
  public function getSourceNetworkUri()
  {
    return $this->sourceNetworkUri;
  }
  /**
   * @param int
   */
  public function setSourcePort($sourcePort)
  {
    $this->sourcePort = $sourcePort;
  }
  /**
   * @return int
   */
  public function getSourcePort()
  {
    return $this->sourcePort;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EndpointInfo::class, 'Google_Service_NetworkManagement_EndpointInfo');
