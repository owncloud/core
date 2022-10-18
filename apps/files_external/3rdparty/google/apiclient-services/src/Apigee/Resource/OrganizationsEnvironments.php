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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1DebugMask;
use Google\Service\Apigee\GoogleCloudApigeeV1Environment;
use Google\Service\Apigee\GoogleCloudApigeeV1EnvironmentConfig;
use Google\Service\Apigee\GoogleCloudApigeeV1Subscription;
use Google\Service\Apigee\GoogleCloudApigeeV1TraceConfig;
use Google\Service\Apigee\GoogleIamV1Policy;
use Google\Service\Apigee\GoogleIamV1SetIamPolicyRequest;
use Google\Service\Apigee\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\Apigee\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\Apigee\GoogleLongrunningOperation;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $environments = $apigeeService->environments;
 *  </code>
 */
class OrganizationsEnvironments extends \Google\Service\Resource
{
  /**
   * Creates an environment in an organization. (environments.create)
   *
   * @param string $parent Required. Name of the organization in which the
   * environment will be created. Use the following structure in your request:
   * `organizations/{org}`
   * @param GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Optional. Name of the environment. Alternatively, the
   * name may be specified in the request body in the name field.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudApigeeV1Environment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an environment from an organization. **Warning: You must delete all
   * key value maps and key value entries before you delete an environment.**
   * Otherwise, if you re-create the environment the key value map entry
   * operations will encounter encryption/decryption discrepancies.
   * (environments.delete)
   *
   * @param string $name Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets environment details. (environments.get)
   *
   * @param string $name Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Environment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Environment::class);
  }
  /**
   * Gets the debug mask singleton resource for an environment.
   * (environments.getDebugmask)
   *
   * @param string $name Required. Name of the debug mask. Use the following
   * structure in your request:
   * `organizations/{org}/environments/{env}/debugmask`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DebugMask
   */
  public function getDebugmask($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getDebugmask', [$params], GoogleCloudApigeeV1DebugMask::class);
  }
  /**
   * Gets the deployed configuration for an environment.
   * (environments.getDeployedConfig)
   *
   * @param string $name Required. Name of the environment deployed configuration
   * resource. Use the following structure in your request:
   * `organizations/{org}/environments/{env}/deployedConfig`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1EnvironmentConfig
   */
  public function getDeployedConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getDeployedConfig', [$params], GoogleCloudApigeeV1EnvironmentConfig::class);
  }
  /**
   * Gets the IAM policy on an environment. For more information, see [Manage
   * users, roles, and permissions using the
   * API](https://cloud.google.com/apigee/docs/api-platform/system-administration
   * /manage-users-roles). You must have the `apigee.environments.getIamPolicy`
   * permission to call this API. (environments.getIamPolicy)
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
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Get distributed trace configuration in an environment.
   * (environments.getTraceConfig)
   *
   * @param string $name Required. Name of the trace configuration. Use the
   * following structure in your request:
   * "organizations/environments/traceConfig".
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1TraceConfig
   */
  public function getTraceConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getTraceConfig', [$params], GoogleCloudApigeeV1TraceConfig::class);
  }
  /**
   * Updates properties for an Apigee environment with patch semantics using a
   * field mask. **Note:** Not supported for Apigee hybrid.
   * (environments.modifyEnvironment)
   *
   * @param string $name Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{environment}`.
   * @param GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated. Fields that can be
   * updated: node_config.
   * @return GoogleLongrunningOperation
   */
  public function modifyEnvironment($name, GoogleCloudApigeeV1Environment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modifyEnvironment', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the IAM policy on an environment, if the policy already exists it will
   * be replaced. For more information, see [Manage users, roles, and permissions
   * using the API](https://cloud.google.com/apigee/docs/api-platform/system-
   * administration/manage-users-roles). You must have the
   * `apigee.environments.setIamPolicy` permission to call this API.
   * (environments.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Creates a subscription for the environment's Pub/Sub topic. The server will
   * assign a random name for this subscription. The "name" and "push_config" must
   * *not* be specified. (environments.subscribe)
   *
   * @param string $parent Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Subscription
   */
  public function subscribe($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('subscribe', [$params], GoogleCloudApigeeV1Subscription::class);
  }
  /**
   * Tests the permissions of a user on an environment, and returns a subset of
   * permissions that the user has on the environment. If the environment does not
   * exist, an empty permission set is returned (a NOT_FOUND error is not
   * returned). (environments.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
  /**
   * Deletes a subscription for the environment's Pub/Sub topic.
   * (environments.unsubscribe)
   *
   * @param string $parent Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param GoogleCloudApigeeV1Subscription $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function unsubscribe($parent, GoogleCloudApigeeV1Subscription $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unsubscribe', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Updates an existing environment. When updating properties, you must pass all
   * existing properties to the API, even if they are not being changed. If you
   * omit properties from the payload, the properties are removed. To get the
   * current list of properties for the environment, use the [Get Environment
   * API](get). **Note**: Both `PUT` and `POST` methods are supported for updating
   * an existing environment. (environments.update)
   *
   * @param string $name Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Environment
   */
  public function update($name, GoogleCloudApigeeV1Environment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1Environment::class);
  }
  /**
   * Updates the debug mask singleton resource for an environment.
   * (environments.updateDebugmask)
   *
   * @param string $name Name of the debug mask.
   * @param GoogleCloudApigeeV1DebugMask $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceRepeatedFields Boolean flag that specifies whether to
   * replace existing values in the debug mask when doing an update. Set to true
   * to replace existing values. The default behavior is to append the values
   * (false).
   * @opt_param string updateMask Field debug mask to support partial updates.
   * @return GoogleCloudApigeeV1DebugMask
   */
  public function updateDebugmask($name, GoogleCloudApigeeV1DebugMask $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateDebugmask', [$params], GoogleCloudApigeeV1DebugMask::class);
  }
  /**
   * Updates an existing environment. When updating properties, you must pass all
   * existing properties to the API, even if they are not being changed. If you
   * omit properties from the payload, the properties are removed. To get the
   * current list of properties for the environment, use the [Get Environment
   * API](get). **Note**: Both `PUT` and `POST` methods are supported for updating
   * an existing environment. (environments.updateEnvironment)
   *
   * @param string $name Required. Name of the environment. Use the following
   * structure in your request: `organizations/{org}/environments/{env}`
   * @param GoogleCloudApigeeV1Environment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Environment
   */
  public function updateEnvironment($name, GoogleCloudApigeeV1Environment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateEnvironment', [$params], GoogleCloudApigeeV1Environment::class);
  }
  /**
   * Updates the trace configurations in an environment. Note that the repeated
   * fields have replace semantics when included in the field mask and that they
   * will be overwritten by the value of the fields in the request body.
   * (environments.updateTraceConfig)
   *
   * @param string $name Required. Name of the trace configuration. Use the
   * following structure in your request:
   * "organizations/environments/traceConfig".
   * @param GoogleCloudApigeeV1TraceConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated.
   * @return GoogleCloudApigeeV1TraceConfig
   */
  public function updateTraceConfig($name, GoogleCloudApigeeV1TraceConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateTraceConfig', [$params], GoogleCloudApigeeV1TraceConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironments::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironments');
