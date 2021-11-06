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

namespace Google\Service\Adsense\Resource;

use Google\Service\Adsense\ListAlertsResponse;

/**
 * The "alerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google\Service\Adsense(...);
 *   $alerts = $adsenseService->alerts;
 *  </code>
 */
class AccountsAlerts extends \Google\Service\Resource
{
  /**
   * Lists all the alerts available in an account. (alerts.listAccountsAlerts)
   *
   * @param string $parent Required. The account which owns the collection of
   * alerts. Format: accounts/{account}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string languageCode The language to use for translating alert
   * messages. If unspecified, this defaults to the user's display language. If
   * the given language is not supported, alerts will be returned in English. The
   * language is specified as an [IETF BCP-47 language
   * code](https://en.wikipedia.org/wiki/IETF_language_tag).
   * @return ListAlertsResponse
   */
  public function listAccountsAlerts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAlertsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAlerts::class, 'Google_Service_Adsense_Resource_AccountsAlerts');
