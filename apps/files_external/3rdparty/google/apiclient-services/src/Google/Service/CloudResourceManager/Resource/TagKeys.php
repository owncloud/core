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
 * The "tagKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google_Service_CloudResourceManager(...);
 *   $tagKeys = $cloudresourcemanagerService->tagKeys;
 *  </code>
 */
class Google_Service_CloudResourceManager_Resource_TagKeys extends Google_Service_Resource
{
  /**
   * Creates a new TagKey. If another request with the same parameters is sent
   * while the original request is in process, the second request will receive an
   * error. A maximum of 300 TagKeys can exist under a parent at any given time.
   * (tagKeys.create)
   *
   * @param Google_Service_CloudResourceManager_TagKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set to true to perform validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function create(Google_Service_CloudResourceManager_TagKey $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Deletes a TagKey. The TagKey cannot be deleted if it has any child TagValues.
   * (tagKeys.delete)
   *
   * @param string $name Required. The resource name of a TagKey to be deleted in
   * the format `tagKeys/123`. The TagKey cannot be a parent of any existing
   * TagValues or it will not be deleted successfully.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Optional. The etag known to the client for the
   * expected state of the TagKey. This is to be used for optimistic concurrency.
   * @opt_param bool validateOnly Optional. Set as true to perform validations
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
   * Retrieves a TagKey. This method will return `PERMISSION_DENIED` if the key
   * does not exist or the user does not have permission to view it. (tagKeys.get)
   *
   * @param string $name Required. A resource name in the format `tagKeys/{id}`,
   * such as `tagKeys/123`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudResourceManager_TagKey
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudResourceManager_TagKey");
  }
  /**
   * Gets the access control policy for a TagKey. The returned policy may be empty
   * if no such policy or resource exists. The `resource` field should be the
   * TagKey's resource name. For example, "tagKeys/1234". The caller must have
   * `cloudresourcemanager.googleapis.com/tagKeys.getIamPolicy` permission on the
   * specified TagKey. (tagKeys.getIamPolicy)
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
   * Lists all TagKeys for a parent resource. (tagKeys.listTagKeys)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of TagKeys to return in
   * the response. The server allows a maximum of 300 TagKeys to return. If
   * unspecified, the server will use 100 as the default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListTagKey` that indicates where this listing should
   * continue from.
   * @opt_param string parent Required. The resource name of the new TagKey's
   * parent. Must be of the form `folders/{folder_id}` or
   * `organizations/{org_id}`.
   * @return Google_Service_CloudResourceManager_ListTagKeysResponse
   */
  public function listTagKeys($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudResourceManager_ListTagKeysResponse");
  }
  /**
   * Updates the attributes of the TagKey resource. (tagKeys.patch)
   *
   * @param string $name Immutable. The resource name for a TagKey. Must be in the
   * format `tagKeys/{tag_key_id}`, where `tag_key_id` is the generated numeric id
   * for the TagKey.
   * @param Google_Service_CloudResourceManager_TagKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated. The mask may only contain
   * `description` or `etag`. If omitted entirely, both `description` and `etag`
   * are assumed to be significant.
   * @opt_param bool validateOnly Set as true to perform validations necessary for
   * updating the resource, but not actually perform the action.
   * @return Google_Service_CloudResourceManager_Operation
   */
  public function patch($name, Google_Service_CloudResourceManager_TagKey $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudResourceManager_Operation");
  }
  /**
   * Sets the access control policy on a TagKey, replacing any existing policy.
   * The `resource` field should be the TagKey's resource name. For example,
   * "tagKeys/1234". The caller must have `resourcemanager.tagKeys.setIamPolicy`
   * permission on the identified tagValue. (tagKeys.setIamPolicy)
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
   * Returns permissions that a caller has on the specified TagKey. The `resource`
   * field should be the TagKey's resource name. For example, "tagKeys/1234".
   * There are no permissions required for making this API call.
   * (tagKeys.testIamPermissions)
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
