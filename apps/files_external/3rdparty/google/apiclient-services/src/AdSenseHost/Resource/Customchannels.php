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

use Google\Service\AdSenseHost\CustomChannel;
use Google\Service\AdSenseHost\CustomChannels as CustomChannelsModel;

/**
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google\Service\AdSenseHost(...);
 *   $customchannels = $adsensehostService->customchannels;
 *  </code>
 */
class Customchannels extends \Google\Service\Resource
{
  /**
   * Delete a specific custom channel from the host AdSense account.
   * (customchannels.delete)
   *
   * @param string $adClientId Ad client from which to delete the custom channel.
   * @param string $customChannelId Custom channel to delete.
   * @param array $optParams Optional parameters.
   * @return CustomChannel
   */
  public function delete($adClientId, $customChannelId, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CustomChannel::class);
  }
  /**
   * Get a specific custom channel from the host AdSense account.
   * (customchannels.get)
   *
   * @param string $adClientId Ad client from which to get the custom channel.
   * @param string $customChannelId Custom channel to get.
   * @param array $optParams Optional parameters.
   * @return CustomChannel
   */
  public function get($adClientId, $customChannelId, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CustomChannel::class);
  }
  /**
   * Add a new custom channel to the host AdSense account. (customchannels.insert)
   *
   * @param string $adClientId Ad client to which the new custom channel will be
   * added.
   * @param CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return CustomChannel
   */
  public function insert($adClientId, CustomChannel $postBody, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CustomChannel::class);
  }
  /**
   * List all host custom channels in this AdSense account.
   * (customchannels.listCustomchannels)
   *
   * @param string $adClientId Ad client for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of custom channels to include
   * in the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through custom
   * channels. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return CustomChannelsModel
   */
  public function listCustomchannels($adClientId, $optParams = [])
  {
    $params = ['adClientId' => $adClientId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CustomChannelsModel::class);
  }
  /**
   * Update a custom channel in the host AdSense account. This method supports
   * patch semantics. (customchannels.patch)
   *
   * @param string $adClientId Ad client in which the custom channel will be
   * updated.
   * @param string $customChannelId Custom channel to get.
   * @param CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return CustomChannel
   */
  public function patch($adClientId, $customChannelId, CustomChannel $postBody, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'customChannelId' => $customChannelId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CustomChannel::class);
  }
  /**
   * Update a custom channel in the host AdSense account. (customchannels.update)
   *
   * @param string $adClientId Ad client in which the custom channel will be
   * updated.
   * @param CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return CustomChannel
   */
  public function update($adClientId, CustomChannel $postBody, $optParams = [])
  {
    $params = ['adClientId' => $adClientId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CustomChannel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customchannels::class, 'Google_Service_AdSenseHost_Resource_Customchannels');
