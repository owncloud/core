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

use Google\Service\OSConfig\OSPolicyAssignmentReport;

/**
 * The "osPolicyAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $osPolicyAssignments = $osconfigService->osPolicyAssignments;
 *  </code>
 */
class ProjectsLocationsInstancesOsPolicyAssignments extends \Google\Service\Resource
{
  /**
   * Get the OS policy asssignment report for the specified Compute Engine VM
   * instance. (osPolicyAssignments.getReport)
   *
   * @param string $name Required. API resource name for OS policy assignment
   * report. Format: `/projects/{project}/locations/{location}/instances/{instance
   * }/osPolicyAssignments/{assignment}/report` For `{project}`, either `project-
   * number` or `project-id` can be provided. For `{instance_id}`, either Compute
   * Engine `instance-id` or `instance-name` can be provided. For
   * `{assignment_id}`, the OSPolicyAssignment id must be provided.
   * @param array $optParams Optional parameters.
   * @return OSPolicyAssignmentReport
   */
  public function getReport($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getReport', [$params], OSPolicyAssignmentReport::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstancesOsPolicyAssignments::class, 'Google_Service_OSConfig_Resource_ProjectsLocationsInstancesOsPolicyAssignments');
