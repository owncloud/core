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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Experiment;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListExperimentsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3StartExperimentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3StopExperimentRequest;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "experiments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $experiments = $dialogflowService->experiments;
 *  </code>
 */
class ProjectsLocationsAgentsEnvironmentsExperiments extends \Google\Service\Resource
{
  /**
   * Creates an Experiment in the specified Environment. (experiments.create)
   *
   * @param string $parent Required. The Agent to create an Environment for.
   * Format: `projects//locations//agents//environments/`.
   * @param GoogleCloudDialogflowCxV3Experiment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Experiment
   */
  public function create($parent, GoogleCloudDialogflowCxV3Experiment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3Experiment::class);
  }
  /**
   * Deletes the specified Experiment. (experiments.delete)
   *
   * @param string $name Required. The name of the Environment to delete. Format:
   * `projects//locations//agents//environments//experiments/`.
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
   * Retrieves the specified Experiment. (experiments.get)
   *
   * @param string $name Required. The name of the Environment. Format:
   * `projects//locations//agents//environments//experiments/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Experiment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Experiment::class);
  }
  /**
   * Returns the list of all experiments in the specified Environment.
   * (experiments.listProjectsLocationsAgentsEnvironmentsExperiments)
   *
   * @param string $parent Required. The Environment to list all environments for.
   * Format: `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListExperimentsResponse
   */
  public function listProjectsLocationsAgentsEnvironmentsExperiments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListExperimentsResponse::class);
  }
  /**
   * Updates the specified Experiment. (experiments.patch)
   *
   * @param string $name The name of the experiment. Format:
   * projects//locations//agents//environments//experiments/..
   * @param GoogleCloudDialogflowCxV3Experiment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated.
   * @return GoogleCloudDialogflowCxV3Experiment
   */
  public function patch($name, GoogleCloudDialogflowCxV3Experiment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3Experiment::class);
  }
  /**
   * Starts the specified Experiment. This rpc only changes the state of
   * experiment from PENDING to RUNNING. (experiments.start)
   *
   * @param string $name Required. Resource name of the experiment to start.
   * Format: `projects//locations//agents//environments//experiments/`.
   * @param GoogleCloudDialogflowCxV3StartExperimentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Experiment
   */
  public function start($name, GoogleCloudDialogflowCxV3StartExperimentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], GoogleCloudDialogflowCxV3Experiment::class);
  }
  /**
   * Stops the specified Experiment. This rpc only changes the state of experiment
   * from RUNNING to DONE. (experiments.stop)
   *
   * @param string $name Required. Resource name of the experiment to stop.
   * Format: `projects//locations//agents//environments//experiments/`.
   * @param GoogleCloudDialogflowCxV3StopExperimentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Experiment
   */
  public function stop($name, GoogleCloudDialogflowCxV3StopExperimentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], GoogleCloudDialogflowCxV3Experiment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsEnvironmentsExperiments::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironmentsExperiments');
