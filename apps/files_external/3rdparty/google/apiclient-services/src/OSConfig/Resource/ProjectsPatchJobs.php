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

namespace Google\Service\OSConfig\Resource;

use Google\Service\OSConfig\CancelPatchJobRequest;
use Google\Service\OSConfig\ExecutePatchJobRequest;
use Google\Service\OSConfig\ListPatchJobsResponse;
use Google\Service\OSConfig\PatchJob;

/**
 * The "patchJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google\Service\OSConfig(...);
 *   $patchJobs = $osconfigService->patchJobs;
 *  </code>
 */
class ProjectsPatchJobs extends \Google\Service\Resource
{
  /**
   * Cancel a patch job. The patch job must be active. Canceled patch jobs cannot
   * be restarted. (patchJobs.cancel)
   *
   * @param string $name Required. Name of the patch in the form
   * `projects/patchJobs`
   * @param CancelPatchJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PatchJob
   */
  public function cancel($name, CancelPatchJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], PatchJob::class);
  }
  /**
   * Patch VM instances by creating and running a patch job. (patchJobs.execute)
   *
   * @param string $parent Required. The project in which to run this patch in the
   * form `projects`
   * @param ExecutePatchJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PatchJob
   */
  public function execute($parent, ExecutePatchJobRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('execute', [$params], PatchJob::class);
  }
  /**
   * Get the patch job. This can be used to track the progress of an ongoing patch
   * job or review the details of completed jobs. (patchJobs.get)
   *
   * @param string $name Required. Name of the patch in the form
   * `projects/patchJobs`
   * @param array $optParams Optional parameters.
   * @return PatchJob
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PatchJob::class);
  }
  /**
   * Get a list of patch jobs. (patchJobs.listProjectsPatchJobs)
   *
   * @param string $parent Required. In the form of `projects`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by patch jobs to be included in the response. Currently,
   * filtering is only available on the patch_deployment field.
   * @opt_param int pageSize The maximum number of instance status to return.
   * @opt_param string pageToken A pagination token returned from a previous call
   * that indicates where this listing should continue from.
   * @return ListPatchJobsResponse
   */
  public function listProjectsPatchJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPatchJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsPatchJobs::class, 'Google_Service_OSConfig_Resource_ProjectsPatchJobs');
