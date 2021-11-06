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

namespace Google\Service\NetworkManagement\Resource;

use Google\Service\NetworkManagement\ConnectivityTest;
use Google\Service\NetworkManagement\ListConnectivityTestsResponse;
use Google\Service\NetworkManagement\Operation;
use Google\Service\NetworkManagement\Policy;
use Google\Service\NetworkManagement\RerunConnectivityTestRequest;
use Google\Service\NetworkManagement\SetIamPolicyRequest;
use Google\Service\NetworkManagement\TestIamPermissionsRequest;
use Google\Service\NetworkManagement\TestIamPermissionsResponse;

/**
 * The "connectivityTests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkmanagementService = new Google\Service\NetworkManagement(...);
 *   $connectivityTests = $networkmanagementService->connectivityTests;
 *  </code>
 */
class ProjectsLocationsNetworkmanagementGlobalConnectivityTests extends \Google\Service\Resource
{
  /**
   * Creates a new Connectivity Test. After you create a test, the reachability
   * analysis is performed as part of the long running operation, which completes
   * when the analysis completes. If the endpoint specifications in
   * `ConnectivityTest` are invalid (for example, containing non-existent
   * resources in the network, or you don't have read permissions to the network
   * configurations of listed projects), then the reachability result returns a
   * value of `UNKNOWN`. If the endpoint specifications in `ConnectivityTest` are
   * incomplete, the reachability result returns a value of AMBIGUOUS. For more
   * information, see the Connectivity Test documentation.
   * (connectivityTests.create)
   *
   * @param string $parent Required. The parent resource of the Connectivity Test
   * to create: `projects/{project_id}/locations/global`
   * @param ConnectivityTest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string testId Required. The logical name of the Connectivity Test
   * in your project with the following restrictions: * Must contain only
   * lowercase letters, numbers, and hyphens. * Must start with a letter. * Must
   * be between 1-40 characters. * Must end with a number or a letter. * Must be
   * unique within the customer project
   * @return Operation
   */
  public function create($parent, ConnectivityTest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a specific `ConnectivityTest`. (connectivityTests.delete)
   *
   * @param string $name Required. Connectivity Test resource name using the form:
   * `projects/{project_id}/locations/global/connectivityTests/{test_id}`
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
   * Gets the details of a specific Connectivity Test. (connectivityTests.get)
   *
   * @param string $name Required. `ConnectivityTest` resource name using the
   * form: `projects/{project_id}/locations/global/connectivityTests/{test_id}`
   * @param array $optParams Optional parameters.
   * @return ConnectivityTest
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ConnectivityTest::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (connectivityTests.getIamPolicy)
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
   * Lists all Connectivity Tests owned by a project. (connectivityTests.listProje
   * ctsLocationsNetworkmanagementGlobalConnectivityTests)
   *
   * @param string $parent Required. The parent resource of the Connectivity
   * Tests: `projects/{project_id}/locations/global`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Lists the `ConnectivityTests` that match the filter
   * expression. A filter expression filters the resources listed in the response.
   * The expression must be of the form ` ` where operators: `<`, `>`, `<=`, `>=`,
   * `!=`, `=`, `:` are supported (colon `:` represents a HAS operator which is
   * roughly synonymous with equality). can refer to a proto or JSON field, or a
   * synthetic field. Field names can be camelCase or snake_case. Examples: -
   * Filter by name: name =
   * "projects/proj-1/locations/global/connectivityTests/test-1 - Filter by
   * labels: - Resources that have a key called `foo` labels.foo:* - Resources
   * that have a key called `foo` whose value is `bar` labels.foo = bar
   * @opt_param string orderBy Field to use to sort the list.
   * @opt_param int pageSize Number of `ConnectivityTests` to return.
   * @opt_param string pageToken Page token from an earlier query, as returned in
   * `next_page_token`.
   * @return ListConnectivityTestsResponse
   */
  public function listProjectsLocationsNetworkmanagementGlobalConnectivityTests($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectivityTestsResponse::class);
  }
  /**
   * Updates the configuration of an existing `ConnectivityTest`. After you update
   * a test, the reachability analysis is performed as part of the long running
   * operation, which completes when the analysis completes. The Reachability
   * state in the test resource is updated with the new result. If the endpoint
   * specifications in `ConnectivityTest` are invalid (for example, they contain
   * non-existent resources in the network, or the user does not have read
   * permissions to the network configurations of listed projects), then the
   * reachability result returns a value of UNKNOWN. If the endpoint
   * specifications in `ConnectivityTest` are incomplete, the reachability result
   * returns a value of `AMBIGUOUS`. See the documentation in `ConnectivityTest`
   * for for more details. (connectivityTests.patch)
   *
   * @param string $name Required. Unique name of the resource using the form:
   * `projects/{project_id}/locations/global/connectivityTests/{test_id}`
   * @param ConnectivityTest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field.
   * @return Operation
   */
  public function patch($name, ConnectivityTest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Rerun an existing `ConnectivityTest`. After the user triggers the rerun, the
   * reachability analysis is performed as part of the long running operation,
   * which completes when the analysis completes. Even though the test
   * configuration remains the same, the reachability result may change due to
   * underlying network configuration changes. If the endpoint specifications in
   * `ConnectivityTest` become invalid (for example, specified resources are
   * deleted in the network, or you lost read permissions to the network
   * configurations of listed projects), then the reachability result returns a
   * value of `UNKNOWN`. (connectivityTests.rerun)
   *
   * @param string $name Required. Connectivity Test resource name using the form:
   * `projects/{project_id}/locations/global/connectivityTests/{test_id}`
   * @param RerunConnectivityTestRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function rerun($name, RerunConnectivityTestRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rerun', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (connectivityTests.setIamPolicy)
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
   * This operation may "fail open" without warning.
   * (connectivityTests.testIamPermissions)
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
class_alias(ProjectsLocationsNetworkmanagementGlobalConnectivityTests::class, 'Google_Service_NetworkManagement_Resource_ProjectsLocationsNetworkmanagementGlobalConnectivityTests');
