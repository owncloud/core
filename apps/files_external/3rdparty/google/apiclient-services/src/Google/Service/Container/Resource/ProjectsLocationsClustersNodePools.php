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
class Google_Service_Container_Resource_ProjectsLocationsClustersNodePools extends Google_Service_Resource
{
  /**
   * Creates a node pool for a cluster. (nodePools.create)
   *
   * @param string $parent The parent (project, location, cluster id) where the
   * node pool will be created. Specified in the format
   * `projects/locations/clusters`.
   * @param Google_Service_Container_CreateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($parent, Google_Service_Container_CreateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Deletes a node pool from a cluster. (nodePools.delete)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to delete. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @opt_param string nodePoolId Deprecated. The name of the node pool to delete.
   * This field has been deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @opt_param string clusterId Deprecated. The name of the cluster. This field
   * has been deprecated and replaced by the name field.
   * @return Google_Service_Container_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Retrieves the requested node pool. (nodePools.get)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to get. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @opt_param string clusterId Deprecated. The name of the cluster. This field
   * has been deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @opt_param string nodePoolId Deprecated. The name of the node pool. This
   * field has been deprecated and replaced by the name field.
   * @return Google_Service_Container_NodePool
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_NodePool");
  }
  /**
   * Lists the node pools for a cluster.
   * (nodePools.listProjectsLocationsClustersNodePools)
   *
   * @param string $parent The parent (project, location, cluster id) where the
   * node pools will be listed. Specified in the format
   * `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterId Deprecated. The name of the cluster. This field
   * has been deprecated and replaced by the parent field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the parent field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the parent
   * field.
   * @return Google_Service_Container_ListNodePoolsResponse
   */
  public function listProjectsLocationsClustersNodePools($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListNodePoolsResponse");
  }
  /**
   * Rolls back a previously Aborted or Failed NodePool upgrade. This makes no
   * changes if the last upgrade successfully completed. (nodePools.rollback)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node poll to rollback upgrade. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function rollback($name, Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the autoscaling settings for the specified node pool.
   * (nodePools.setAutoscaling)
   *
   * @param string $name The name (project, location, cluster, node pool) of the
   * node pool to set autoscaler settings. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param Google_Service_Container_SetNodePoolAutoscalingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setAutoscaling($name, Google_Service_Container_SetNodePoolAutoscalingRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setAutoscaling', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the NodeManagement options for a node pool. (nodePools.setManagement)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to set management properties. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param Google_Service_Container_SetNodePoolManagementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setManagement($name, Google_Service_Container_SetNodePoolManagementRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setManagement', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the size for a specific node pool. (nodePools.setSize)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to set size. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param Google_Service_Container_SetNodePoolSizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setSize($name, Google_Service_Container_SetNodePoolSizeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setSize', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the version and/or image type for the specified node pool.
   * (nodePools.update)
   *
   * @param string $name The name (project, location, cluster, node pool) of the
   * node pool to update. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param Google_Service_Container_UpdateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function update($name, Google_Service_Container_UpdateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Container_Operation");
  }
}
