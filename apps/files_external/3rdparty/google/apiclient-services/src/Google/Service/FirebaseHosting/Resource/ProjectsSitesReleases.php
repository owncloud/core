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
 * The "releases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasehostingService = new Google_Service_FirebaseHosting(...);
 *   $releases = $firebasehostingService->releases;
 *  </code>
 */
class Google_Service_FirebaseHosting_Resource_ProjectsSitesReleases extends Google_Service_Resource
{
  /**
   * Creates a new release which makes the content of the specified version
   * actively display on the appropriate URL(s). (releases.create)
   *
   * @param string $parent Required. The site that the release belongs to, in the
   * format: sites/site-name
   * @param Google_Service_FirebaseHosting_Release $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string versionName The unique identifier for a version, in the
   * format: /sites/site-name/versions/versionID The site-name in this version
   * identifier must match the site-name in the `parent` parameter.
   *
   * This query parameter must be empty if the `type` field in the request body is
   * `SITE_DISABLE`.
   * @return Google_Service_FirebaseHosting_Release
   */
  public function create($parent, Google_Service_FirebaseHosting_Release $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseHosting_Release");
  }
  /**
   * Lists the releases that have been created on the specified site.
   * (releases.listProjectsSitesReleases)
   *
   * @param string $parent Required. The parent for which to list files, in the
   * format: sites/site-name
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The page size to return. Defaults to 100.
   * @opt_param string pageToken The next_page_token from a previous request, if
   * provided.
   * @return Google_Service_FirebaseHosting_ListReleasesResponse
   */
  public function listProjectsSitesReleases($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseHosting_ListReleasesResponse");
  }
}
