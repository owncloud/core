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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\AnalyzeEntitiesRequest;
use Google\Service\CloudHealthcare\AnalyzeEntitiesResponse;

/**
 * The "nlp" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $nlp = $healthcareService->nlp;
 *  </code>
 */
class ProjectsLocationsServicesNlp extends \Google\Service\Resource
{
  /**
   * Analyze heathcare entity in a document. Its response includes the recognized
   * entity mentions and the relationships between them. AnalyzeEntities uses
   * context aware models to detect entities. (nlp.analyzeEntities)
   *
   * @param string $nlpService The resource name of the service of the form:
   * "projects/{project_id}/locations/{location_id}/services/nlp".
   * @param AnalyzeEntitiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AnalyzeEntitiesResponse
   */
  public function analyzeEntities($nlpService, AnalyzeEntitiesRequest $postBody, $optParams = [])
  {
    $params = ['nlpService' => $nlpService, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('analyzeEntities', [$params], AnalyzeEntitiesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsServicesNlp::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsServicesNlp');
