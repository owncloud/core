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

namespace Google\Service\DataTransfer\Resource;

use Google\Service\DataTransfer\DataTransfer;
use Google\Service\DataTransfer\DataTransfersListResponse;

/**
 * The "transfers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\DataTransfer(...);
 *   $transfers = $adminService->transfers;
 *  </code>
 */
class Transfers extends \Google\Service\Resource
{
  /**
   * Retrieves a data transfer request by its resource ID. (transfers.get)
   *
   * @param string $dataTransferId ID of the resource to be retrieved. This is
   * returned in the response from the insert method.
   * @param array $optParams Optional parameters.
   * @return DataTransfer
   */
  public function get($dataTransferId, $optParams = [])
  {
    $params = ['dataTransferId' => $dataTransferId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DataTransfer::class);
  }
  /**
   * Inserts a data transfer request. (transfers.insert)
   *
   * @param DataTransfer $postBody
   * @param array $optParams Optional parameters.
   * @return DataTransfer
   */
  public function insert(DataTransfer $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], DataTransfer::class);
  }
  /**
   * Lists the transfers for a customer by source user, destination user, or
   * status. (transfers.listTransfers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Immutable ID of the Google Workspace account.
   * @opt_param int maxResults Maximum number of results to return. Default is
   * 100.
   * @opt_param string newOwnerUserId Destination user's profile ID.
   * @opt_param string oldOwnerUserId Source user's profile ID.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @opt_param string status Status of the transfer.
   * @return DataTransfersListResponse
   */
  public function listTransfers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DataTransfersListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Transfers::class, 'Google_Service_DataTransfer_Resource_Transfers');
