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

namespace Google\Service\Bigquery\Resource;

use Google\Service\Bigquery\GetServiceAccountResponse;
use Google\Service\Bigquery\ProjectList;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google\Service\Bigquery(...);
 *   $projects = $bigqueryService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Returns the email address of the service account for your project used for
   * interactions with Google Cloud KMS. (projects.getServiceAccount)
   *
   * @param string $projectId Project ID for which the service account is
   * requested.
   * @param array $optParams Optional parameters.
   * @return GetServiceAccountResponse
   */
  public function getServiceAccount($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('getServiceAccount', [$params], GetServiceAccountResponse::class);
  }
  /**
   * Lists all projects to which you have been granted any project role.
   * (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @return ProjectList
   */
  public function listProjects($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ProjectList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Bigquery_Resource_Projects');
