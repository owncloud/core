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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\TiersListResponse;

/**
 * The "tiers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $tiers = $sqladminService->tiers;
 *  </code>
 */
class Tiers extends \Google\Service\Resource
{
  /**
   * Lists all available machine types (tiers) for Cloud SQL, for example, `db-
   * custom-1-3840`. For more information, see
   * https://cloud.google.com/sql/pricing. (tiers.listTiers)
   *
   * @param string $project Project ID of the project for which to list tiers.
   * @param array $optParams Optional parameters.
   * @return TiersListResponse
   */
  public function listTiers($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TiersListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tiers::class, 'Google_Service_SQLAdmin_Resource_Tiers');
