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

namespace Google\Service\Apigateway\Resource;

use Google\Service\Apigateway\ApigatewayGateway;
use Google\Service\Apigateway\ApigatewayListGatewaysResponse;
use Google\Service\Apigateway\ApigatewayOperation;
use Google\Service\Apigateway\ApigatewayPolicy;
use Google\Service\Apigateway\ApigatewaySetIamPolicyRequest;
use Google\Service\Apigateway\ApigatewayTestIamPermissionsRequest;
use Google\Service\Apigateway\ApigatewayTestIamPermissionsResponse;

/**
 * The "gateways" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigatewayService = new Google\Service\Apigateway(...);
 *   $gateways = $apigatewayService->gateways;
 *  </code>
 */
class ProjectsLocationsGateways extends \Google\Service\Resource
{
  /**
   * Creates a new Gateway in a given project and location. (gateways.create)
   *
   * @param string $parent Required. Parent resource of the Gateway, of the form:
   * `projects/locations`
   * @param ApigatewayGateway $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gatewayId Required. Identifier to assign to the Gateway.
   * Must be unique within scope of the parent resource.
   * @return ApigatewayOperation
   */
  public function create($parent, ApigatewayGateway $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ApigatewayOperation::class);
  }
  /**
   * Deletes a single Gateway. (gateways.delete)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/gateways`
   * @param array $optParams Optional parameters.
   * @return ApigatewayOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ApigatewayOperation::class);
  }
  /**
   * Gets details of a single Gateway. (gateways.get)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/gateways`
   * @param array $optParams Optional parameters.
   * @return ApigatewayGateway
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ApigatewayGateway::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (gateways.getIamPolicy)
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
   * @return ApigatewayPolicy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], ApigatewayPolicy::class);
  }
  /**
   * Lists Gateways in a given project and location.
   * (gateways.listProjectsLocationsGateways)
   *
   * @param string $parent Required. Parent resource of the Gateway, of the form:
   * `projects/locations`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter.
   * @opt_param string orderBy Order by parameters.
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @return ApigatewayListGatewaysResponse
   */
  public function listProjectsLocationsGateways($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ApigatewayListGatewaysResponse::class);
  }
  /**
   * Updates the parameters of a single Gateway. (gateways.patch)
   *
   * @param string $name Output only. Resource name of the Gateway. Format:
   * projects/{project}/locations/{location}/gateways/{gateway}
   * @param ApigatewayGateway $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask is used to specify the fields to be
   * overwritten in the Gateway resource by the update. The fields specified in
   * the update_mask are relative to the resource, not the full request. A field
   * will be overwritten if it is in the mask. If the user does not provide a mask
   * then all fields will be overwritten.
   * @return ApigatewayOperation
   */
  public function patch($name, ApigatewayGateway $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ApigatewayOperation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (gateways.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param ApigatewaySetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApigatewayPolicy
   */
  public function setIamPolicy($resource, ApigatewaySetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], ApigatewayPolicy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (gateways.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param ApigatewayTestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApigatewayTestIamPermissionsResponse
   */
  public function testIamPermissions($resource, ApigatewayTestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], ApigatewayTestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGateways::class, 'Google_Service_Apigateway_Resource_ProjectsLocationsGateways');
