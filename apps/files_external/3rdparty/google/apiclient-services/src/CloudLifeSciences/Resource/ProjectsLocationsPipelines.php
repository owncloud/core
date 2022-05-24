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

namespace Google\Service\CloudLifeSciences\Resource;

use Google\Service\CloudLifeSciences\Operation;
use Google\Service\CloudLifeSciences\RunPipelineRequest;

/**
 * The "pipelines" collection of methods.
 * Typical usage is:
 *  <code>
 *   $lifesciencesService = new Google\Service\CloudLifeSciences(...);
 *   $pipelines = $lifesciencesService->pipelines;
 *  </code>
 */
class ProjectsLocationsPipelines extends \Google\Service\Resource
{
  /**
   * Runs a pipeline. The returned Operation's metadata field will contain a
   * google.cloud.lifesciences.v2beta.Metadata object describing the status of the
   * pipeline execution. The response field will contain a
   * google.cloud.lifesciences.v2beta.RunPipelineResponse object if the pipeline
   * completes successfully. **Note:** Before you can use this method, the *Life
   * Sciences Service Agent* must have access to your project. This is done
   * automatically when the Cloud Life Sciences API is first enabled, but if you
   * delete this permission you must disable and re-enable the API to grant the
   * Life Sciences Service Agent the required permissions. Authorization requires
   * the following [Google IAM](https://cloud.google.com/iam/) permission: *
   * `lifesciences.workflows.run` (pipelines.run)
   *
   * @param string $parent The project and location that this request should be
   * executed against.
   * @param RunPipelineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function run($parent, RunPipelineRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPipelines::class, 'Google_Service_CloudLifeSciences_Resource_ProjectsLocationsPipelines');
