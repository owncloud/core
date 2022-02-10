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

namespace Google\Service\Container\Resource;

use Google\Service\Container\CreateNodePoolRequest;
use Google\Service\Container\ListNodePoolsResponse;
use Google\Service\Container\NodePool;
use Google\Service\Container\Operation;
use Google\Service\Container\RollbackNodePoolUpgradeRequest;
use Google\Service\Container\SetNodePoolAutoscalingRequest;
use Google\Service\Container\SetNodePoolManagementRequest;
use Google\Service\Container\SetNodePoolSizeRequest;
use Google\Service\Container\UpdateNodePoolRequest;

/**
 * The "nodePools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google\Service\Container(...);
 *   $nodePools = $containerService->nodePools;
 *  </code>
 */
class ProjectsLocationsClustersNodePools extends \Google\Service\Resource
{
  /**
   * Creates a node pool for a cluster. (nodePools.create)
   *
   * @param string $parent The parent (project, location, cluster name) where the
   * node pool will be created. Specified in the format
   * `projects/locations/clusters`.
   * @param CreateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, CreateNodePoolRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a node pool from a cluster. (nodePools.delete)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to delete. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterId Deprecated. The name of the cluster. This field
   * has been deprecated and replaced by the name field.
   * @opt_param string nodePoolId Deprecated. The name of the node pool to delete.
   * This field has been deprecated and replaced by the name field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves the requested node pool. (nodePools.get)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to get. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterId Deprecated. The name of the cluster. This field
   * has been deprecated and replaced by the name field.
   * @opt_param string nodePoolId Deprecated. The name of the node pool. This
   * field has been deprecated and replaced by the name field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber). This
   * field has been deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @return NodePool
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], NodePool::class);
  }
  /**
   * Lists the node pools for a cluster.
   * (nodePools.listProjectsLocationsClustersNodePools)
   *
   * @param string $parent The parent (project, location, cluster name) where the
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
   * @return ListNodePoolsResponse
   */
  public function listProjectsLocationsClustersNodePools($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNodePoolsResponse::class);
  }
  /**
   * Rolls back a previously Aborted or Failed NodePool upgrade. This makes no
   * changes if the last upgrade successfully completed. (nodePools.rollback)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node poll to rollback upgrade. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param RollbackNodePoolUpgradeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function rollback($name, RollbackNodePoolUpgradeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rollback', [$params], Operation::class);
  }
  /**
   * Sets the autoscaling settings for the specified node pool.
   * (nodePools.setAutoscaling)
   *
   * @param string $name The name (project, location, cluster, node pool) of the
   * node pool to set autoscaler settings. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param SetNodePoolAutoscalingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setAutoscaling($name, SetNodePoolAutoscalingRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAutoscaling', [$params], Operation::class);
  }
  /**
   * Sets the NodeManagement options for a node pool. (nodePools.setManagement)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to set management properties. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param SetNodePoolManagementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setManagement($name, SetNodePoolManagementRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setManagement', [$params], Operation::class);
  }
  /**
   * Sets the size for a specific node pool. The new size will be used for all
   * replicas, including future replicas created by modifying NodePool.locations.
   * (nodePools.setSize)
   *
   * @param string $name The name (project, location, cluster, node pool id) of
   * the node pool to set size. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param SetNodePoolSizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setSize($name, SetNodePoolSizeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setSize', [$params], Operation::class);
  }
  /**
   * Updates the version and/or image type for the specified node pool.
   * (nodePools.update)
   *
   * @param string $name The name (project, location, cluster, node pool) of the
   * node pool to update. Specified in the format
   * `projects/locations/clusters/nodePools`.
   * @param UpdateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($name, UpdateNodePoolRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsClustersNodePools::class, 'Google_Service_Container_Resource_ProjectsLocationsClustersNodePools');
