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
 * The "patchJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osconfigService = new Google_Service_SystemsManagement(...);
 *   $patchJobs = $osconfigService->patchJobs;
 *  </code>
 */
class Google_Service_SystemsManagement_Resource_ProjectsPatchJobs extends Google_Service_Resource
{
  /**
   * Cancel a patch job. The patch job must be active. Canceled patch jobs cannot
   * be restarted. (patchJobs.cancel)
   *
   * @param string $name Required. Name of the patch in the form
   * `projects/patchJobs`
   * @param Google_Service_SystemsManagement_CancelPatchJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SystemsManagement_PatchJob
   */
  public function cancel($name, Google_Service_SystemsManagement_CancelPatchJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_SystemsManagement_PatchJob");
  }
  /**
   * Patch VM instances by creating and running a patch job. (patchJobs.execute)
   *
   * @param string $parent Required. The project in which to run this patch in the
   * form `projects`
   * @param Google_Service_SystemsManagement_ExecutePatchJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SystemsManagement_PatchJob
   */
  public function execute($parent, Google_Service_SystemsManagement_ExecutePatchJobRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('execute', array($params), "Google_Service_SystemsManagement_PatchJob");
  }
  /**
   * Get the patch job. This can be used to track the progress of an ongoing patch
   * job or review the details of completed jobs. (patchJobs.get)
   *
   * @param string $name Required. Name of the patch in the form
   * `projects/patchJobs`
   * @param array $optParams Optional parameters.
   * @return Google_Service_SystemsManagement_PatchJob
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_SystemsManagement_PatchJob");
  }
  /**
   * Get a list of patch jobs. (patchJobs.listProjectsPatchJobs)
   *
   * @param string $parent Required. In the form of `projects`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A pagination token returned from a previous call
   * that indicates where this listing should continue from.
   * @opt_param string filter If provided, this field specifies the criteria that
   * must be met by patch jobs to be included in the response. Currently,
   * filtering is only available on the patch_deployment field.
   * @opt_param int pageSize The maximum number of instance status to return.
   * @return Google_Service_SystemsManagement_ListPatchJobsResponse
   */
  public function listProjectsPatchJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_SystemsManagement_ListPatchJobsResponse");
  }
}
