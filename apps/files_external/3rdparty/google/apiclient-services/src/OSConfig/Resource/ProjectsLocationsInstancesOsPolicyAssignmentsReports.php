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

use Google\Service\OSConfig\ListOSPolicyAssignmentReportsResponse;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $reports = $osconfigService->reports;
 *  </code>
 */
class ProjectsLocationsInstancesOsPolicyAssignmentsReports extends \Google\Service\Resource
{
  /**
   * List OS policy asssignment reports for all Compute Engine VM instances in the
   * specified zone.
   * (reports.listProjectsLocationsInstancesOsPolicyAssignmentsReports)
   *
   * @param string $parent Required. The parent resource name. Format: `projects/{
   * project}/locations/{location}/instances/{instance}/osPolicyAssignments/{assig
   * nment}/reports` For `{project}`, either `project-number` or `project-id` can
   * be provided. For `{instance}`, either `instance-name`, `instance-id`, or `-`
   * can be provided. If '-' is provided, the response will include
   * OSPolicyAssignmentReports for all instances in the project/location. For
   * `{assignment}`, either `assignment-id` or `-` can be provided. If '-' is
   * provided, the response will include OSPolicyAssignmentReports for all
   * OSPolicyAssignments in the project/location. Either {instance} or
   * {assignment} must be `-`. For example: `projects/{project}/locations/{locatio
   * n}/instances/{instance}/osPolicyAssignments/-/reports` returns all reports
   * for the instance
   * `projects/{project}/locations/{location}/instances/-/osPolicyAssignments
   * /{assignment-id}/reports` returns all the reports for the given assignment
   * across all instances. `projects/{project}/locations/{location}/instances/-/os
   * PolicyAssignments/-/reports` returns all the reports for all assignments
   * across all instances.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by the `OSPolicyAssignmentReport` API resource that is included
   * in the response.
   * @opt_param int pageSize The maximum number of results to return.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to the `ListOSPolicyAssignmentReports` method that indicates where this
   * listing should continue from.
   * @return ListOSPolicyAssignmentReportsResponse
   */
  public function listProjectsLocationsInstancesOsPolicyAssignmentsReports($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOSPolicyAssignmentReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstancesOsPolicyAssignmentsReports::class, 'Google_Service_OSConfig_Resource_ProjectsLocationsInstancesOsPolicyAssignmentsReports');
