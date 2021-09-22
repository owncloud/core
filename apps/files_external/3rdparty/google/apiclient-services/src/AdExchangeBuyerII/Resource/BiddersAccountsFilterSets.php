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

namespace Google\Service\AdExchangeBuyerII\Resource;

use Google\Service\AdExchangeBuyerII\Adexchangebuyer2Empty;
use Google\Service\AdExchangeBuyerII\FilterSet;
use Google\Service\AdExchangeBuyerII\ListFilterSetsResponse;

/**
 * The "filterSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $filterSets = $adexchangebuyer2Service->filterSets;
 *  </code>
 */
class BiddersAccountsFilterSets extends \Google\Service\Resource
{
  /**
   * Creates the specified filter set for the account with the given account ID.
   * (filterSets.create)
   *
   * @param string $ownerName Name of the owner (bidder or account) of the filter
   * set to be created. For example: - For a bidder-level filter set for bidder
   * 123: `bidders/123` - For an account-level filter set for the buyer account
   * representing bidder 123: `bidders/123/accounts/123` - For an account-level
   * filter set for the child seat buyer account 456 whose bidder is 123:
   * `bidders/123/accounts/456`
   * @param FilterSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool isTransient Whether the filter set is transient, or should be
   * persisted indefinitely. By default, filter sets are not transient. If
   * transient, it will be available for at least 1 hour after creation.
   * @return FilterSet
   */
  public function create($ownerName, FilterSet $postBody, $optParams = [])
  {
    $params = ['ownerName' => $ownerName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], FilterSet::class);
  }
  /**
   * Deletes the requested filter set from the account with the given account ID.
   * (filterSets.delete)
   *
   * @param string $name Full name of the resource to delete. For example: - For a
   * bidder-level filter set for bidder 123: `bidders/123/filterSets/abc` - For an
   * account-level filter set for the buyer account representing bidder 123:
   * `bidders/123/accounts/123/filterSets/abc` - For an account-level filter set
   * for the child seat buyer account 456 whose bidder is 123:
   * `bidders/123/accounts/456/filterSets/abc`
   * @param array $optParams Optional parameters.
   * @return Adexchangebuyer2Empty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Adexchangebuyer2Empty::class);
  }
  /**
   * Retrieves the requested filter set for the account with the given account ID.
   * (filterSets.get)
   *
   * @param string $name Full name of the resource being requested. For example: -
   * For a bidder-level filter set for bidder 123: `bidders/123/filterSets/abc` -
   * For an account-level filter set for the buyer account representing bidder
   * 123: `bidders/123/accounts/123/filterSets/abc` - For an account-level filter
   * set for the child seat buyer account 456 whose bidder is 123:
   * `bidders/123/accounts/456/filterSets/abc`
   * @param array $optParams Optional parameters.
   * @return FilterSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FilterSet::class);
  }
  /**
   * Lists all filter sets for the account with the given account ID.
   * (filterSets.listBiddersAccountsFilterSets)
   *
   * @param string $ownerName Name of the owner (bidder or account) of the filter
   * sets to be listed. For example: - For a bidder-level filter set for bidder
   * 123: `bidders/123` - For an account-level filter set for the buyer account
   * representing bidder 123: `bidders/123/accounts/123` - For an account-level
   * filter set for the child seat buyer account 456 whose bidder is 123:
   * `bidders/123/accounts/456`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListFilterSetsResponse.nextPageToken returned from the previous call to the
   * accounts.filterSets.list method.
   * @return ListFilterSetsResponse
   */
  public function listBiddersAccountsFilterSets($ownerName, $optParams = [])
  {
    $params = ['ownerName' => $ownerName];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFilterSetsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersAccountsFilterSets::class, 'Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSets');
