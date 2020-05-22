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
 *   $firebasehostingService = new Google_Service_FirebaseHosting(...);
 *   $sites = $firebasehostingService->sites;
 *  </code>
 */
class Google_Service_FirebaseHosting_Resource_ProjectsSites extends Google_Service_Resource
{
  /**
   * Gets the Hosting metadata for a specific site. (sites.getConfig)
   *
   * @param string $name Required. The site for which to get the SiteConfig, in
   * the format: sites/site-name/config
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_SiteConfig
   */
  public function getConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_FirebaseHosting_SiteConfig");
  }
  /**
   * Sets the Hosting metadata for a specific site. (sites.updateConfig)
   *
   * @param string $name Required. The site for which to update the SiteConfig, in
   * the format: sites/site-name/config
   * @param Google_Service_FirebaseHosting_SiteConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A set of field names from your [site
   * configuration](../sites.SiteConfig) that you want to update. A field will be
   * overwritten if, and only if, it's in the mask. If a mask is not provided then
   * a default mask of only [`max_versions`](../sites.SiteConfig.max_versions)
   * will be used.
   * @return Google_Service_FirebaseHosting_SiteConfig
   */
  public function updateConfig($name, Google_Service_FirebaseHosting_SiteConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', array($params), "Google_Service_FirebaseHosting_SiteConfig");
  }
}
