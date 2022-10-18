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

use Google\Service\ApigeeRegistry\ApiDeployment;
use Google\Service\ApigeeRegistry\ApigeeregistryEmpty;
use Google\Service\ApigeeRegistry\ListApiDeploymentRevisionsResponse;
use Google\Service\ApigeeRegistry\ListApiDeploymentsResponse;
use Google\Service\ApigeeRegistry\Policy;
use Google\Service\ApigeeRegistry\RollbackApiDeploymentRequest;
use Google\Service\ApigeeRegistry\SetIamPolicyRequest;
use Google\Service\ApigeeRegistry\TagApiDeploymentRevisionRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsRequest;
use Google\Service\ApigeeRegistry\TestIamPermissionsResponse;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeregistryService = new Google\Service\ApigeeRegistry(...);
 *   $deployments = $apigeeregistryService->deployments;
 *  </code>
 */
class ProjectsLocationsApisDeployments extends \Google\Service\Resource
{
  /**
   * Creates a specified deployment. (deployments.create)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * deployments. Format: `projects/locations/apis`
   * @param ApiDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiDeploymentId Required. The ID to use for the deployment,
   * which will become the final component of the deployment's resource name. This
   * value should be 4-63 characters, and valid characters are /a-z-/. Following
   * AIP-162, IDs must not have the form of a UUID.
   * @return ApiDeployment
   */
  public function create($parent, ApiDeployment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ApiDeployment::class);
  }
  /**
   * Removes a specified deployment, all revisions, and all child resources (e.g.,
   * artifacts). (deployments.delete)
   *
   * @param string $name Required. The name of the deployment to delete. Format:
   * `projects/locations/apis/deployments`
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
   * Deletes a revision of a deployment. (deployments.deleteRevision)
   *
   * @param string $name Required. The name of the deployment revision to be
   * deleted, with a revision ID explicitly included. Example:
   * `projects/sample/locations/global/apis/petstore/deployments/prod@c7cfa2a8`
   * @param array $optParams Optional parameters.
   * @return ApiDeployment
   */
  public function deleteRevision($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteRevision', [$params], ApiDeployment::class);
  }
  /**
   * Returns a specified deployment. (deployments.get)
   *
   * @param string $name Required. The name of the deployment to retrieve. Format:
   * `projects/locations/apis/deployments`
   * @param array $optParams Optional parameters.
   * @return ApiDeployment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ApiDeployment::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (deployments.getIamPolicy)
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
   * Returns matching deployments.
   * (deployments.listProjectsLocationsApisDeployments)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * deployments. Format: `projects/locations/apis`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression that can be used to filter the list.
   * Filters use the Common Expression Language and can refer to all message
   * fields.
   * @opt_param string orderBy A comma-separated list of fields, e.g. "foo,bar"
   * Fields can be sorted in descending order using the "desc" identifier, e.g.
   * "foo desc,bar"
   * @opt_param int pageSize The maximum number of deployments to return. The
   * service may return fewer than this value. If unspecified, at most 50 values
   * will be returned. The maximum is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListApiDeployments` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListApiDeployments` must match
   * the call that provided the page token.
   * @return ListApiDeploymentsResponse
   */
  public function listProjectsLocationsApisDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListApiDeploymentsResponse::class);
  }
  /**
   * Lists all revisions of a deployment. Revisions are returned in descending
   * order of revision creation time. (deployments.listRevisions)
   *
   * @param string $name Required. The name of the deployment to list revisions
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of revisions to return per page.
   * @opt_param string pageToken The page token, received from a previous
   * ListApiDeploymentRevisions call. Provide this to retrieve the subsequent
   * page.
   * @return ListApiDeploymentRevisionsResponse
   */
  public function listRevisions($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('listRevisions', [$params], ListApiDeploymentRevisionsResponse::class);
  }
  /**
   * Used to modify a specified deployment. (deployments.patch)
   *
   * @param string $name Resource name.
   * @param ApiDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the deployment is not found,
   * a new deployment will be created. In this situation, `update_mask` is
   * ignored.
   * @opt_param string updateMask The list of fields to be updated. If omitted,
   * all fields are updated that are set in the request message (fields set to
   * default values are ignored). If an asterisk "*" is specified, all fields are
   * updated, including fields that are unspecified/default in the request.
   * @return ApiDeployment
   */
  public function patch($name, ApiDeployment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ApiDeployment::class);
  }
  /**
   * Sets the current revision to a specified prior revision. Note that this
   * creates a new revision with a new revision ID. (deployments.rollback)
   *
   * @param string $name Required. The deployment being rolled back.
   * @param RollbackApiDeploymentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApiDeployment
   */
  public function rollback($name, RollbackApiDeploymentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rollback', [$params], ApiDeployment::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (deployments.setIamPolicy)
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
   * Adds a tag to a specified revision of a deployment. (deployments.tagRevision)
   *
   * @param string $name Required. The name of the deployment to be tagged,
   * including the revision ID.
   * @param TagApiDeploymentRevisionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ApiDeployment
   */
  public function tagRevision($name, TagApiDeploymentRevisionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('tagRevision', [$params], ApiDeployment::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (deployments.testIamPermissions)
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
class_alias(ProjectsLocationsApisDeployments::class, 'Google_Service_ApigeeRegistry_Resource_ProjectsLocationsApisDeployments');
