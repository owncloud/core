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
 * The "entityTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $entityTypes = $dialogflowService->entityTypes;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsAgentEntityTypes extends Google_Service_Resource
{
  /**
   * Deletes entity types in the specified agent. Operation
   * (entityTypes.batchDelete)
   *
   * @param string $parent Required. The name of the agent to delete all entities
   * types for. Format: `projects//agent`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchDeleteEntityTypesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function batchDelete($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchDeleteEntityTypesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Updates/Creates multiple entity types in the specified agent. Operation
   * (entityTypes.batchUpdate)
   *
   * @param string $parent Required. The name of the agent to update or create
   * entity types in. Format: `projects//agent`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchUpdateEntityTypesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleLongrunningOperation
   */
  public function batchUpdate($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2BatchUpdateEntityTypesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', array($params), "Google_Service_Dialogflow_GoogleLongrunningOperation");
  }
  /**
   * Creates an entity type in the specified agent. (entityTypes.create)
   *
   * @param string $parent Required. The agent to create a entity type for.
   * Format: `projects//agent`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language used to access
   * language-specific data. If not specified, the agent's default language is
   * used. For more information, see [Multilingual intent and entity
   * data](https://cloud.google.com/dialogflow/docs/agents-multilingual#intent-
   * entity).
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType");
  }
  /**
   * Deletes the specified entity type. (entityTypes.delete)
   *
   * @param string $name Required. The name of the entity type to delete. Format:
   * `projects//agent/entityTypes/`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dialogflow_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_GoogleProtobufEmpty");
  }
  /**
   * Retrieves the specified entity type. (entityTypes.get)
   *
   * @param string $name Required. The name of the entity type. Format:
   * `projects//agent/entityTypes/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language used to access
   * language-specific data. If not specified, the agent's default language is
   * used. For more information, see [Multilingual intent and entity
   * data](https://cloud.google.com/dialogflow/docs/agents-multilingual#intent-
   * entity).
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType");
  }
  /**
   * Returns the list of all entity types in the specified agent.
   * (entityTypes.listProjectsAgentEntityTypes)
   *
   * @param string $parent Required. The agent to list all entity types from.
   * Format: `projects//agent`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return in a
   * single page. By default 100 and at most 1000.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request.
   * @opt_param string languageCode Optional. The language used to access
   * language-specific data. If not specified, the agent's default language is
   * used. For more information, see [Multilingual intent and entity
   * data](https://cloud.google.com/dialogflow/docs/agents-multilingual#intent-
   * entity).
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2ListEntityTypesResponse
   */
  public function listProjectsAgentEntityTypes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2ListEntityTypesResponse");
  }
  /**
   * Updates the specified entity type. (entityTypes.patch)
   *
   * @param string $name The unique identifier of the entity type. Required for
   * EntityTypes.UpdateEntityType and EntityTypes.BatchUpdateEntityTypes methods.
   * Format: `projects//agent/entityTypes/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode Optional. The language used to access
   * language-specific data. If not specified, the agent's default language is
   * used. For more information, see [Multilingual intent and entity
   * data](https://cloud.google.com/dialogflow/docs/agents-multilingual#intent-
   * entity).
   * @opt_param string updateMask Optional. The mask to control which fields get
   * updated.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowV2EntityType");
  }
}
