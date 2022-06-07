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
  /**
   * @var bool
   */
  public $checkServiceNetworkingUsePermission;
  /**
   * @var string
   */
  public $computeIdempotencyWindow;
  /**
   * @var string
   */
  public $consumer;
  /**
   * @var string
   */
  public $consumerNetwork;
  /**
   * @var string
   */
  public $description;
  /**
   * @var int
   */
  public $ipPrefixLength;
  /**
   * @var string
   */
  public $outsideAllocationPublicIpRange;
  /**
   * @var string
   */
  public $privateIpv6GoogleAccess;
  /**
   * @var string
   */
  public $purpose;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $requestedAddress;
  /**
   * @var string[]
   */
  public $requestedRanges;
  protected $secondaryIpRangeSpecsType = SecondaryIpRangeSpec::class;
  protected $secondaryIpRangeSpecsDataType = 'array';
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string[]
   */
  public $subnetworkUsers;
  /**
   * @var bool
   */
  public $useCustomComputeIdempotencyWindow;

  /**
   * @param bool
   */
  public function setCheckServiceNetworkingUsePermission($checkServiceNetworkingUsePermission)
  {
    $this->checkServiceNetworkingUsePermission = $checkServiceNetworkingUsePermission;
  }
  /**
   * @return bool
   */
  public function getCheckServiceNetworkingUsePermission()
  {
    return $this->checkServiceNetworkingUsePermission;
  }
  /**
   * @param string
   */
  public function setComputeIdempotencyWindow($computeIdempotencyWindow)
  {
    $this->computeIdempotencyWindow = $computeIdempotencyWindow;
  }
  /**
   * @return string
   */
  public function getComputeIdempotencyWindow()
  {
    return $this->computeIdempotencyWindow;
  }
  /**
   * @param string
   */
  public function setConsumer($consumer)
  {
    $this->consumer = $consumer;
  }
  /**
   * @return string
   */
  public function getConsumer()
  {
    return $this->consumer;
  }
  /**
   * @param string
   */
  public function setConsumerNetwork($consumerNetwork)
  {
    $this->consumerNetwork = $consumerNetwork;
  }
  /**
   * @return string
   */
  public function getConsumerNetwork()
  {
    return $this->consumerNetwork;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param int
   */
  public function setIpPrefixLength($ipPrefixLength)
  {
    $this->ipPrefixLength = $ipPrefixLength;
  }
  /**
   * @return int
   */
  public function getIpPrefixLength()
  {
    return $this->ipPrefixLength;
  }
  /**
   * @param string
   */
  public function setOutsideAllocationPublicIpRange($outsideAllocationPublicIpRange)
  {
    $this->outsideAllocationPublicIpRange = $outsideAllocationPublicIpRange;
  }
  /**
   * @return string
   */
  public function getOutsideAllocationPublicIpRange()
  {
    return $this->outsideAllocationPublicIpRange;
  }
  /**
   * @param string
   */
  public function setPrivateIpv6GoogleAccess($privateIpv6GoogleAccess)
  {
    $this->privateIpv6GoogleAccess = $privateIpv6GoogleAccess;
  }
  /**
   * @return string
   */
  public function getPrivateIpv6GoogleAccess()
  {
    return $this->privateIpv6GoogleAccess;
  }
  /**
   * @param string
   */
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  /**
   * @return string
   */
  public function getPurpose()
  {
    return $this->purpose;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setRequestedAddress($requestedAddress)
  {
    $this->requestedAddress = $requestedAddress;
  }
  /**
   * @return string
   */
  public function getRequestedAddress()
  {
    return $this->requestedAddress;
  }
  /**
   * @param string[]
   */
  public function setRequestedRanges($requestedRanges)
  {
    $this->requestedRanges = $requestedRanges;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  /**
   * @return string
   */
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
  /**
   * @param string[]
   */
  public function setSubnetworkUsers($subnetworkUsers)
  {
    $this->subnetworkUsers = $subnetworkUsers;
  }
  /**
   * @return string[]
   */
  public function getSubnetworkUsers()
  {
    return $this->subnetworkUsers;
  }
  /**
   * @param bool
   */
  public function setUseCustomComputeIdempotencyWindow($useCustomComputeIdempotencyWindow)
  {
    $this->useCustomComputeIdempotencyWindow = $useCustomComputeIdempotencyWindow;
  }
  /**
   * @return bool
   */
  public function getUseCustomComputeIdempotencyWindow()
  {
    return $this->useCustomComputeIdempotencyWindow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddSubnetworkRequest::class, 'Google_Service_ServiceNetworking_AddSubnetworkRequest');
