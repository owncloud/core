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

namespace Google\Service\GameServices\Resource;

use Google\Service\GameServices\GameServerConfig;
use Google\Service\GameServices\ListGameServerConfigsResponse;
use Google\Service\GameServices\Operation;

/**
 * The "configs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google\Service\GameServices(...);
 *   $configs = $gameservicesService->configs;
 *  </code>
 */
class ProjectsLocationsGameServerDeploymentsConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new game server config in a given project, location, and game
   * server deployment. Game server configs are immutable, and are not applied
   * until referenced in the game server deployment rollout resource.
   * (configs.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/gameServerDeployments/{deploym
   * ent}/`.
   * @param GameServerConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string configId Required. The ID of the game server config
   * resource to be created.
   * @return Operation
   */
  public function create($parent, GameServerConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single game server config. The deletion will fail if the game
   * server config is referenced in a game server deployment rollout.
   * (configs.delete)
   *
   * @param string $name Required. The name of the game server config to delete,
   * in the following form: `projects/{project}/locations/{location}/gameServerDep
   * loyments/{deployment}/configs/{config}`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single game server config. (configs.get)
   *
   * @param string $name Required. The name of the game server config to retrieve,
   * in the following form: `projects/{project}/locations/{location}/gameServerDep
   * loyments/{deployment}/configs/{config}`.
   * @param array $optParams Optional parameters.
   * @return GameServerConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GameServerConfig::class);
  }
  /**
   * Lists game server configs in a given project, location, and game server
   * deployment. (configs.listProjectsLocationsGameServerDeploymentsConfigs)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/gameServerDeployments/{deploym
   * ent}/configs`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * unspecified, server will pick an appropriate default. Server may return fewer
   * items than requested. A caller should only rely on response's next_page_token
   * to determine if there are more GameServerConfigs left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous list request, if any.
   * @return ListGameServerConfigsResponse
   */
  public function listProjectsLocationsGameServerDeploymentsConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGameServerConfigsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGameServerDeploymentsConfigs::class, 'Google_Service_GameServices_Resource_ProjectsLocationsGameServerDeploymentsConfigs');
