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

namespace Google\Service\AdExchangeBuyer\Resource;

use Google\Service\AdExchangeBuyer\AddOrderDealsRequest;
use Google\Service\AdExchangeBuyer\AddOrderDealsResponse;
use Google\Service\AdExchangeBuyer\DeleteOrderDealsRequest;
use Google\Service\AdExchangeBuyer\DeleteOrderDealsResponse;
use Google\Service\AdExchangeBuyer\EditAllOrderDealsRequest;
use Google\Service\AdExchangeBuyer\EditAllOrderDealsResponse;
use Google\Service\AdExchangeBuyer\GetOrderDealsResponse;

/**
 * The "marketplacedeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $marketplacedeals = $adexchangebuyerService->marketplacedeals;
 *  </code>
 */
class Marketplacedeals extends \Google\Service\Resource
{
  /**
   * Delete the specified deals from the proposal (marketplacedeals.delete)
   *
   * @param string $proposalId The proposalId to delete deals from.
   * @param DeleteOrderDealsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DeleteOrderDealsResponse
   */
  public function delete($proposalId, DeleteOrderDealsRequest $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DeleteOrderDealsResponse::class);
  }
  /**
   * Add new deals for the specified proposal (marketplacedeals.insert)
   *
   * @param string $proposalId proposalId for which deals need to be added.
   * @param AddOrderDealsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AddOrderDealsResponse
   */
  public function insert($proposalId, AddOrderDealsRequest $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AddOrderDealsResponse::class);
  }
  /**
   * List all the deals for a given proposal
   * (marketplacedeals.listMarketplacedeals)
   *
   * @param string $proposalId The proposalId to get deals for. To search across
   * all proposals specify order_id = '-' as part of the URL.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pqlQuery Query string to retrieve specific deals.
   * @return GetOrderDealsResponse
   */
  public function listMarketplacedeals($proposalId, $optParams = [])
  {
    $params = ['proposalId' => $proposalId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GetOrderDealsResponse::class);
  }
  /**
   * Replaces all the deals in the proposal with the passed in deals
   * (marketplacedeals.update)
   *
   * @param string $proposalId The proposalId to edit deals on.
   * @param EditAllOrderDealsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return EditAllOrderDealsResponse
   */
  public function update($proposalId, EditAllOrderDealsRequest $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], EditAllOrderDealsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Marketplacedeals::class, 'Google_Service_AdExchangeBuyer_Resource_Marketplacedeals');
