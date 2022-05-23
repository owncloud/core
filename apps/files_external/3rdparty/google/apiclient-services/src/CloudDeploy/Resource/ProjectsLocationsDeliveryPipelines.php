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

namespace Google\Service\CloudDeploy\Resource;

use Google\Service\CloudDeploy\DeliveryPipeline;
use Google\Service\CloudDeploy\ListDeliveryPipelinesResponse;
use Google\Service\CloudDeploy\Operation;
use Google\Service\CloudDeploy\Policy;
use Google\Service\CloudDeploy\SetIamPolicyRequest;
use Google\Service\CloudDeploy\TestIamPermissionsRequest;
use Google\Service\CloudDeploy\TestIamPermissionsResponse;

/**
 * The "deliveryPipelines" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddeployService = new Google\Service\CloudDeploy(...);
 *   $deliveryPipelines = $clouddeployService->deliveryPipelines;
 *  </code>
 */
class ProjectsLocationsDeliveryPipelines extends \Google\Service\Resource
{
  /**
   * Creates a new DeliveryPipeline in a given project and location.
   * (deliveryPipelines.create)
   *
   * @param string $parent Required. The parent collection in which the
   * `DeliveryPipeline` should be created. Format should be
   * projects/{project_id}/locations/{location_name}.
   * @param DeliveryPipeline $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string deliveryPipelineId Required. ID of the `DeliveryPipeline`.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param bool validateOnly Optional. If set to true, the request is
   * validated and the user is provided with an expected result, but no actual
   * change is made.
   * @return Operation
   */
  public function create($parent, DeliveryPipeline $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single DeliveryPipeline. (deliveryPipelines.delete)
   *
   * @param string $name Required. The name of the `DeliveryPipeline` to delete.
   * Format should be projects/{project_id}/locations/{location_name}/deliveryPipe
   * lines/{pipeline_name}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing Optional. If set to true, then deleting an
   * already deleted or non-existing `DeliveryPipeline` will succeed.
   * @opt_param string etag Optional. This checksum is computed by the server
   * based on the value of other fields, and may be sent on update and delete
   * requests to ensure the client has an up-to-date value before proceeding.
   * @opt_param bool force Optional. If set to true, all child resources under
   * this pipeline will also be deleted. Otherwise, the request will only work if
   * the pipeline has no child resources.
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
   * @opt_param bool validateOnly Optional. If set, validate the request and
   * preview the review, but do not actually post it.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single DeliveryPipeline. (deliveryPipelines.get)
   *
   * @param string $name Required. Name of the `DeliveryPipeline`. Format must be
   * projects/{project_id}/locations/{location_name}/deliveryPipelines/{pipeline_n
   * ame}.
   * @param array $optParams Optional parameters.
   * @return DeliveryPipeline
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DeliveryPipeline::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (deliveryPipelines.getIamPolicy)
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
   * Lists DeliveryPipelines in a given project and location.
   * (deliveryPipelines.listProjectsLocationsDeliveryPipelines)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * pipelines. Format must be projects/{project_id}/locations/{location_name}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter pipelines to be returned. See
   * https://google.aip.dev/160 for more details.
   * @opt_param string orderBy Field to sort by. See
   * https://google.aip.dev/132#ordering for more details.
   * @opt_param int pageSize The maximum number of pipelines to return. The
   * service may return fewer than this value. If unspecified, at most 50
   * pipelines will be returned. The maximum value is 1000; values above 1000 will
   * be set to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListDeliveryPipelines` call. Provide this to retrieve the subsequent page.
   * When paginating, all other provided parameters match the call that provided
   * the page token.
   * @return ListDeliveryPipelinesResponse
   */
  public function listProjectsLocationsDeliveryPipelines($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDeliveryPipelinesResponse::class);
  }
  /**
   * Updates the parameters of a single DeliveryPipeline.
   * (deliveryPipelines.patch)
   *
   * @param string $name Optional. Name of the `DeliveryPipeline`. Format is
   * projects/{project}/ locations/{location}/deliveryPipelines/a-z{0,62}.
   * @param DeliveryPipeline $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing Optional. If set to true, updating a
   * `DeliveryPipeline` that does not exist will result in the creation of a new
   * `DeliveryPipeline`.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. Field mask is used to specify the
   * fields to be overwritten in the `DeliveryPipeline` resource by the update.
   * The fields specified in the update_mask are relative to the resource, not the
   * full request. A field will be overwritten if it is in the mask. If the user
   * does not provide a mask then all fields will be overwritten.
   * @opt_param bool validateOnly Optional. If set to true, the request is
   * validated and the user is provided with an expected result, but no actual
   * change is made.
   * @return Operation
   */
  public function patch($name, DeliveryPipeline $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (deliveryPipelines.setIamPolicy)
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
   * This operation may "fail open" without warning.
   * (deliveryPipelines.testIamPermissions)
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
class_alias(ProjectsLocationsDeliveryPipelines::class, 'Google_Service_CloudDeploy_Resource_ProjectsLocationsDeliveryPipelines');
