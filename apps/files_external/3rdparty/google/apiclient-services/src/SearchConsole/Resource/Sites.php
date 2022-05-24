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

namespace Google\Service\SearchConsole\Resource;

use Google\Service\SearchConsole\SitesListResponse;
use Google\Service\SearchConsole\WmxSite;

/**
 * The "sites" collection of methods.
 * Typical usage is:
 *  <code>
 *   $searchconsoleService = new Google\Service\SearchConsole(...);
 *   $sites = $searchconsoleService->sites;
 *  </code>
 */
class Sites extends \Google\Service\Resource
{
  /**
   * Adds a site to the set of the user's sites in Search Console. (sites.add)
   *
   * @param string $siteUrl The URL of the site to add.
   * @param array $optParams Optional parameters.
   */
  public function add($siteUrl, $optParams = [])
  {
    $params = ['siteUrl' => $siteUrl];
    $params = array_merge($params, $optParams);
    return $this->call('add', [$params]);
  }
  /**
   * Removes a site from the set of the user's Search Console sites.
   * (sites.delete)
   *
   * @param string $siteUrl The URI of the property as defined in Search Console.
   * **Examples:** `http://www.example.com/` or `sc-domain:example.com`.
   * @param array $optParams Optional parameters.
   */
  public function delete($siteUrl, $optParams = [])
  {
    $params = ['siteUrl' => $siteUrl];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves information about specific site. (sites.get)
   *
   * @param string $siteUrl The URI of the property as defined in Search Console.
   * **Examples:** `http://www.example.com/` or `sc-domain:example.com`.
   * @param array $optParams Optional parameters.
   * @return WmxSite
   */
  public function get($siteUrl, $optParams = [])
  {
    $params = ['siteUrl' => $siteUrl];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WmxSite::class);
  }
  /**
   * Lists the user's Search Console sites. (sites.listSites)
   *
   * @param array $optParams Optional parameters.
   * @return SitesListResponse
   */
  public function listSites($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SitesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Sites::class, 'Google_Service_SearchConsole_Resource_Sites');
