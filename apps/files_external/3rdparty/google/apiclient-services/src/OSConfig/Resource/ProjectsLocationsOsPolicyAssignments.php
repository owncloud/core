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

use Google\Service\OSConfig\ListOSPolicyAssignmentRevisionsResponse;
use Google\Service\OSConfig\ListOSPolicyAssignmentsResponse;
use Google\Service\OSConfig\OSPolicyAssignment;
use Google\Service\OSConfig\Operation;

/**
 * The "osPolicyAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $osPolicyAssignments = $osconfigService->osPolicyAssignments;
 *  </code>
 */
class ProjectsLocationsOsPolicyAssignments extends \Google\Service\Resource
{
  /**
   * Create an OS policy assignment. This method also creates the first revision
   * of the OS policy assignment. This method returns a long running operation
   * (LRO) that contains the rollout details. The rollout can be cancelled by
   * cancelling the LRO. For more information, see [Method: projects.locations.osP
   * olicyAssignments.operations.cancel](https://cloud.google.com/compute/docs/osc
   * onfig/rest/v1/projects.locations.osPolicyAssignments.operations/cancel).
   * (osPolicyAssignments.create)
   *
   * @param string $parent Required. The parent resource name in the form:
   * projects/{project}/locations/{location}
   * @param OSPolicyAssignment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string osPolicyAssignmentId Required. The logical name of the OS
   * policy assignment in the project with the following restrictions: * Must
   * contain only lowercase letters, numbers, and hyphens. * Must start with a
   * letter. * Must be between 1-63 characters. * Must end with a number or a
   * letter. * Must be unique within the project.
   * @return Operation
   */
  public function create($parent, OSPolicyAssignment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete the OS policy assignment. This method creates a new revision of the OS
   * policy assignment. This method returns a long running operation (LRO) that
   * contains the rollout details. The rollout can be cancelled by cancelling the
   * LRO. If the LRO completes and is not cancelled, all revisions associated with
   * the OS policy assignment are deleted. For more information, see [Method: proj
   * ects.locations.osPolicyAssignments.operations.cancel](https://cloud.google.co
   * m/compute/docs/osconfig/rest/v1/projects.locations.osPolicyAssignments.operat
   * ions/cancel). (osPolicyAssignments.delete)
   *
   * @param string $name Required. The name of the OS policy assignment to be
   * deleted
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieve an existing OS policy assignment. This method always returns the
   * latest revision. In order to retrieve a previous revision of the assignment,
   * also provide the revision ID in the `name` parameter.
   * (osPolicyAssignments.get)
   *
   * @param string $name Required. The resource name of OS policy assignment.
   * Format: `projects/{project}/locations/{location}/osPolicyAssignments/{os_poli
   * cy_assignment}@{revisionId}`
   * @param array $optParams Optional parameters.
   * @return OSPolicyAssignment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], OSPolicyAssignment::class);
  }
  /**
   * List the OS policy assignments under the parent resource. For each OS policy
   * assignment, the latest revision is returned.
   * (osPolicyAssignments.listProjectsLocationsOsPolicyAssignments)
   *
   * @param string $parent Required. The parent resource name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of assignments to return.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to `ListOSPolicyAssignments` that indicates where this listing should
   * continue from.
   * @return ListOSPolicyAssignmentsResponse
   */
  public function listProjectsLocationsOsPolicyAssignments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOSPolicyAssignmentsResponse::class);
  }
  /**
   * List the OS policy assignment revisions for a given OS policy assignment.
   * (osPolicyAssignments.listRevisions)
   *
   * @param string $name Required. The name of the OS policy assignment to list
   * revisions for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of revisions to return.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to `ListOSPolicyAssignmentRevisions` that indicates where this listing should
   * continue from.
   * @return ListOSPolicyAssignmentRevisionsResponse
   */
  public function listRevisions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('listRevisions', [$params], ListOSPolicyAssignmentRevisionsResponse::class);
  }
  /**
   * Update an existing OS policy assignment. This method creates a new revision
   * of the OS policy assignment. This method returns a long running operation
   * (LRO) that contains the rollout details. The rollout can be cancelled by
   * cancelling the LRO. For more information, see [Method: projects.locations.osP
   * olicyAssignments.operations.cancel](https://cloud.google.com/compute/docs/osc
   * onfig/rest/v1/projects.locations.osPolicyAssignments.operations/cancel).
   * (osPolicyAssignments.patch)
   *
   * @param string $name Resource name. Format: `projects/{project_number}/locatio
   * ns/{location}/osPolicyAssignments/{os_policy_assignment_id}` This field is
   * ignored when you create an OS policy assignment.
   * @param OSPolicyAssignment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask that controls which fields
   * of the assignment should be updated.
   * @return Operation
   */
  public function patch($name, OSPolicyAssignment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsOsPolicyAssignments::class, 'Google_Service_OSConfig_Resource_ProjectsLocationsOsPolicyAssignments');
