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

namespace Google\Service\CloudMachineLearningEngine\Resource;

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListStudiesResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Study;
use Google\Service\CloudMachineLearningEngine\GoogleProtobufEmpty;

/**
 * The "studies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $studies = $mlService->studies;
 *  </code>
 */
class ProjectsLocationsStudies extends \Google\Service\Resource
{
  /**
   * Creates a study. (studies.create)
   *
   * @param string $parent Required. The project and location that the study
   * belongs to. Format: projects/{project}/locations/{location}
   * @param GoogleCloudMlV1Study $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string studyId Required. The ID to use for the study, which will
   * become the final component of the study's resource name.
   * @return GoogleCloudMlV1Study
   */
  public function create($parent, GoogleCloudMlV1Study $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudMlV1Study::class);
  }
  /**
   * Deletes a study. (studies.delete)
   *
   * @param string $name Required. The study name.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a study. (studies.get)
   *
   * @param string $name Required. The study name.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Study
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Study::class);
  }
  /**
   * Lists all the studies in a region for an associated project.
   * (studies.listProjectsLocationsStudies)
   *
   * @param string $parent Required. The project and location that the study
   * belongs to. Format: projects/{project}/locations/{location}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1ListStudiesResponse
   */
  public function listProjectsLocationsStudies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListStudiesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsStudies::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsLocationsStudies');
