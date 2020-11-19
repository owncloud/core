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

/**
 * The "transferJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storagetransferService = new Google_Service_Storagetransfer(...);
 *   $transferJobs = $storagetransferService->transferJobs;
 *  </code>
 */
class Google_Service_Storagetransfer_Resource_TransferJobs extends Google_Service_Resource
{
  /**
   * Creates a transfer job that runs periodically. (transferJobs.create)
   *
   * @param Google_Service_Storagetransfer_TransferJob $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_TransferJob
   */
  public function create(Google_Service_Storagetransfer_TransferJob $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Storagetransfer_TransferJob");
  }
  /**
   * Gets a transfer job. (transferJobs.get)
   *
   * @param string $jobName Required. " The job to get.
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * Console project that owns the job.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_TransferJob
   */
  public function get($jobName, $projectId, $optParams = array())
  {
    $params = array('jobName' => $jobName, 'projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Storagetransfer_TransferJob");
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
   * @return Google_Service_Storagetransfer_ListTransferJobsResponse
   */
  public function listTransferJobs($filter, $optParams = array())
  {
    $params = array('filter' => $filter);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Storagetransfer_ListTransferJobsResponse");
  }
  /**
   * Updates a transfer job. Updating a job's transfer spec does not affect
   * transfer operations that are running already. Updating a job's schedule is
   * not allowed. **Note:** The job's status field can be modified using this RPC
   * (for example, to set a job's status to DELETED, DISABLED, or ENABLED).
   * (transferJobs.patch)
   *
   * @param string $jobName Required. The name of job to update.
   * @param Google_Service_Storagetransfer_UpdateTransferJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Storagetransfer_TransferJob
   */
  public function patch($jobName, Google_Service_Storagetransfer_UpdateTransferJobRequest $postBody, $optParams = array())
  {
    $params = array('jobName' => $jobName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Storagetransfer_TransferJob");
  }
}
