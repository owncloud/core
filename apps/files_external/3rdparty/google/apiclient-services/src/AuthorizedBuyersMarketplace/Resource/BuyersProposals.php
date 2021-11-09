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

namespace Google\Service\AuthorizedBuyersMarketplace\Resource;

use Google\Service\AuthorizedBuyersMarketplace\AcceptProposalRequest;
use Google\Service\AuthorizedBuyersMarketplace\AddNoteRequest;
use Google\Service\AuthorizedBuyersMarketplace\CancelNegotiationRequest;
use Google\Service\AuthorizedBuyersMarketplace\ListProposalsResponse;
use Google\Service\AuthorizedBuyersMarketplace\Proposal;
use Google\Service\AuthorizedBuyersMarketplace\SendRfpRequest;

/**
 * The "proposals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $proposals = $authorizedbuyersmarketplaceService->proposals;
 *  </code>
 */
class BuyersProposals extends \Google\Service\Resource
{
  /**
   * Accepts the proposal at the given revision number. If the revision number in
   * the request is behind the latest from the server, an error message will be
   * returned. This call updates the Proposal.state from
   * `BUYER_ACCEPTANCE_REQUESTED` to `FINALIZED`; it has no side effect if the
   * Proposal.state is already `FINALIZED` and throws exception if the
   * Proposal.state is not either `BUYER_ACCEPTANCE_REQUESTED` or `FINALIZED`.
   * Accepting a proposal means the buyer understands and accepts the
   * Proposal.terms_and_conditions proposed by the seller. (proposals.accept)
   *
   * @param string $name Name of the proposal. Format:
   * `buyers/{accountId}/proposals/{proposalId}`
   * @param AcceptProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function accept($name, AcceptProposalRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('accept', [$params], Proposal::class);
  }
  /**
   * Creates a note for this proposal and sends to the seller. (proposals.addNote)
   *
   * @param string $proposal Name of the proposal. Format:
   * `buyers/{accountId}/proposals/{proposalId}`
   * @param AddNoteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function addNote($proposal, AddNoteRequest $postBody, $optParams = [])
  {
    $params = ['proposal' => $proposal, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addNote', [$params], Proposal::class);
  }
  /**
   * Cancels an ongoing negotiation on a proposal. This does not cancel or end
   * serving for the deals if the proposal has been finalized. If the proposal has
   * not been finalized before, calling this method will set the Proposal.state to
   * `TERMINATED` and increment the Proposal.proposal_revision. If the proposal
   * has been finalized before and is under renegotiation now, calling this method
   * will reset the Proposal.state to `FINALIZED` and increment the
   * Proposal.proposal_revision. This method does not support private auction
   * proposals whose Proposal.deal_type is 'PRIVATE_AUCTION'.
   * (proposals.cancelNegotiation)
   *
   * @param string $proposal Name of the proposal. Format:
   * `buyers/{accountId}/proposals/{proposalId}`
   * @param CancelNegotiationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function cancelNegotiation($proposal, CancelNegotiationRequest $postBody, $optParams = [])
  {
    $params = ['proposal' => $proposal, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancelNegotiation', [$params], Proposal::class);
  }
  /**
   * Gets a proposal using its name. The proposal is returned at most recent
   * revision. revision. (proposals.get)
   *
   * @param string $name Required. Name of the proposal. Format:
   * `buyers/{accountId}/proposals/{proposalId}`
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Proposal::class);
  }
  /**
   * Lists proposals. A filter expression (list filter syntax) may be specified to
   * filter the results. This will not list finalized versions of proposals that
   * are being renegotiated; to retrieve these use the finalizedProposals
   * resource. (proposals.listBuyersProposals)
   *
   * @param string $parent Required. Parent that owns the collection of proposals
   * Format: `buyers/{accountId}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional query string using the [Cloud API list
   * filtering syntax](https://developers.google.com/authorized-
   * buyers/apis/guides/v2/list-filters) Supported columns for filtering are: *
   * displayName * dealType * updateTime * state
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will put a size of 500.
   * @opt_param string pageToken The page token as returned from
   * ListProposalsResponse.
   * @return ListProposalsResponse
   */
  public function listBuyersProposals($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProposalsResponse::class);
  }
  /**
   * Updates the proposal at the given revision number. If the revision number in
   * the request is behind the latest from the server, an error message will be
   * returned. See FieldMask for how to use FieldMask. Only fields specified in
   * the UpdateProposalRequest.update_mask will be updated; Fields noted as
   * 'Immutable' or 'Output only' yet specified in the
   * UpdateProposalRequest.update_mask will be ignored and left unchanged.
   * Updating a private auction proposal is not allowed and will result in an
   * error. (proposals.patch)
   *
   * @param string $name Immutable. The name of the proposal serving as a unique
   * identifier. Format: buyers/{accountId}/proposals/{proposalId}
   * @param Proposal $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated. If empty or
   * unspecified, the service will update all fields populated in the update
   * request excluding the output only fields and primitive fields with default
   * value. Note that explicit field mask is required in order to reset a
   * primitive field back to its default value, e.g. false for boolean fields, 0
   * for integer fields. A special field mask consisting of a single path "*" can
   * be used to indicate full replacement(the equivalent of PUT method), updatable
   * fields unset or unspecified in the input will be cleared or set to default
   * value. Output only fields will be ignored regardless of the value of
   * updateMask.
   * @return Proposal
   */
  public function patch($name, Proposal $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Proposal::class);
  }
  /**
   * Sends a request for proposal (RFP) to a publisher to initiate the negotiation
   * regarding certain inventory. In the RFP, buyers can specify the deal type,
   * deal terms, start and end dates, targeting, and a message to the publisher.
   * Once the RFP is sent, a proposal in `SELLER_REVIEW_REQUESTED` state will be
   * created and returned in the response. The publisher may review your request
   * and respond with detailed deals in the proposal. (proposals.sendRfp)
   *
   * @param string $buyer Required. The current buyer who is sending the RFP in
   * the format: `buyers/{accountId}`.
   * @param SendRfpRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Proposal
   */
  public function sendRfp($buyer, SendRfpRequest $postBody, $optParams = [])
  {
    $params = ['buyer' => $buyer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('sendRfp', [$params], Proposal::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyersProposals::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BuyersProposals');
