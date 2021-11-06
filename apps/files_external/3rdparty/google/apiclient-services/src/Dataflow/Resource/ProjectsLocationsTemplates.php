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

namespace Google\Service\Dataflow\Resource;

use Google\Service\Dataflow\CreateJobFromTemplateRequest;
use Google\Service\Dataflow\GetTemplateResponse;
use Google\Service\Dataflow\Job;
use Google\Service\Dataflow\LaunchTemplateParameters;
use Google\Service\Dataflow\LaunchTemplateResponse;

/**
 * The "templates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google\Service\Dataflow(...);
 *   $templates = $dataflowService->templates;
 *  </code>
 */
class ProjectsLocationsTemplates extends \Google\Service\Resource
{
  /**
   * Creates a Cloud Dataflow job from a template. (templates.create)
   *
   * @param string $projectId Required. The ID of the Cloud Platform project that
   * the job belongs to.
   * @param string $location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to which
   * to direct the request.
   * @param CreateJobFromTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function create($projectId, $location, CreateJobFromTemplateRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Job::class);
  }
  /**
   * Get the template associated with a template. (templates.get)
   *
   * @param string $projectId Required. The ID of the Cloud Platform project that
   * the job belongs to.
   * @param string $location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to which
   * to direct the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gcsPath Required. A Cloud Storage path to the template from
   * which to create the job. Must be valid Cloud Storage URL, beginning with
   * 'gs://'.
   * @opt_param string view The view to retrieve. Defaults to METADATA_ONLY.
   * @return GetTemplateResponse
   */
  public function get($projectId, $location, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GetTemplateResponse::class);
  }
  /**
   * Launch a template. (templates.launch)
   *
   * @param string $projectId Required. The ID of the Cloud Platform project that
   * the job belongs to.
   * @param string $location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to which
   * to direct the request.
   * @param LaunchTemplateParameters $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dynamicTemplate.gcsPath Path to dynamic template spec file
   * on Cloud Storage. The file must be a Json serialized DynamicTemplateFieSpec
   * object.
   * @opt_param string dynamicTemplate.stagingLocation Cloud Storage path for
   * staging dependencies. Must be a valid Cloud Storage URL, beginning with
   * `gs://`.
   * @opt_param string gcsPath A Cloud Storage path to the template from which to
   * create the job. Must be valid Cloud Storage URL, beginning with 'gs://'.
   * @opt_param bool validateOnly If true, the request is validated but not
   * actually executed. Defaults to false.
   * @return LaunchTemplateResponse
   */
  public function launch($projectId, $location, LaunchTemplateParameters $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('launch', [$params], LaunchTemplateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTemplates::class, 'Google_Service_Dataflow_Resource_ProjectsLocationsTemplates');
