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

namespace Google\Service\DataLabeling\Resource;

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1Evaluation;

/**
 * The "evaluations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $evaluations = $datalabelingService->evaluations;
 *  </code>
 */
class ProjectsDatasetsEvaluations extends \Google\Service\Resource
{
  /**
   * Gets an evaluation by resource name (to search, use
   * projects.evaluations.search). (evaluations.get)
   *
   * @param string $name Required. Name of the evaluation. Format:
   * "projects/{project_id}/datasets/ {dataset_id}/evaluations/{evaluation_id}'
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1Evaluation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatalabelingV1beta1Evaluation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDatasetsEvaluations::class, 'Google_Service_DataLabeling_Resource_ProjectsDatasetsEvaluations');
