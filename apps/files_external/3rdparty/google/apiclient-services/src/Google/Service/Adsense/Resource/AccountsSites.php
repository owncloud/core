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
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_Adsense(...);
 *   $sites = $adsenseService->sites;
 *  </code>
 */
class Google_Service_Adsense_Resource_AccountsSites extends Google_Service_Resource
{
  /**
   * Gets information about the selected site. (sites.get)
   *
   * @param string $name Required. Name of the site. Format:
   * accounts/{account}/sites/{site}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Adsense_Site
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Adsense_Site");
  }
  /**
   * Lists all the sites available in an account. (sites.listAccountsSites)
   *
   * @param string $parent Required. The account which owns the collection of
   * sites. Format: accounts/{account}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of sites to include in the
   * response, used for paging. If unspecified, at most 10000 sites will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListSites` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSites` must match the call
   * that provided the page token.
   * @return Google_Service_Adsense_ListSitesResponse
   */
  public function listAccountsSites($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Adsense_ListSitesResponse");
  }
}
