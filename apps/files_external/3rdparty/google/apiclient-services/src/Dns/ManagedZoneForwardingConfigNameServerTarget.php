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

namespace Google\Service\Dns;

class ManagedZoneForwardingConfigNameServerTarget extends \Google\Model
{
  /**
   * @var string
   */
  public $forwardingPath;
  /**
   * @var string
   */
  public $ipv4Address;
  /**
   * @var string
   */
  public $kind;

  /**
   * @param string
   */
  public function setForwardingPath($forwardingPath)
  {
    $this->forwardingPath = $forwardingPath;
  }
  /**
   * @return string
   */
  public function getForwardingPath()
  {
    return $this->forwardingPath;
  }
  /**
   * @param string
   */
  public function setIpv4Address($ipv4Address)
  {
    $this->ipv4Address = $ipv4Address;
  }
  /**
   * @return string
   */
  public function getIpv4Address()
  {
    return $this->ipv4Address;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZoneForwardingConfigNameServerTarget::class, 'Google_Service_Dns_ManagedZoneForwardingConfigNameServerTarget');
