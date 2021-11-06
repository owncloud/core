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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\I18nRegionListResponse;

/**
 * The "i18nRegions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $i18nRegions = $youtubeService->i18nRegions;
 *  </code>
 */
class I18nRegions extends \Google\Service\Resource
{
  /**
   * Retrieves a list of resources, possibly filtered.
   * (i18nRegions.listI18nRegions)
   *
   * @param string|array $part The *part* parameter specifies the i18nRegion
   * resource properties that the API response will include. Set the parameter
   * value to snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl
   * @return I18nRegionListResponse
   */
  public function listI18nRegions($part, $optParams = [])
  {
    $params = ['part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], I18nRegionListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(I18nRegions::class, 'Google_Service_YouTube_Resource_I18nRegions');
