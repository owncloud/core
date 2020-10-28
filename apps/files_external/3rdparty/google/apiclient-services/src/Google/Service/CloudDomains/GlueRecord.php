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

class Google_Service_CloudDomains_GlueRecord extends Google_Collection
{
  protected $collection_key = 'ipv6Addresses';
  public $hostName;
  public $ipv4Addresses;
  public $ipv6Addresses;

  public function setHostName($hostName)
  {
    $this->hostName = $hostName;
  }
  public function getHostName()
  {
    return $this->hostName;
  }
  public function setIpv4Addresses($ipv4Addresses)
  {
    $this->ipv4Addresses = $ipv4Addresses;
  }
  public function getIpv4Addresses()
  {
    return $this->ipv4Addresses;
  }
  public function setIpv6Addresses($ipv6Addresses)
  {
    $this->ipv6Addresses = $ipv6Addresses;
  }
  public function getIpv6Addresses()
  {
    return $this->ipv6Addresses;
  }
}
