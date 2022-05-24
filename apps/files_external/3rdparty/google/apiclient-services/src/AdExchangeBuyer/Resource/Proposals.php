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

use Google\Service\AdExchangeBuyer\CreateOrdersRequest;
use Google\Service\AdExchangeBuyer\CreateOrdersResponse;
use Google\Service\AdExchangeBuyer\GetOrdersResponse;
use Google\Service\AdExchangeBuyer\Proposal;

/**
 * The "proposals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google\Service\AdExchangeBuyer(...);
 *   $proposals = $adexchangebuyerService->proposals;
 *  </code>
 */
class Proposals extends \Google\Service\Resource
{
  /**
   * Get a proposal given its id (proposals.get)
   *
   * @param string $proposalId Id of the proposal to retrieve.
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function get($proposalId, $optParams = [])
  {
    $params = ['proposalId' => $proposalId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Proposal::class);
  }
  /**
   * Create the given list of proposals (proposals.insert)
   *
   * @param CreateOrdersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CreateOrdersResponse
   */
  public function insert(CreateOrdersRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CreateOrdersResponse::class);
  }
  /**
   * Update the given proposal. This method supports patch semantics.
   * (proposals.patch)
   *
   * @param string $proposalId The proposal id to update.
   * @param string $revisionNumber The last known revision number to update. If
   * the head revision in the marketplace database has since changed, an error
   * will be thrown. The caller should then fetch the latest proposal at head
   * revision and retry the update at that revision.
   * @param string $updateAction The proposed action to take on the proposal. This
   * field is required and it must be set when updating a proposal.
   * @param Proposal $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function patch($proposalId, $revisionNumber, $updateAction, Proposal $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'revisionNumber' => $revisionNumber, 'updateAction' => $updateAction, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Proposal::class);
  }
  /**
   * Search for proposals using pql query (proposals.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pqlQuery Query string to retrieve specific proposals.
   * @return GetOrdersResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GetOrdersResponse::class);
  }
  /**
   * Update the given proposal to indicate that setup has been completed.
   * (proposals.setupcomplete)
   *
   * @param string $proposalId The proposal id for which the setup is complete
   * @param array $optParams Optional parameters.
   */
  public function setupcomplete($proposalId, $optParams = [])
  {
    $params = ['proposalId' => $proposalId];
    $params = array_merge($params, $optParams);
    return $this->call('setupcomplete', [$params]);
  }
  /**
   * Update the given proposal (proposals.update)
   *
   * @param string $proposalId The proposal id to update.
   * @param string $revisionNumber The last known revision number to update. If
   * the head revision in the marketplace database has since changed, an error
   * will be thrown. The caller should then fetch the latest proposal at head
   * revision and retry the update at that revision.
   * @param string $updateAction The proposed action to take on the proposal. This
   * field is required and it must be set when updating a proposal.
   * @param Proposal $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function update($proposalId, $revisionNumber, $updateAction, Proposal $postBody, $optParams = [])
  {
    $params = ['proposalId' => $proposalId, 'revisionNumber' => $revisionNumber, 'updateAction' => $updateAction, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Proposal::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Proposals::class, 'Google_Service_AdExchangeBuyer_Resource_Proposals');
