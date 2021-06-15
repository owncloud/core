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

/**
 * The "locales" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ideahubService = new Google_Service_Ideahub(...);
 *   $locales = $ideahubService->locales;
 *  </code>
 */
class Google_Service_Ideahub_Resource_PlatformsPropertiesLocales extends Google_Service_Resource
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
   * @return Google_Service_Ideahub_GoogleSearchIdeahubV1alphaListAvailableLocalesResponse
   */
  public function listPlatformsPropertiesLocales($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Ideahub_GoogleSearchIdeahubV1alphaListAvailableLocalesResponse");
  }
}
