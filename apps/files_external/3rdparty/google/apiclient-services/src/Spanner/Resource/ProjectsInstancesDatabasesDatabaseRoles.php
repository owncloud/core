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

namespace Google\Service\Spanner\Resource;

use Google\Service\Spanner\ListDatabaseRolesResponse;

/**
 * The "databaseRoles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $spannerService = new Google\Service\Spanner(...);
 *   $databaseRoles = $spannerService->databaseRoles;
 *  </code>
 */
class ProjectsInstancesDatabasesDatabaseRoles extends \Google\Service\Resource
{
  /**
   * Lists Cloud Spanner database roles.
   * (databaseRoles.listProjectsInstancesDatabasesDatabaseRoles)
   *
   * @param string $parent Required. The database whose roles should be listed.
   * Values are of the form `projects//instances//databases//databaseRoles`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of database roles to be returned in the
   * response. If 0 or less, defaults to the server's maximum allowed page size.
   * @opt_param string pageToken If non-empty, `page_token` should contain a
   * next_page_token from a previous ListDatabaseRolesResponse.
   * @return ListDatabaseRolesResponse
   */
  public function listProjectsInstancesDatabasesDatabaseRoles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDatabaseRolesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsInstancesDatabasesDatabaseRoles::class, 'Google_Service_Spanner_Resource_ProjectsInstancesDatabasesDatabaseRoles');
