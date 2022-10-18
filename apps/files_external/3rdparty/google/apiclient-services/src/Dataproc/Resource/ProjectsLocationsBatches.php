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

namespace Google\Service\Dataproc\Resource;

use Google\Service\Dataproc\Batch;
use Google\Service\Dataproc\DataprocEmpty;
use Google\Service\Dataproc\ListBatchesResponse;
use Google\Service\Dataproc\Operation;

/**
 * The "batches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google\Service\Dataproc(...);
 *   $batches = $dataprocService->batches;
 *  </code>
 */
class ProjectsLocationsBatches extends \Google\Service\Resource
{
  /**
   * Creates a batch workload that executes asynchronously. (batches.create)
   *
   * @param string $parent Required. The parent resource where this batch will be
   * created.
   * @param Batch $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string batchId Optional. The ID to use for the batch, which will
   * become the final component of the batch's resource name.This value must be
   * 4-63 characters. Valid characters are /[a-z][0-9]-/.
   * @opt_param string requestId Optional. A unique ID used to identify the
   * request. If the service receives two CreateBatchRequest (https://cloud.google
   * .com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.datapr
   * oc.v1.CreateBatchRequest)s with the same request_id, the second request is
   * ignored and the Operation that corresponds to the first Batch created and
   * stored in the backend is returned.Recommendation: Set this value to a UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier).The value must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function create($parent, Batch $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes the batch workload resource. If the batch is not in terminal state,
   * the delete fails and the response returns FAILED_PRECONDITION.
   * (batches.delete)
   *
   * @param string $name Required. The fully qualified name of the batch to
   * retrieve in the format
   * "projects/PROJECT_ID/locations/DATAPROC_REGION/batches/BATCH_ID"
   * @param array $optParams Optional parameters.
   * @return DataprocEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataprocEmpty::class);
  }
  /**
   * Gets the batch workload resource representation. (batches.get)
   *
   * @param string $name Required. The fully qualified name of the batch to
   * retrieve in the format
   * "projects/PROJECT_ID/locations/DATAPROC_REGION/batches/BATCH_ID"
   * @param array $optParams Optional parameters.
   * @return Batch
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Batch::class);
  }
  /**
   * Lists batch workloads. (batches.listProjectsLocationsBatches)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * batches.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of batches to return in
   * each response. The service may return fewer than this value. The default page
   * size is 20; the maximum page size is 1000.
   * @opt_param string pageToken Optional. A page token received from a previous
   * ListBatches call. Provide this token to retrieve the subsequent page.
   * @return ListBatchesResponse
   */
  public function listProjectsLocationsBatches($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBatchesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsBatches::class, 'Google_Service_Dataproc_Resource_ProjectsLocationsBatches');
