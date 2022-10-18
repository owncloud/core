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

namespace Google\Service\CloudBuild\Resource;

use Google\Service\CloudBuild\CloudbuildEmpty;
use Google\Service\CloudBuild\GitLabConfig;
use Google\Service\CloudBuild\ListGitLabConfigsResponse;
use Google\Service\CloudBuild\Operation;
use Google\Service\CloudBuild\RemoveGitLabConnectedRepositoryRequest;

/**
 * The "gitLabConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $gitLabConfigs = $cloudbuildService->gitLabConfigs;
 *  </code>
 */
class ProjectsLocationsGitLabConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new `GitLabConfig`. This API is experimental (gitLabConfigs.create)
   *
   * @param string $parent Required. Name of the parent resource.
   * @param GitLabConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gitlabConfigId Optional. The ID to use for the
   * GitLabConfig, which will become the final component of the GitLabConfig’s
   * resource name. gitlab_config_id must meet the following requirements: + They
   * must contain only alphanumeric characters and dashes. + They can be 1-64
   * characters long. + They must begin and end with an alphanumeric character
   * @return Operation
   */
  public function create($parent, GitLabConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete a `GitLabConfig`. This API is experimental (gitLabConfigs.delete)
   *
   * @param string $name Required. The config resource name.
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
   * Retrieves a `GitLabConfig`. This API is experimental (gitLabConfigs.get)
   *
   * @param string $name Required. The config resource name.
   * @param array $optParams Optional parameters.
   * @return GitLabConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GitLabConfig::class);
  }
  /**
   * List all `GitLabConfigs` for a given project. This API is experimental
   * (gitLabConfigs.listProjectsLocationsGitLabConfigs)
   *
   * @param string $parent Required. Name of the parent resource
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of configs to return. The service
   * may return fewer than this value. If unspecified, at most 50 configs will be
   * returned. The maximum value is 1000;, values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * ‘ListGitlabConfigsRequest’ call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * ‘ListGitlabConfigsRequest’ must match the call that provided the page token.
   * @return ListGitLabConfigsResponse
   */
  public function listProjectsLocationsGitLabConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGitLabConfigsResponse::class);
  }
  /**
   * Updates an existing `GitLabConfig`. This API is experimental
   * (gitLabConfigs.patch)
   *
   * @param string $name The resource name for the config.
   * @param GitLabConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask for the resource. If this is set,
   * the server will only update the fields specified in the field mask.
   * Otherwise, a full update of the mutable resource fields will be performed.
   * @return Operation
   */
  public function patch($name, GitLabConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Remove a GitLab repository from a given GitLabConfig's connected
   * repositories. This API is experimental.
   * (gitLabConfigs.removeGitLabConnectedRepository)
   *
   * @param string $config Required. The name of the `GitLabConfig` to remove a
   * connected repository. Format:
   * `projects/{project}/locations/{location}/gitLabConfigs/{config}`
   * @param RemoveGitLabConnectedRepositoryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CloudbuildEmpty
   */
  public function removeGitLabConnectedRepository($config, RemoveGitLabConnectedRepositoryRequest $postBody, $optParams = [])
  {
    $params = ['config' => $config, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeGitLabConnectedRepository', [$params], CloudbuildEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGitLabConfigs::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsGitLabConfigs');
