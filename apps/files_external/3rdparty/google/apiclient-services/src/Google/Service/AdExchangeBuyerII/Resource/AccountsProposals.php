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

/**
 * The "proposals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $proposals = $adexchangebuyer2Service->proposals;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_AccountsProposals extends Google_Service_Resource
{
  /**
   * Mark the proposal as accepted at the given revision number. If the number
   * does not match the server's revision number an `ABORTED` error message will
   * be returned. This call updates the proposal_state from `PROPOSED` to
   * `BUYER_ACCEPTED`, or from `SELLER_ACCEPTED` to `FINALIZED`.
   * (proposals.accept)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to accept.
   * @param Google_Service_AdExchangeBuyerII_AcceptProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function accept($accountId, $proposalId, Google_Service_AdExchangeBuyerII_AcceptProposalRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Create a new note and attach it to the proposal. The note is assigned a
   * unique ID by the server. The proposal revision number will not increase when
   * associated with a new note. (proposals.addNote)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to attach the note to.
   * @param Google_Service_AdExchangeBuyerII_AddNoteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Note
   */
  public function addNote($accountId, $proposalId, Google_Service_AdExchangeBuyerII_AddNoteRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addNote', array($params), "Google_Service_AdExchangeBuyerII_Note");
  }
  /**
   * Cancel an ongoing negotiation on a proposal. This does not cancel or end
   * serving for the deals if the proposal has been finalized, but only cancels a
   * negotiation unilaterally. (proposals.cancelNegotiation)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to cancel negotiation for.
   * @param Google_Service_AdExchangeBuyerII_CancelNegotiationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function cancelNegotiation($accountId, $proposalId, Google_Service_AdExchangeBuyerII_CancelNegotiationRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancelNegotiation', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Update the given proposal to indicate that setup has been completed. This
   * method is called by the buyer when the line items have been created on their
   * end for a finalized proposal and all the required creatives have been
   * uploaded using the creatives API. This call updates the `is_setup_completed`
   * bit on the proposal and also notifies the seller. The server will advance the
   * revision number of the most recent proposal. (proposals.completeSetup)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to mark as setup completed.
   * @param Google_Service_AdExchangeBuyerII_CompleteSetupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function completeSetup($accountId, $proposalId, Google_Service_AdExchangeBuyerII_CompleteSetupRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('completeSetup', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Create the given proposal. Each created proposal and any deals it contains
   * are assigned a unique ID by the server. (proposals.create)
   *
   * @param string $accountId Account ID of the buyer.
   * @param Google_Service_AdExchangeBuyerII_Proposal $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function create($accountId, Google_Service_AdExchangeBuyerII_Proposal $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Gets a proposal given its ID. The proposal is returned at its head revision.
   * (proposals.get)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The unique ID of the proposal
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function get($accountId, $proposalId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * List proposals. A filter expression (PQL query) may be specified to filter
   * the results. To retrieve all finalized proposals, regardless if a proposal is
   * being renegotiated, see the FinalizedProposals resource. Note that
   * Bidder/ChildSeat relationships differ from the usual behavior. A Bidder
   * account can only see its child seats' proposals by specifying the ChildSeat's
   * accountId in the request path. (proposals.listAccountsProposals)
   *
   * @param string $accountId Account ID of the buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An optional PQL filter query used to query for
   * proposals. Nested repeated fields, such as proposal.deals.targetingCriterion,
   * cannot be filtered.
   * @opt_param string filterSyntax Syntax the filter is written in. Current
   * implementation defaults to PQL but in the future it will be LIST_FILTER.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken The page token as returned from
   * ListProposalsResponse.
   * @return Google_Service_AdExchangeBuyerII_ListProposalsResponse
   */
  public function listAccountsProposals($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListProposalsResponse");
  }
  /**
   * Update the given proposal to pause serving. This method will set the
   * `DealServingMetadata.DealPauseStatus.has_buyer_paused` bit to true for all
   * deals in the proposal. It is a no-op to pause an already-paused proposal. It
   * is an error to call PauseProposal for a proposal that is not finalized or
   * renegotiating. (proposals.pause)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to pause.
   * @param Google_Service_AdExchangeBuyerII_PauseProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function pause($accountId, $proposalId, Google_Service_AdExchangeBuyerII_PauseProposalRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Update the given proposal to resume serving. This method will set the
   * `DealServingMetadata.DealPauseStatus.has_buyer_paused` bit to false for all
   * deals in the proposal. Note that if the `has_seller_paused` bit is also set,
   * serving will not resume until the seller also resumes. It is a no-op to
   * resume an already-running proposal. It is an error to call ResumeProposal for
   * a proposal that is not finalized or renegotiating. (proposals.resume)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The ID of the proposal to resume.
   * @param Google_Service_AdExchangeBuyerII_ResumeProposalRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function resume($accountId, $proposalId, Google_Service_AdExchangeBuyerII_ResumeProposalRequest $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
  /**
   * Update the given proposal at the client known revision number. If the server
   * revision has advanced since the passed-in `proposal.proposal_revision`, an
   * `ABORTED` error message will be returned. Only the buyer-modifiable fields of
   * the proposal will be updated. Note that the deals in the proposal will be
   * updated to match the passed-in copy. If a passed-in deal does not have a
   * `deal_id`, the server will assign a new unique ID and create the deal. If
   * passed-in deal has a `deal_id`, it will be updated to match the passed-in
   * copy. Any existing deals not present in the passed-in proposal will be
   * deleted. It is an error to pass in a deal with a `deal_id` not present at
   * head. (proposals.update)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $proposalId The unique ID of the proposal.
   * @param Google_Service_AdExchangeBuyerII_Proposal $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyerII_Proposal
   */
  public function update($accountId, $proposalId, Google_Service_AdExchangeBuyerII_Proposal $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'proposalId' => $proposalId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdExchangeBuyerII_Proposal");
  }
}
