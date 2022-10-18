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

namespace Google\Service\Connectors\Resource;

use Google\Service\Connectors\ExecuteActionRequest;
use Google\Service\Connectors\ExecuteActionResponse;
use Google\Service\Connectors\ListActionsResponse;

/**
 * The "actions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $actions = $connectorsService->actions;
 *  </code>
 */
class ProjectsLocationsConnectionsActions extends \Google\Service\Resource
{
  /**
   * Executes an action with the name specified in the request. The input
   * parameters for executing the action are passed through the body of the
   * ExecuteAction request. (actions.execute)
   *
   * @param string $name Required. Resource name of the Action. Format: projects/{
   * project}/locations/{location}/connections/{connection}/actions/{action}
   * @param ExecuteActionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ExecuteActionResponse
   */
  public function execute($name, ExecuteActionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('execute', [$params], ExecuteActionResponse::class);
  }
  /**
   * Gets the schema of all the actions supported by the connector.
   * (actions.listProjectsLocationsConnectionsActions)
   *
   * @param string $parent Required. Parent resource name of the Action. Format:
   * projects/{project}/locations/{location}/connections/{connection}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of Actions to return. Defaults to 25.
   * @opt_param string pageToken Page token, return from a previous ListActions
   * call, that can be used retrieve the next page of content. If unspecified, the
   * request returns the first page of actions.
   * @return ListActionsResponse
   */
  public function listProjectsLocationsConnectionsActions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListActionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnectionsActions::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnectionsActions');
