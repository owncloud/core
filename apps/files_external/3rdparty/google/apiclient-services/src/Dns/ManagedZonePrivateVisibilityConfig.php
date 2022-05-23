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

class ManagedZonePrivateVisibilityConfig extends \Google\Collection
{
  protected $collection_key = 'networks';
  /**
   * @var string
   */
  public $kind;
  protected $networksType = ManagedZonePrivateVisibilityConfigNetwork::class;
  protected $networksDataType = 'array';

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
  /**
   * @param ManagedZonePrivateVisibilityConfigNetwork[]
   */
  public function setNetworks($networks)
  {
    $this->networks = $networks;
  }
  /**
   * @return ManagedZonePrivateVisibilityConfigNetwork[]
   */
  public function getNetworks()
  {
    return $this->networks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedZonePrivateVisibilityConfig::class, 'Google_Service_Dns_ManagedZonePrivateVisibilityConfig');
