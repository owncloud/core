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

class UsableSubnetwork extends \Google\Collection
{
  protected $collection_key = 'secondaryIpRanges';
  /**
   * @var string
   */
  public $externalIpv6Prefix;
  /**
   * @var string
   */
  public $internalIpv6Prefix;
  /**
   * @var string
   */
  public $ipCidrRange;
  /**
   * @var string
   */
  public $ipv6AccessType;
  /**
   * @var string
   */
  public $network;
  /**
   * @var string
   */
  public $purpose;
  /**
   * @var string
   */
  public $role;
  protected $secondaryIpRangesType = UsableSubnetworkSecondaryRange::class;
  protected $secondaryIpRangesDataType = 'array';
  /**
   * @var string
   */
  public $stackType;
  /**
   * @var string
   */
  public $subnetwork;

  /**
   * @param string
   */
  public function setExternalIpv6Prefix($externalIpv6Prefix)
  {
    $this->externalIpv6Prefix = $externalIpv6Prefix;
  }
  /**
   * @return string
   */
  public function getExternalIpv6Prefix()
  {
    return $this->externalIpv6Prefix;
  }
  /**
   * @param string
   */
  public function setInternalIpv6Prefix($internalIpv6Prefix)
  {
    $this->internalIpv6Prefix = $internalIpv6Prefix;
  }
  /**
   * @return string
   */
  public function getInternalIpv6Prefix()
  {
    return $this->internalIpv6Prefix;
  }
  /**
   * @param string
   */
  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  /**
   * @return string
   */
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  /**
   * @param string
   */
  public function setIpv6AccessType($ipv6AccessType)
  {
    $this->ipv6AccessType = $ipv6AccessType;
  }
  /**
   * @return string
   */
  public function getIpv6AccessType()
  {
    return $this->ipv6AccessType;
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
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param UsableSubnetworkSecondaryRange[]
   */
  public function setSecondaryIpRanges($secondaryIpRanges)
  {
    $this->secondaryIpRanges = $secondaryIpRanges;
  }
  /**
   * @return UsableSubnetworkSecondaryRange[]
   */
  public function getSecondaryIpRanges()
  {
    return $this->secondaryIpRanges;
  }
  /**
   * @param string
   */
  public function setStackType($stackType)
  {
    $this->stackType = $stackType;
  }
  /**
   * @return string
   */
  public function getStackType()
  {
    return $this->stackType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsableSubnetwork::class, 'Google_Service_Compute_UsableSubnetwork');
