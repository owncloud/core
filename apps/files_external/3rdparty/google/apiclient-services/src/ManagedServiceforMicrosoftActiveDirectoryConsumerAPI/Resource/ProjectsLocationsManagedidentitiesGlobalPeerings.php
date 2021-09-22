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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Resource;

use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\ListPeeringsResponse;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Operation;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Peering;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\Policy;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\SetIamPolicyRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\TestIamPermissionsRequest;
use Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI\TestIamPermissionsResponse;

/**
 * The "peerings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managedidentitiesService = new Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI(...);
 *   $peerings = $managedidentitiesService->peerings;
 *  </code>
 */
class ProjectsLocationsManagedidentitiesGlobalPeerings extends \Google\Service\Resource
{
  /**
   * Creates a Peering for Managed AD instance. (peerings.create)
   *
   * @param string $parent Required. Resource project name and location using the
   * form: `projects/{project_id}/locations/global`
   * @param Peering $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string peeringId Required. Peering Id, unique name to identify
   * peering.
   * @return Operation
   */
  public function create($parent, Peering $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes identified Peering. (peerings.delete)
   *
   * @param string $name Required. Peering resource name using the form:
   * `projects/{project_id}/locations/global/peerings/{peering_id}`
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
   * Gets details of a single Peering. (peerings.get)
   *
   * @param string $name Required. Peering resource name using the form:
   * `projects/{project_id}/locations/global/peerings/{peering_id}`
   * @param array $optParams Optional parameters.
   * @return Peering
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Peering::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (peerings.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists Peerings in a given project.
   * (peerings.listProjectsLocationsManagedidentitiesGlobalPeerings)
   *
   * @param string $parent Required. The resource name of the peering location
   * using the form: `projects/{project_id}/locations/global`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter specifying constraints of a list
   * operation. For example, `peering.authorized_network="projects/myprojectid/glo
   * bal/networks/mynetwork"`.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * not specified, a default value of 1000 will be used by the service.
   * Regardless of the page_size value, the response may include a partial list
   * and a caller should only rely on response's next_page_token to determine if
   * there are more instances left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @return ListPeeringsResponse
   */
  public function listProjectsLocationsManagedidentitiesGlobalPeerings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPeeringsResponse::class);
  }
  /**
   * Updates the labels for specified Peering. (peerings.patch)
   *
   * @param string $name Output only. Unique name of the peering in this scope
   * including projects and location using the form:
   * `projects/{project_id}/locations/global/peerings/{peering_id}`.
   * @param Peering $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. The elements of the repeated paths field
   * may only include these fields from Peering: * `labels`
   * @return Operation
   */
  public function patch($name, Peering $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (peerings.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (peerings.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsManagedidentitiesGlobalPeerings::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_Resource_ProjectsLocationsManagedidentitiesGlobalPeerings');
