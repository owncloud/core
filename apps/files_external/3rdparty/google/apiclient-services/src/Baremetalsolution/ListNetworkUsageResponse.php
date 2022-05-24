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

namespace Google\Service\Baremetalsolution;

class ListNetworkUsageResponse extends \Google\Collection
{
  protected $collection_key = 'networks';
  protected $networksType = NetworkUsage::class;
  protected $networksDataType = 'array';

  /**
   * @param NetworkUsage[]
   */
  public function setNetworks($networks)
  {
    $this->networks = $networks;
  }
  /**
   * @return NetworkUsage[]
   */
  public function getNetworks()
  {
    return $this->networks;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListNetworkUsageResponse::class, 'Google_Service_Baremetalsolution_ListNetworkUsageResponse');
