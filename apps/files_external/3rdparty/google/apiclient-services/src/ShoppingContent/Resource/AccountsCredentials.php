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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\AccountCredentials;

/**
 * The "credentials" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $credentials = $contentService->credentials;
 *  </code>
 */
class AccountsCredentials extends \Google\Service\Resource
{
  /**
   * Uploads credentials for the Merchant Center account. If credentials already
   * exist for this Merchant Center account and purpose, this method updates them.
   * (credentials.create)
   *
   * @param string $accountId Required. The merchant id of the account these
   * credentials belong to.
   * @param AccountCredentials $postBody
   * @param array $optParams Optional parameters.
   * @return AccountCredentials
   */
  public function create($accountId, AccountCredentials $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AccountCredentials::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCredentials::class, 'Google_Service_ShoppingContent_Resource_AccountsCredentials');
