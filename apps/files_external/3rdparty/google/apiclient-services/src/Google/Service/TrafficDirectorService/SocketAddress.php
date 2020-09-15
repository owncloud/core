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

class Google_Service_TrafficDirectorService_SocketAddress extends Google_Model
{
  public $address;
  public $ipv4Compat;
  public $namedPort;
  public $portValue;
  public $protocol;
  public $resolverName;

  public function setAddress($address)
  {
    $this->address = $address;
  }
  public function getAddress()
  {
    return $this->address;
  }
  public function setIpv4Compat($ipv4Compat)
  {
    $this->ipv4Compat = $ipv4Compat;
  }
  public function getIpv4Compat()
  {
    return $this->ipv4Compat;
  }
  public function setNamedPort($namedPort)
  {
    $this->namedPort = $namedPort;
  }
  public function getNamedPort()
  {
    return $this->namedPort;
  }
  public function setPortValue($portValue)
  {
    $this->portValue = $portValue;
  }
  public function getPortValue()
  {
    return $this->portValue;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  public function setResolverName($resolverName)
  {
    $this->resolverName = $resolverName;
  }
  public function getResolverName()
  {
    return $this->resolverName;
  }
}
