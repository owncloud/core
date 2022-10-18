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
use Google\Service\AdExchangeBuyerII\Creative;
use Google\Service\AdExchangeBuyerII\ListCreativesResponse;
use Google\Service\AdExchangeBuyerII\StopWatchingCreativeRequest;
use Google\Service\AdExchangeBuyerII\WatchCreativeRequest;

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $creatives = $adexchangebuyer2Service->creatives;
 *  </code>
 */
class AccountsCreatives extends \Google\Service\Resource
{
  /**
   * Creates a creative. (creatives.create)
   *
   * @param string $accountId The account that this creative belongs to. Can be
   * used to filter the response of the creatives.list method.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string duplicateIdMode Indicates if multiple creatives can share
   * an ID or not. Default is NO_DUPLICATES (one ID per creative).
   * @return Creative
   */
  public function create($accountId, Creative $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Creative::class);
  }
  /**
   * Gets a creative. (creatives.get)
   *
   * @param string $accountId The account the creative belongs to.
   * @param string $creativeId The ID of the creative to retrieve.
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function get($accountId, $creativeId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'creativeId' => $creativeId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Creative::class);
  }
  /**
   * Lists creatives. (creatives.listAccountsCreatives)
   *
   * @param string $accountId The account to list the creatives from. Specify "-"
   * to list all creatives the current user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * creatives than requested (due to timeout constraint) even if more are
   * available through another call. If unspecified, server will pick an
   * appropriate default. Acceptable values are 1 to 1000, inclusive.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListCreativesResponse.next_page_token returned from the previous call to
   * 'ListCreatives' method.
   * @opt_param string query An optional query string to filter creatives. If no
   * filter is specified, all active creatives will be returned. Supported queries
   * are: - accountId=*account_id_string* - creativeId=*creative_id_string* -
   * dealsStatus: {approved, conditionally_approved, disapproved, not_checked} -
   * openAuctionStatus: {approved, conditionally_approved, disapproved,
   * not_checked} - attribute: {a numeric attribute from the list of attributes} -
   * disapprovalReason: {a reason from DisapprovalReason} Example:
   * 'accountId=12345 AND (dealsStatus:disapproved AND
   * disapprovalReason:unacceptable_content) OR attribute:47'
   * @return ListCreativesResponse
   */
  public function listAccountsCreatives($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCreativesResponse::class);
  }
  /**
   * Stops watching a creative. Will stop push notifications being sent to the
   * topics when the creative changes status. (creatives.stopWatching)
   *
   * @param string $accountId The account of the creative to stop notifications
   * for.
   * @param string $creativeId The creative ID of the creative to stop
   * notifications for. Specify "-" to specify stopping account level
   * notifications.
   * @param StopWatchingCreativeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Adexchangebuyer2Empty
   */
  public function stopWatching($accountId, $creativeId, StopWatchingCreativeRequest $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stopWatching', [$params], Adexchangebuyer2Empty::class);
  }
  /**
   * Updates a creative. (creatives.update)
   *
   * @param string $accountId The account that this creative belongs to. Can be
   * used to filter the response of the creatives.list method.
   * @param string $creativeId The buyer-defined creative ID of this creative. Can
   * be used to filter the response of the creatives.list method.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function update($accountId, $creativeId, Creative $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Creative::class);
  }
  /**
   * Watches a creative. Will result in push notifications being sent to the topic
   * when the creative changes status. (creatives.watch)
   *
   * @param string $accountId The account of the creative to watch.
   * @param string $creativeId The creative ID to watch for status changes.
   * Specify "-" to watch all creatives under the above account. If both creative-
   * level and account-level notifications are sent, only a single notification
   * will be sent to the creative-level notification topic.
   * @param WatchCreativeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Adexchangebuyer2Empty
   */
  public function watch($accountId, $creativeId, WatchCreativeRequest $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'creativeId' => $creativeId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watch', [$params], Adexchangebuyer2Empty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCreatives::class, 'Google_Service_AdExchangeBuyerII_Resource_AccountsCreatives');
