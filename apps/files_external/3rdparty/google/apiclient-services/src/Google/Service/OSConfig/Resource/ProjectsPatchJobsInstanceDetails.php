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
 * The "instanceDetails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google_Service_OSConfig(...);
 *   $instanceDetails = $osconfigService->instanceDetails;
 *  </code>
 */
class Google_Service_OSConfig_Resource_ProjectsPatchJobsInstanceDetails extends Google_Service_Resource
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
   * @return Google_Service_OSConfig_ListPatchJobInstanceDetailsResponse
   */
  public function listProjectsPatchJobsInstanceDetails($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_OSConfig_ListPatchJobInstanceDetailsResponse");
  }
}
