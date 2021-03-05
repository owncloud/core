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
 * The "jobTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $transcoderService = new Google_Service_Transcoder(...);
 *   $jobTemplates = $transcoderService->jobTemplates;
 *  </code>
 */
class Google_Service_Transcoder_Resource_ProjectsLocationsJobTemplates extends Google_Service_Resource
{
  /**
   * Creates a job template in the specified region. (jobTemplates.create)
   *
   * @param string $parent Required. The parent location to create this job
   * template. Format: `projects/{project}/locations/{location}`
   * @param Google_Service_Transcoder_JobTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string jobTemplateId Required. The ID to use for the job template,
   * which will become the final component of the job template's resource name.
   * This value should be 4-63 characters, and valid characters must match the
   * regular expression `a-zA-Z*`.
   * @return Google_Service_Transcoder_JobTemplate
   */
  public function create($parent, Google_Service_Transcoder_JobTemplate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Transcoder_JobTemplate");
  }
  /**
   * Deletes a job template. (jobTemplates.delete)
   *
   * @param string $name Required. The name of the job template to delete.
   * `projects/{project}/locations/{location}/jobTemplates/{job_template}`
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
   * Returns the job template data. (jobTemplates.get)
   *
   * @param string $name Required. The name of the job template to retrieve.
   * Format: `projects/{project}/locations/{location}/jobTemplates/{job_template}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Transcoder_JobTemplate
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Transcoder_JobTemplate");
  }
  /**
   * Lists job templates in the specified region.
   * (jobTemplates.listProjectsLocationsJobTemplates)
   *
   * @param string $parent Required. The parent location from which to retrieve
   * the collection of job templates. Format:
   * `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return Google_Service_Transcoder_ListJobTemplatesResponse
   */
  public function listProjectsLocationsJobTemplates($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Transcoder_ListJobTemplatesResponse");
  }
}
