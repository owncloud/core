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

class GoogleCloudServicenetworkingV1betaSubnetwork extends \Google\Model
{
  /**
   * @var string
   */
  public $ipCidrRange;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $network;
  /**
   * @var bool
   */
  public $outsideAllocation;

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
   * @param bool
   */
  public function setOutsideAllocation($outsideAllocation)
  {
    $this->outsideAllocation = $outsideAllocation;
  }
  /**
   * @return bool
   */
  public function getOutsideAllocation()
  {
    return $this->outsideAllocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudServicenetworkingV1betaSubnetwork::class, 'Google_Service_ServiceNetworking_GoogleCloudServicenetworkingV1betaSubnetwork');
