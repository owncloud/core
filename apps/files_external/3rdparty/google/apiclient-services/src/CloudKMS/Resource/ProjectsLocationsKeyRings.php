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

namespace Google\Service\CloudKMS\Resource;

use Google\Service\CloudKMS\KeyRing;
use Google\Service\CloudKMS\ListKeyRingsResponse;
use Google\Service\CloudKMS\Policy;
use Google\Service\CloudKMS\SetIamPolicyRequest;
use Google\Service\CloudKMS\TestIamPermissionsRequest;
use Google\Service\CloudKMS\TestIamPermissionsResponse;

/**
 * The "keyRings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudkmsService = new Google\Service\CloudKMS(...);
 *   $keyRings = $cloudkmsService->keyRings;
 *  </code>
 */
class ProjectsLocationsKeyRings extends \Google\Service\Resource
{
  /**
   * Create a new KeyRing in a given Project and Location. (keyRings.create)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the KeyRings, in the format `projects/locations`.
   * @param KeyRing $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string keyRingId Required. It must be unique within a location and
   * match the regular expression `[a-zA-Z0-9_-]{1,63}`
   * @return KeyRing
   */
  public function create($parent, KeyRing $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], KeyRing::class);
  }
  /**
   * Returns metadata for a given KeyRing. (keyRings.get)
   *
   * @param string $name Required. The name of the KeyRing to get.
   * @param array $optParams Optional parameters.
   * @return KeyRing
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], KeyRing::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (keyRings.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists KeyRings. (keyRings.listProjectsLocationsKeyRings)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the KeyRings, in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response. For more information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * If not specified, the results will be sorted in the default order. For more
   * information, see [Sorting and filtering list
   * results](https://cloud.google.com/kms/docs/sorting-and-filtering).
   * @opt_param int pageSize Optional. Optional limit on the number of KeyRings to
   * include in the response. Further KeyRings can subsequently be obtained by
   * including the ListKeyRingsResponse.next_page_token in a subsequent request.
   * If unspecified, the server will pick an appropriate default.
   * @opt_param string pageToken Optional. Optional pagination token, returned
   * earlier via ListKeyRingsResponse.next_page_token.
   * @return ListKeyRingsResponse
   */
  public function listProjectsLocationsKeyRings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListKeyRingsResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (keyRings.setIamPolicy)
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
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (keyRings.testIamPermissions)
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
class_alias(ProjectsLocationsKeyRings::class, 'Google_Service_CloudKMS_Resource_ProjectsLocationsKeyRings');
