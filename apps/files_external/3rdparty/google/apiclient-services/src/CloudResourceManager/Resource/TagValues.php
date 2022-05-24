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
use Google\Service\CloudResourceManager\ListTagValuesResponse;
use Google\Service\CloudResourceManager\Operation;
use Google\Service\CloudResourceManager\Policy;
use Google\Service\CloudResourceManager\SetIamPolicyRequest;
use Google\Service\CloudResourceManager\TagValue;
use Google\Service\CloudResourceManager\TestIamPermissionsRequest;
use Google\Service\CloudResourceManager\TestIamPermissionsResponse;

/**
 * The "tagValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudresourcemanagerService = new Google\Service\CloudResourceManager(...);
 *   $tagValues = $cloudresourcemanagerService->tagValues;
 *  </code>
 */
class TagValues extends \Google\Service\Resource
{
  /**
   * Creates a TagValue as a child of the specified TagKey. If a another request
   * with the same parameters is sent while the original request is in process the
   * second request will receive an error. A maximum of 300 TagValues can exist
   * under a TagKey at any given time. (tagValues.create)
   *
   * @param TagValue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Set as true to perform the validations
   * necessary for creating the resource, but not actually perform the action.
   * @return Operation
   */
  public function create(TagValue $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
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
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves TagValue. If the TagValue or namespaced name does not exist, or if
   * the user does not have permission to view it, this method will return
   * `PERMISSION_DENIED`. (tagValues.get)
   *
   * @param string $name Required. Resource name for TagValue to be fetched in the
   * format `tagValues/456`.
   * @param array $optParams Optional parameters.
   * @return TagValue
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TagValue::class);
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
   * Lists all TagValues for a specific TagKey. (tagValues.listTagValues)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of TagValues to return
   * in the response. The server allows a maximum of 300 TagValues to return. If
   * unspecified, the server will use 100 as the default.
   * @opt_param string pageToken Optional. A pagination token returned from a
   * previous call to `ListTagValues` that indicates where this listing should
   * continue from.
   * @opt_param string parent Required. Resource name for TagKey, parent of the
   * TagValues to be listed, in the format `tagKeys/123`.
   * @return ListTagValuesResponse
   */
  public function listTagValues($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTagValuesResponse::class);
  }
  /**
   * Updates the attributes of the TagValue resource. (tagValues.patch)
   *
   * @param string $name Immutable. Resource name for TagValue in the format
   * `tagValues/456`.
   * @param TagValue $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Fields to be updated.
   * @opt_param bool validateOnly Optional. True to perform validations necessary
   * for updating the resource, but not actually perform the action.
   * @return Operation
   */
  public function patch($name, TagValue $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
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
   * Returns permissions that a caller has on the specified TagValue. The
   * `resource` field should be the TagValue's resource name. For example:
   * `tagValues/1234`. There are no permissions required for making this API call.
   * (tagValues.testIamPermissions)
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
class_alias(TagValues::class, 'Google_Service_CloudResourceManager_Resource_TagValues');
