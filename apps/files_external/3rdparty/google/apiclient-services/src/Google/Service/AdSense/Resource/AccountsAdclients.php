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
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adclients = $adsenseService->adclients;
 *  </code>
 */
class Google_Service_AdSense_Resource_AccountsAdclients extends Google_Service_Resource
{
  /**
   * Get Auto ad code for a given ad client. (adclients.getAdCode)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client to get the code for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagPartner Tag partner to include in the ad code snippet.
   * @return Google_Service_AdSense_AdCode
   */
  public function getAdCode($accountId, $adClientId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('getAdCode', array($params), "Google_Service_AdSense_AdCode");
  }
  /**
   * List all ad clients in the specified account.
   * (adclients.listAccountsAdclients)
   *
   * @param string $accountId Account for which to list ad clients.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A continuation token, used to page through ad
   * clients. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @opt_param int maxResults The maximum number of ad clients to include in the
   * response, used for paging.
   * @return Google_Service_AdSense_AdClients
   */
  public function listAccountsAdclients($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_AdClients");
  }
}
