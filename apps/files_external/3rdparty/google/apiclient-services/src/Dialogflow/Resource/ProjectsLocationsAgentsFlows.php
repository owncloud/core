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

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ExportFlowRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3Flow;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3FlowValidationResult;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ImportFlowRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListFlowsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3TrainFlowRequest;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ValidateFlowRequest;
use Google\Service\Dialogflow\GoogleLongrunningOperation;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "flows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $flows = $dialogflowService->flows;
 *  </code>
 */
class ProjectsLocationsAgentsFlows extends \Google\Service\Resource
{
  /**
   * Creates a flow in the specified agent. Note: You should always train a flow
   * prior to sending it queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (flows.create)
   *
   * @param string $parent Required. The agent to create a flow for. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3Flow $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `flow`: * `Flow.event_handlers.trigger_fulfillment.messages` *
   * `Flow.event_handlers.trigger_fulfillment.conditional_cases` *
   * `Flow.transition_routes.trigger_fulfillment.messages` *
   * `Flow.transition_routes.trigger_fulfillment.conditional_cases` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return GoogleCloudDialogflowCxV3Flow
   */
  public function create($parent, GoogleCloudDialogflowCxV3Flow $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3Flow::class);
  }
  /**
   * Deletes a specified flow. (flows.delete)
   *
   * @param string $name Required. The name of the flow to delete. Format:
   * `projects//locations//agents//flows/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force This field has no effect for flows with no incoming
   * transitions. For flows with incoming transitions: * If `force` is set to
   * false, an error will be returned with message indicating the incoming
   * transitions. * If `force` is set to true, Dialogflow will remove the flow, as
   * well as any transitions to the flow (i.e. Target flow in event handlers or
   * Target flow in transition routes that point to this flow will be cleared).
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Exports the specified flow to a binary file. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`:
   * ExportFlowResponse Note that resources (e.g. intents, entities, webhooks)
   * that the flow references will also be exported. (flows.export)
   *
   * @param string $name Required. The name of the flow to export. Format:
   * `projects//locations//agents//flows/`.
   * @param GoogleCloudDialogflowCxV3ExportFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function export($name, GoogleCloudDialogflowCxV3ExportFlowRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieves the specified flow. (flows.get)
   *
   * @param string $name Required. The name of the flow to get. Format:
   * `projects//locations//agents//flows/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to retrieve the flow for. The
   * following fields are language dependent: *
   * `Flow.event_handlers.trigger_fulfillment.messages` *
   * `Flow.event_handlers.trigger_fulfillment.conditional_cases` *
   * `Flow.transition_routes.trigger_fulfillment.messages` *
   * `Flow.transition_routes.trigger_fulfillment.conditional_cases` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return GoogleCloudDialogflowCxV3Flow
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3Flow::class);
  }
  /**
   * Gets the latest flow validation result. Flow validation is performed when
   * ValidateFlow is called. (flows.getValidationResult)
   *
   * @param string $name Required. The flow name. Format:
   * `projects//locations//agents//flows//validationResult`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode If not specified, the agent's default language
   * is used.
   * @return GoogleCloudDialogflowCxV3FlowValidationResult
   */
  public function getValidationResult($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getValidationResult', [$params], GoogleCloudDialogflowCxV3FlowValidationResult::class);
  }
  /**
   * Imports the specified flow to the specified agent from a binary file. This
   * method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`:
   * ImportFlowResponse Note: You should always train a flow prior to sending it
   * queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (flows.import)
   *
   * @param string $parent Required. The agent to import the flow into. Format:
   * `projects//locations//agents/`.
   * @param GoogleCloudDialogflowCxV3ImportFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($parent, GoogleCloudDialogflowCxV3ImportFlowRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Returns the list of all flows in the specified agent.
   * (flows.listProjectsLocationsAgentsFlows)
   *
   * @param string $parent Required. The agent containing the flows. Format:
   * `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to list flows for. The following
   * fields are language dependent: *
   * `Flow.event_handlers.trigger_fulfillment.messages` *
   * `Flow.event_handlers.trigger_fulfillment.conditional_cases` *
   * `Flow.transition_routes.trigger_fulfillment.messages` *
   * `Flow.transition_routes.trigger_fulfillment.conditional_cases` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListFlowsResponse
   */
  public function listProjectsLocationsAgentsFlows($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListFlowsResponse::class);
  }
  /**
   * Updates the specified flow. Note: You should always train a flow prior to
   * sending it queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (flows.patch)
   *
   * @param string $name The unique identifier of the flow. Format:
   * `projects//locations//agents//flows/`.
   * @param GoogleCloudDialogflowCxV3Flow $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `flow`: * `Flow.event_handlers.trigger_fulfillment.messages` *
   * `Flow.event_handlers.trigger_fulfillment.conditional_cases` *
   * `Flow.transition_routes.trigger_fulfillment.messages` *
   * `Flow.transition_routes.trigger_fulfillment.conditional_cases` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param string updateMask The mask to control which fields get updated. If
   * the mask is not present, all fields will be updated.
   * @return GoogleCloudDialogflowCxV3Flow
   */
  public function patch($name, GoogleCloudDialogflowCxV3Flow $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3Flow::class);
  }
  /**
   * Trains the specified flow. Note that only the flow in 'draft' environment is
   * trained. This method is a [long-running
   * operation](https://cloud.google.com/dialogflow/cx/docs/how/long-running-
   * operation). The returned `Operation` type has the following method-specific
   * fields: - `metadata`: An empty [Struct message](https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#struct) - `response`: An
   * [Empty message](https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#empty) Note: You should always train a
   * flow prior to sending it queries. See the [training
   * documentation](https://cloud.google.com/dialogflow/cx/docs/concept/training).
   * (flows.train)
   *
   * @param string $name Required. The flow to train. Format:
   * `projects//locations//agents//flows/`.
   * @param GoogleCloudDialogflowCxV3TrainFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function train($name, GoogleCloudDialogflowCxV3TrainFlowRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('train', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Validates the specified flow and creates or updates validation results.
   * Please call this API after the training is completed to get the complete
   * validation results. (flows.validate)
   *
   * @param string $name Required. The flow to validate. Format:
   * `projects//locations//agents//flows/`.
   * @param GoogleCloudDialogflowCxV3ValidateFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3FlowValidationResult
   */
  public function validate($name, GoogleCloudDialogflowCxV3ValidateFlowRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('validate', [$params], GoogleCloudDialogflowCxV3FlowValidationResult::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgentsFlows::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsFlows');
