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

namespace Google\Service\ApigeeRegistry\Resource;

use Google\Service\ApigeeRegistry\ApiVersion;
use Google\Service\ApigeeRegistry\ApigeeregistryEmpty;
use Google\Service\ApigeeRegistry\ListApiVersionsResponse;
use Google\Service\ApigeeRegistry\Policy;
use Google\Service\ApigeeRegistry\SetIamPolicyRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsResponse;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeregistryService = new Google\Service\ApigeeRegistry(...);
 *   $versions = $apigeeregistryService->versions;
 *  </code>
 */
class ProjectsLocationsApisVersions extends \Google\Service\Resource
{
  /**
   * CreateApiVersion creates a specified version. (versions.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * versions. Format: projects/locations/apis
   * @param ApiVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiVersionId Required. The ID to use for the version, which
   * will become the final component of the version's resource name. This value
   * should be 1-63 characters, and valid characters are /a-z-/. Following
   * AIP-162, IDs must not have the form of a UUID.
   * @return ApiVersion
   */
  public function create($parent, ApiVersion $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ApiVersion::class);
  }
  /**
   * DeleteApiVersion removes a specified version and all of the resources that it
   * owns. (versions.delete)
   *
   * @param string $name Required. The name of the version to delete. Format:
   * projects/locations/apis/versions
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force If set to true, any child resources will also be
   * deleted. (Otherwise, the request will only work if there are no child
   * resources.)
   * @return ApigeeregistryEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ApigeeregistryEmpty::class);
  }
  /**
   * GetApiVersion returns a specified version. (versions.get)
   *
   * @param string $name Required. The name of the version to retrieve. Format:
   * projects/locations/apis/versions
   * @param array $optParams Optional parameters.
   * @return ApiVersion
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ApiVersion::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (versions.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * ListApiVersions returns matching versions.
   * (versions.listProjectsLocationsApisVersions)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * versions. Format: projects/locations/apis
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression that can be used to filter the list.
   * Filters use the Common Expression Language and can refer to all message
   * fields.
   * @opt_param int pageSize The maximum number of versions to return. The service
   * may return fewer than this value. If unspecified, at most 50 values will be
   * returned. The maximum is 1000; values above 1000 will be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListApiVersions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListApiVersions` must match the
   * call that provided the page token.
   * @return ListApiVersionsResponse
   */
  public function listProjectsLocationsApisVersions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListApiVersionsResponse::class);
  }
  /**
   * UpdateApiVersion can be used to modify a specified version. (versions.patch)
   *
   * @param string $name Resource name.
   * @param ApiVersion $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the version is not found, a
   * new version will be created. In this situation, `update_mask` is ignored.
   * @opt_param string updateMask The list of fields to be updated. If omitted,
   * all fields are updated that are set in the request message (fields set to
   * default values are ignored). If a "*" is specified, all fields are updated,
   * including fields that are unspecified/default in the request.
   * @return ApiVersion
   */
  public function patch($name, ApiVersion $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ApiVersion::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (versions.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * This operation may "fail open" without warning. (versions.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsApisVersions::class, 'Google_Service_ApigeeRegistry_Resource_ProjectsLocationsApisVersions');
