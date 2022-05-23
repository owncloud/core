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

use Google\Service\ApigeeRegistry\ApiSpec;
use Google\Service\ApigeeRegistry\ApigeeregistryEmpty;
use Google\Service\ApigeeRegistry\HttpBody;
use Google\Service\ApigeeRegistry\ListApiSpecRevisionsResponse;
use Google\Service\ApigeeRegistry\ListApiSpecsResponse;
use Google\Service\ApigeeRegistry\Policy;
use Google\Service\ApigeeRegistry\RollbackApiSpecRequest;
use Google\Service\ApigeeRegistry\SetIamPolicyRequest;
use Google\Service\ApigeeRegistry\TagApiSpecRevisionRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsResponse;

/**
 * The "specs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeregistryService = new Google\Service\ApigeeRegistry(...);
 *   $specs = $apigeeregistryService->specs;
 *  </code>
 */
class ProjectsLocationsApisVersionsSpecs extends \Google\Service\Resource
{
  /**
   * CreateApiSpec creates a specified spec. (specs.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * specs. Format: projects/locations/apis/versions
   * @param ApiSpec $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiSpecId Required. The ID to use for the spec, which will
   * become the final component of the spec's resource name. This value should be
   * 4-63 characters, and valid characters are /a-z-/. Following AIP-162, IDs must
   * not have the form of a UUID.
   * @return ApiSpec
   */
  public function create($parent, ApiSpec $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ApiSpec::class);
  }
  /**
   * DeleteApiSpec removes a specified spec, all revisions, and all child
   * resources (e.g. artifacts). (specs.delete)
   *
   * @param string $name Required. The name of the spec to delete. Format:
   * projects/locations/apis/versions/specs
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
   * DeleteApiSpecRevision deletes a revision of a spec. (specs.deleteRevision)
   *
   * @param string $name Required. The name of the spec revision to be deleted,
   * with a revision ID explicitly included. Example: projects/sample/locations/gl
   * obal/apis/petstore/versions/1.0.0/specs/openapi.yaml@c7cfa2a8
   * @param array $optParams Optional parameters.
   * @return ApiSpec
   */
  public function deleteRevision($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteRevision', [$params], ApiSpec::class);
  }
  /**
   * GetApiSpec returns a specified spec. (specs.get)
   *
   * @param string $name Required. The name of the spec to retrieve. Format:
   * projects/locations/apis/versions/specs
   * @param array $optParams Optional parameters.
   * @return ApiSpec
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ApiSpec::class);
  }
  /**
   * GetApiSpecContents returns the contents of a specified spec. If specs are
   * stored with GZip compression, the default behavior is to return the spec
   * uncompressed (the mime_type response field indicates the exact format
   * returned). (specs.getContents)
   *
   * @param string $name Required. The name of the spec whose contents should be
   * retrieved. Format: projects/locations/apis/versions/specs
   * @param array $optParams Optional parameters.
   * @return HttpBody
   */
  public function getContents($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getContents', [$params], HttpBody::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (specs.getIamPolicy)
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
   * ListApiSpecs returns matching specs.
   * (specs.listProjectsLocationsApisVersionsSpecs)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * specs. Format: projects/locations/apis/versions
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression that can be used to filter the list.
   * Filters use the Common Expression Language and can refer to all message
   * fields except contents.
   * @opt_param int pageSize The maximum number of specs to return. The service
   * may return fewer than this value. If unspecified, at most 50 values will be
   * returned. The maximum is 1000; values above 1000 will be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListApiSpecs` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListApiSpecs` must match the
   * call that provided the page token.
   * @return ListApiSpecsResponse
   */
  public function listProjectsLocationsApisVersionsSpecs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListApiSpecsResponse::class);
  }
  /**
   * ListApiSpecRevisions lists all revisions of a spec. Revisions are returned in
   * descending order of revision creation time. (specs.listRevisions)
   *
   * @param string $name Required. The name of the spec to list revisions for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of revisions to return per page.
   * @opt_param string pageToken The page token, received from a previous
   * ListApiSpecRevisions call. Provide this to retrieve the subsequent page.
   * @return ListApiSpecRevisionsResponse
   */
  public function listRevisions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('listRevisions', [$params], ListApiSpecRevisionsResponse::class);
  }
  /**
   * UpdateApiSpec can be used to modify a specified spec. (specs.patch)
   *
   * @param string $name Resource name.
   * @param ApiSpec $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the spec is not found, a new
   * spec will be created. In this situation, `update_mask` is ignored.
   * @opt_param string updateMask The list of fields to be updated. If omitted,
   * all fields are updated that are set in the request message (fields set to
   * default values are ignored). If a "*" is specified, all fields are updated,
   * including fields that are unspecified/default in the request.
   * @return ApiSpec
   */
  public function patch($name, ApiSpec $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ApiSpec::class);
  }
  /**
   * RollbackApiSpec sets the current revision to a specified prior revision. Note
   * that this creates a new revision with a new revision ID. (specs.rollback)
   *
   * @param string $name Required. The spec being rolled back.
   * @param RollbackApiSpecRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApiSpec
   */
  public function rollback($name, RollbackApiSpecRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rollback', [$params], ApiSpec::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (specs.setIamPolicy)
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
   * TagApiSpecRevision adds a tag to a specified revision of a spec.
   * (specs.tagRevision)
   *
   * @param string $name Required. The name of the spec to be tagged, including
   * the revision ID.
   * @param TagApiSpecRevisionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApiSpec
   */
  public function tagRevision($name, TagApiSpecRevisionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('tagRevision', [$params], ApiSpec::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (specs.testIamPermissions)
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
class_alias(ProjectsLocationsApisVersionsSpecs::class, 'Google_Service_ApigeeRegistry_Resource_ProjectsLocationsApisVersionsSpecs');
