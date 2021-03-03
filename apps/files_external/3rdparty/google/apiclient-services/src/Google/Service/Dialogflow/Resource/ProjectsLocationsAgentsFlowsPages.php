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
 * The "pages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google_Service_Dialogflow(...);
 *   $pages = $dialogflowService->pages;
 *  </code>
 */
class Google_Service_Dialogflow_Resource_ProjectsLocationsAgentsFlowsPages extends Google_Service_Resource
{
  /**
   * Creates a page in the specified flow. (pages.create)
   *
   * @param string $parent Required. The flow to create a page for. Format:
   * `projects//locations//agents//flows/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `page`: * `Page.entry_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.initial_prompt_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.reprompt_event_handlers.messages` *
   * `Page.transition_routes.trigger_fulfillment.messages` *
   * `Page.transition_route_groups.transition_routes.trigger_fulfillment.messages`
   * If not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page
   */
  public function create($parent, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page");
  }
  /**
   * Deletes the specified page. (pages.delete)
   *
   * @param string $name Required. The name of the page to delete. Format:
   * `projects//locations//agents//Flows//pages/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force This field has no effect for pages with no incoming
   * transitions. For pages with incoming transitions: * If `force` is set to
   * false, an error will be returned with message indicating the incoming
   * transitions. * If `force` is set to true, Dialogflow will remove the page, as
   * well as any transitions to the page (i.e. Target page in event handlers or
   * Target page in transition routes that point to this page will be cleared).
   * @return Google_Service_Dialogflow_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dialogflow_GoogleProtobufEmpty");
  }
  /**
   * Retrieves the specified page. (pages.get)
   *
   * @param string $name Required. The name of the page. Format:
   * `projects//locations//agents//flows//pages/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to retrieve the page for. The
   * following fields are language dependent: * `Page.entry_fulfillment.messages`
   * * `Page.form.parameters.fill_behavior.initial_prompt_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.reprompt_event_handlers.messages` *
   * `Page.transition_routes.trigger_fulfillment.messages` *
   * `Page.transition_route_groups.transition_routes.trigger_fulfillment.messages`
   * If not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page");
  }
  /**
   * Returns the list of all pages in the specified flow.
   * (pages.listProjectsLocationsAgentsFlowsPages)
   *
   * @param string $parent Required. The flow to list all pages for. Format:
   * `projects//locations//agents//flows/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to list pages for. The following
   * fields are language dependent: * `Page.entry_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.initial_prompt_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.reprompt_event_handlers.messages` *
   * `Page.transition_routes.trigger_fulfillment.messages` *
   * `Page.transition_route_groups.transition_routes.trigger_fulfillment.messages`
   * If not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 100 and at most 1000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListPagesResponse
   */
  public function listProjectsLocationsAgentsFlowsPages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListPagesResponse");
  }
  /**
   * Updates the specified page. (pages.patch)
   *
   * @param string $name The unique identifier of the page. Required for the
   * Pages.UpdatePage method. Pages.CreatePage populates the name automatically.
   * Format: `projects//locations//agents//flows//pages/`.
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language of the following fields in
   * `page`: * `Page.entry_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.initial_prompt_fulfillment.messages` *
   * `Page.form.parameters.fill_behavior.reprompt_event_handlers.messages` *
   * `Page.transition_routes.trigger_fulfillment.messages` *
   * `Page.transition_route_groups.transition_routes.trigger_fulfillment.messages`
   * If not specified, the agent's default language is used. [Many
   * languages](https://cloud.google.com/dialogflow/cx/docs/reference/language)
   * are supported. Note: languages must be enabled in the agent before they can
   * be used.
   * @opt_param string updateMask The mask to control which fields get updated. If
   * the mask is not present, all fields will be updated.
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page
   */
  public function patch($name, Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Page");
  }
}
