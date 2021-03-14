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
 * The "credentials" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $credentials = $contentService->credentials;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_AccountsCredentials extends Google_Service_Resource
{
  /**
   * Uploads credentials for the Merchant Center account. If credentials already
   * exist for this Merchant Center account and purpose, this method updates them.
   * (credentials.create)
   *
   * @param string $accountId Required. The merchant id of the account these
   * credentials belong to.
   * @param Google_Service_ShoppingContent_AccountCredentials $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_AccountCredentials
   */
  public function create($accountId, Google_Service_ShoppingContent_AccountCredentials $postBody, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ShoppingContent_AccountCredentials");
  }
}
