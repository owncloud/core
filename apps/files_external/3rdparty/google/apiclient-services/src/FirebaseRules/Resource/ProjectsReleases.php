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

namespace Google\Service\FirebaseRules\Resource;

use Google\Service\FirebaseRules\FirebaserulesEmpty;
use Google\Service\FirebaseRules\GetReleaseExecutableResponse;
use Google\Service\FirebaseRules\ListReleasesResponse;
use Google\Service\FirebaseRules\Release;
use Google\Service\FirebaseRules\UpdateReleaseRequest;

/**
 * The "releases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaserulesService = new Google\Service\FirebaseRules(...);
 *   $releases = $firebaserulesService->releases;
 *  </code>
 */
class ProjectsReleases extends \Google\Service\Resource
{
  /**
   * Create a `Release`. Release names should reflect the developer's deployment
   * practices. For example, the release name may include the environment name,
   * application name, application version, or any other name meaningful to the
   * developer. Once a `Release` refers to a `Ruleset`, the rules can be enforced
   * by Firebase Rules-enabled services. More than one `Release` may be 'live'
   * concurrently. Consider the following three `Release` names for `projects/foo`
   * and the `Ruleset` to which they refer. Release Name -> Ruleset Name *
   * projects/foo/releases/prod -> projects/foo/rulesets/uuid123 *
   * projects/foo/releases/prod/beta -> projects/foo/rulesets/uuid123 *
   * projects/foo/releases/prod/v23 -> projects/foo/rulesets/uuid456 The
   * relationships reflect a `Ruleset` rollout in progress. The `prod` and
   * `prod/beta` releases refer to the same `Ruleset`. However, `prod/v23` refers
   * to a new `Ruleset`. The `Ruleset` reference for a `Release` may be updated
   * using the UpdateRelease method. (releases.create)
   *
   * @param string $name Required. Resource name for the project which owns this
   * `Release`. Format: `projects/{project_id}`
   * @param Release $postBody
   * @param array $optParams Optional parameters.
   * @return Release
   */
  public function create($name, Release $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Release::class);
  }
  /**
   * Delete a `Release` by resource name. (releases.delete)
   *
   * @param string $name Required. Resource name for the `Release` to delete.
   * Format: `projects/{project_id}/releases/{release_id}`
   * @param array $optParams Optional parameters.
   * @return FirebaserulesEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], FirebaserulesEmpty::class);
  }
  /**
   * Get a `Release` by name. (releases.get)
   *
   * @param string $name Required. Resource name of the `Release`. Format:
   * `projects/{project_id}/releases/{release_id}`
   * @param array $optParams Optional parameters.
   * @return Release
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Release::class);
  }
  /**
   * Get the `Release` executable to use when enforcing rules.
   * (releases.getExecutable)
   *
   * @param string $name Required. Resource name of the `Release`. Format:
   * `projects/{project_id}/releases/{release_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string executableVersion The requested runtime executable version.
   * Defaults to FIREBASE_RULES_EXECUTABLE_V1.
   * @return GetReleaseExecutableResponse
   */
  public function getExecutable($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getExecutable', [$params], GetReleaseExecutableResponse::class);
  }
  /**
   * List the `Release` values for a project. This list may optionally be filtered
   * by `Release` name, `Ruleset` name, `TestSuite` name, or any combination
   * thereof. (releases.listProjectsReleases)
   *
   * @param string $name Required. Resource name for the project. Format:
   * `projects/{project_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter `Release` filter. The list method supports filters
   * with restrictions on the `Release.name`, and `Release.ruleset_name`. Example
   * 1: A filter of 'name=prod*' might return `Release`s with names within
   * 'projects/foo' prefixed with 'prod': Name -> Ruleset Name: *
   * projects/foo/releases/prod -> projects/foo/rulesets/uuid1234 *
   * projects/foo/releases/prod/v1 -> projects/foo/rulesets/uuid1234 *
   * projects/foo/releases/prod/v2 -> projects/foo/rulesets/uuid8888 Example 2: A
   * filter of `name=prod* ruleset_name=uuid1234` would return only `Release`
   * instances for 'projects/foo' with names prefixed with 'prod' referring to the
   * same `Ruleset` name of 'uuid1234': Name -> Ruleset Name: *
   * projects/foo/releases/prod -> projects/foo/rulesets/1234 *
   * projects/foo/releases/prod/v1 -> projects/foo/rulesets/1234 In the examples,
   * the filter parameters refer to the search filters are relative to the
   * project. Fully qualified prefixed may also be used.
   * @opt_param int pageSize Page size to load. Maximum of 100. Defaults to 10.
   * Note: `page_size` is just a hint and the service may choose to load fewer
   * than `page_size` results due to the size of the output. To traverse all of
   * the releases, the caller should iterate until the `page_token` on the
   * response is empty.
   * @opt_param string pageToken Next page token for the next batch of `Release`
   * instances.
   * @return ListReleasesResponse
   */
  public function listProjectsReleases($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReleasesResponse::class);
  }
  /**
   * Update a `Release` via PATCH. Only updates to `ruleset_name` will be honored.
   * `Release` rename is not supported. To create a `Release` use the
   * CreateRelease method. (releases.patch)
   *
   * @param string $name Required. Resource name for the project which owns this
   * `Release`. Format: `projects/{project_id}`
   * @param UpdateReleaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Release
   */
  public function patch($name, UpdateReleaseRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Release::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsReleases::class, 'Google_Service_FirebaseRules_Resource_ProjectsReleases');
