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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\AccountActiveAdSummary;

/**
 * The "accountActiveAdSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $accountActiveAdSummaries = $dfareportingService->accountActiveAdSummaries;
 *  </code>
 */
class AccountActiveAdSummaries extends \Google\Service\Resource
{
  /**
   * Gets the account's active ad summary by account ID.
   * (accountActiveAdSummaries.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $summaryAccountId Account ID.
   * @param array $optParams Optional parameters.
   * @return AccountActiveAdSummary
   */
  public function get($profileId, $summaryAccountId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'summaryAccountId' => $summaryAccountId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AccountActiveAdSummary::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountActiveAdSummaries::class, 'Google_Service_Dfareporting_Resource_AccountActiveAdSummaries');
