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

namespace Google\Service\GoogleAnalyticsAdmin\Resource;

use Google\Service\GoogleAnalyticsAdmin\GoogleAnalyticsAdminV1alphaListAccountSummariesResponse;

/**
 * The "accountSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsadminService = new Google\Service\GoogleAnalyticsAdmin(...);
 *   $accountSummaries = $analyticsadminService->accountSummaries;
 *  </code>
 */
class AccountSummaries extends \Google\Service\Resource
{
  /**
   * Returns summaries of all accounts accessible by the caller.
   * (accountSummaries.listAccountSummaries)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of AccountSummary resources to
   * return. The service may return fewer than this value, even if there are
   * additional pages. If unspecified, at most 50 resources will be returned. The
   * maximum value is 200; (higher values will be coerced to the maximum)
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccountSummaries` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListAccountSummaries` must
   * match the call that provided the page token.
   * @return GoogleAnalyticsAdminV1alphaListAccountSummariesResponse
   */
  public function listAccountSummaries($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleAnalyticsAdminV1alphaListAccountSummariesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountSummaries::class, 'Google_Service_GoogleAnalyticsAdmin_Resource_AccountSummaries');
