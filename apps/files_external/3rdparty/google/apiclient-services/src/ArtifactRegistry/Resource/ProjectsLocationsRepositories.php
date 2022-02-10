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

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\ListRepositoriesResponse;
use Google\Service\ArtifactRegistry\Operation;
use Google\Service\ArtifactRegistry\Policy;
use Google\Service\ArtifactRegistry\Repository;
use Google\Service\ArtifactRegistry\SetIamPolicyRequest;
use Google\Service\ArtifactRegistry\TestIamPermissionsRequest;
use Google\Service\ArtifactRegistry\TestIamPermissionsResponse;

/**
 * The "repositories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $repositories = $artifactregistryService->repositories;
 *  </code>
 */
class ProjectsLocationsRepositories extends \Google\Service\Resource
{
  /**
   * Creates a repository. The returned Operation will finish once the repository
   * has been created. Its response will be the created Repository.
   * (repositories.create)
   *
   * @param string $parent Required. The name of the parent resource where the
   * repository will be created.
   * @param Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string repositoryId The repository id to use for this repository.
   * @return Operation
   */
  public function create($parent, Repository $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a repository and all of its contents. The returned Operation will
   * finish once the repository has been deleted. It will not have any Operation
   * metadata and will return a google.protobuf.Empty response.
   * (repositories.delete)
   *
   * @param string $name Required. The name of the repository to delete.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets a repository. (repositories.get)
   *
   * @param string $name Required. The name of the repository to retrieve.
   * @param array $optParams Optional parameters.
   * @return Repository
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Repository::class);
  }
  /**
   * Gets the IAM policy for a given resource. (repositories.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
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
   * Lists repositories. (repositories.listProjectsLocationsRepositories)
   *
   * @param string $parent Required. The name of the parent resource whose
   * repositories will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of repositories to return. Maximum
   * page size is 1,000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return ListRepositoriesResponse
   */
  public function listProjectsLocationsRepositories($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRepositoriesResponse::class);
  }
  /**
   * Updates a repository. (repositories.patch)
   *
   * @param string $name The name of the repository, for example:
   * "projects/p1/locations/us-central1/repositories/repo1".
   * @param Repository $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Repository
   */
  public function patch($name, Repository $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Repository::class);
  }
  /**
   * Updates the IAM policy for a given resource. (repositories.setIamPolicy)
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
   * Tests if the caller has a list of permissions on a resource.
   * (repositories.testIamPermissions)
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
class_alias(ProjectsLocationsRepositories::class, 'Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositories');
