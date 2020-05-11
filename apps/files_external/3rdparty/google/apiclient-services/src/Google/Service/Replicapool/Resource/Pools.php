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
 * The "pools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $pools = $replicapoolService->pools;
 *  </code>
 */
class Google_Service_Replicapool_Resource_Pools extends Google_Service_Resource
{
  /**
   * Deletes a replica pool. (pools.delete)
   *
   * @param string $projectName The project ID for this replica pool.
   * @param string $zone The zone for this replica pool.
   * @param string $poolName The name of the replica pool for this request.
   * @param Google_Service_Replicapool_PoolsDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function delete($projectName, $zone, $poolName, Google_Service_Replicapool_PoolsDeleteRequest $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets information about a single replica pool. (pools.get)
   *
   * @param string $projectName The project ID for this replica pool.
   * @param string $zone The zone for this replica pool.
   * @param string $poolName The name of the replica pool for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Pool
   */
  public function get($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * Inserts a new replica pool. (pools.insert)
   *
   * @param string $projectName The project ID for this replica pool.
   * @param string $zone The zone for this replica pool.
   * @param Google_Service_Replicapool_Pool $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Pool
   */
  public function insert($projectName, $zone, Google_Service_Replicapool_Pool $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * List all replica pools. (pools.listPools)
   *
   * @param string $projectName The project ID for this request.
   * @param string $zone The zone for this replica pool.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 100, inclusive. (Default: 50)
   * @opt_param string pageToken Set this to the nextPageToken value returned by a
   * previous list request to obtain the next page of results from the previous
   * list request.
   * @return Google_Service_Replicapool_PoolsListResponse
   */
  public function listPools($projectName, $zone, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapool_PoolsListResponse");
  }
  /**
   * Resize a pool. This is an asynchronous operation, and multiple overlapping
   * resize requests can be made. Replica Pools will use the information from the
   * last resize request. (pools.resize)
   *
   * @param string $projectName The project ID for this replica pool.
   * @param string $zone The zone for this replica pool.
   * @param string $poolName The name of the replica pool for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int numReplicas The desired number of replicas to resize to. If
   * this number is larger than the existing number of replicas, new replicas will
   * be added. If the number is smaller, then existing replicas will be deleted.
   * @return Google_Service_Replicapool_Pool
   */
  public function resize($projectName, $zone, $poolName, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName);
    $params = array_merge($params, $optParams);
    return $this->call('resize', array($params), "Google_Service_Replicapool_Pool");
  }
  /**
   * Update the template used by the pool. (pools.updatetemplate)
   *
   * @param string $projectName The project ID for this replica pool.
   * @param string $zone The zone for this replica pool.
   * @param string $poolName The name of the replica pool for this request.
   * @param Google_Service_Replicapool_Template $postBody
   * @param array $optParams Optional parameters.
   */
  public function updatetemplate($projectName, $zone, $poolName, Google_Service_Replicapool_Template $postBody, $optParams = array())
  {
    $params = array('projectName' => $projectName, 'zone' => $zone, 'poolName' => $poolName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatetemplate', array($params));
  }
}
