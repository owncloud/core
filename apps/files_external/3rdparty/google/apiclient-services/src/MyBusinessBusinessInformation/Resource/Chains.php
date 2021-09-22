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

namespace Google\Service\MyBusinessBusinessInformation\Resource;

use Google\Service\MyBusinessBusinessInformation\Chain;
use Google\Service\MyBusinessBusinessInformation\SearchChainsResponse;

/**
 * The "chains" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $chains = $mybusinessbusinessinformationService->chains;
 *  </code>
 */
class Chains extends \Google\Service\Resource
{
  /**
   * Gets the specified chain. Returns `NOT_FOUND` if the chain does not exist.
   * (chains.get)
   *
   * @param string $name Required. The chain's resource name, in the format
   * `chains/{chain_place_id}`.
   * @param array $optParams Optional parameters.
   * @return Chain
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Chain::class);
  }
  /**
   * Searches the chain based on chain name. (chains.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string chainName Required. Search for a chain by its name.
   * Exact/partial/fuzzy/related queries are supported. Examples: "walmart", "wal-
   * mart", "walmmmart", "沃尔玛"
   * @opt_param int pageSize The maximum number of matched chains to return from
   * this query. The default is 10. The maximum possible value is 500.
   * @return SearchChainsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchChainsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Chains::class, 'Google_Service_MyBusinessBusinessInformation_Resource_Chains');
