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

use Google\Service\AndroidEnterprise\StoreLayoutPagesListResponse;
use Google\Service\AndroidEnterprise\StorePage;

/**
 * The "storelayoutpages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $storelayoutpages = $androidenterpriseService->storelayoutpages;
 *  </code>
 */
class Storelayoutpages extends \Google\Service\Resource
{
  /**
   * Deletes a store page. (storelayoutpages.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $pageId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves details of a store page. (storelayoutpages.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   * @return StorePage
   */
  public function get($enterpriseId, $pageId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], StorePage::class);
  }
  /**
   * Inserts a new store page. (storelayoutpages.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param StorePage $postBody
   * @param array $optParams Optional parameters.
   * @return StorePage
   */
  public function insert($enterpriseId, StorePage $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], StorePage::class);
  }
  /**
   * Retrieves the details of all pages in the store.
   * (storelayoutpages.listStorelayoutpages)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return StoreLayoutPagesListResponse
   */
  public function listStorelayoutpages($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], StoreLayoutPagesListResponse::class);
  }
  /**
   * Updates the content of a store page. (storelayoutpages.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param StorePage $postBody
   * @param array $optParams Optional parameters.
   * @return StorePage
   */
  public function update($enterpriseId, $pageId, StorePage $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], StorePage::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Storelayoutpages::class, 'Google_Service_AndroidEnterprise_Resource_Storelayoutpages');
