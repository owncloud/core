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

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3DeployFlowRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Environment;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListEnvironmentsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3LookupEnvironmentHistoryResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3RunContinuousTestRequest;
use Google\Service\Dialogflow\GoogleLongrunningOperation;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $environments = $dialogflowService->environments;
 *  </code>
 */
class ProjectsLocationsAgentsEnvironments extends \Google\Service\Resource
{
  /**
   * Creates an Environment in the specified Agent. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`:
   * Environment (environments.create)
   *
   * @param string $parent Required. The Agent to create an Environment for.
   * Format: `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3Environment $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudDialogflowCxV3Environment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes the specified Environment. (environments.delete)
   *
   * @param string $name Required. The name of the Environment to delete. Format:
   * `projects//locations//agents//environments/`.
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
   * Deploys a flow to the specified Environment. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: DeployFlowMetadata - `response`: DeployFlowResponse
   * (environments.deployFlow)
   *
   * @param string $environment Required. The environment to deploy the flow to.
   * Format: `projects//locations//agents// environments/`.
   * @param GoogleCloudDialogflowCxV3DeployFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function deployFlow($environment, GoogleCloudDialogflowCxV3DeployFlowRequest $postBody, $optParams = [])
  {
    $params = ['environment' => $environment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deployFlow', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieves the specified Environment. (environments.get)
   *
   * @param string $name Required. The name of the Environment. Format:
   * `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Environment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Environment::class);
  }
  /**
   * Returns the list of all environments in the specified Agent.
   * (environments.listProjectsLocationsAgentsEnvironments)
   *
   * @param string $parent Required. The Agent to list all environments for.
   * Format: `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListEnvironmentsResponse
   */
  public function listProjectsLocationsAgentsEnvironments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListEnvironmentsResponse::class);
  }
  /**
   * Looks up the history of the specified Environment.
   * (environments.lookupEnvironmentHistory)
   *
   * @param string $name Required. Resource name of the environment to look up the
   * history for. Format: `projects//locations//agents//environments/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3LookupEnvironmentHistoryResponse
   */
  public function lookupEnvironmentHistory($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('lookupEnvironmentHistory', [$params], GoogleCloudDialogflowCxV3LookupEnvironmentHistoryResponse::class);
  }
  /**
   * Updates the specified Environment. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`:
   * Environment (environments.patch)
   *
   * @param string $name The name of the environment. Format:
   * `projects//locations//agents//environments/`.
   * @param GoogleCloudDialogflowCxV3Environment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudDialogflowCxV3Environment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Kicks off a continuous test under the specified Environment. This method is a
   * [long-running operation](https://cloud.google.com/dialogflow/cx/docs/how
   * /long-running-operation). The returned `Operation` type has the following
   * method-specific fields: - `metadata`: RunContinuousTestMetadata - `response`:
   * RunContinuousTestResponse (environments.runContinuousTest)
   *
   * @param string $environment Required. Format:
   * `projects//locations//agents//environments/`.
   * @param GoogleCloudDialogflowCxV3RunContinuousTestRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function runContinuousTest($environment, GoogleCloudDialogflowCxV3RunContinuousTestRequest $postBody, $optParams = [])
  {
    $params = ['environment' => $environment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runContinuousTest', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsEnvironments::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEnvironments');
