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

use Google\Service\Container\Cluster;
use Google\Service\Container\CompleteIPRotationRequest;
use Google\Service\Container\CreateClusterRequest;
use Google\Service\Container\ListClustersResponse;
use Google\Service\Container\Operation;
use Google\Service\Container\SetAddonsConfigRequest;
use Google\Service\Container\SetLabelsRequest;
use Google\Service\Container\SetLegacyAbacRequest;
use Google\Service\Container\SetLocationsRequest;
use Google\Service\Container\SetLoggingServiceRequest;
use Google\Service\Container\SetMaintenancePolicyRequest;
use Google\Service\Container\SetMasterAuthRequest;
use Google\Service\Container\SetMonitoringServiceRequest;
use Google\Service\Container\SetNetworkPolicyRequest;
use Google\Service\Container\StartIPRotationRequest;
use Google\Service\Container\UpdateClusterRequest;
use Google\Service\Container\UpdateMasterRequest;

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google\Service\Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class ProjectsZonesClusters extends \Google\Service\Resource
{
  /**
   * Sets the addons for a specific cluster. (clusters.addons)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param SetAddonsConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function addons($projectId, $zone, $clusterId, SetAddonsConfigRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addons', [$params], Operation::class);
  }
  /**
   * Completes master IP rotation. (clusters.completeIpRotation)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param CompleteIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function completeIpRotation($projectId, $zone, $clusterId, CompleteIPRotationRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('completeIpRotation', [$params], Operation::class);
  }
  /**
   * Creates a cluster, consisting of the specified number and type of Google
   * Compute Engine instances. By default, the cluster is created in the project's
   * [default network](https://cloud.google.com/compute/docs/networks-and-
   * firewalls#networks). One firewall is added for the cluster. After cluster
   * creation, the Kubelet creates routes for each node to allow the containers on
   * that node to communicate with all other instances in the cluster. Finally, an
   * entry is added to the project's global metadata indicating which CIDR range
   * the cluster is using. (clusters.create)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the parent field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the parent
   * field.
   * @param CreateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($projectId, $zone, CreateClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes the cluster, including the Kubernetes endpoint and all worker nodes.
   * Firewalls and routes that were configured during cluster creation are also
   * deleted. Other Google Compute Engine resources that might be in use by the
   * cluster, such as load balancer resources, are not deleted if they weren't
   * present when the cluster was initially created. (clusters.delete)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to delete. This
   * field has been deprecated and replaced by the name field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project, location, cluster) of the cluster
   * to delete. Specified in the format `projects/locations/clusters`.
   * @return Operation
   */
  public function delete($projectId, $zone, $clusterId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets the details of a specific cluster. (clusters.get)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to retrieve.
   * This field has been deprecated and replaced by the name field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name (project, location, cluster) of the cluster
   * to retrieve. Specified in the format `projects/locations/clusters`.
   * @return Cluster
   */
  public function get($projectId, $zone, $clusterId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Cluster::class);
  }
  /**
   * Enables or disables the ABAC authorization mechanism on a cluster.
   * (clusters.legacyAbac)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to update. This
   * field has been deprecated and replaced by the name field.
   * @param SetLegacyAbacRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function legacyAbac($projectId, $zone, $clusterId, SetLegacyAbacRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('legacyAbac', [$params], Operation::class);
  }
  /**
   * Lists all clusters owned by a project in either the specified zone or all
   * zones. (clusters.listProjectsZonesClusters)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the parent field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides, or "-" for all zones. This field has been deprecated and
   * replaced by the parent field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parent The parent (project and location) where the clusters
   * will be listed. Specified in the format `projects/locations`. Location "-"
   * matches all zones and all regions.
   * @return ListClustersResponse
   */
  public function listProjectsZonesClusters($projectId, $zone, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClustersResponse::class);
  }
  /**
   * Sets the locations for a specific cluster. Deprecated. Use
   * [projects.locations.clusters.update](https://cloud.google.com/kubernetes-
   * engine/docs/reference/rest/v1/projects.locations.clusters/update) instead.
   * (clusters.locations)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param SetLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function locations($projectId, $zone, $clusterId, SetLocationsRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('locations', [$params], Operation::class);
  }
  /**
   * Sets the logging service for a specific cluster. (clusters.logging)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param SetLoggingServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function logging($projectId, $zone, $clusterId, SetLoggingServiceRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('logging', [$params], Operation::class);
  }
  /**
   * Updates the master for a specific cluster. (clusters.master)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param UpdateMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function master($projectId, $zone, $clusterId, UpdateMasterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('master', [$params], Operation::class);
  }
  /**
   * Sets the monitoring service for a specific cluster. (clusters.monitoring)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param SetMonitoringServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function monitoring($projectId, $zone, $clusterId, SetMonitoringServiceRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('monitoring', [$params], Operation::class);
  }
  /**
   * Sets labels on a cluster. (clusters.resourceLabels)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param SetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function resourceLabels($projectId, $zone, $clusterId, SetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resourceLabels', [$params], Operation::class);
  }
  /**
   * Sets the maintenance policy for a cluster. (clusters.setMaintenancePolicy)
   *
   * @param string $projectId Required. The Google Developers Console [project ID
   * or project number](https://cloud.google.com/resource-manager/docs/creating-
   * managing-projects).
   * @param string $zone Required. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides.
   * @param string $clusterId Required. The name of the cluster to update.
   * @param SetMaintenancePolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMaintenancePolicy($projectId, $zone, $clusterId, SetMaintenancePolicyRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMaintenancePolicy', [$params], Operation::class);
  }
  /**
   * Sets master auth materials. Currently supports changing the admin password or
   * a specific cluster, either via password generation or explicitly setting the
   * password. (clusters.setMasterAuth)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param SetMasterAuthRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMasterAuth($projectId, $zone, $clusterId, SetMasterAuthRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMasterAuth', [$params], Operation::class);
  }
  /**
   * Enables or disables Network Policy for a cluster. (clusters.setNetworkPolicy)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param SetNetworkPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setNetworkPolicy($projectId, $zone, $clusterId, SetNetworkPolicyRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setNetworkPolicy', [$params], Operation::class);
  }
  /**
   * Starts master IP rotation. (clusters.startIpRotation)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster. This field has
   * been deprecated and replaced by the name field.
   * @param StartIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function startIpRotation($projectId, $zone, $clusterId, StartIPRotationRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startIpRotation', [$params], Operation::class);
  }
  /**
   * Updates the settings of a specific cluster. (clusters.update)
   *
   * @param string $projectId Deprecated. The Google Developers Console [project
   * ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @param string $zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @param string $clusterId Deprecated. The name of the cluster to upgrade. This
   * field has been deprecated and replaced by the name field.
   * @param UpdateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($projectId, $zone, $clusterId, UpdateClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsZonesClusters::class, 'Google_Service_Container_Resource_ProjectsZonesClusters');
