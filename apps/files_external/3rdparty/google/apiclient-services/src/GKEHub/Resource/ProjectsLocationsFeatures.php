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

namespace Google\Service\GKEHub\Resource;

use Google\Service\GKEHub\Feature;
use Google\Service\GKEHub\ListFeaturesResponse;
use Google\Service\GKEHub\Operation;
use Google\Service\GKEHub\Policy;
use Google\Service\GKEHub\SetIamPolicyRequest;
use Google\Service\GKEHub\TestIamPermissionsRequest;
use Google\Service\GKEHub\TestIamPermissionsResponse;

/**
 * The "features" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gkehubService = new Google\Service\GKEHub(...);
 *   $features = $gkehubService->features;
 *  </code>
 */
class ProjectsLocationsFeatures extends \Google\Service\Resource
{
  /**
   * Adds a new Feature. (features.create)
   *
   * @param string $parent Required. The parent (project and location) where the
   * Feature will be created. Specified in the format `projects/locations`.
   * @param Feature $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string featureId The ID of the feature to create.
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes after the first request. For example,
   * consider a situation where you make an initial request and the request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, Feature $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Removes a Feature. (features.delete)
   *
   * @param string $name Required. The Feature resource name in the format
   * `projects/locations/features`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If set to true, the delete will ignore any outstanding
   * resources for this Feature (that is, `FeatureState.has_resources` is set to
   * true). These resources will NOT be cleaned up or modified in any way.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single Feature. (features.get)
   *
   * @param string $name Required. The Feature resource name in the format
   * `projects/locations/features`
   * @param array $optParams Optional parameters.
   * @return Feature
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Feature::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (features.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
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
   * Lists Features in a given project and location.
   * (features.listProjectsLocationsFeatures)
   *
   * @param string $parent Required. The parent (project and location) where the
   * Features will be listed. Specified in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Lists Features that match the filter expression,
   * following the syntax outlined in https://google.aip.dev/160. Examples: -
   * Feature with the name "servicemesh" in project "foo-proj": name = "projects
   * /foo-proj/locations/global/features/servicemesh" - Features that have a label
   * called `foo`: labels.foo:* - Features that have a label called `foo` whose
   * value is `bar`: labels.foo = bar
   * @opt_param string orderBy One or more fields to compare and use to sort the
   * output. See https://google.aip.dev/132#ordering.
   * @opt_param int pageSize When requesting a 'page' of resources, `page_size`
   * specifies number of resources to return. If unspecified or set to 0, all
   * resources will be returned.
   * @opt_param string pageToken Token returned by previous call to `ListFeatures`
   * which specifies the position in the list from where to continue listing the
   * resources.
   * @return ListFeaturesResponse
   */
  public function listProjectsLocationsFeatures($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFeaturesResponse::class);
  }
  /**
   * Updates an existing Feature. (features.patch)
   *
   * @param string $name Required. The Feature resource name in the format
   * `projects/locations/features`.
   * @param Feature $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes after the first request. For example,
   * consider a situation where you make an initial request and the request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Mask of fields to update.
   * @return Operation
   */
  public function patch($name, Feature $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (features.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * This operation may "fail open" without warning. (features.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsFeatures::class, 'Google_Service_GKEHub_Resource_ProjectsLocationsFeatures');
