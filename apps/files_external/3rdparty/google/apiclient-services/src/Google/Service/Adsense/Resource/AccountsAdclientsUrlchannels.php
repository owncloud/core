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
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_Adsense(...);
 *   $urlchannels = $adsenseService->urlchannels;
 *  </code>
 */
class Google_Service_Adsense_Resource_AccountsAdclientsUrlchannels extends Google_Service_Resource
{
  /**
   * Lists active url channels. (urlchannels.listAccountsAdclientsUrlchannels)
   *
   * @param string $parent Required. The ad client which owns the collection of
   * url channels. Format: accounts/{account}/adclients/{adclient}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of url channels to include in the
   * response, used for paging. If unspecified, at most 10000 url channels will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListUrlChannels` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListUrlChannels` must match the
   * call that provided the page token.
   * @return Google_Service_Adsense_ListUrlChannelsResponse
   */
  public function listAccountsAdclientsUrlchannels($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Adsense_ListUrlChannelsResponse");
  }
}
