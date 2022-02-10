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

namespace Google\Service\Transcoder\Resource;

use Google\Service\Transcoder\JobTemplate;
use Google\Service\Transcoder\ListJobTemplatesResponse;
use Google\Service\Transcoder\TranscoderEmpty;

/**
 * The "jobTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $transcoderService = new Google\Service\Transcoder(...);
 *   $jobTemplates = $transcoderService->jobTemplates;
 *  </code>
 */
class ProjectsLocationsJobTemplates extends \Google\Service\Resource
{
  /**
   * Creates a job template in the specified region. (jobTemplates.create)
   *
   * @param string $parent Required. The parent location to create this job
   * template. Format: `projects/{project}/locations/{location}`
   * @param JobTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string jobTemplateId Required. The ID to use for the job template,
   * which will become the final component of the job template's resource name.
   * This value should be 4-63 characters, and valid characters must match the
   * regular expression `a-zA-Z*`.
   * @return JobTemplate
   */
  public function create($parent, JobTemplate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], JobTemplate::class);
  }
  /**
   * Deletes a job template. (jobTemplates.delete)
   *
   * @param string $name Required. The name of the job template to delete.
   * `projects/{project}/locations/{location}/jobTemplates/{job_template}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and the job template is not
   * found, the request will succeed but no action will be taken on the server.
   * @return TranscoderEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], TranscoderEmpty::class);
  }
  /**
   * Returns the job template data. (jobTemplates.get)
   *
   * @param string $name Required. The name of the job template to retrieve.
   * Format: `projects/{project}/locations/{location}/jobTemplates/{job_template}`
   * @param array $optParams Optional parameters.
   * @return JobTemplate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], JobTemplate::class);
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
   * @opt_param string filter The filter expression, following the syntax outlined
   * in https://google.aip.dev/160.
   * @opt_param string orderBy One or more fields to compare and use to sort the
   * output. See https://google.aip.dev/132#ordering.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous List request, if any.
   * @return ListJobTemplatesResponse
   */
  public function listProjectsLocationsJobTemplates($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobTemplatesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsJobTemplates::class, 'Google_Service_Transcoder_Resource_ProjectsLocationsJobTemplates');
