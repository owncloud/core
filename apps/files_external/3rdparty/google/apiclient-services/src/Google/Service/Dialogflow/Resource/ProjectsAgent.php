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
 * The "agent" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $agent = $dialogflowService->agent;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgent extends Google_Service_Resource
{
  /**
   * Exports the specified agent to a ZIP file.
   *
   * Operation  (agent.export)
   *
   * @param string $parent Required. The project that the agent to export is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2ExportAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function export($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2ExportAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Retrieves the fulfillment. (agent.getFulfillment)
   *
   * @param string $name Required. The name of the fulfillment. Format:
   * `projects//agent/fulfillment`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment
   */
  public function getFulfillment($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getFulfillment', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment");
  }
  /**
   * Gets agent validation result. Agent validation is performed during training
   * time and is updated automatically when training is completed.
   * (agent.getValidationResult)
   *
   * @param string $parent Required. The project that the agent is associated
   * with. Format: `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language for which you want a
   * validation result. If not specified, the agent's default language is used.
   * [Many languages](https://cloud.google.com/dialogflow/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2ValidationResult
   */
  public function getValidationResult($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getValidationResult', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2ValidationResult");
  }
  /**
   * Imports the specified agent from a ZIP file.
   *
   * Uploads new intents and entity types without deleting the existing ones.
   * Intents and entity types with the same name are replaced with the new
   * versions from ImportAgentRequest. After the import, the imported draft agent
   * will be trained automatically (unless disabled in agent settings). However,
   * once the import is done, training may not be completed yet. Please call
   * TrainAgent and wait for the operation it returns in order to train
   * explicitly.
   *
   * Operation  An operation which tracks when importing is complete. It only
   * tracks when the draft agent is updated not when it is done training.
   * (agent.import)
   *
   * @param string $parent Required. The project that the agent to import is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2ImportAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function import($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2ImportAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Restores the specified agent from a ZIP file.
   *
   * Replaces the current agent version with a new one. All the intents and entity
   * types in the older version are deleted. After the restore, the restored draft
   * agent will be trained automatically (unless disabled in agent settings).
   * However, once the restore is done, training may not be completed yet. Please
   * call TrainAgent and wait for the operation it returns in order to train
   * explicitly.
   *
   * Operation  An operation which tracks when restoring is complete. It only
   * tracks when the draft agent is updated not when it is done training.
   * (agent.restore)
   *
   * @param string $parent Required. The project that the agent to restore is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2RestoreAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function restore($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2RestoreAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('restore', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Returns the list of agents.
   *
   * Since there is at most one conversational agent per project, this method is
   * useful primarily for listing all agents across projects the caller has access
   * to. One can achieve that with a wildcard project collection id "-". Refer to
   * [List Sub-Collections](https://cloud.google.com/apis/design/design_patterns
   * #list_sub-collections). (agent.search)
   *
   * @param string $parent Required. The project to list agents from. Format:
   * `projects/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2SearchAgentsResponse
   */
  public function search($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2SearchAgentsResponse");
  }
  /**
   * Trains the specified agent.
   *
   * Operation  (agent.train)
   *
   * @param string $parent Required. The project that the agent to train is
   * associated with. Format: `projects/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2TrainAgentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function train($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2TrainAgentRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('train', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Updates the fulfillment. (agent.updateFulfillment)
   *
   * @param string $name Required. The unique identifier of the fulfillment.
   * Format: `projects//agent/fulfillment`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated. If the mask is not present, all fields will be updated.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment
   */
  public function updateFulfillment($name, Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateFulfillment', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2Fulfillment");
  }
}
