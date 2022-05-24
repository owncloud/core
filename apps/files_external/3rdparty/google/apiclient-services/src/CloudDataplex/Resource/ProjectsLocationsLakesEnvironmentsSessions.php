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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListSessionsResponse;

/**
 * The "sessions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $sessions = $dataplexService->sessions;
 *  </code>
 */
class ProjectsLocationsLakesEnvironmentsSessions extends \Google\Service\Resource
{
  /**
   * Lists session resources in an environment.
   * (sessions.listProjectsLocationsLakesEnvironmentsSessions)
   *
   * @param string $parent Required. The resource name of the parent environment:
   * projects/{project_number}/locations/{location_id}/lakes/{lake_id}/environment
   * /{environment_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter request. The following mode filter
   * is supported to return only the sessions belonging to the requester when the
   * mode is USER and return sessions of all the users when the mode is ADMIN.
   * When no filter is sent default to USER mode. NOTE: When the mode is ADMIN,
   * the requester should have dataplex.environments.listAllSessions permission to
   * list all sessions, in absence of the permission, the request fails.mode =
   * ADMIN | USER
   * @opt_param int pageSize Optional. Maximum number of sessions to return. The
   * service may return fewer than this value. If unspecified, at most 10 sessions
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListSessions call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListSessions must match the call
   * that provided the page token.
   * @return GoogleCloudDataplexV1ListSessionsResponse
   */
  public function listProjectsLocationsLakesEnvironmentsSessions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListSessionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesEnvironmentsSessions::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesEnvironmentsSessions');
