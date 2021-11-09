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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\BackupRun;
use Google\Service\SQLAdmin\BackupRunsListResponse;
use Google\Service\SQLAdmin\Operation;

/**
 * The "backupRuns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $backupRuns = $sqladminService->backupRuns;
 *  </code>
 */
class BackupRuns extends \Google\Service\Resource
{
  /**
   * Deletes the backup taken by a backup run. (backupRuns.delete)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param string $id The ID of the backup run to delete. To find a backup run
   * ID, use the [list](https://cloud.google.com/sql/docs/mysql/admin-
   * api/rest/v1/backupRuns/list) method.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($project, $instance, $id, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves a resource containing information about a backup run.
   * (backupRuns.get)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param string $id The ID of this backup run.
   * @param array $optParams Optional parameters.
   * @return BackupRun
   */
  public function get($project, $instance, $id, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BackupRun::class);
  }
  /**
   * Creates a new backup run on demand. (backupRuns.insert)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID. This does not include the
   * project ID.
   * @param BackupRun $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function insert($project, $instance, BackupRun $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Lists all backup runs associated with the project or a given instance and
   * configuration in the reverse chronological order of the backup initiation
   * time. (backupRuns.listBackupRuns)
   *
   * @param string $project Project ID of the project that contains the instance.
   * @param string $instance Cloud SQL instance ID, or "-" for all instances. This
   * does not include the project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of backup runs per response.
   * @opt_param string pageToken A previously-returned page token representing
   * part of the larger set of results to view.
   * @return BackupRunsListResponse
   */
  public function listBackupRuns($project, $instance, $optParams = [])
  {
    $params = ['project' => $project, 'instance' => $instance];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BackupRunsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BackupRuns::class, 'Google_Service_SQLAdmin_Resource_BackupRuns');
