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

namespace Google\Service\Networkconnectivity\Resource;

use Google\Service\Networkconnectivity\GoogleLongrunningOperation;
use Google\Service\Networkconnectivity\ListSpokesResponse;
use Google\Service\Networkconnectivity\Policy;
use Google\Service\Networkconnectivity\SetIamPolicyRequest;
use Google\Service\Networkconnectivity\Spoke;
use Google\Service\Networkconnectivity\TestIamPermissionsRequest;
use Google\Service\Networkconnectivity\TestIamPermissionsResponse;

/**
 * The "spokes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkconnectivityService = new Google\Service\Networkconnectivity(...);
 *   $spokes = $networkconnectivityService->spokes;
 *  </code>
 */
class ProjectsLocationsSpokes extends \Google\Service\Resource
{
  /**
   * Creates a spoke in the specified project and location. (spokes.create)
   *
   * @param string $parent Required. The parent resource.
   * @param Spoke $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID (optional). If you
   * specify this ID, you can use it in cases when you need to retry your request.
   * When you need to retry, this ID lets the server know that it can ignore the
   * request if it has already been completed. The server guarantees that for at
   * least 60 minutes after the first request. For example, consider a situation
   * where you make an initial request and the request times out. If you make the
   * request again with the same request ID, the server can check to see whether
   * the original operation was received. If it was, the server ignores the second
   * request. This behavior prevents clients from mistakenly creating duplicate
   * commitments. The request ID must be a valid UUID, with the exception that
   * zero UUID is not supported (00000000-0000-0000-0000-000000000000).
   * @opt_param string spokeId Optional. Unique id for the spoke to create.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, Spoke $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the specified spoke. (spokes.delete)
   *
   * @param string $name Required. The name of the spoke to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID (optional). If you
   * specify this ID, you can use it in cases when you need to retry your request.
   * When you need to retry, this ID lets the server know that it can ignore the
   * request if it has already been completed. The server guarantees that for at
   * least 60 minutes after the first request. For example, consider a situation
   * where you make an initial request and the request times out. If you make the
   * request again with the same request ID, the server can check to see whether
   * the original operation was received. If it was, the server ignores the second
   * request. This behavior prevents clients from mistakenly creating duplicate
   * commitments. The request ID must be a valid UUID, with the exception that
   * zero UUID is not supported (00000000-0000-0000-0000-000000000000).
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets details about the specified spoke. (spokes.get)
   *
   * @param string $name Required. The name of the spoke resource.
   * @param array $optParams Optional parameters.
   * @return Spoke
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Spoke::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (spokes.getIamPolicy)
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
   * Lists the spokes in the specified project and location.
   * (spokes.listProjectsLocationsSpokes)
   *
   * @param string $parent Required. The parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression that filters the results listed in the
   * response.
   * @opt_param string orderBy Sort the results by a certain order.
   * @opt_param int pageSize The maximum number of results per page that should be
   * returned.
   * @opt_param string pageToken The page token.
   * @return ListSpokesResponse
   */
  public function listProjectsLocationsSpokes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSpokesResponse::class);
  }
  /**
   * Updates the parameters of the specified spoke. (spokes.patch)
   *
   * @param string $name Immutable. The name of the spoke. Spoke names must be
   * unique. They use the following form:
   * `projects/{project_number}/locations/{region}/spokes/{spoke_id}`
   * @param Spoke $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID (optional). If you
   * specify this ID, you can use it in cases when you need to retry your request.
   * When you need to retry, this ID lets the server know that it can ignore the
   * request if it has already been completed. The server guarantees that for at
   * least 60 minutes after the first request. For example, consider a situation
   * where you make an initial request and the request times out. If you make the
   * request again with the same request ID, the server can check to see whether
   * the original operation was received. If it was, the server ignores the second
   * request. This behavior prevents clients from mistakenly creating duplicate
   * commitments. The request ID must be a valid UUID, with the exception that
   * zero UUID is not supported (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Optional. In the case of an update to an
   * existing spoke, field mask is used to specify the fields to be overwritten.
   * The fields specified in the update_mask are relative to the resource, not the
   * full request. A field is overwritten if it is in the mask. If the user does
   * not provide a mask, then all fields are overwritten.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, Spoke $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (spokes.setIamPolicy)
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
   * This operation may "fail open" without warning. (spokes.testIamPermissions)
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
class_alias(ProjectsLocationsSpokes::class, 'Google_Service_Networkconnectivity_Resource_ProjectsLocationsSpokes');
