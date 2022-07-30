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

namespace Google\Service\CloudFunctions\Resource;

use Google\Service\CloudFunctions\ListRuntimesResponse;

/**
 * The "runtimes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudfunctionsService = new Google\Service\CloudFunctions(...);
 *   $runtimes = $cloudfunctionsService->runtimes;
 *  </code>
 */
class ProjectsLocationsRuntimes extends \Google\Service\Resource
{
  /**
   * Returns a list of runtimes that are supported for the requested project.
   * (runtimes.listProjectsLocationsRuntimes)
   *
   * @param string $parent Required. The project and location from which the
   * runtimes should be listed, specified in the format `projects/locations`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter for Runtimes that match the filter
   * expression, following the syntax outlined in https://google.aip.dev/160.
   * @return ListRuntimesResponse
   */
  public function listProjectsLocationsRuntimes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRuntimesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRuntimes::class, 'Google_Service_CloudFunctions_Resource_ProjectsLocationsRuntimes');
