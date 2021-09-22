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

namespace Google\Service\AdExperienceReport\Resource;

use Google\Service\AdExperienceReport\ViolatingSitesResponse;

/**
 * The "violatingSites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexperiencereportService = new Google\Service\AdExperienceReport(...);
 *   $violatingSites = $adexperiencereportService->violatingSites;
 *  </code>
 */
class ViolatingSites extends \Google\Service\Resource
{
  /**
   * Lists sites that are failing in the Ad Experience Report on at least one
   * platform. (violatingSites.listViolatingSites)
   *
   * @param array $optParams Optional parameters.
   * @return ViolatingSitesResponse
   */
  public function listViolatingSites($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ViolatingSitesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ViolatingSites::class, 'Google_Service_AdExperienceReport_Resource_ViolatingSites');
