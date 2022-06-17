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

namespace Google\Service\VMMigrationService\Resource;

use Google\Service\VMMigrationService\ListReplicationCyclesResponse;
use Google\Service\VMMigrationService\ReplicationCycle;

/**
 * The "replicationCycles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $replicationCycles = $vmmigrationService->replicationCycles;
 *  </code>
 */
class ProjectsLocationsSourcesMigratingVmsReplicationCycles extends \Google\Service\Resource
{
  /**
   * Gets details of a single ReplicationCycle. (replicationCycles.get)
   *
   * @param string $name Required. The name of the ReplicationCycle.
   * @param array $optParams Optional parameters.
   * @return ReplicationCycle
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ReplicationCycle::class);
  }
  /**
   * Lists ReplicationCycles in a given MigratingVM.
   * (replicationCycles.listProjectsLocationsSourcesMigratingVmsReplicationCycles)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * ReplicationCycles.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of replication cycles to
   * return. The service may return fewer than this value. If unspecified, at most
   * 100 migrating VMs will be returned. The maximum value is 100; values above
   * 100 will be coerced to 100.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListReplicationCycles` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListReplicationCycles`
   * must match the call that provided the page token.
   * @return ListReplicationCyclesResponse
   */
  public function listProjectsLocationsSourcesMigratingVmsReplicationCycles($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReplicationCyclesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesMigratingVmsReplicationCycles::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesMigratingVmsReplicationCycles');
