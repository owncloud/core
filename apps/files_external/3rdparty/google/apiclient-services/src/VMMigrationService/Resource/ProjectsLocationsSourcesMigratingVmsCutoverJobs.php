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

use Google\Service\VMMigrationService\CancelCutoverJobRequest;
use Google\Service\VMMigrationService\CutoverJob;
use Google\Service\VMMigrationService\ListCutoverJobsResponse;
use Google\Service\VMMigrationService\Operation;

/**
 * The "cutoverJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $cutoverJobs = $vmmigrationService->cutoverJobs;
 *  </code>
 */
class ProjectsLocationsSourcesMigratingVmsCutoverJobs extends \Google\Service\Resource
{
  /**
   * Initiates the cancellation of a running cutover job. (cutoverJobs.cancel)
   *
   * @param string $name Required. The cutover job id
   * @param CancelCutoverJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function cancel($name, CancelCutoverJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Operation::class);
  }
  /**
   * Initiates a Cutover of a specific migrating VM. The returned LRO is completed
   * when the cutover job resource is created and the job is initiated.
   * (cutoverJobs.create)
   *
   * @param string $parent Required. The Cutover's parent.
   * @param CutoverJob $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string cutoverJobId Required. The cutover job identifier.
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
  public function create($parent, CutoverJob $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets details of a single CutoverJob. (cutoverJobs.get)
   *
   * @param string $name Required. The name of the CutoverJob.
   * @param array $optParams Optional parameters.
   * @return CutoverJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CutoverJob::class);
  }
  /**
   * Lists CutoverJobs of a given migrating VM.
   * (cutoverJobs.listProjectsLocationsSourcesMigratingVmsCutoverJobs)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * migrating VMs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of cutover jobs to
   * return. The service may return fewer than this value. If unspecified, at most
   * 500 cutover jobs will be returned. The maximum value is 1000; values above
   * 1000 will be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListCutoverJobs` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCutoverJobs` must match the
   * call that provided the page token.
   * @return ListCutoverJobsResponse
   */
  public function listProjectsLocationsSourcesMigratingVmsCutoverJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCutoverJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSourcesMigratingVmsCutoverJobs::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsSourcesMigratingVmsCutoverJobs');
