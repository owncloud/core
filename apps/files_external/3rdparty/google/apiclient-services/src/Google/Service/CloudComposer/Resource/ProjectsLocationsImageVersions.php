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
 * The "imageVersions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $composerService = new Google_Service_CloudComposer(...);
 *   $imageVersions = $composerService->imageVersions;
 *  </code>
 */
class Google_Service_CloudComposer_Resource_ProjectsLocationsImageVersions extends Google_Service_Resource
{
  /**
   * List ImageVersions for provided location.
   * (imageVersions.listProjectsLocationsImageVersions)
   *
   * @param string $parent List ImageVersions in the given project and location,
   * in the form: "projects/{projectId}/locations/{locationId}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includePastReleases Whether or not image versions from old
   * releases should be included.
   * @opt_param int pageSize The maximum number of image_versions to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return Google_Service_CloudComposer_ListImageVersionsResponse
   */
  public function listProjectsLocationsImageVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudComposer_ListImageVersionsResponse");
  }
}
