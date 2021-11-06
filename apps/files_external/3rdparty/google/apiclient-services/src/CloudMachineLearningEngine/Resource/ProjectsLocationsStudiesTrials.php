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

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1AddTrialMeasurementRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1CheckTrialEarlyStoppingStateRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1CompleteTrialRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListOptimalTrialsRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListOptimalTrialsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListTrialsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1StopTrialRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1SuggestTrialsRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Trial;
use Google\Service\CloudMachineLearningEngine\GoogleLongrunningOperation;
use Google\Service\CloudMachineLearningEngine\GoogleProtobufEmpty;

/**
 * The "trials" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $trials = $mlService->trials;
 *  </code>
 */
class ProjectsLocationsStudiesTrials extends \Google\Service\Resource
{
  /**
   * Adds a measurement of the objective metrics to a trial. This measurement is
   * assumed to have been taken before the trial is complete.
   * (trials.addMeasurement)
   *
   * @param string $name Required. The trial name.
   * @param GoogleCloudMlV1AddTrialMeasurementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Trial
   */
  public function addMeasurement($name, GoogleCloudMlV1AddTrialMeasurementRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addMeasurement', [$params], GoogleCloudMlV1Trial::class);
  }
  /**
   * Checks whether a trial should stop or not. Returns a long-running operation.
   * When the operation is successful, it will contain a
   * CheckTrialEarlyStoppingStateResponse. (trials.checkEarlyStoppingState)
   *
   * @param string $name Required. The trial name.
   * @param GoogleCloudMlV1CheckTrialEarlyStoppingStateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function checkEarlyStoppingState($name, GoogleCloudMlV1CheckTrialEarlyStoppingStateRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkEarlyStoppingState', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Marks a trial as complete. (trials.complete)
   *
   * @param string $name Required. The trial name.metat
   * @param GoogleCloudMlV1CompleteTrialRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Trial
   */
  public function complete($name, GoogleCloudMlV1CompleteTrialRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('complete', [$params], GoogleCloudMlV1Trial::class);
  }
  /**
   * Adds a user provided trial to a study. (trials.create)
   *
   * @param string $parent Required. The name of the study that the trial belongs
   * to.
   * @param GoogleCloudMlV1Trial $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Trial
   */
  public function create($parent, GoogleCloudMlV1Trial $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudMlV1Trial::class);
  }
  /**
   * Deletes a trial. (trials.delete)
   *
   * @param string $name Required. The trial name.
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
   * Gets a trial. (trials.get)
   *
   * @param string $name Required. The trial name.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Trial
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Trial::class);
  }
  /**
   * Lists the trials associated with a study.
   * (trials.listProjectsLocationsStudiesTrials)
   *
   * @param string $parent Required. The name of the study that the trial belongs
   * to.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1ListTrialsResponse
   */
  public function listProjectsLocationsStudiesTrials($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListTrialsResponse::class);
  }
  /**
   * Lists the pareto-optimal trials for multi-objective study or the optimal
   * trials for single-objective study. The definition of pareto-optimal can be
   * checked in wiki page. https://en.wikipedia.org/wiki/Pareto_efficiency
   * (trials.listOptimalTrials)
   *
   * @param string $parent Required. The name of the study that the pareto-optimal
   * trial belongs to.
   * @param GoogleCloudMlV1ListOptimalTrialsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1ListOptimalTrialsResponse
   */
  public function listOptimalTrials($parent, GoogleCloudMlV1ListOptimalTrialsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('listOptimalTrials', [$params], GoogleCloudMlV1ListOptimalTrialsResponse::class);
  }
  /**
   * Stops a trial. (trials.stop)
   *
   * @param string $name Required. The trial name.
   * @param GoogleCloudMlV1StopTrialRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Trial
   */
  public function stop($name, GoogleCloudMlV1StopTrialRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], GoogleCloudMlV1Trial::class);
  }
  /**
   * Adds one or more trials to a study, with parameter values suggested by AI
   * Platform Vizier. Returns a long-running operation associated with the
   * generation of trial suggestions. When this long-running operation succeeds,
   * it will contain a SuggestTrialsResponse. (trials.suggest)
   *
   * @param string $parent Required. The name of the study that the trial belongs
   * to.
   * @param GoogleCloudMlV1SuggestTrialsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function suggest($parent, GoogleCloudMlV1SuggestTrialsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('suggest', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsStudiesTrials::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsLocationsStudiesTrials');
