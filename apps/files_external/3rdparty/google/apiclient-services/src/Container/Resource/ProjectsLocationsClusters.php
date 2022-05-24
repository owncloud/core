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
use Google\Service\Container\GetJSONWebKeysResponse;
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
class ProjectsLocationsClusters extends \Google\Service\Resource
{
  /**
   * Completes master IP rotation. (clusters.completeIpRotation)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to complete IP rotation. Specified in the format
   * `projects/locations/clusters`.
   * @param CompleteIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function completeIpRotation($name, CompleteIPRotationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
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
   * @param string $parent The parent (project and location) where the cluster
   * will be created. Specified in the format `projects/locations`.
   * @param CreateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, CreateClusterRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
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
   * @param string $name The name (project, location, cluster) of the cluster to
   * delete. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterId Deprecated. The name of the cluster to delete.
   * This field has been deprecated and replaced by the name field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
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
   * Gets the details of a specific cluster. (clusters.get)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * retrieve. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterId Deprecated. The name of the cluster to retrieve.
   * This field has been deprecated and replaced by the name field.
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @return Cluster
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Cluster::class);
  }
  /**
   * Gets the public component of the cluster signing keys in JSON Web Key format.
   * This API is not yet intended for general use, and is not available for all
   * clusters. (clusters.getJwks)
   *
   * @param string $parent The cluster (project, location, cluster name) to get
   * keys for. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   * @return GetJSONWebKeysResponse
   */
  public function getJwks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('getJwks', [$params], GetJSONWebKeysResponse::class);
  }
  /**
   * Lists all clusters owned by a project in either the specified zone or all
   * zones. (clusters.listProjectsLocationsClusters)
   *
   * @param string $parent The parent (project and location) where the clusters
   * will be listed. Specified in the format `projects/locations`. Location "-"
   * matches all zones and all regions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project number](https://cloud.google.com/resource-manager/docs
   * /creating-managing-projects). This field has been deprecated and replaced by
   * the parent field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides, or "-" for all zones. This field has been deprecated and
   * replaced by the parent field.
   * @return ListClustersResponse
   */
  public function listProjectsLocationsClusters($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClustersResponse::class);
  }
  /**
   * Sets the addons for a specific cluster. (clusters.setAddons)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set addons. Specified in the format `projects/locations/clusters`.
   * @param SetAddonsConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setAddons($name, SetAddonsConfigRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAddons', [$params], Operation::class);
  }
  /**
   * Enables or disables the ABAC authorization mechanism on a cluster.
   * (clusters.setLegacyAbac)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to set legacy abac. Specified in the format `projects/locations/clusters`.
   * @param SetLegacyAbacRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLegacyAbac($name, SetLegacyAbacRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLegacyAbac', [$params], Operation::class);
  }
  /**
   * Sets the locations for a specific cluster. Deprecated. Use
   * [projects.locations.clusters.update](https://cloud.google.com/kubernetes-
   * engine/docs/reference/rest/v1/projects.locations.clusters/update) instead.
   * (clusters.setLocations)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set locations. Specified in the format `projects/locations/clusters`.
   * @param SetLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLocations($name, SetLocationsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLocations', [$params], Operation::class);
  }
  /**
   * Sets the logging service for a specific cluster. (clusters.setLogging)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set logging. Specified in the format `projects/locations/clusters`.
   * @param SetLoggingServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLogging($name, SetLoggingServiceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLogging', [$params], Operation::class);
  }
  /**
   * Sets the maintenance policy for a cluster. (clusters.setMaintenancePolicy)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to set maintenance policy. Specified in the format
   * `projects/locations/clusters`.
   * @param SetMaintenancePolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMaintenancePolicy($name, SetMaintenancePolicyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMaintenancePolicy', [$params], Operation::class);
  }
  /**
   * Sets master auth materials. Currently supports changing the admin password or
   * a specific cluster, either via password generation or explicitly setting the
   * password. (clusters.setMasterAuth)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set auth. Specified in the format `projects/locations/clusters`.
   * @param SetMasterAuthRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMasterAuth($name, SetMasterAuthRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMasterAuth', [$params], Operation::class);
  }
  /**
   * Sets the monitoring service for a specific cluster. (clusters.setMonitoring)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set monitoring. Specified in the format `projects/locations/clusters`.
   * @param SetMonitoringServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setMonitoring($name, SetMonitoringServiceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setMonitoring', [$params], Operation::class);
  }
  /**
   * Enables or disables Network Policy for a cluster. (clusters.setNetworkPolicy)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to set networking policy. Specified in the format
   * `projects/locations/clusters`.
   * @param SetNetworkPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setNetworkPolicy($name, SetNetworkPolicyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setNetworkPolicy', [$params], Operation::class);
  }
  /**
   * Sets labels on a cluster. (clusters.setResourceLabels)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to set labels. Specified in the format `projects/locations/clusters`.
   * @param SetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setResourceLabels($name, SetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setResourceLabels', [$params], Operation::class);
  }
  /**
   * Starts master IP rotation. (clusters.startIpRotation)
   *
   * @param string $name The name (project, location, cluster name) of the cluster
   * to start IP rotation. Specified in the format `projects/locations/clusters`.
   * @param StartIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function startIpRotation($name, StartIPRotationRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startIpRotation', [$params], Operation::class);
  }
  /**
   * Updates the settings of a specific cluster. (clusters.update)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * update. Specified in the format `projects/locations/clusters`.
   * @param UpdateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function update($name, UpdateClusterRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Operation::class);
  }
  /**
   * Updates the master for a specific cluster. (clusters.updateMaster)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * update. Specified in the format `projects/locations/clusters`.
   * @param UpdateMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function updateMaster($name, UpdateMasterRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateMaster', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsClusters::class, 'Google_Service_Container_Resource_ProjectsLocationsClusters');
