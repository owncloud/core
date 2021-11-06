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

use Google\Service\AdExchangeBuyer\UpdatePrivateAuctionProposalRequest;

/**
 * The "marketplaceprivateauction" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $marketplaceprivateauction = $adexchangebuyerService->marketplaceprivateauction;
 *  </code>
 */
class Marketplaceprivateauction extends \Google\Service\Resource
{
  /**
   * Update a given private auction proposal
   * (marketplaceprivateauction.updateproposal)
   *
   * @param string $privateAuctionId The private auction id to be updated.
   * @param UpdatePrivateAuctionProposalRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function updateproposal($privateAuctionId, UpdatePrivateAuctionProposalRequest $postBody, $optParams = [])
  {
    $params = ['privateAuctionId' => $privateAuctionId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateproposal', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Marketplaceprivateauction::class, 'Google_Service_AdExchangeBuyer_Resource_Marketplaceprivateauction');
