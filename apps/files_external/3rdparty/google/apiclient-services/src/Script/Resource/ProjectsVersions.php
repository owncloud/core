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

namespace Google\Service\Script\Resource;

use Google\Service\Script\ListVersionsResponse;
use Google\Service\Script\Version;

/**
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $scriptService = new Google\Service\Script(...);
 *   $versions = $scriptService->versions;
 *  </code>
 */
class ProjectsVersions extends \Google\Service\Resource
{
  /**
   * Creates a new immutable version using the current code, with a unique version
   * number. (versions.create)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param Version $postBody
   * @param array $optParams Optional parameters.
   * @return Version
   */
  public function create($scriptId, Version $postBody, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Version::class);
  }
  /**
   * Gets a version of a script project. (versions.get)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param int $versionNumber The version number.
   * @param array $optParams Optional parameters.
   * @return Version
   */
  public function get($scriptId, $versionNumber, $optParams = [])
  {
    $params = ['scriptId' => $scriptId, 'versionNumber' => $versionNumber];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Version::class);
  }
  /**
   * List the versions of a script project. (versions.listProjectsVersions)
   *
   * @param string $scriptId The script project's Drive ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of versions on each returned page.
   * Defaults to 50.
   * @opt_param string pageToken The token for continuing a previous list request
   * on the next page. This should be set to the value of `nextPageToken` from a
   * previous response.
   * @return ListVersionsResponse
   */
  public function listProjectsVersions($scriptId, $optParams = [])
  {
    $params = ['scriptId' => $scriptId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVersionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsVersions::class, 'Google_Service_Script_Resource_ProjectsVersions');
