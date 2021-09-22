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

use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1SearchExampleComparisonsRequest;
use Google\Service\DataLabeling\GoogleCloudDatalabelingV1beta1SearchExampleComparisonsResponse;

/**
 * The "exampleComparisons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datalabelingService = new Google\Service\DataLabeling(...);
 *   $exampleComparisons = $datalabelingService->exampleComparisons;
 *  </code>
 */
class ProjectsDatasetsEvaluationsExampleComparisons extends \Google\Service\Resource
{
  /**
   * Searches example comparisons from an evaluation. The return format is a list
   * of example comparisons that show ground truth and prediction(s) for a single
   * input. Search by providing an evaluation ID. (exampleComparisons.search)
   *
   * @param string $parent Required. Name of the Evaluation resource to search for
   * example comparisons from. Format:
   * "projects/{project_id}/datasets/{dataset_id}/evaluations/ {evaluation_id}"
   * @param GoogleCloudDatalabelingV1beta1SearchExampleComparisonsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatalabelingV1beta1SearchExampleComparisonsResponse
   */
  public function search($parent, GoogleCloudDatalabelingV1beta1SearchExampleComparisonsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudDatalabelingV1beta1SearchExampleComparisonsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsDatasetsEvaluationsExampleComparisons::class, 'Google_Service_DataLabeling_Resource_ProjectsDatasetsEvaluationsExampleComparisons');
