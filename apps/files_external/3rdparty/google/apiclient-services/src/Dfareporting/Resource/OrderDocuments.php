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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\OrderDocument;
use Google\Service\Dfareporting\OrderDocumentsListResponse;

/**
 * The "orderDocuments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $orderDocuments = $dfareportingService->orderDocuments;
 *  </code>
 */
class OrderDocuments extends \Google\Service\Resource
{
  /**
   * Gets one order document by ID. (orderDocuments.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for order documents.
   * @param string $id Order document ID.
   * @param array $optParams Optional parameters.
   * @return OrderDocument
   */
  public function get($profileId, $projectId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'projectId' => $projectId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], OrderDocument::class);
  }
  /**
   * Retrieves a list of order documents, possibly filtered. This method supports
   * paging. (orderDocuments.listOrderDocuments)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for order documents.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool approved Select only order documents that have been approved
   * by at least one user.
   * @opt_param string ids Select only order documents with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderId Select only order documents for specified orders.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for order documents by name
   * or ID. Wildcards (*) are allowed. For example, "orderdocument*2015" will
   * return order documents with names like "orderdocument June 2015",
   * "orderdocument April 2015", or simply "orderdocument 2015". Most of the
   * searches also add wildcards implicitly at the start and the end of the search
   * string. For example, a search string of "orderdocument" will match order
   * documents with name "my orderdocument", "orderdocument 2015", or simply
   * "orderdocument".
   * @opt_param string siteId Select only order documents that are associated with
   * these sites.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return OrderDocumentsListResponse
   */
  public function listOrderDocuments($profileId, $projectId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], OrderDocumentsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderDocuments::class, 'Google_Service_Dfareporting_Resource_OrderDocuments');
