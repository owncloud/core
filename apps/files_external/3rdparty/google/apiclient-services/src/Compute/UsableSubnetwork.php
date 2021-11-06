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
  public $ipCidrRange;
  public $network;
  protected $secondaryIpRangesType = UsableSubnetworkSecondaryRange::class;
  protected $secondaryIpRangesDataType = 'array';
  public $subnetwork;

  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
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
  public function setSubnetwork($subnetwork)
  {
    $this->subnetwork = $subnetwork;
  }
  public function getSubnetwork()
  {
    return $this->subnetwork;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsableSubnetwork::class, 'Google_Service_Compute_UsableSubnetwork');
