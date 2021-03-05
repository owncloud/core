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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $transcoderService = new Google_Service_Transcoder(...);
 *   $jobs = $transcoderService->jobs;
 *  </code>
 */
class Google_Service_Transcoder_Resource_ProjectsLocationsJobs extends Google_Service_Resource
{
  /**
   * Creates a job in the specified region. (jobs.create)
   *
   * @param string $parent Required. The parent location to create and process
   * this job. Format: `projects/{project}/locations/{location}`
   * @param Google_Service_Transcoder_Job $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Transcoder_Job
   */
  public function create($parent, Google_Service_Transcoder_Job $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Transcoder_Job");
  }
  /**
   * Deletes a job. (jobs.delete)
   *
   * @param string $name Required. The name of the job to delete. Format:
   * `projects/{project}/locations/{location}/jobs/{job}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Transcoder_TranscoderEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Transcoder_TranscoderEmpty");
  }
  /**
   * Returns the job data. (jobs.get)
   *
   * @param string $name Required. The name of the job to retrieve. Format:
   * `projects/{project}/locations/{location}/jobs/{job}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Transcoder_Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Transcoder_Job");
  }
  /**
   * Lists jobs in the specified region. (jobs.listProjectsLocationsJobs)
   *
   * @param string $parent Required. Format:
   * `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return Google_Service_Transcoder_ListJobsResponse
   */
  public function listProjectsLocationsJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Transcoder_ListJobsResponse");
  }
}
