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

namespace Google\Service\Dataproc\Resource;

use Google\Service\Dataproc\Cluster;
use Google\Service\Dataproc\DiagnoseClusterRequest;
use Google\Service\Dataproc\GetIamPolicyRequest;
use Google\Service\Dataproc\InjectCredentialsRequest;
use Google\Service\Dataproc\ListClustersResponse;
use Google\Service\Dataproc\Operation;
use Google\Service\Dataproc\Policy;
use Google\Service\Dataproc\RepairClusterRequest;
use Google\Service\Dataproc\SetIamPolicyRequest;
use Google\Service\Dataproc\StartClusterRequest;
use Google\Service\Dataproc\StopClusterRequest;
use Google\Service\Dataproc\TestIamPermissionsRequest;
use Google\Service\Dataproc\TestIamPermissionsResponse;

/**
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google\Service\Dataproc(...);
 *   $clusters = $dataprocService->clusters;
 *  </code>
 */
class ProjectsRegionsClusters extends \Google\Service\Resource
{
  /**
   * Creates a cluster in a project. The returned Operation.metadata will be
   * ClusterOperationMetadata (https://cloud.google.com/dataproc/docs/reference/rp
   * c/google.cloud.dataproc.v1#clusteroperationmetadata). (clusters.create)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param Cluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string actionOnFailedPrimaryWorkers Optional. Failure action when
   * primary worker creation fails.
   * @opt_param string requestId Optional. A unique ID used to identify the
   * request. If the server receives two CreateClusterRequest (https://cloud.googl
   * e.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.datap
   * roc.v1.CreateClusterRequest)s with the same id, then the second request will
   * be ignored and the first google.longrunning.Operation created and stored in
   * the backend is returned.It is recommended to always set this value to a UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier).The ID must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function create($projectId, $region, Cluster $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a cluster in a project. The returned Operation.metadata will be
   * ClusterOperationMetadata (https://cloud.google.com/dataproc/docs/reference/rp
   * c/google.cloud.dataproc.v1#clusteroperationmetadata). (clusters.delete)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterUuid Optional. Specifying the cluster_uuid means the
   * RPC should fail (with error NOT_FOUND) if cluster with specified UUID does
   * not exist.
   * @opt_param string requestId Optional. A unique ID used to identify the
   * request. If the server receives two DeleteClusterRequest (https://cloud.googl
   * e.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.datap
   * roc.v1.DeleteClusterRequest)s with the same id, then the second request will
   * be ignored and the first google.longrunning.Operation created and stored in
   * the backend is returned.It is recommended to always set this value to a UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier).The ID must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function delete($projectId, $region, $clusterName, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets cluster diagnostic information. The returned Operation.metadata will be
   * ClusterOperationMetadata (https://cloud.google.com/dataproc/docs/reference/rp
   * c/google.cloud.dataproc.v1#clusteroperationmetadata). After the operation
   * completes, Operation.response contains DiagnoseClusterResults (https://cloud.
   * google.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#diagnoseclust
   * erresults). (clusters.diagnose)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param DiagnoseClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function diagnose($projectId, $region, $clusterName, DiagnoseClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('diagnose', [$params], Operation::class);
  }
  /**
   * Gets the resource representation for a cluster in a project. (clusters.get)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param array $optParams Optional parameters.
   * @return Cluster
   */
  public function get($projectId, $region, $clusterName, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Cluster::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (clusters.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Inject encrypted credentials into all of the VMs in a cluster.The target
   * cluster must be a personal auth cluster assigned to the user who is issuing
   * the RPC. (clusters.injectCredentials)
   *
   * @param string $project Required. The ID of the Google Cloud Platform project
   * the cluster belongs to, of the form projects/.
   * @param string $region Required. The region containing the cluster, of the
   * form regions/.
   * @param string $cluster Required. The cluster, in the form clusters/.
   * @param InjectCredentialsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function injectCredentials($project, $region, $cluster, InjectCredentialsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'cluster' => $cluster, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('injectCredentials', [$params], Operation::class);
  }
  /**
   * Lists all regions/{region}/clusters in a project alphabetically.
   * (clusters.listProjectsRegionsClusters)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the clusters to
   * list. Filters are case-sensitive and have the following syntax:field = value
   * AND field = value ...where field is one of status.state, clusterName, or
   * labels.[KEY], and [KEY] is a label key. value can be * to match all values.
   * status.state can be one of the following: ACTIVE, INACTIVE, CREATING,
   * RUNNING, ERROR, DELETING, or UPDATING. ACTIVE contains the CREATING,
   * UPDATING, and RUNNING states. INACTIVE contains the DELETING and ERROR
   * states. clusterName is the name of the cluster provided at creation time.
   * Only the logical AND operator is supported; space-separated items are treated
   * as having an implicit AND operator.Example filter:status.state = ACTIVE AND
   * clusterName = mycluster AND labels.env = staging AND labels.starred = *
   * @opt_param int pageSize Optional. The standard List page size.
   * @opt_param string pageToken Optional. The standard List page token.
   * @return ListClustersResponse
   */
  public function listProjectsRegionsClusters($projectId, $region, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListClustersResponse::class);
  }
  /**
   * Updates a cluster in a project. The returned Operation.metadata will be
   * ClusterOperationMetadata (https://cloud.google.com/dataproc/docs/reference/rp
   * c/google.cloud.dataproc.v1#clusteroperationmetadata). The cluster must be in
   * a RUNNING state or an error is returned. (clusters.patch)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param Cluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string gracefulDecommissionTimeout Optional. Timeout for graceful
   * YARN decomissioning. Graceful decommissioning allows removing nodes from the
   * cluster without interrupting jobs in progress. Timeout specifies how long to
   * wait for jobs in progress to finish before forcefully removing nodes (and
   * potentially interrupting jobs). Default timeout is 0 (for forceful
   * decommission), and the maximum allowed timeout is 1 day. (see JSON
   * representation of Duration (https://developers.google.com/protocol-
   * buffers/docs/proto3#json)).Only supported on Dataproc image versions 1.2 and
   * higher.
   * @opt_param string requestId Optional. A unique ID used to identify the
   * request. If the server receives two UpdateClusterRequest (https://cloud.googl
   * e.com/dataproc/docs/reference/rpc/google.cloud.dataproc.v1#google.cloud.datap
   * roc.v1.UpdateClusterRequest)s with the same id, then the second request will
   * be ignored and the first google.longrunning.Operation created and stored in
   * the backend is returned.It is recommended to always set this value to a UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier).The ID must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @opt_param string updateMask Required. Specifies the path, relative to
   * Cluster, of the field to update. For example, to change the number of workers
   * in a cluster to 5, the update_mask parameter would be specified as
   * config.worker_config.num_instances, and the PATCH request body would specify
   * the new value, as follows: { "config":{ "workerConfig":{ "numInstances":"5" }
   * } } Similarly, to change the number of preemptible workers in a cluster to 5,
   * the update_mask parameter would be
   * config.secondary_worker_config.num_instances, and the PATCH request body
   * would be set as follows: { "config":{ "secondaryWorkerConfig":{
   * "numInstances":"5" } } } *Note:* Currently, only the following fields can be
   * updated: *Mask* *Purpose* *labels* Update labels
   * *config.worker_config.num_instances* Resize primary worker group
   * *config.secondary_worker_config.num_instances* Resize secondary worker group
   * config.autoscaling_config.policy_uri Use, stop using, or change autoscaling
   * policies
   * @return Operation
   */
  public function patch($projectId, $region, $clusterName, Cluster $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Repairs a cluster. (clusters.repair)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param RepairClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function repair($projectId, $region, $clusterName, RepairClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('repair', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (clusters.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Starts a cluster in a project. (clusters.start)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param StartClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function start($projectId, $region, $clusterName, StartClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('start', [$params], Operation::class);
  }
  /**
   * Stops a cluster in a project. (clusters.stop)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $clusterName Required. The cluster name.
   * @param StopClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function stop($projectId, $region, $clusterName, StopClusterRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stop', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (clusters.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRegionsClusters::class, 'Google_Service_Dataproc_Resource_ProjectsRegionsClusters');
