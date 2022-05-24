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

use Google\Service\CloudBuild\GitHubEnterpriseConfig;
use Google\Service\CloudBuild\ListGithubEnterpriseConfigsResponse;
use Google\Service\CloudBuild\Operation;

/**
 * The "githubEnterpriseConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $githubEnterpriseConfigs = $cloudbuildService->githubEnterpriseConfigs;
 *  </code>
 */
class ProjectsLocationsGithubEnterpriseConfigs extends \Google\Service\Resource
{
  /**
   * Create an association between a GCP project and a GitHub Enterprise server.
   * (githubEnterpriseConfigs.create)
   *
   * @param string $parent Name of the parent project. For example:
   * projects/{$project_number} or projects/{$project_id}
   * @param GitHubEnterpriseConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gheConfigId Optional. The ID to use for the
   * GithubEnterpriseConfig, which will become the final component of the
   * GithubEnterpriseConfig's resource name. ghe_config_id must meet the following
   * requirements: + They must contain only alphanumeric characters and dashes. +
   * They can be 1-64 characters long. + They must begin and end with an
   * alphanumeric character
   * @opt_param string projectId ID of the project.
   * @return Operation
   */
  public function create($parent, GitHubEnterpriseConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete an association between a GCP project and a GitHub Enterprise server.
   * (githubEnterpriseConfigs.delete)
   *
   * @param string $name This field should contain the name of the enterprise
   * config resource. For example:
   * "projects/{$project_id}/githubEnterpriseConfigs/{$config_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Unique identifier of the `GitHubEnterpriseConfig`
   * @opt_param string projectId ID of the project
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieve a GitHubEnterpriseConfig. (githubEnterpriseConfigs.get)
   *
   * @param string $name This field should contain the name of the enterprise
   * config resource. For example:
   * "projects/{$project_id}/githubEnterpriseConfigs/{$config_id}"
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Unique identifier of the `GitHubEnterpriseConfig`
   * @opt_param string projectId ID of the project
   * @return GitHubEnterpriseConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GitHubEnterpriseConfig::class);
  }
  /**
   * List all GitHubEnterpriseConfigs for a given project.
   * (githubEnterpriseConfigs.listProjectsLocationsGithubEnterpriseConfigs)
   *
   * @param string $parent Name of the parent project. For example:
   * projects/{$project_number} or projects/{$project_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId ID of the project
   * @return ListGithubEnterpriseConfigsResponse
   */
  public function listProjectsLocationsGithubEnterpriseConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGithubEnterpriseConfigsResponse::class);
  }
  /**
   * Update an association between a GCP project and a GitHub Enterprise server.
   * (githubEnterpriseConfigs.patch)
   *
   * @param string $name Optional. The full resource name for the
   * GitHubEnterpriseConfig For example:
   * "projects/{$project_id}/githubEnterpriseConfigs/{$config_id}"
   * @param GitHubEnterpriseConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask for the resource. If this is set,
   * the server will only update the fields specified in the field mask.
   * Otherwise, a full update of the mutable resource fields will be performed.
   * @return Operation
   */
  public function patch($name, GitHubEnterpriseConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGithubEnterpriseConfigs::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsGithubEnterpriseConfigs');
