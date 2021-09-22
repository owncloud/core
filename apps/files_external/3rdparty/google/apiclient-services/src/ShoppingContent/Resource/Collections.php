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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\Collection;
use Google\Service\ShoppingContent\ListCollectionsResponse;

/**
 * The "collections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $collections = $contentService->collections;
 *  </code>
 */
class Collections extends \Google\Service\Resource
{
  /**
   * Uploads a collection to your Merchant Center account. If a collection with
   * the same collectionId already exists, this method updates that entry. In each
   * update, the collection is completely replaced by the fields in the body of
   * the update request. (collections.create)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection. This account cannot be a multi-client account.
   * @param Collection $postBody
   * @param array $optParams Optional parameters.
   * @return Collection
   */
  public function create($merchantId, Collection $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Collection::class);
  }
  /**
   * Deletes a collection from your Merchant Center account. (collections.delete)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection. This account cannot be a multi-client account.
   * @param string $collectionId Required. The collectionId of the collection.
   * CollectionId is the same as the REST ID of the collection.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $collectionId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'collectionId' => $collectionId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a collection from your Merchant Center account. (collections.get)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection. This account cannot be a multi-client account.
   * @param string $collectionId Required. The REST ID of the collection.
   * @param array $optParams Optional parameters.
   * @return Collection
   */
  public function get($merchantId, $collectionId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'collectionId' => $collectionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Collection::class);
  }
  /**
   * Lists the collections in your Merchant Center account. The response might
   * contain fewer items than specified by page_size. Rely on next_page_token to
   * determine if there are more items to be requested.
   * (collections.listCollections)
   *
   * @param string $merchantId Required. The ID of the account that contains the
   * collection. This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of collections to return in the
   * response, used for paging. Defaults to 50; values above 1000 will be coerced
   * to 1000.
   * @opt_param string pageToken Token (if provided) to retrieve the subsequent
   * page. All other parameters must match the original call that provided the
   * page token.
   * @return ListCollectionsResponse
   */
  public function listCollections($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCollectionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Collections::class, 'Google_Service_ShoppingContent_Resource_Collections');
