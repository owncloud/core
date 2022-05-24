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

namespace Google\Service\DataFusion\Resource;

use Google\Service\DataFusion\ListAvailableVersionsResponse;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datafusionService = new Google\Service\DataFusion(...);
 *   $versions = $datafusionService->versions;
 *  </code>
 */
class ProjectsLocationsVersions extends \Google\Service\Resource
{
  /**
   * Lists possible versions for Data Fusion instances in the specified project
   * and location. (versions.listProjectsLocationsVersions)
   *
   * @param string $parent Required. The project and location for which to
   * retrieve instance information in the format
   * projects/{project}/locations/{location}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool latestPatchOnly Whether or not to return the latest patch of
   * every available minor version. If true, only the latest patch will be
   * returned. Ex. if allowed versions is [6.1.1, 6.1.2, 6.2.0] then response will
   * be [6.1.2, 6.2.0]
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value to use if there are
   * additional results to retrieve for this list request.
   * @return ListAvailableVersionsResponse
   */
  public function listProjectsLocationsVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAvailableVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsVersions::class, 'Google_Service_DataFusion_Resource_ProjectsLocationsVersions');
