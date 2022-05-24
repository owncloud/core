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

namespace Google\Service\OSConfig\Resource;

use Google\Service\OSConfig\ListPatchJobInstanceDetailsResponse;

/**
 * The "instanceDetails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $instanceDetails = $osconfigService->instanceDetails;
 *  </code>
 */
class ProjectsPatchJobsInstanceDetails extends \Google\Service\Resource
{
  /**
   * Get a list of instance details for a given patch job.
   * (instanceDetails.listProjectsPatchJobsInstanceDetails)
   *
   * @param string $parent Required. The parent for the instances are in the form
   * of `projects/patchJobs`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters results listed in
   * the response. This field supports filtering results by instance zone, name,
   * state, or `failure_reason`.
   * @opt_param int pageSize The maximum number of instance details records to
   * return. Default is 100.
   * @opt_param string pageToken A pagination token returned from a previous call
   * that indicates where this listing should continue from.
   * @return ListPatchJobInstanceDetailsResponse
   */
  public function listProjectsPatchJobsInstanceDetails($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPatchJobInstanceDetailsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsPatchJobsInstanceDetails::class, 'Google_Service_OSConfig_Resource_ProjectsPatchJobsInstanceDetails');
