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

use Google\Service\CloudBuild\ListGitLabRepositoriesResponse;

/**
 * The "repos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $repos = $cloudbuildService->repos;
 *  </code>
 */
class ProjectsLocationsGitLabConfigsRepos extends \Google\Service\Resource
{
  /**
   * List all repositories for a given `GitLabConfig`. This API is experimental
   * (repos.listProjectsLocationsGitLabConfigsRepos)
   *
   * @param string $parent Required. Name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of repositories to return. The
   * service may return fewer than this value.
   * @opt_param string pageToken A page token, received from a previous
   * ListGitLabRepositoriesRequest` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListGitLabRepositoriesRequest` must match the call that provided the page
   * token.
   * @return ListGitLabRepositoriesResponse
   */
  public function listProjectsLocationsGitLabConfigsRepos($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGitLabRepositoriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGitLabConfigsRepos::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsGitLabConfigsRepos');
