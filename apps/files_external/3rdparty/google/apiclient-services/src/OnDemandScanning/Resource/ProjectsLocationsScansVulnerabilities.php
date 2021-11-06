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

namespace Google\Service\OnDemandScanning\Resource;

use Google\Service\OnDemandScanning\ListVulnerabilitiesResponseV1;

/**
 * The "vulnerabilities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $ondemandscanningService = new Google\Service\OnDemandScanning(...);
 *   $vulnerabilities = $ondemandscanningService->vulnerabilities;
 *  </code>
 */
class ProjectsLocationsScansVulnerabilities extends \Google\Service\Resource
{
  /**
   * Lists vulnerabilities resulting from a successfully completed scan.
   * (vulnerabilities.listProjectsLocationsScansVulnerabilities)
   *
   * @param string $parent Required. The parent of the collection of
   * Vulnerabilities being requested. Format:
   * projects/[project_name]/locations/[location]/scans/[scan_id]
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The number of vulnerabilities to retrieve.
   * @opt_param string pageToken The page token, resulting from a previous call to
   * ListVulnerabilities.
   * @return ListVulnerabilitiesResponseV1
   */
  public function listProjectsLocationsScansVulnerabilities($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVulnerabilitiesResponseV1::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsScansVulnerabilities::class, 'Google_Service_OnDemandScanning_Resource_ProjectsLocationsScansVulnerabilities');
