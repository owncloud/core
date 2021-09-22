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

class Subnetwork extends \Google\Collection
{
  protected $collection_key = 'secondaryIpRanges';
  public $ipCidrRange;
  public $name;
  public $network;
  public $outsideAllocation;
  public $region;
  protected $secondaryIpRangesType = SecondaryIpRange::class;
  protected $secondaryIpRangesDataType = 'array';

  public function setIpCidrRange($ipCidrRange)
  {
    $this->ipCidrRange = $ipCidrRange;
  }
  public function getIpCidrRange()
  {
    return $this->ipCidrRange;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
  public function setOutsideAllocation($outsideAllocation)
  {
    $this->outsideAllocation = $outsideAllocation;
  }
  public function getOutsideAllocation()
  {
    return $this->outsideAllocation;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param SecondaryIpRange[]
   */
  public function setSecondaryIpRanges($secondaryIpRanges)
  {
    $this->secondaryIpRanges = $secondaryIpRanges;
  }
  /**
   * @return SecondaryIpRange[]
   */
  public function getSecondaryIpRanges()
  {
    return $this->secondaryIpRanges;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subnetwork::class, 'Google_Service_ServiceNetworking_Subnetwork');
