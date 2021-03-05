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
 * The "apis" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigatewayService = new Google_Service_Apigateway(...);
 *   $apis = $apigatewayService->apis;
 *  </code>
 */
class Google_Service_Apigateway_Resource_ProjectsLocationsApis extends Google_Service_Resource
{
  /**
   * Creates a new Api in a given project and location. (apis.create)
   *
   * @param string $parent Required. Parent resource of the API, of the form:
   * `projects/locations/global`
   * @param Google_Service_Apigateway_ApigatewayApi $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiId Required. Identifier to assign to the API. Must be
   * unique within scope of the parent resource.
   * @return Google_Service_Apigateway_ApigatewayOperation
   */
  public function create($parent, Google_Service_Apigateway_ApigatewayApi $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigateway_ApigatewayOperation");
  }
  /**
   * Deletes a single Api. (apis.delete)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/global/apis`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigateway_ApigatewayOperation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigateway_ApigatewayOperation");
  }
  /**
   * Gets details of a single Api. (apis.get)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/global/apis`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigateway_ApigatewayApi
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigateway_ApigatewayApi");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (apis.getIamPolicy)
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
   * @return Google_Service_Apigateway_ApigatewayPolicy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Apigateway_ApigatewayPolicy");
  }
  /**
   * Lists Apis in a given project and location. (apis.listProjectsLocationsApis)
   *
   * @param string $parent Required. Parent resource of the API, of the form:
   * `projects/locations/global`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter.
   * @opt_param string orderBy Order by parameters.
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @return Google_Service_Apigateway_ApigatewayListApisResponse
   */
  public function listProjectsLocationsApis($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigateway_ApigatewayListApisResponse");
  }
  /**
   * Updates the parameters of a single Api. (apis.patch)
   *
   * @param string $name Output only. Resource name of the API. Format:
   * projects/{project}/locations/global/apis/{api}
   * @param Google_Service_Apigateway_ApigatewayApi $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask is used to specify the fields to be
   * overwritten in the Api resource by the update. The fields specified in the
   * update_mask are relative to the resource, not the full request. A field will
   * be overwritten if it is in the mask. If the user does not provide a mask then
   * all fields will be overwritten.
   * @return Google_Service_Apigateway_ApigatewayOperation
   */
  public function patch($name, Google_Service_Apigateway_ApigatewayApi $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Apigateway_ApigatewayOperation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (apis.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Apigateway_ApigatewaySetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigateway_ApigatewayPolicy
   */
  public function setIamPolicy($resource, Google_Service_Apigateway_ApigatewaySetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Apigateway_ApigatewayPolicy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (apis.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Apigateway_ApigatewayTestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigateway_ApigatewayTestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Apigateway_ApigatewayTestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Apigateway_ApigatewayTestIamPermissionsResponse");
  }
}
