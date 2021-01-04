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
 * The "triggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $eventarcService = new Google_Service_Eventarc(...);
 *   $triggers = $eventarcService->triggers;
 *  </code>
 */
class Google_Service_Eventarc_Resource_ProjectsLocationsTriggers extends Google_Service_Resource
{
  /**
   * Create a new trigger in a particular project and location. (triggers.create)
   *
   * @param string $parent Required. The parent collection in which to add this
   * trigger.
   * @param Google_Service_Eventarc_Trigger $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string triggerId Required. The user-provided ID to be assigned to
   * the trigger.
   * @return Google_Service_Eventarc_Operation
   */
  public function create($parent, Google_Service_Eventarc_Trigger $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Eventarc_Operation");
  }
  /**
   * Delete a single trigger. (triggers.delete)
   *
   * @param string $name Required. The name of the trigger to be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag If provided, the trigger will only be deleted if the
   * etag matches the current etag on the resource.
   * @return Google_Service_Eventarc_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Eventarc_Operation");
  }
  /**
   * Get a single trigger. (triggers.get)
   *
   * @param string $name Required. The name of the trigger to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Eventarc_Trigger
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Eventarc_Trigger");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (triggers.getIamPolicy)
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
   * @return Google_Service_Eventarc_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Eventarc_Policy");
  }
  /**
   * List triggers. (triggers.listProjectsLocationsTriggers)
   *
   * @param string $parent Required. The parent collection to list triggers on.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy The sorting order of the resources returned. Value
   * should be a comma separated list of fields. The default sorting oder is
   * ascending. To specify descending order for a field, append a ` desc` suffix;
   * for example: `name desc, trigger_id`.
   * @opt_param int pageSize The maximum number of triggers to return on each
   * page. Note: The service may send fewer.
   * @opt_param string pageToken The page token; provide the value from the
   * `next_page_token` field in a previous `ListTriggers` call to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListTriggers` must match the call that provided the page token.
   * @return Google_Service_Eventarc_ListTriggersResponse
   */
  public function listProjectsLocationsTriggers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Eventarc_ListTriggersResponse");
  }
  /**
   * Update a single trigger. (triggers.patch)
   *
   * @param string $name Required. The resource name of the trigger. Must be
   * unique within the location on the project. Format:
   * projects/{project}/locations/{location}/triggers/{trigger}
   * @param Google_Service_Eventarc_Trigger $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to be updated; only fields explicitly
   * provided will be updated. If no field mask is provided, all provided fields
   * in the request will be updated. To update all fields, provide a field mask of
   * "*".
   * @return Google_Service_Eventarc_Operation
   */
  public function patch($name, Google_Service_Eventarc_Trigger $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Eventarc_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (triggers.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Eventarc_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Eventarc_Policy
   */
  public function setIamPolicy($resource, Google_Service_Eventarc_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Eventarc_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (triggers.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Eventarc_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Eventarc_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Eventarc_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Eventarc_TestIamPermissionsResponse");
  }
}
