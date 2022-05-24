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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\StoreCluster;
use Google\Service\AndroidEnterprise\StoreLayoutClustersListResponse;

/**
 * The "storelayoutclusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $storelayoutclusters = $androidenterpriseService->storelayoutclusters;
 *  </code>
 */
class Storelayoutclusters extends \Google\Service\Resource
{
  /**
   * Deletes a cluster. (storelayoutclusters.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $pageId, $clusterId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves details of a cluster. (storelayoutclusters.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param array $optParams Optional parameters.
   * @return StoreCluster
   */
  public function get($enterpriseId, $pageId, $clusterId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], StoreCluster::class);
  }
  /**
   * Inserts a new cluster in a page. (storelayoutclusters.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param StoreCluster $postBody
   * @param array $optParams Optional parameters.
   * @return StoreCluster
   */
  public function insert($enterpriseId, $pageId, StoreCluster $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], StoreCluster::class);
  }
  /**
   * Retrieves the details of all clusters on the specified page.
   * (storelayoutclusters.listStorelayoutclusters)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   * @return StoreLayoutClustersListResponse
   */
  public function listStorelayoutclusters($enterpriseId, $pageId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], StoreLayoutClustersListResponse::class);
  }
  /**
   * Updates a cluster. (storelayoutclusters.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param StoreCluster $postBody
   * @param array $optParams Optional parameters.
   * @return StoreCluster
   */
  public function update($enterpriseId, $pageId, $clusterId, StoreCluster $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], StoreCluster::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Storelayoutclusters::class, 'Google_Service_AndroidEnterprise_Resource_Storelayoutclusters');
