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
 * The "pipelines" collection of methods.
 * Typical usage is:
 *  <code>
 *   $genomicsService = new Google_Service_Genomics(...);
 *   $pipelines = $genomicsService->pipelines;
 *  </code>
 */
class Google_Service_Genomics_Resource_Pipelines extends Google_Service_Resource
{
  /**
   * Runs a pipeline. The returned Operation's metadata field will contain a
   * google.genomics.v2alpha1.Metadata object describing the status of the
   * pipeline execution. The [response] field will contain a
   * google.genomics.v2alpha1.RunPipelineResponse object if the pipeline completes
   * successfully. **Note:** Before you can use this method, the Genomics Service
   * Agent must have access to your project. This is done automatically when the
   * Cloud Genomics API is first enabled, but if you delete this permission, or if
   * you enabled the Cloud Genomics API before the v2alpha1 API launch, you must
   * disable and re-enable the API to grant the Genomics Service Agent the
   * required permissions. Authorization requires the following [Google
   * IAM](https://cloud.google.com/iam/) permission: *
   * `genomics.operations.create` [1]: /genomics/gsa (pipelines.run)
   *
   * @param Google_Service_Genomics_RunPipelineRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Genomics_Operation
   */
  public function run(Google_Service_Genomics_RunPipelineRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_Genomics_Operation");
  }
}
