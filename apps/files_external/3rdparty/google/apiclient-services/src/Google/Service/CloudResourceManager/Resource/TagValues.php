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
 * The "tagValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $tagValues = $cloudresourcemanagerService->tagValues;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_TagValues extends Google_Service_Resource
{
  /**
   * Creates a TagValue as a child of the specified TagKey. If a another request
   * with the same parameters is sent while the original request is in process the
   * second request will receive an error. A maximum of 300 TagValues can exist
   * under a TagKey at any given time. (tagValues.create)
   *
   * @param Google_Service_CloudResourceManager_TagValue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set as true to perform the validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function create(Google_Service_CloudResourceManager_TagValue $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Deletes a TagValue. The TagValue cannot have any bindings when it is deleted.
   * (tagValues.delete)
   *
   * @param string $name Required. Resource name for TagValue to be deleted in the
   * format tagValues/456.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. The etag known to the client for the
   * expected state of the TagValue. This is to be used for optimistic
   * concurrency.
   * @opt_param bool validateOnly Optional. Set as true to perform the validations
   * necessary for deletion, but not actually perform the action.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Retrieves TagValue. If the TagValue or namespaced name does not exist, or if
   * the user does not have permission to view it, this method will return
   * `PERMISSION_DENIED`. (tagValues.get)
   *
   * @param string $name Required. Resource name for TagValue to be fetched in the
   * format `tagValues/456`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_TagValue
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudResourceManager_TagValue");
  }
  /**
   * Gets the access control policy for a TagValue. The returned policy may be
   * empty if no such policy or resource exists. The `resource` field should be
   * the TagValue's resource name. For example: `tagValues/1234`. The caller must
   * have the `cloudresourcemanager.googleapis.com/tagValues.getIamPolicy`
   * permission on the identified TagValue to get the access control policy.
   * (tagValues.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function getIamPolicy($resource, Google_Service_CloudResourceManager_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Lists all TagValues for a specific TagKey. (tagValues.listTagValues)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of TagValues to return
   * in the response. This is currently not used by the server and will return the
   * full page even if a size is specified currently.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListTagValues` that indicates where this listing should
   * continue from. This is currently not used by the server.
   * @opt_param string parent Required. Resource name for TagKey, parent of the
   * TagValues to be listed, in the format `tagKeys/123`.
   * @return Google_Service_CloudResourceManager_ListTagValuesResponse
   */
  public function listTagValues($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListTagValuesResponse");
  }
  /**
   * Updates the attributes of the TagValue resource. (tagValues.patch)
   *
   * @param string $name Immutable. Resource name for TagValue in the format
   * `tagValues/456`.
   * @param Google_Service_CloudResourceManager_TagValue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Fields to be updated.
   * @opt_param bool validateOnly Optional. True to perform validations necessary
   * for updating the resource, but not actually perform the action.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function patch($name, Google_Service_CloudResourceManager_TagValue $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Sets the access control policy on a TagValue, replacing any existing policy.
   * The `resource` field should be the TagValue's resource name. For example:
   * `tagValues/1234`. The caller must have
   * `resourcemanager.tagValues.setIamPolicy` permission on the identified
   * tagValue. (tagValues.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudResourceManager_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudResourceManager_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified TagValue. The
   * `resource` field should be the TagValue's resource name. For example:
   * `tagValues/1234`. There are no permissions required for making this API call.
   * (tagValues.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudResourceManager_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudResourceManager_TestIamPermissionsResponse");
  }
}
