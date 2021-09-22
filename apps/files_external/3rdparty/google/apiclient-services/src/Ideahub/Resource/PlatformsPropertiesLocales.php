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

namespace Google\Service\Ideahub\Resource;

use Google\Service\Ideahub\GoogleSearchIdeahubV1betaListAvailableLocalesResponse;

/**
 * The "locales" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ideahubService = new Google\Service\Ideahub(...);
 *   $locales = $ideahubService->locales;
 *  </code>
 */
class PlatformsPropertiesLocales extends \Google\Service\Resource
{
  /**
   * Returns which locales ideas are available in for a given Creator.
   * (locales.listPlatformsPropertiesLocales)
   *
   * @param string $parent Required. The web property to check idea availability
   * for Format: platforms/{platform}/property/{property}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of locales to return. The service
   * may return fewer than this value. If unspecified, at most 100 locales will be
   * returned. The maximum value is 100; values above 100 will be coerced to 100.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAvailableLocales` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListAvailableLocales` must
   * match the call that provided the page token.
   * @return GoogleSearchIdeahubV1betaListAvailableLocalesResponse
   */
  public function listPlatformsPropertiesLocales($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleSearchIdeahubV1betaListAvailableLocalesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlatformsPropertiesLocales::class, 'Google_Service_Ideahub_Resource_PlatformsPropertiesLocales');
