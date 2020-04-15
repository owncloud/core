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
 * The "replicas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $replicas = $replicapoolService->replicas;
 *  </code>
 */
class Google_Service_Replicapool_Resource_Replicas extends Google_Service_Resource
{
  /**
   * Deletes a replica from the pool. (replicas.delete)
   *
   * @param string $projectName The project ID for this request.
   * @param string $zone The zone where the replica lives.
   * @param string $poolName The replica pool name for this request.
   * @param string $replicaName The name of the replica for this request.
   * @param Google_Service_Replicapool_ReplicasDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function delete($projectName, $zone, $poolName, $replicaName, Google_Service_Replicapool_ReplicasDeleteRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Replicapool_Replica");
  }
  /**
   * Gets information about a specific replica. (replicas.get)
   *
   * @param string $projectName The project ID for this request.
   * @param string $zone The zone where the replica lives.
   * @param string $poolName The replica pool name for this request.
   * @param string $replicaName The name of the replica for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function get($projectName, $zone, $poolName, $replicaName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapool_Replica");
  }
  /**
   * Lists all replicas in a pool. (replicas.listReplicas)
   *
   * @param string $projectName The project ID for this request.
   * @param string $zone The zone where the replica pool lives.
   * @param string $poolName The replica pool name for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 100, inclusive. (Default: 50)
   * @opt_param string pageToken Set this to the nextPageToken value returned by a
   * previous list request to obtain the next page of results from the previous
   * list request.
   * @return Google_Service_Replicapool_ReplicasListResponse
   */
  public function listReplicas($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapool_ReplicasListResponse");
  }
  /**
   * Restarts a replica in a pool. (replicas.restart)
   *
   * @param string $projectName The project ID for this request.
   * @param string $zone The zone where the replica lives.
   * @param string $poolName The replica pool name for this request.
   * @param string $replicaName The name of the replica for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Replica
   */
  public function restart($projectName, $zone, $poolName, $replicaName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'replicaName' => $replicaName);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "Google_Service_Replicapool_Replica");
  }
}
