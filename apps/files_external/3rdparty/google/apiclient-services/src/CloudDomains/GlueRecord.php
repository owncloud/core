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

namespace Google\Service\CloudDomains;

class GlueRecord extends \Google\Collection
{
  protected $collection_key = 'ipv6Addresses';
  /**
   * @var string
   */
  public $hostName;
  /**
   * @var string[]
   */
  public $ipv4Addresses;
  /**
   * @var string[]
   */
  public $ipv6Addresses;

  /**
   * @param string
   */
  public function setHostName($hostName)
  {
    $this->hostName = $hostName;
  }
  /**
   * @return string
   */
  public function getHostName()
  {
    return $this->hostName;
  }
  /**
   * @param string[]
   */
  public function setIpv4Addresses($ipv4Addresses)
  {
    $this->ipv4Addresses = $ipv4Addresses;
  }
  /**
   * @return string[]
   */
  public function getIpv4Addresses()
  {
    return $this->ipv4Addresses;
  }
  /**
   * @param string[]
   */
  public function setIpv6Addresses($ipv6Addresses)
  {
    $this->ipv6Addresses = $ipv6Addresses;
  }
  /**
   * @return string[]
   */
  public function getIpv6Addresses()
  {
    return $this->ipv6Addresses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GlueRecord::class, 'Google_Service_CloudDomains_GlueRecord');
