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

class RouterBgp extends \Google\Collection
{
  protected $collection_key = 'advertisedIpRanges';
  /**
   * @var string
   */
  public $advertiseMode;
  /**
   * @var string[]
   */
  public $advertisedGroups;
  protected $advertisedIpRangesType = RouterAdvertisedIpRange::class;
  protected $advertisedIpRangesDataType = 'array';
  /**
   * @var string
   */
  public $asn;
  /**
   * @var string
   */
  public $keepaliveInterval;

  /**
   * @param string
   */
  public function setAdvertiseMode($advertiseMode)
  {
    $this->advertiseMode = $advertiseMode;
  }
  /**
   * @return string
   */
  public function getAdvertiseMode()
  {
    return $this->advertiseMode;
  }
  /**
   * @param string[]
   */
  public function setAdvertisedGroups($advertisedGroups)
  {
    $this->advertisedGroups = $advertisedGroups;
  }
  /**
   * @return string[]
   */
  public function getAdvertisedGroups()
  {
    return $this->advertisedGroups;
  }
  /**
   * @param RouterAdvertisedIpRange[]
   */
  public function setAdvertisedIpRanges($advertisedIpRanges)
  {
    $this->advertisedIpRanges = $advertisedIpRanges;
  }
  /**
   * @return RouterAdvertisedIpRange[]
   */
  public function getAdvertisedIpRanges()
  {
    return $this->advertisedIpRanges;
  }
  /**
   * @param string
   */
  public function setAsn($asn)
  {
    $this->asn = $asn;
  }
  /**
   * @return string
   */
  public function getAsn()
  {
    return $this->asn;
  }
  /**
   * @param string
   */
  public function setKeepaliveInterval($keepaliveInterval)
  {
    $this->keepaliveInterval = $keepaliveInterval;
  }
  /**
   * @return string
   */
  public function getKeepaliveInterval()
  {
    return $this->keepaliveInterval;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterBgp::class, 'Google_Service_Compute_RouterBgp');
