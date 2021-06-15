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

/**
 * The "flows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $flows = $dialogflowService->flows;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsFlows extends Google_Service_Resource
{
  /**
   * Creates a flow in the specified agent. (flows.create)
   *
   * @param string $parent Required. The agent to create a flow for. Format:
   * `projects//locations//agents/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow $postBody
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
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow");
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
   * @return Google_Service_Dialogflow_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_GoogleProtobufEmpty");
  }
  /**
   * Exports the specified flow to a binary file. Note that resources (e.g.
   * intents, entities, webhooks) that the flow references will also be exported.
   * (flows.export)
   *
   * @param string $name Required. The name of the flow to export. Format:
   * `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExportFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function export($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ExportFlowRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
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
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow");
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
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FlowValidationResult
   */
  public function getValidationResult($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getValidationResult', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FlowValidationResult");
  }
  /**
   * Imports the specified flow to the specified agent from a binary file.
   * (flows.import)
   *
   * @param string $parent Required. The agent to import the flow into. Format:
   * `projects//locations//agents/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ImportFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function import($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ImportFlowRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
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
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListFlowsResponse
   */
  public function listProjectsLocationsAgentsFlows($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListFlowsResponse");
  }
  /**
   * Updates the specified flow. (flows.patch)
   *
   * @param string $name The unique identifier of the flow. Format:
   * `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow $postBody
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
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated. If `update_mask` is not specified, an error will be returned.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow");
  }
  /**
   * Trains the specified flow. Note that only the flow in 'draft' environment is
   * trained. (flows.train)
   *
   * @param string $name Required. The flow to train. Format:
   * `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TrainFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function train($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TrainFlowRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('train', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Validates the specified flow and creates or updates validation results.
   * Please call this API after the training is completed to get the complete
   * validation results. (flows.validate)
   *
   * @param string $name Required. The flow to validate. Format:
   * `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ValidateFlowRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FlowValidationResult
   */
  public function validate($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ValidateFlowRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3FlowValidationResult");
  }
}
