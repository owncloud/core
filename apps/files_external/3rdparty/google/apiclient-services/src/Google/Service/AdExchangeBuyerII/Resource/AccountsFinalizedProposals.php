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
 * The "finalizedProposals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google_Service_AdExchangeBuyerII(...);
 *   $finalizedProposals = $adexchangebuyer2Service->finalizedProposals;
 *  </code>
 */
class Google_Service_AdExchangeBuyerII_Resource_AccountsFinalizedProposals extends Google_Service_Resource
{
  /**
   * List finalized proposals, regardless if a proposal is being renegotiated. A
   * filter expression (PQL query) may be specified to filter the results. The
   * notes will not be returned.
   * (finalizedProposals.listAccountsFinalizedProposals)
   *
   * @param string $accountId Account ID of the buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The page token as returned from
   * ListProposalsResponse.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string filterSyntax Syntax the filter is written in. Current
   * implementation defaults to PQL but in the future it will be LIST_FILTER.
   * @opt_param string filter An optional PQL filter query used to query for
   * proposals.
   *
   * Nested repeated fields, such as proposal.deals.targetingCriterion, cannot be
   * filtered.
   * @return Google_Service_AdExchangeBuyerII_ListProposalsResponse
   */
  public function listAccountsFinalizedProposals($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyerII_ListProposalsResponse");
  }
}
