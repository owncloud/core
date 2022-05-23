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

use Google\Service\Adsense\ListUrlChannelsResponse;
use Google\Service\Adsense\UrlChannel;

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google\Service\Adsense(...);
 *   $urlchannels = $adsenseService->urlchannels;
 *  </code>
 */
class AccountsAdclientsUrlchannels extends \Google\Service\Resource
{
  /**
   * Gets information about the selected url channel. (urlchannels.get)
   *
   * @param string $name Required. The name of the url channel to retrieve.
   * Format: accounts/{account}/adclients/{adclient}/urlchannels/{urlchannel}
   * @param array $optParams Optional parameters.
   * @return UrlChannel
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UrlChannel::class);
  }
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
   * @return ListUrlChannelsResponse
   */
  public function listAccountsAdclientsUrlchannels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUrlChannelsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsAdclientsUrlchannels::class, 'Google_Service_Adsense_Resource_AccountsAdclientsUrlchannels');
