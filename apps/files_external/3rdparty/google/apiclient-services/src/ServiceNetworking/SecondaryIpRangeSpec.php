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

class SecondaryIpRangeSpec extends \Google\Model
{
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
  public $rangeName;
  /**
   * @var string
   */
  public $requestedAddress;

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
  public function setRangeName($rangeName)
  {
    $this->rangeName = $rangeName;
  }
  /**
   * @return string
   */
  public function getRangeName()
  {
    return $this->rangeName;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecondaryIpRangeSpec::class, 'Google_Service_ServiceNetworking_SecondaryIpRangeSpec');
