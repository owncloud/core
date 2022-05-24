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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\AccountSummaries;

/**
 * The "accountSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $accountSummaries = $analyticsService->accountSummaries;
 *  </code>
 */
class ManagementAccountSummaries extends \Google\Service\Resource
{
  /**
   * Lists account summaries (lightweight tree comprised of
   * accounts/properties/profiles) to which the user has access.
   * (accountSummaries.listManagementAccountSummaries)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of account summaries to include
   * in this response, where the largest acceptable value is 1000.
   * @opt_param int start-index An index of the first entity to retrieve. Use this
   * parameter as a pagination mechanism along with the max-results parameter.
   * @return AccountSummaries
   */
  public function listManagementAccountSummaries($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountSummaries::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementAccountSummaries::class, 'Google_Service_Analytics_Resource_ManagementAccountSummaries');
