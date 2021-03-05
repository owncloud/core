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
 * The "nodePools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $nodePools = $containerService->nodePools;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsZonesClustersNodePools extends Google_Service_Resource
{
  /**
   * Sets the autoscaling settings for the specified node pool.
   * (nodePools.autoscaling)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://support.google.com/cloud/answer/6158840). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to upgrade.
   * This field has been deprecated and replaced by the name field.
   * @param Google_Service_Container_SetNodePoolAutoscalingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function autoscaling($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolAutoscalingRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('autoscaling', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Creates a node pool for a cluster. (nodePools.create)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the parent field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the parent
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the parent field.
   * @param Google_Service_Container_CreateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($projectId, $zone, $clusterId, Google_Service_Container_CreateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Deletes a node pool from a cluster. (nodePools.delete)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to delete.
   * This field has been deprecated and replaced by the name field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project, location, cluster, node pool id) of
   * the node pool to delete. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @return Google_Service_Container_Operation
   */
  public function delete($projectId, $zone, $clusterId, $nodePoolId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Retrieves the requested node pool. (nodePools.get)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool. This field
   * has been deprecated and replaced by the name field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project, location, cluster, node pool id) of
   * the node pool to get. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @return Google_Service_Container_NodePool
   */
  public function get($projectId, $zone, $clusterId, $nodePoolId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_NodePool");
  }
  /**
   * Lists the node pools for a cluster.
   * (nodePools.listProjectsZonesClustersNodePools)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the parent field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the parent
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the parent field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent The parent (project, location, cluster id) where the
   * node pools will be listed. Specified in the format
   * `projects/locations/clusters`.
   * @return Google_Service_Container_ListNodePoolsResponse
   */
  public function listProjectsZonesClustersNodePools($projectId, $zone, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListNodePoolsResponse");
  }
  /**
   * Rolls back a previously Aborted or Failed NodePool upgrade. This makes no
   * changes if the last upgrade successfully completed. (nodePools.rollback)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://support.google.com/cloud/answer/6158840). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to rollback.
   * This field has been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to rollback.
   * This field has been deprecated and replaced by the name field.
   * @param Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function rollback($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the NodeManagement options for a node pool. (nodePools.setManagement)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://support.google.com/cloud/answer/6158840). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to update. This
   * field has been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to update.
   * This field has been deprecated and replaced by the name field.
   * @param Google_Service_Container_SetNodePoolManagementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setManagement($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolManagementRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setManagement', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the size for a specific node pool. The new size will be used for all
   * replicas, including future replicas created by modifying NodePool.locations.
   * (nodePools.setSize)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://support.google.com/cloud/answer/6158840). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to update. This
   * field has been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to update.
   * This field has been deprecated and replaced by the name field.
   * @param Google_Service_Container_SetNodePoolSizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setSize($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolSizeRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setSize', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the version and/or image type for the specified node pool.
   * (nodePools.update)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://support.google.com/cloud/answer/6158840). This
   * field has been deprecated and replaced by the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param string $nodePoolId Deprecated. The name of the node pool to upgrade.
   * This field has been deprecated and replaced by the name field.
   * @param Google_Service_Container_UpdateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function update($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_UpdateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Container_Operation");
  }
}
