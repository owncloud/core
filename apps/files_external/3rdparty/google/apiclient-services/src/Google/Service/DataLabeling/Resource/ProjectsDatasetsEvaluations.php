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
 * The "evaluations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google_Service_DataLabeling(...);
 *   $evaluations = $datalabelingService->evaluations;
 *  </code>
 */
class Google_Service_DataLabeling_Resource_ProjectsDatasetsEvaluations extends Google_Service_Resource
{
  /**
   * Gets an evaluation by resource name (to search, use
   * projects.evaluations.search). (evaluations.get)
   *
   * @param string $name Required. Name of the evaluation. Format:
   * "projects/{project_id}/datasets/ {dataset_id}/evaluations/{evaluation_id}'
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Evaluation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Evaluation");
  }
}
