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
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $environments = $apigeeService->environments;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironments extends Google_Service_Resource
{
  /**
   * Creates an environment in an organization. (environments.create)
   *
   * @param string $parent Required. Name of the organization in which the
   * environment will be created in the following format:  `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Optional. Name of the environment. Alternatively, the
   * name may be specified in the request body in the environment_id field.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Deletes an environment from an organization. Returns the deleted environment
   * resource. (environments.delete)
   *
   * @param string $name Required. Name of the environment to delete in the
   * following format:  `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Gets environment details. (environments.get)
   *
   * @param string $name Required. Name of the environment in the following
   * format:  `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Environment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Environment");
  }
  /**
   * Get Google Cloud Storage (GCS) signed url for specific organization and
   * environment. Collection agent uses this signed url to upload data to GCS
   * bucket. (environments.getDatalocation)
   *
   * @param string $name Required. The parent organization and environment names.
   * Must be of the form `organizations/{org}/environments/{env}/datalocation`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string repo Required. Repository name
   * @opt_param string contentType Content-Type for uploaded file.
   * @opt_param string relativeFilePath Required. Relative path to the GCS bucket
   * @opt_param string dataset Required. Dataset could be one of `api`, `mint`,
   * `trace` and `event`
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DataLocation
   */
  public function getDatalocation($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getDatalocation', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DataLocation");
  }
  /**
   * Gets the debug mask singleton resource for an Environment.
   * (environments.getDebugmask)
   *
   * @param string $name Required. The name of the Environment debug mask to get.
   * Must be of the form `organizations/{org}/environments/{env}/debugmask`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DebugMask
   */
  public function getDebugmask($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getDebugmask', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DebugMask");
  }
  /**
   * Gets the deployed configuration for an environment.
   * (environments.getDeployedConfig)
   *
   * @param string $name Required. Name of the environment deployed configuration
   * resource in the following format:
   * `organizations/{org}/environments/{env}/deployedConfig`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentConfig
   */
  public function getDeployedConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getDeployedConfig', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1EnvironmentConfig");
  }
  /**
   * Gets the IAM policy on an environment. For more information, see [Manage
   * users, roles, and permissions using the API](/hybrid/manage-users-roles).
   *
   * You must have the `apigee.environments.getIamPolicy` permission to call this
   * API. (environments.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   * @return Google_Service_Apigee_GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Apigee_GoogleIamV1Policy");
  }
  /**
   * Lists all environments in an organization.
   * (environments.listOrganizationsEnvironments)
   *
   * @param string $parent Required. Name of the organization in the following
   * format:   `organizations/{org}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
  /**
   * Sets the IAM policy on an environment, if the policy already exists it will
   * be replaced. For more information, see [Manage users, roles, and permissions
   * using the API](/hybrid/manage-users-roles).
   *
   * You must have the `apigee.environments.setIamPolicy` permission to call this
   * API. (environments.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Apigee_GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleIamV1Policy
   */
  public function setIamPolicy($resource, Google_Service_Apigee_GoogleIamV1SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Apigee_GoogleIamV1Policy");
  }
  /**
   * Creates a subscription for the environment's Pub/Sub topic. The server will
   * assign a random name for this subscription. The "name" and "push_config" must
   * *not* be specified. (environments.subscribe)
   *
   * @param string $parent Required. Name of the environment to subscribe in the
   * following format:  `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Subscription
   */
  public function subscribe($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('subscribe', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Subscription");
  }
  /**
   * Tests the permissions of a user on an environment, and returns a subset of
   * permissions that the user has on the environment. If the environment does not
   * exist, an empty permission set is returned (a NOT_FOUND error is not
   * returned). (environments.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Apigee_GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Apigee_GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Apigee_GoogleIamV1TestIamPermissionsResponse");
  }
  /**
   * Deletes a subscription for the environment's Pub/Sub topic.
   * (environments.unsubscribe)
   *
   * @param string $parent Required. Name of the environment to subscribe in the
   * following format:  `organizations/{org}/environments/{env}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function unsubscribe($parent, Google_Service_Apigee_GoogleCloudApigeeV1Subscription $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unsubscribe', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
  /**
   * Updates an existing environment.
   *
   * When updating properties, you must pass all existing properties to the API,
   * even if they are not being changed. If you omit properties from the payload,
   * the properties are removed. To get the current list of properties for the
   * environment, use the [Get Environment API](get). (environments.update)
   *
   * @param string $name Required. Name of the environment to update in the
   * following format:  `organizations/{org}/environments/{env}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Environment
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Environment");
  }
  /**
   * Updates the debug mask singleton resource for an environment.
   * (environments.updateDebugmask)
   *
   * @param string $name The DebugMask resource name.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1DebugMask $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceRepeatedFields If true, repeated fields covered by the
   * update_mask will replace the existing values. The default behavior is to
   * append.
   * @opt_param string updateMask Field mask to support partial updates.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1DebugMask
   */
  public function updateDebugmask($name, Google_Service_Apigee_GoogleCloudApigeeV1DebugMask $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateDebugmask', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1DebugMask");
  }
  /**
   * Updates an existing environment.
   *
   * When updating properties, you must pass all existing properties to the API,
   * even if they are not being changed. If you omit properties from the payload,
   * the properties are removed. To get the current list of properties for the
   * environment, use the [Get Environment API](get).
   * (environments.updateEnvironment)
   *
   * @param string $name Required. Name of the environment to update in the
   * following format:  `organizations/{org}/environments/{env}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Environment
   */
  public function updateEnvironment($name, Google_Service_Apigee_GoogleCloudApigeeV1Environment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateEnvironment', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Environment");
  }
}
