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

namespace Google\Service\CloudSourceRepositories\Resource;

use Google\Service\CloudSourceRepositories\ListReposResponse;
use Google\Service\CloudSourceRepositories\Operation;
use Google\Service\CloudSourceRepositories\Policy;
use Google\Service\CloudSourceRepositories\Repo;
use Google\Service\CloudSourceRepositories\SetIamPolicyRequest;
use Google\Service\CloudSourceRepositories\SourcerepoEmpty;
use Google\Service\CloudSourceRepositories\SyncRepoRequest;
use Google\Service\CloudSourceRepositories\TestIamPermissionsRequest;
use Google\Service\CloudSourceRepositories\TestIamPermissionsResponse;
use Google\Service\CloudSourceRepositories\UpdateRepoRequest;

/**
 * The "repos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sourcerepoService = new Google\Service\CloudSourceRepositories(...);
 *   $repos = $sourcerepoService->repos;
 *  </code>
 */
class ProjectsRepos extends \Google\Service\Resource
{
  /**
   * Creates a repo in the given project with the given name. If the named
   * repository already exists, `CreateRepo` returns `ALREADY_EXISTS`.
   * (repos.create)
   *
   * @param string $parent The project in which to create the repo. Values are of
   * the form `projects/`.
   * @param Repo $postBody
   * @param array $optParams Optional parameters.
   * @return Repo
   */
  public function create($parent, Repo $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Repo::class);
  }
  /**
   * Deletes a repo. (repos.delete)
   *
   * @param string $name The name of the repo to delete. Values are of the form
   * `projects//repos/`.
   * @param array $optParams Optional parameters.
   * @return SourcerepoEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SourcerepoEmpty::class);
  }
  /**
   * Returns information about a repo. (repos.get)
   *
   * @param string $name The name of the requested repository. Values are of the
   * form `projects//repos/`.
   * @param array $optParams Optional parameters.
   * @return Repo
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Repo::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (repos.getIamPolicy)
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
   * Returns all repos belonging to a project. The sizes of the repos are not set
   * by ListRepos. To get the size of a repo, use GetRepo.
   * (repos.listProjectsRepos)
   *
   * @param string $name The project ID whose repos should be listed. Values are
   * of the form `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of repositories to return; between 1
   * and 500. If not set or zero, defaults to 100 at the server.
   * @opt_param string pageToken Resume listing repositories where a prior
   * ListReposResponse left off. This is an opaque token that must be obtained
   * from a recent, prior ListReposResponse's next_page_token field.
   * @return ListReposResponse
   */
  public function listProjectsRepos($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReposResponse::class);
  }
  /**
   * Updates information about a repo. (repos.patch)
   *
   * @param string $name The name of the requested repository. Values are of the
   * form `projects//repos/`.
   * @param UpdateRepoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Repo
   */
  public function patch($name, UpdateRepoRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Repo::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (repos.setIamPolicy)
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
   * Synchronize a connected repo. The response contains SyncRepoMetadata in the
   * metadata field. (repos.sync)
   *
   * @param string $name The name of the repo to synchronize. Values are of the
   * form `projects//repos/`.
   * @param SyncRepoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function sync($name, SyncRepoRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('sync', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error. (repos.testIamPermissions)
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
class_alias(ProjectsRepos::class, 'Google_Service_CloudSourceRepositories_Resource_ProjectsRepos');
