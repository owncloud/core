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

use Google\Service\VMMigrationService\FinalizeMigrationRequest;
use Google\Service\VMMigrationService\ListMigratingVmsResponse;
use Google\Service\VMMigrationService\MigratingVm;
use Google\Service\VMMigrationService\Operation;
use Google\Service\VMMigrationService\PauseMigrationRequest;
use Google\Service\VMMigrationService\ResumeMigrationRequest;
use Google\Service\VMMigrationService\StartMigrationRequest;

/**
 * The "migratingVms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $migratingVms = $vmmigrationService->migratingVms;
 *  </code>
 */
class ProjectsLocationsSourcesMigratingVms extends \Google\Service\Resource
{
  /**
   * Creates a new MigratingVm in a given Source. (migratingVms.create)
   *
   * @param string $parent Required. The MigratingVm's parent.
   * @param MigratingVm $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string migratingVmId Required. The migratingVm identifier.
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, MigratingVm $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single MigratingVm. (migratingVms.delete)
   *
   * @param string $name Required. The name of the MigratingVm.
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
   * Marks a migration as completed, deleting migration resources that are no
   * longer being used. Only applicable after cutover is done.
   * (migratingVms.finalizeMigration)
   *
   * @param string $migratingVm Required. The name of the MigratingVm.
   * @param FinalizeMigrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function finalizeMigration($migratingVm, FinalizeMigrationRequest $postBody, $optParams = [])
  {
    $params = ['migratingVm' => $migratingVm, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('finalizeMigration', [$params], Operation::class);
  }
  /**
   * Gets details of a single MigratingVm. (migratingVms.get)
   *
   * @param string $name Required. The name of the MigratingVm.
   * @param array $optParams Optional parameters.
   * @return MigratingVm
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MigratingVm::class);
  }
  /**
   * Lists MigratingVms in a given Source.
   * (migratingVms.listProjectsLocationsSourcesMigratingVms)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * MigratingVms.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of migrating VMs to
   * return. The service may return fewer than this value. If unspecified, at most
   * 500 migrating VMs will be returned. The maximum value is 1000; values above
   * 1000 will be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListMigratingVms` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListMigratingVms` must match
   * the call that provided the page token.
   * @return ListMigratingVmsResponse
   */
  public function listProjectsLocationsSourcesMigratingVms($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMigratingVmsResponse::class);
  }
  /**
   * Updates the parameters of a single MigratingVm. (migratingVms.patch)
   *
   * @param string $name Output only. The identifier of the MigratingVm.
   * @param MigratingVm $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Field mask is used to specify the fields to be
   * overwritten in the MigratingVm resource by the update. The fields specified
   * in the update_mask are relative to the resource, not the full request. A
   * field will be overwritten if it is in the mask. If the user does not provide
   * a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, MigratingVm $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Pauses a migration for a VM. If cycle tasks are running they will be
   * cancelled, preserving source task data. Further replication cycles will not
   * be triggered while the VM is paused. (migratingVms.pauseMigration)
   *
   * @param string $migratingVm Required. The name of the MigratingVm.
   * @param PauseMigrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function pauseMigration($migratingVm, PauseMigrationRequest $postBody, $optParams = [])
  {
    $params = ['migratingVm' => $migratingVm, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pauseMigration', [$params], Operation::class);
  }
  /**
   * Resumes a migration for a VM. When called on a paused migration, will start
   * the process of uploading data and creating snapshots; when called on a
   * completed cut-over migration, will update the migration to active state and
   * start the process of uploading data and creating snapshots.
   * (migratingVms.resumeMigration)
   *
   * @param string $migratingVm Required. The name of the MigratingVm.
   * @param ResumeMigrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function resumeMigration($migratingVm, ResumeMigrationRequest $postBody, $optParams = [])
  {
    $params = ['migratingVm' => $migratingVm, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resumeMigration', [$params], Operation::class);
  }
  /**
   * Starts migration for a VM. Starts the process of uploading data and creating
   * snapshots, in replication cycles scheduled by the policy.
   * (migratingVms.startMigration)
   *
   * @param string $migratingVm Required. The name of the MigratingVm.
   * @param StartMigrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function startMigration($migratingVm, StartMigrationRequest $postBody, $optParams = [])
  {
    $params = ['migratingVm' => $migratingVm, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startMigration', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesMigratingVms::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesMigratingVms');
