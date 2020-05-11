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
 * The "configs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google_Service_GameServices(...);
 *   $configs = $gameservicesService->configs;
 *  </code>
 */
class Google_Service_GameServices_Resource_ProjectsLocationsGameServerDeploymentsConfigs extends Google_Service_Resource
{
  /**
   * Creates a new Game Server Config in a given project, Location, and Game
   * Server Deployment. Game Server Configs are immutable, and are not applied
   * until referenced in the Game Server Deployment Rollout resource.
   * (configs.create)
   *
   * @param string $parent Required. The parent resource name. Uses the form:
   *
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}/`
   * .
   * @param Google_Service_GameServices_GameServerConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Required. The ID of the Game Server Config
   * resource to be created.
   * @return Google_Service_GameServices_Operation
   */
  public function create($parent, Google_Service_GameServices_GameServerConfig $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Deletes a single Game Server Config. The deletion will fail if the Game
   * Server Config is referenced in a Game Server Deployment Rollout.
   * (configs.delete)
   *
   * @param string $name Required. The name of the Game Server Config to delete.
   * Uses the form:
   *
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}/c
   * onfigs/{config}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Gets details of a single Game Server Config. (configs.get)
   *
   * @param string $name Required. The name of the Game Server Config to retrieve.
   * Uses the form:
   *
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}/c
   * onfigs/{config}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_GameServerConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GameServices_GameServerConfig");
  }
  /**
   * Lists Game Server Configs in a given project, Location, and Game Server
   * Deployment. (configs.listProjectsLocationsGameServerDeploymentsConfigs)
   *
   * @param string $parent Required. The parent resource name. Uses the form:
   *
   * `projects/{project}/locations/{location}/gameServerDeployments/{deployment}/c
   * onfigs`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return.  If
   * unspecified, server will pick an appropriate default. Server may return fewer
   * items than requested. A caller should only rely on response's next_page_token
   * to determine if there are more GameServerConfigs left to be queried.
   * @return Google_Service_GameServices_ListGameServerConfigsResponse
   */
  public function listProjectsLocationsGameServerDeploymentsConfigs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GameServices_ListGameServerConfigsResponse");
  }
}
