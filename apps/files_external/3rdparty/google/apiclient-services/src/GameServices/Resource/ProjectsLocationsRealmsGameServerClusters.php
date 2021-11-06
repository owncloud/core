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

use Google\Service\GameServices\GameServerCluster;
use Google\Service\GameServices\ListGameServerClustersResponse;
use Google\Service\GameServices\Operation;
use Google\Service\GameServices\PreviewCreateGameServerClusterResponse;
use Google\Service\GameServices\PreviewDeleteGameServerClusterResponse;
use Google\Service\GameServices\PreviewUpdateGameServerClusterResponse;

/**
 * The "gameServerClusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google\Service\GameServices(...);
 *   $gameServerClusters = $gameservicesService->gameServerClusters;
 *  </code>
 */
class ProjectsLocationsRealmsGameServerClusters extends \Google\Service\Resource
{
  /**
   * Creates a new game server cluster in a given project and location.
   * (gameServerClusters.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/realms/{realm-id}`.
   * @param GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gameServerClusterId Required. The ID of the game server
   * cluster resource to be created.
   * @return Operation
   */
  public function create($parent, GameServerCluster $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single game server cluster. (gameServerClusters.delete)
   *
   * @param string $name Required. The name of the game server cluster to delete,
   * in the following form:
   * `projects/{project}/locations/{location}/gameServerClusters/{cluster}`.
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
   * Gets details of a single game server cluster. (gameServerClusters.get)
   *
   * @param string $name Required. The name of the game server cluster to
   * retrieve, in the following form:
   * `projects/{project}/locations/{location}/realms/{realm-
   * id}/gameServerClusters/{cluster}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. View for the returned GameServerCluster
   * objects. When `FULL` is specified, the `cluster_state` field is also returned
   * in the GameServerCluster object, which includes the state of the referenced
   * Kubernetes cluster such as versions and provider info. The default/unset
   * value is GAME_SERVER_CLUSTER_VIEW_UNSPECIFIED, same as BASIC, which does not
   * return the `cluster_state` field.
   * @return GameServerCluster
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GameServerCluster::class);
  }
  /**
   * Lists game server clusters in a given project and location.
   * (gameServerClusters.listProjectsLocationsRealmsGameServerClusters)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: "projects/{project}/locations/{location}/realms/{realm}".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter to apply to list results.
   * @opt_param string orderBy Optional. Specifies the ordering of results
   * following syntax at
   * https://cloud.google.com/apis/design/design_patterns#sorting_order.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * unspecified, the server will pick an appropriate default. The server may
   * return fewer items than requested. A caller should only rely on response's
   * next_page_token to determine if there are more GameServerClusters left to be
   * queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous List request, if any.
   * @opt_param string view Optional. View for the returned GameServerCluster
   * objects. When `FULL` is specified, the `cluster_state` field is also returned
   * in the GameServerCluster object, which includes the state of the referenced
   * Kubernetes cluster such as versions and provider info. The default/unset
   * value is GAME_SERVER_CLUSTER_VIEW_UNSPECIFIED, same as BASIC, which does not
   * return the `cluster_state` field.
   * @return ListGameServerClustersResponse
   */
  public function listProjectsLocationsRealmsGameServerClusters($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGameServerClustersResponse::class);
  }
  /**
   * Patches a single game server cluster. (gameServerClusters.patch)
   *
   * @param string $name Required. The resource name of the game server cluster,
   * in the following form: `projects/{project}/locations/{location}/realms/{realm
   * }/gameServerClusters/{cluster}`. For example, `projects/my-
   * project/locations/{location}/realms/zanzibar/gameServerClusters/my-onprem-
   * cluster`.
   * @param GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Operation
   */
  public function patch($name, GameServerCluster $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Previews creation of a new game server cluster in a given project and
   * location. (gameServerClusters.previewCreate)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/realms/{realm}`.
   * @param GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gameServerClusterId Required. The ID of the game server
   * cluster resource to be created.
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @opt_param string view Optional. This field is deprecated, preview will
   * always return KubernetesClusterState.
   * @return PreviewCreateGameServerClusterResponse
   */
  public function previewCreate($parent, GameServerCluster $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('previewCreate', [$params], PreviewCreateGameServerClusterResponse::class);
  }
  /**
   * Previews deletion of a single game server cluster.
   * (gameServerClusters.previewDelete)
   *
   * @param string $name Required. The name of the game server cluster to delete,
   * in the following form:
   * `projects/{project}/locations/{location}/gameServerClusters/{cluster}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @return PreviewDeleteGameServerClusterResponse
   */
  public function previewDelete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('previewDelete', [$params], PreviewDeleteGameServerClusterResponse::class);
  }
  /**
   * Previews updating a GameServerCluster. (gameServerClusters.previewUpdate)
   *
   * @param string $name Required. The resource name of the game server cluster,
   * in the following form: `projects/{project}/locations/{location}/realms/{realm
   * }/gameServerClusters/{cluster}`. For example, `projects/my-
   * project/locations/{location}/realms/zanzibar/gameServerClusters/my-onprem-
   * cluster`.
   * @param GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return PreviewUpdateGameServerClusterResponse
   */
  public function previewUpdate($name, GameServerCluster $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('previewUpdate', [$params], PreviewUpdateGameServerClusterResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRealmsGameServerClusters::class, 'Google_Service_GameServices_Resource_ProjectsLocationsRealmsGameServerClusters');
