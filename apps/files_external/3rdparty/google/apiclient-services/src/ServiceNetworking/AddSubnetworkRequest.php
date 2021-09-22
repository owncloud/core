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

namespace Google\Service\ServiceNetworking;

class AddSubnetworkRequest extends \Google\Collection
{
  protected $collection_key = 'subnetworkUsers';
  public $consumer;
  public $consumerNetwork;
  public $description;
  public $ipPrefixLength;
  public $privateIpv6GoogleAccess;
  public $region;
  public $requestedAddress;
  public $requestedRanges;
  protected $secondaryIpRangeSpecsType = SecondaryIpRangeSpec::class;
  protected $secondaryIpRangeSpecsDataType = 'array';
  public $subnetwork;
  public $subnetworkUsers;

  public function setConsumer($consumer)
  {
    $this->consumer = $consumer;
  }
  public function getConsumer()
  {
    return $this->consumer;
  }
  public function setConsumerNetwork($consumerNetwork)
  {
    $this->consumerNetwork = $consumerNetwork;
  }
  public function getConsumerNetwork()
  {
    return $this->consumerNetwork;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setIpPrefixLength($ipPrefixLength)
  {
    $this->ipPrefixLength = $ipPrefixLength;
  }
  public function getIpPrefixLength()
  {
    return $this->ipPrefixLength;
  }
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setRequestedAddress($requestedAddress)
  {
    $this->requestedAddress = $requestedAddress;
  }
  public function getRequestedAddress()
  {
    return $this->requestedAddress;
  }
  public function setRequestedRanges($requestedRanges)
  {
    $this->requestedRanges = $requestedRanges;
  }
  public function getRequestedRanges()
  {
    return $this->requestedRanges;
  }
  /**
   * @param SecondaryIpRangeSpec[]
   */
  public function setSecondaryIpRangeSpecs($secondaryIpRangeSpecs)
  {
    $this->secondaryIpRangeSpecs = $secondaryIpRangeSpecs;
  }
  /**
   * @return SecondaryIpRangeSpec[]
   */
  public function getSecondaryIpRangeSpecs()
  {
    return $this->secondaryIpRangeSpecs;
  }
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  public function setSubnetworkUsers($subnetworkUsers)
  {
    $this->subnetworkUsers = $subnetworkUsers;
  }
  public function getSubnetworkUsers()
  {
    return $this->subnetworkUsers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddSubnetworkRequest::class, 'Google_Service_ServiceNetworking_AddSubnetworkRequest');
