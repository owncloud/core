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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datafusionService = new Google_Service_DataFusion(...);
 *   $instances = $datafusionService->instances;
 *  </code>
 */
class Google_Service_DataFusion_Resource_ProjectsLocationsInstances extends Google_Service_Resource
{
  /**
   * Creates a new Data Fusion instance in the specified project and location.
   * (instances.create)
   *
   * @param string $parent The instance's project and location in the format
   * projects/{project}/locations/{location}.
   * @param Google_Service_DataFusion_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string instanceId The name of the instance to create.
   * @return Google_Service_DataFusion_Operation
   */
  public function create($parent, Google_Service_DataFusion_Instance $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataFusion_Operation");
  }
  /**
   * Deletes a single Date Fusion instance. (instances.delete)
   *
   * @param string $name The instance resource name in the format
   * projects/{project}/locations/{location}/instances/{instance}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataFusion_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataFusion_Operation");
  }
  /**
   * Gets details of a single Data Fusion instance. (instances.get)
   *
   * @param string $name The instance resource name in the format
   * projects/{project}/locations/{location}/instances/{instance}.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataFusion_Instance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataFusion_Instance");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (instances.getIamPolicy)
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
   * @return Google_Service_DataFusion_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_DataFusion_Policy");
  }
  /**
   * Lists Data Fusion instances in the specified project and location.
   * (instances.listProjectsLocationsInstances)
   *
   * @param string $parent The project and location for which to retrieve instance
   * information in the format projects/{project}/locations/{location}. If the
   * location is specified as '-' (wildcard), then all regions available to the
   * project are queried, and the results are aggregated.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value to use if there are
   * additional results to retrieve for this list request.
   * @opt_param string orderBy Sort results. Supported values are "name", "name
   * desc", or "" (unsorted).
   * @return Google_Service_DataFusion_ListInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataFusion_ListInstancesResponse");
  }
  /**
   * Updates a single Data Fusion instance. (instances.patch)
   *
   * @param string $name Output only. The name of this instance is in the form of
   * projects/{project}/locations/{location}/instances/{instance}.
   * @param Google_Service_DataFusion_Instance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask is used to specify the fields that
   * the update will overwrite in an instance resource. The fields specified in
   * the update_mask are relative to the resource, not the full request. A field
   * will be overwritten if it is in the mask. If the user does not provide a
   * mask, all the supported fields (labels, options, and version currently) will
   * be overwritten.
   * @return Google_Service_DataFusion_Operation
   */
  public function patch($name, Google_Service_DataFusion_Instance $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataFusion_Operation");
  }
  /**
   * Restart a single Data Fusion instance. At the end of an operation instance is
   * fully restarted. (instances.restart)
   *
   * @param string $name Name of the Data Fusion instance which need to be
   * restarted in the form of
   * projects/{project}/locations/{location}/instances/{instance}
   * @param Google_Service_DataFusion_RestartInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataFusion_Operation
   */
  public function restart($name, Google_Service_DataFusion_RestartInstanceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_DataFusion_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (instances.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_DataFusion_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataFusion_Policy
   */
  public function setIamPolicy($resource, Google_Service_DataFusion_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_DataFusion_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (instances.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_DataFusion_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataFusion_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_DataFusion_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_DataFusion_TestIamPermissionsResponse");
  }
}
