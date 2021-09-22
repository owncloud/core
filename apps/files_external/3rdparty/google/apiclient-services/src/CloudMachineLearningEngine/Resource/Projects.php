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

use Google\Service\CloudMachineLearningEngine\GoogleApiHttpBody;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ExplainRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1GetConfigResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1PredictRequest;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $projects = $mlService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Performs explanation on the data in the request. {% dynamic include "/ai-
   * platform/includes/___explain-request" %}  (projects.explain)
   *
   * @param string $name Required. The resource name of a model or a version.
   * Authorization: requires the `predict` permission on the specified resource.
   * @param GoogleCloudMlV1ExplainRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleApiHttpBody
   */
  public function explain($name, GoogleCloudMlV1ExplainRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('explain', [$params], GoogleApiHttpBody::class);
  }
  /**
   * Get the service account information associated with your project. You need
   * this information in order to grant the service account permissions for the
   * Google Cloud Storage location where you put your model training code for
   * training the model with Google Cloud Machine Learning. (projects.getConfig)
   *
   * @param string $name Required. The project name.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1GetConfigResponse
   */
  public function getConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], GoogleCloudMlV1GetConfigResponse::class);
  }
  /**
   * Performs online prediction on the data in the request. {% dynamic include
   * "/ai-platform/includes/___predict-request" %}  (projects.predict)
   *
   * @param string $name Required. The resource name of a model or a version.
   * Authorization: requires the `predict` permission on the specified resource.
   * @param GoogleCloudMlV1PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleApiHttpBody
   */
  public function predict($name, GoogleCloudMlV1PredictRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('predict', [$params], GoogleApiHttpBody::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_CloudMachineLearningEngine_Resource_Projects');
