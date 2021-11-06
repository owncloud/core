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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListNegativeKeywordListsResponse;
use Google\Service\DisplayVideo\NegativeKeywordList;

/**
 * The "negativeKeywordLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $negativeKeywordLists = $displayvideoService->negativeKeywordLists;
 *  </code>
 */
class AdvertisersNegativeKeywordLists extends \Google\Service\Resource
{
  /**
   * Creates a new negative keyword list. Returns the newly created negative
   * keyword list if successful. (negativeKeywordLists.create)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the negative keyword list will belong.
   * @param NegativeKeywordList $postBody
   * @param array $optParams Optional parameters.
   * @return NegativeKeywordList
   */
  public function create($advertiserId, NegativeKeywordList $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], NegativeKeywordList::class);
  }
  /**
   * Deletes a negative keyword list given an advertiser ID and a negative keyword
   * list ID. (negativeKeywordLists.delete)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the negative keyword
   * list to delete.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($advertiserId, $negativeKeywordListId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Gets a negative keyword list given an advertiser ID and a negative keyword
   * list ID. (negativeKeywordLists.get)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the fetched negative keyword list belongs.
   * @param string $negativeKeywordListId Required. The ID of the negative keyword
   * list to fetch.
   * @param array $optParams Optional parameters.
   * @return NegativeKeywordList
   */
  public function get($advertiserId, $negativeKeywordListId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], NegativeKeywordList::class);
  }
  /**
   * Lists negative keyword lists based on a given advertiser id.
   * (negativeKeywordLists.listAdvertisersNegativeKeywordLists)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the fetched negative keyword lists belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * Defaults to `100` if not set. Returns error code `INVALID_ARGUMENT` if an
   * invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListNegativeKeywordLists` method. If not specified, the
   * first page of results will be returned.
   * @return ListNegativeKeywordListsResponse
   */
  public function listAdvertisersNegativeKeywordLists($advertiserId, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListNegativeKeywordListsResponse::class);
  }
  /**
   * Updates a negative keyword list. Returns the updated negative keyword list if
   * successful. (negativeKeywordLists.patch)
   *
   * @param string $advertiserId Required. The ID of the DV360 advertiser to which
   * the negative keyword list belongs.
   * @param string $negativeKeywordListId Output only. The unique ID of the
   * negative keyword list. Assigned by the system.
   * @param NegativeKeywordList $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return NegativeKeywordList
   */
  public function patch($advertiserId, $negativeKeywordListId, NegativeKeywordList $postBody, $optParams = [])
  {
    $params = ['advertiserId' => $advertiserId, 'negativeKeywordListId' => $negativeKeywordListId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], NegativeKeywordList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdvertisersNegativeKeywordLists::class, 'Google_Service_DisplayVideo_Resource_AdvertisersNegativeKeywordLists');
