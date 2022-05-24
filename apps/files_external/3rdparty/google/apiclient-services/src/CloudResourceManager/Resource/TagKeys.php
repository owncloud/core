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

namespace Google\Service\CloudResourceManager\Resource;

use Google\Service\CloudResourceManager\GetIamPolicyRequest;
use Google\Service\CloudResourceManager\ListTagKeysResponse;
use Google\Service\CloudResourceManager\Operation;
use Google\Service\CloudResourceManager\Policy;
use Google\Service\CloudResourceManager\SetIamPolicyRequest;
use Google\Service\CloudResourceManager\TagKey;
use Google\Service\CloudResourceManager\TestIamPermissionsRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsResponse;

/**
 * The "tagKeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $tagKeys = $cloudresourcemanagerService->tagKeys;
 *  </code>
 */
class TagKeys extends \Google\Service\Resource
{
  /**
   * Creates a new TagKey. If another request with the same parameters is sent
   * while the original request is in process, the second request will receive an
   * error. A maximum of 300 TagKeys can exist under a parent at any given time.
   * (tagKeys.create)
   *
   * @param TagKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set to true to perform validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Operation
   */
  public function create(TagKey $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
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
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves a TagKey. This method will return `PERMISSION_DENIED` if the key
   * does not exist or the user does not have permission to view it. (tagKeys.get)
   *
   * @param string $name Required. A resource name in the format `tagKeys/{id}`,
   * such as `tagKeys/123`.
   * @param array $optParams Optional parameters.
   * @return TagKey
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TagKey::class);
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
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
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
   * @return ListTagKeysResponse
   */
  public function listTagKeys($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTagKeysResponse::class);
  }
  /**
   * Updates the attributes of the TagKey resource. (tagKeys.patch)
   *
   * @param string $name Immutable. The resource name for a TagKey. Must be in the
   * format `tagKeys/{tag_key_id}`, where `tag_key_id` is the generated numeric id
   * for the TagKey.
   * @param TagKey $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated. The mask may only contain
   * `description` or `etag`. If omitted entirely, both `description` and `etag`
   * are assumed to be significant.
   * @opt_param bool validateOnly Set as true to perform validations necessary for
   * updating the resource, but not actually perform the action.
   * @return Operation
   */
  public function patch($name, TagKey $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
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
   * Returns permissions that a caller has on the specified TagKey. The `resource`
   * field should be the TagKey's resource name. For example, "tagKeys/1234".
   * There are no permissions required for making this API call.
   * (tagKeys.testIamPermissions)
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
class_alias(TagKeys::class, 'Google_Service_CloudResourceManager_Resource_TagKeys');
