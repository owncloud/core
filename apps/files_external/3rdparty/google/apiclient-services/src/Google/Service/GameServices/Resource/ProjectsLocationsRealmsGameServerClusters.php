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
 * The "gameServerClusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gameservicesService = new Google_Service_GameServices(...);
 *   $gameServerClusters = $gameservicesService->gameServerClusters;
 *  </code>
 */
class Google_Service_GameServices_Resource_ProjectsLocationsRealmsGameServerClusters extends Google_Service_Resource
{
  /**
   * Creates a new game server cluster in a given project and location.
   * (gameServerClusters.create)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/realms/{realm-id}`.
   * @param Google_Service_GameServices_GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gameServerClusterId Required. The ID of the game server
   * cluster resource to be created.
   * @return Google_Service_GameServices_Operation
   */
  public function create($parent, Google_Service_GameServices_GameServerCluster $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Deletes a single game server cluster. (gameServerClusters.delete)
   *
   * @param string $name Required. The name of the game server cluster to delete,
   * in the following form:
   * `projects/{project}/locations/{location}/gameServerClusters/{cluster}`.
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
   * Gets details of a single game server cluster. (gameServerClusters.get)
   *
   * @param string $name Required. The name of the game server cluster to
   * retrieve, in the following form:
   * `projects/{project}/locations/{location}/realms/{realm-
   * id}/gameServerClusters/{cluster}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GameServices_GameServerCluster
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GameServices_GameServerCluster");
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
   * @return Google_Service_GameServices_ListGameServerClustersResponse
   */
  public function listProjectsLocationsRealmsGameServerClusters($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GameServices_ListGameServerClustersResponse");
  }
  /**
   * Patches a single game server cluster. (gameServerClusters.patch)
   *
   * @param string $name Required. The resource name of the game server cluster,
   * in the following form: `projects/{project}/locations/{location}/realms/{realm
   * }/gameServerClusters/{cluster}`. For example, `projects/my-
   * project/locations/{location}/realms/zanzibar/gameServerClusters/my-onprem-
   * cluster`.
   * @param Google_Service_GameServices_GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_GameServices_Operation
   */
  public function patch($name, Google_Service_GameServices_GameServerCluster $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GameServices_Operation");
  }
  /**
   * Previews creation of a new game server cluster in a given project and
   * location. (gameServerClusters.previewCreate)
   *
   * @param string $parent Required. The parent resource name, in the following
   * form: `projects/{project}/locations/{location}/realms/{realm}`.
   * @param Google_Service_GameServices_GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gameServerClusterId Required. The ID of the game server
   * cluster resource to be created.
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @return Google_Service_GameServices_PreviewCreateGameServerClusterResponse
   */
  public function previewCreate($parent, Google_Service_GameServices_GameServerCluster $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('previewCreate', array($params), "Google_Service_GameServices_PreviewCreateGameServerClusterResponse");
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
   * @return Google_Service_GameServices_PreviewDeleteGameServerClusterResponse
   */
  public function previewDelete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('previewDelete', array($params), "Google_Service_GameServices_PreviewDeleteGameServerClusterResponse");
  }
  /**
   * Previews updating a GameServerCluster. (gameServerClusters.previewUpdate)
   *
   * @param string $name Required. The resource name of the game server cluster,
   * in the following form: `projects/{project}/locations/{location}/realms/{realm
   * }/gameServerClusters/{cluster}`. For example, `projects/my-
   * project/locations/{location}/realms/zanzibar/gameServerClusters/my-onprem-
   * cluster`.
   * @param Google_Service_GameServices_GameServerCluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string previewTime Optional. The target timestamp to compute the
   * preview.
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_GameServices_PreviewUpdateGameServerClusterResponse
   */
  public function previewUpdate($name, Google_Service_GameServices_GameServerCluster $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('previewUpdate', array($params), "Google_Service_GameServices_PreviewUpdateGameServerClusterResponse");
  }
}
