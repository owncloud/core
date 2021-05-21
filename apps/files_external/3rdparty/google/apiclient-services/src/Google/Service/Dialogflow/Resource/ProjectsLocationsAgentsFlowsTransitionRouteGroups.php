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
 * The "transitionRouteGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $transitionRouteGroups = $dialogflowService->transitionRouteGroups;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsFlowsTransitionRouteGroups extends Google_Service_Resource
{
  /**
   * Creates an TransitionRouteGroup in the specified flow.
   * (transitionRouteGroups.create)
   *
   * @param string $parent Required. The flow to create an TransitionRouteGroup
   * for. Format: `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `TransitionRouteGroup`: *
   * `TransitionRouteGroup.transition_routes.trigger_fulfillment.messages` * `Tran
   * sitionRouteGroup.transition_routes.trigger_fulfillment.conditional_cases` If
   * not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup");
  }
  /**
   * Deletes the specified TransitionRouteGroup. (transitionRouteGroups.delete)
   *
   * @param string $name Required. The name of the TransitionRouteGroup to delete.
   * Format: `projects//locations//agents//flows//transitionRouteGroups/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force This field has no effect for transition route group
   * that no page is using. If the transition route group is referenced by any
   * page: * If `force` is set to false, an error will be returned with message
   * indicating pages that reference the transition route group. * If `force` is
   * set to true, Dialogflow will remove the transition route group, as well as
   * any reference to it.
   * @return Google_Service_Dialogflow_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_GoogleProtobufEmpty");
  }
  /**
   * Retrieves the specified TransitionRouteGroup. (transitionRouteGroups.get)
   *
   * @param string $name Required. The name of the TransitionRouteGroup. Format:
   * `projects//locations//agents//flows//transitionRouteGroups/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to retrieve the transition route
   * group for. The following fields are language dependent: *
   * `TransitionRouteGroup.transition_routes.trigger_fulfillment.messages` * `Tran
   * sitionRouteGroup.transition_routes.trigger_fulfillment.conditional_cases` If
   * not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup");
  }
  /**
   * Returns the list of all transition route groups in the specified flow.
   * (transitionRouteGroups.listProjectsLocationsAgentsFlowsTransitionRouteGroups)
   *
   * @param string $parent Required. The flow to list all transition route groups
   * for. Format: `projects//locations//agents//flows/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to list transition route groups
   * for. The following fields are language dependent: *
   * `TransitionRouteGroup.transition_routes.trigger_fulfillment.messages` * `Tran
   * sitionRouteGroup.transition_routes.trigger_fulfillment.conditional_cases` If
   * not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListTransitionRouteGroupsResponse
   */
  public function listProjectsLocationsAgentsFlowsTransitionRouteGroups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListTransitionRouteGroupsResponse");
  }
  /**
   * Updates the specified TransitionRouteGroup. (transitionRouteGroups.patch)
   *
   * @param string $name The unique identifier of the transition route group.
   * TransitionRouteGroups.CreateTransitionRouteGroup populates the name
   * automatically. Format:
   * `projects//locations//agents//flows//transitionRouteGroups/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `TransitionRouteGroup`: *
   * `TransitionRouteGroup.transition_routes.trigger_fulfillment.messages` * `Tran
   * sitionRouteGroup.transition_routes.trigger_fulfillment.conditional_cases` If
   * not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param string updateMask The mask to control which fields get updated.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionRouteGroup");
  }
}
