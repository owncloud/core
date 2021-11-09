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

use Google\Service\VMMigrationService\CancelCloneJobRequest;
use Google\Service\VMMigrationService\CloneJob;
use Google\Service\VMMigrationService\ListCloneJobsResponse;
use Google\Service\VMMigrationService\Operation;

/**
 * The "cloneJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $cloneJobs = $vmmigrationService->cloneJobs;
 *  </code>
 */
class ProjectsLocationsSourcesMigratingVmsCloneJobs extends \Google\Service\Resource
{
  /**
   * Initiates the cancellation of a running clone job. (cloneJobs.cancel)
   *
   * @param string $name Required. The clone job id
   * @param CancelCloneJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cancel($name, CancelCloneJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Operation::class);
  }
  /**
   * Initiates a Clone of a specific migrating VM. (cloneJobs.create)
   *
   * @param string $parent Required. The Clone's parent.
   * @param CloneJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string cloneJobId Required. The clone job identifier.
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
  public function create($parent, CloneJob $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets details of a single CloneJob. (cloneJobs.get)
   *
   * @param string $name Required. The name of the CloneJob.
   * @param array $optParams Optional parameters.
   * @return CloneJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CloneJob::class);
  }
  /**
   * Lists CloneJobs of a given migrating VM.
   * (cloneJobs.listProjectsLocationsSourcesMigratingVmsCloneJobs)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * source VMs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of clone jobs to return.
   * The service may return fewer than this value. If unspecified, at most 500
   * clone jobs will be returned. The maximum value is 1000; values above 1000
   * will be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListCloneJobs` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCloneJobs` must match the
   * call that provided the page token.
   * @return ListCloneJobsResponse
   */
  public function listProjectsLocationsSourcesMigratingVmsCloneJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCloneJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesMigratingVmsCloneJobs::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesMigratingVmsCloneJobs');
