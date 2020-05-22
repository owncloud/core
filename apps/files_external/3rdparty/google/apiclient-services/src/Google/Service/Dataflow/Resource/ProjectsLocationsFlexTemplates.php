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
 * The "flexTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $flexTemplates = $dataflowService->flexTemplates;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsLocationsFlexTemplates extends Google_Service_Resource
{
  /**
   * Launch a job with a FlexTemplate. (flexTemplates.launch)
   *
   * @param string $projectId Required. The ID of the Cloud Platform project that
   * the job belongs to.
   * @param string $location Required. The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to which
   * to direct the request. E.g., us-central1, us-west1.
   * @param Google_Service_Dataflow_LaunchFlexTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_LaunchFlexTemplateResponse
   */
  public function launch($projectId, $location, Google_Service_Dataflow_LaunchFlexTemplateRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('launch', array($params), "Google_Service_Dataflow_LaunchFlexTemplateResponse");
  }
}
