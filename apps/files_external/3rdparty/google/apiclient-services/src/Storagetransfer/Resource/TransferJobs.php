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

namespace Google\Service\Storagetransfer\Resource;

use Google\Service\Storagetransfer\ListTransferJobsResponse;
use Google\Service\Storagetransfer\Operation;
use Google\Service\Storagetransfer\RunTransferJobRequest;
use Google\Service\Storagetransfer\StoragetransferEmpty;
use Google\Service\Storagetransfer\TransferJob;
use Google\Service\Storagetransfer\UpdateTransferJobRequest;

/**
 * The "transferJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storagetransferService = new Google\Service\Storagetransfer(...);
 *   $transferJobs = $storagetransferService->transferJobs;
 *  </code>
 */
class TransferJobs extends \Google\Service\Resource
{
  /**
   * Creates a transfer job that runs periodically. (transferJobs.create)
   *
   * @param TransferJob $postBody
   * @param array $optParams Optional parameters.
   * @return TransferJob
   */
  public function create(TransferJob $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], TransferJob::class);
  }
  /**
   * Deletes a transfer job. Deleting a transfer job sets its status to DELETED.
   * (transferJobs.delete)
   *
   * @param string $jobName Required. The job to delete.
   * @param string $projectId Required. The ID of the Google Cloud project that
   * owns the job.
   * @param array $optParams Optional parameters.
   * @return StoragetransferEmpty
   */
  public function delete($jobName, $projectId, $optParams = [])
  {
    $params = ['jobName' => $jobName, 'projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], StoragetransferEmpty::class);
  }
  /**
   * Gets a transfer job. (transferJobs.get)
   *
   * @param string $jobName Required. The job to get.
   * @param string $projectId Required. The ID of the Google Cloud project that
   * owns the job.
   * @param array $optParams Optional parameters.
   * @return TransferJob
   */
  public function get($jobName, $projectId, $optParams = [])
  {
    $params = ['jobName' => $jobName, 'projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TransferJob::class);
  }
  /**
   * Lists transfer jobs. (transferJobs.listTransferJobs)
   *
   * @param string $filter Required. A list of query parameters specified as JSON
   * text in the form of: `{"projectId":"my_project_id",
   * "jobNames":["jobid1","jobid2",...], "jobStatuses":["status1","status2",...]}`
   * Since `jobNames` and `jobStatuses` support multiple values, their values must
   * be specified with array notation. `projectId` is required. `jobNames` and
   * `jobStatuses` are optional. The valid values for `jobStatuses` are case-
   * insensitive: ENABLED, DISABLED, and DELETED.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The list page size. The max allowed value is 256.
   * @opt_param string pageToken The list page token.
   * @return ListTransferJobsResponse
   */
  public function listTransferJobs($filter, $optParams = [])
  {
    $params = ['filter' => $filter];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTransferJobsResponse::class);
  }
  /**
   * Updates a transfer job. Updating a job's transfer spec does not affect
   * transfer operations that are running already. **Note:** The job's status
   * field can be modified using this RPC (for example, to set a job's status to
   * DELETED, DISABLED, or ENABLED). (transferJobs.patch)
   *
   * @param string $jobName Required. The name of job to update.
   * @param UpdateTransferJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TransferJob
   */
  public function patch($jobName, UpdateTransferJobRequest $postBody, $optParams = [])
  {
    $params = ['jobName' => $jobName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], TransferJob::class);
  }
  /**
   * Starts a new operation for the specified transfer job. A `TransferJob` has a
   * maximum of one active `TransferOperation`. If this method is called while a
   * `TransferOperation` is active, an error is returned. (transferJobs.run)
   *
   * @param string $jobName Required. The name of the transfer job.
   * @param RunTransferJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function run($jobName, RunTransferJobRequest $postBody, $optParams = [])
  {
    $params = ['jobName' => $jobName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferJobs::class, 'Google_Service_Storagetransfer_Resource_TransferJobs');
