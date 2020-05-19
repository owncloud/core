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
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsLocationsClusters extends Google_Service_Resource
{
  /**
   * Completes master IP rotation. (clusters.completeIpRotation)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to complete IP rotation. Specified in the format
   * `projects/locations/clusters`.
   * @param Google_Service_Container_CompleteIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function completeIpRotation($name, Google_Service_Container_CompleteIPRotationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('completeIpRotation', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Creates a cluster, consisting of the specified number and type of Google
   * Compute Engine instances.
   *
   * By default, the cluster is created in the project's [default
   * network](https://cloud.google.com/compute/docs/networks-and-
   * firewalls#networks).
   *
   * One firewall is added for the cluster. After cluster creation, the Kubelet
   * creates routes for each node to allow the containers on that node to
   * communicate with all other instances in the cluster.
   *
   * Finally, an entry is added to the project's global metadata indicating which
   * CIDR range the cluster is using. (clusters.create)
   *
   * @param string $parent The parent (project and location) where the cluster
   * will be created. Specified in the format `projects/locations`.
   * @param Google_Service_Container_CreateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($parent, Google_Service_Container_CreateClusterRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Deletes the cluster, including the Kubernetes endpoint and all worker nodes.
   *
   * Firewalls and routes that were configured during cluster creation are also
   * deleted.
   *
   * Other Google Compute Engine resources that might be in use by the cluster,
   * such as load balancer resources, are not deleted if they weren't present when
   * the cluster was initially created. (clusters.delete)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * delete. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @opt_param string clusterId Deprecated. The name of the cluster to delete.
   * This field has been deprecated and replaced by the name field.
   * @return Google_Service_Container_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Gets the details of a specific cluster. (clusters.get)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * retrieve. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Deprecated. The Google Developers Console
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the name field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides. This field has been deprecated and replaced by the name
   * field.
   * @opt_param string clusterId Deprecated. The name of the cluster to retrieve.
   * This field has been deprecated and replaced by the name field.
   * @return Google_Service_Container_Cluster
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Cluster");
  }
  /**
   * Gets the public component of the cluster signing keys in JSON Web Key format.
   * This API is not yet intended for general use, and is not available for all
   * clusters. (clusters.getJwks)
   *
   * @param string $parent The cluster (project, location, cluster id) to get keys
   * for. Specified in the format `projects/locations/clusters`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_GetJSONWebKeysResponse
   */
  public function getJwks($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getJwks', array($params), "Google_Service_Container_GetJSONWebKeysResponse");
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
   * [project ID or project
   * number](https://support.google.com/cloud/answer/6158840). This field has been
   * deprecated and replaced by the parent field.
   * @opt_param string zone Deprecated. The name of the Google Compute Engine
   * [zone](https://cloud.google.com/compute/docs/zones#available) in which the
   * cluster resides, or "-" for all zones. This field has been deprecated and
   * replaced by the parent field.
   * @return Google_Service_Container_ListClustersResponse
   */
  public function listProjectsLocationsClusters($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListClustersResponse");
  }
  /**
   * Sets the addons for a specific cluster. (clusters.setAddons)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set addons. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetAddonsConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setAddons($name, Google_Service_Container_SetAddonsConfigRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setAddons', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Enables or disables the ABAC authorization mechanism on a cluster.
   * (clusters.setLegacyAbac)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to set legacy abac. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetLegacyAbacRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setLegacyAbac($name, Google_Service_Container_SetLegacyAbacRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setLegacyAbac', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the locations for a specific cluster. Deprecated. Use
   * [projects.locations.clusters.update](https://cloud.google.com/kubernetes-
   * engine/docs/reference/rest/v1/projects.locations.clusters/update) instead.
   * (clusters.setLocations)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set locations. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setLocations($name, Google_Service_Container_SetLocationsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setLocations', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the logging service for a specific cluster. (clusters.setLogging)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set logging. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetLoggingServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setLogging($name, Google_Service_Container_SetLoggingServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setLogging', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the maintenance policy for a cluster. (clusters.setMaintenancePolicy)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to set maintenance policy. Specified in the format
   * `projects/locations/clusters`.
   * @param Google_Service_Container_SetMaintenancePolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setMaintenancePolicy($name, Google_Service_Container_SetMaintenancePolicyRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMaintenancePolicy', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets master auth materials. Currently supports changing the admin password or
   * a specific cluster, either via password generation or explicitly setting the
   * password. (clusters.setMasterAuth)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set auth. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetMasterAuthRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setMasterAuth($name, Google_Service_Container_SetMasterAuthRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMasterAuth', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the monitoring service for a specific cluster. (clusters.setMonitoring)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * set monitoring. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetMonitoringServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setMonitoring($name, Google_Service_Container_SetMonitoringServiceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMonitoring', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Enables or disables Network Policy for a cluster. (clusters.setNetworkPolicy)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to set networking policy. Specified in the format
   * `projects/locations/clusters`.
   * @param Google_Service_Container_SetNetworkPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setNetworkPolicy($name, Google_Service_Container_SetNetworkPolicyRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setNetworkPolicy', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets labels on a cluster. (clusters.setResourceLabels)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to set labels. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_SetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setResourceLabels($name, Google_Service_Container_SetLabelsRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setResourceLabels', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Starts master IP rotation. (clusters.startIpRotation)
   *
   * @param string $name The name (project, location, cluster id) of the cluster
   * to start IP rotation. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_StartIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function startIpRotation($name, Google_Service_Container_StartIPRotationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startIpRotation', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the settings of a specific cluster. (clusters.update)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * update. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_UpdateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function update($name, Google_Service_Container_UpdateClusterRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the master for a specific cluster. (clusters.updateMaster)
   *
   * @param string $name The name (project, location, cluster) of the cluster to
   * update. Specified in the format `projects/locations/clusters`.
   * @param Google_Service_Container_UpdateMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function updateMaster($name, Google_Service_Container_UpdateMasterRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateMaster', array($params), "Google_Service_Container_Operation");
  }
}
