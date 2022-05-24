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

use Google\Service\AdExchangeBuyer\AddOrderNotesRequest;
use Google\Service\AdExchangeBuyer\AddOrderNotesResponse;
use Google\Service\AdExchangeBuyer\GetOrderNotesResponse;

/**
 * The "marketplacenotes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $marketplacenotes = $adexchangebuyerService->marketplacenotes;
 *  </code>
 */
class Marketplacenotes extends \Google\Service\Resource
{
  /**
   * Add notes to the proposal (marketplacenotes.insert)
   *
   * @param string $proposalId The proposalId to add notes for.
   * @param AddOrderNotesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AddOrderNotesResponse
   */
  public function insert($proposalId, AddOrderNotesRequest $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AddOrderNotesResponse::class);
  }
  /**
   * Get all the notes associated with a proposal
   * (marketplacenotes.listMarketplacenotes)
   *
   * @param string $proposalId The proposalId to get notes for. To search across
   * all proposals specify order_id = '-' as part of the URL.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pqlQuery Query string to retrieve specific notes. To search
   * the text contents of notes, please use syntax like "WHERE note.note = "foo"
   * or "WHERE note.note LIKE "%bar%"
   * @return GetOrderNotesResponse
   */
  public function listMarketplacenotes($proposalId, $optParams = [])
  {
    $params = ['proposalId' => $proposalId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GetOrderNotesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Marketplacenotes::class, 'Google_Service_AdExchangeBuyer_Resource_Marketplacenotes');
