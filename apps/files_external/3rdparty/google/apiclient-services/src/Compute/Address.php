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

class Address extends \Google\Collection
{
  protected $collection_key = 'users';
  /**
   * @var string
   */
  public $address;
  /**
   * @var string
   */
  public $addressType;
  /**
   * @var string
   */
  public $creationTimestamp;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $ipVersion;
  /**
   * @var string
   */
  public $ipv6EndpointType;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $networkTier;
  /**
   * @var int
   */
  public $prefixLength;
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
  public $selfLink;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $subnetwork;
  /**
   * @var string[]
   */
  public $users;

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
   * @param string
   */
  public function setAddressType($addressType)
  {
    $this->addressType = $addressType;
  }
  /**
   * @return string
   */
  public function getAddressType()
  {
    return $this->addressType;
  }
  /**
   * @param string
   */
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  /**
   * @return string
   */
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
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
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setIpVersion($ipVersion)
  {
    $this->ipVersion = $ipVersion;
  }
  /**
   * @return string
   */
  public function getIpVersion()
  {
    return $this->ipVersion;
  }
  /**
   * @param string
   */
  public function setIpv6EndpointType($ipv6EndpointType)
  {
    $this->ipv6EndpointType = $ipv6EndpointType;
  }
  /**
   * @return string
   */
  public function getIpv6EndpointType()
  {
    return $this->ipv6EndpointType;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  /**
   * @return string
   */
  public function getNetwork()
  {
    return $this->network;
  }
  /**
   * @param string
   */
  public function setNetworkTier($networkTier)
  {
    $this->networkTier = $networkTier;
  }
  /**
   * @return string
   */
  public function getNetworkTier()
  {
    return $this->networkTier;
  }
  /**
   * @param int
   */
  public function setPrefixLength($prefixLength)
  {
    $this->prefixLength = $prefixLength;
  }
  /**
   * @return int
   */
  public function getPrefixLength()
  {
    return $this->prefixLength;
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
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
  public function setUsers($users)
  {
    $this->users = $users;
  }
  /**
   * @return string[]
   */
  public function getUsers()
  {
    return $this->users;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Address::class, 'Google_Service_Compute_Address');
