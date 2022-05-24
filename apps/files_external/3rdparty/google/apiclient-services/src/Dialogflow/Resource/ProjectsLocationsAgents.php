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

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Agent;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3AgentValidationResult;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ExportAgentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListAgentsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3RestoreAgentRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ValidateAgentRequest;
use Google\Service\Dialogflow\GoogleLongrunningOperation;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "agents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $agents = $dialogflowService->agents;
 *  </code>
 */
class ProjectsLocationsAgents extends \Google\Service\Resource
{
  /**
   * Creates an agent in the specified location. Note: You should always train
   * flows prior to sending them queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (agents.create)
   *
   * @param string $parent Required. The location to create a agent for. Format:
   * `projects//locations/`.
   * @param GoogleCloudDialogflowCxV3Agent $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Agent
   */
  public function create($parent, GoogleCloudDialogflowCxV3Agent $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3Agent::class);
  }
  /**
   * Deletes the specified agent. (agents.delete)
   *
   * @param string $name Required. The name of the agent to delete. Format:
   * `projects//locations//agents/`.
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
   * Exports the specified agent to a binary file. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`:
   * ExportAgentResponse (agents.export)
   *
   * @param string $name Required. The name of the agent to export. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3ExportAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function export($name, GoogleCloudDialogflowCxV3ExportAgentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieves the specified agent. (agents.get)
   *
   * @param string $name Required. The name of the agent. Format:
   * `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3Agent
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Agent::class);
  }
  /**
   * Gets the latest agent validation result. Agent validation is performed when
   * ValidateAgent is called. (agents.getValidationResult)
   *
   * @param string $name Required. The agent name. Format:
   * `projects//locations//agents//validationResult`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode If not specified, the agent's default language
   * is used.
   * @return GoogleCloudDialogflowCxV3AgentValidationResult
   */
  public function getValidationResult($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getValidationResult', [$params], GoogleCloudDialogflowCxV3AgentValidationResult::class);
  }
  /**
   * Returns the list of all agents in the specified location.
   * (agents.listProjectsLocationsAgents)
   *
   * @param string $parent Required. The location to list all agents for. Format:
   * `projects//locations/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListAgentsResponse
   */
  public function listProjectsLocationsAgents($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListAgentsResponse::class);
  }
  /**
   * Updates the specified agent. Note: You should always train flows prior to
   * sending them queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (agents.patch)
   *
   * @param string $name The unique identifier of the agent. Required for the
   * Agents.UpdateAgent method. Agents.CreateAgent populates the name
   * automatically. Format: `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3Agent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The mask to control which fields get updated. If
   * the mask is not present, all fields will be updated.
   * @return GoogleCloudDialogflowCxV3Agent
   */
  public function patch($name, GoogleCloudDialogflowCxV3Agent $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3Agent::class);
  }
  /**
   * Restores the specified agent from a binary file. Replaces the current agent
   * with a new one. Note that all existing resources in agent (e.g. intents,
   * entity types, flows) will be removed. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`: An
   * [Empty message](https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#empty) Note: You should always train
   * flows prior to sending them queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (agents.restore)
   *
   * @param string $name Required. The name of the agent to restore into. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3RestoreAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function restore($name, GoogleCloudDialogflowCxV3RestoreAgentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('restore', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Validates the specified agent and creates or updates validation results. The
   * agent in draft version is validated. Please call this API after the training
   * is completed to get the complete validation results. (agents.validate)
   *
   * @param string $name Required. The agent to validate. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3ValidateAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3AgentValidationResult
   */
  public function validate($name, GoogleCloudDialogflowCxV3ValidateAgentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('validate', [$params], GoogleCloudDialogflowCxV3AgentValidationResult::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgents::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgents');
