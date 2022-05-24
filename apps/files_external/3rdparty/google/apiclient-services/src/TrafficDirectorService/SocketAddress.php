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

namespace Google\Service\TrafficDirectorService;

class SocketAddress extends \Google\Model
{
  /**
   * @var string
   */
  public $address;
  /**
   * @var bool
   */
  public $ipv4Compat;
  /**
   * @var string
   */
  public $namedPort;
  /**
   * @var string
   */
  public $portValue;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $resolverName;

  /**
   * @param string
   */
  public function setAddress($address)
  {
    $this->address = $address;
  }
  /**
   * @return string
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param bool
   */
  public function setIpv4Compat($ipv4Compat)
  {
    $this->ipv4Compat = $ipv4Compat;
  }
  /**
   * @return bool
   */
  public function getIpv4Compat()
  {
    return $this->ipv4Compat;
  }
  /**
   * @param string
   */
  public function setNamedPort($namedPort)
  {
    $this->namedPort = $namedPort;
  }
  /**
   * @return string
   */
  public function getNamedPort()
  {
    return $this->namedPort;
  }
  /**
   * @param string
   */
  public function setPortValue($portValue)
  {
    $this->portValue = $portValue;
  }
  /**
   * @return string
   */
  public function getPortValue()
  {
    return $this->portValue;
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
  public function setResolverName($resolverName)
  {
    $this->resolverName = $resolverName;
  }
  /**
   * @return string
   */
  public function getResolverName()
  {
    return $this->resolverName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocketAddress::class, 'Google_Service_TrafficDirectorService_SocketAddress');
