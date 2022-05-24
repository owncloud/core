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

class FirewallDenied extends \Google\Collection
{
  protected $collection_key = 'ports';
  protected $internal_gapi_mappings = [
        "iPProtocol" => "IPProtocol",
  ];
  /**
   * @var string
   */
  public $iPProtocol;
  /**
   * @var string[]
   */
  public $ports;

  /**
   * @param string
   */
  public function setIPProtocol($iPProtocol)
  {
    $this->iPProtocol = $iPProtocol;
  }
  /**
   * @return string
   */
  public function getIPProtocol()
  {
    return $this->iPProtocol;
  }
  /**
   * @param string[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return string[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallDenied::class, 'Google_Service_Compute_FirewallDenied');
