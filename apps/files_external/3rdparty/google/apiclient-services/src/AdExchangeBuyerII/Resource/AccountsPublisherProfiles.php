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

use Google\Service\AdExchangeBuyerII\ListPublisherProfilesResponse;
use Google\Service\AdExchangeBuyerII\PublisherProfile;

/**
 * The "publisherProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $publisherProfiles = $adexchangebuyer2Service->publisherProfiles;
 *  </code>
 */
class AccountsPublisherProfiles extends \Google\Service\Resource
{
  /**
   * Gets the requested publisher profile by id. (publisherProfiles.get)
   *
   * @param string $accountId Account ID of the buyer.
   * @param string $publisherProfileId The id for the publisher profile to get.
   * @param array $optParams Optional parameters.
   * @return PublisherProfile
   */
  public function get($accountId, $publisherProfileId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'publisherProfileId' => $publisherProfileId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PublisherProfile::class);
  }
  /**
   * List all publisher profiles visible to the buyer
   * (publisherProfiles.listAccountsPublisherProfiles)
   *
   * @param string $accountId Account ID of the buyer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Specify the number of results to include per page.
   * @opt_param string pageToken The page token as return from
   * ListPublisherProfilesResponse.
   * @return ListPublisherProfilesResponse
   */
  public function listAccountsPublisherProfiles($accountId, $optParams = [])
  {
    $params = ['accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPublisherProfilesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsPublisherProfiles::class, 'Google_Service_AdExchangeBuyerII_Resource_AccountsPublisherProfiles');
