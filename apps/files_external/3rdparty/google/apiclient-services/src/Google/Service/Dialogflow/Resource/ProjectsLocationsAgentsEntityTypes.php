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
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsEntityTypes extends Google_Service_Resource
{
  /**
   * Creates an entity type in the specified agent. (entityTypes.create)
   *
   * @param string $parent Required. The agent to create a entity type for.
   * Format: `projects//locations//agents/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `entity_type`: * `EntityType.entities.value` * `EntityType.entities.synonyms`
   * * `EntityType.excluded_phrases.value` If not specified, the agent's default
   * language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType");
  }
  /**
   * Deletes the specified entity type. (entityTypes.delete)
   *
   * @param string $name Required. The name of the entity type to delete. Format:
   * `projects//locations//agents//entityTypes/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force This field has no effect for entity type not being
   * used. For entity types that are used by intents or pages: * If `force` is set
   * to false, an error will be returned with message indicating the referencing
   * resources. * If `force` is set to true, Dialogflow will remove the entity
   * type, as well as any references to the entity type (i.e. Page parameter of
   * the entity type will be changed to '@sys.any' and intent parameter of the
   * entity type will be removed).
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
   * `projects//locations//agents//entityTypes/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to retrieve the entity type for.
   * The following fields are language dependent: * `EntityType.entities.value` *
   * `EntityType.entities.synonyms` * `EntityType.excluded_phrases.value` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType");
  }
  /**
   * Returns the list of all entity types in the specified agent.
   * (entityTypes.listProjectsLocationsAgentsEntityTypes)
   *
   * @param string $parent Required. The agent to list all entity types for.
   * Format: `projects//locations//agents/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to list entity types for. The
   * following fields are language dependent: * `EntityType.entities.value` *
   * `EntityType.entities.synonyms` * `EntityType.excluded_phrases.value` If not
   * specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListEntityTypesResponse
   */
  public function listProjectsLocationsAgentsEntityTypes($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListEntityTypesResponse");
  }
  /**
   * Updates the specified entity type. (entityTypes.patch)
   *
   * @param string $name The unique identifier of the entity type. Required for
   * EntityTypes.UpdateEntityType. Format:
   * `projects//locations//agents//entityTypes/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `entity_type`: * `EntityType.entities.value` * `EntityType.entities.synonyms`
   * * `EntityType.excluded_phrases.value` If not specified, the agent's default
   * language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param string updateMask The mask to control which fields get updated.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3EntityType");
  }
}
