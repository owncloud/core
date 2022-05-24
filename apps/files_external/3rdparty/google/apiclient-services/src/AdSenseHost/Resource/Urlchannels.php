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

namespace Google\Service\AdSenseHost\Resource;

use Google\Service\AdSenseHost\UrlChannel;
use Google\Service\AdSenseHost\UrlChannels as UrlChannelsModel;

/**
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google\Service\AdSenseHost(...);
 *   $urlchannels = $adsensehostService->urlchannels;
 *  </code>
 */
class Urlchannels extends \Google\Service\Resource
{
  /**
   * Delete a URL channel from the host AdSense account. (urlchannels.delete)
   *
   * @param string $adClientId Ad client from which to delete the URL channel.
   * @param string $urlChannelId URL channel to delete.
   * @param array $optParams Optional parameters.
   * @return UrlChannel
   */
  public function delete($adClientId, $urlChannelId, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'urlChannelId' => $urlChannelId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], UrlChannel::class);
  }
  /**
   * Add a new URL channel to the host AdSense account. (urlchannels.insert)
   *
   * @param string $adClientId Ad client to which the new URL channel will be
   * added.
   * @param UrlChannel $postBody
   * @param array $optParams Optional parameters.
   * @return UrlChannel
   */
  public function insert($adClientId, UrlChannel $postBody, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], UrlChannel::class);
  }
  /**
   * List all host URL channels in the host AdSense account.
   * (urlchannels.listUrlchannels)
   *
   * @param string $adClientId Ad client for which to list URL channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of URL channels to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through URL
   * channels. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return UrlChannelsModel
   */
  public function listUrlchannels($adClientId, $optParams = [])
  {
    $params = ['adClientId' => $adClientId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UrlChannelsModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Urlchannels::class, 'Google_Service_AdSenseHost_Resource_Urlchannels');
