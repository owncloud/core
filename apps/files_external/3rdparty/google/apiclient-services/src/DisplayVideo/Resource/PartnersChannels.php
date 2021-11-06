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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\Channel;
use Google\Service\DisplayVideo\ListChannelsResponse;

/**
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $channels = $displayvideoService->channels;
 *  </code>
 */
class PartnersChannels extends \Google\Service\Resource
{
  /**
   * Creates a new channel. Returns the newly created channel if successful.
   * (channels.create)
   *
   * @param string $partnerId The ID of the partner that owns the created channel.
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the created
   * channel.
   * @return Channel
   */
  public function create($partnerId, Channel $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Channel::class);
  }
  /**
   * Gets a channel for a partner or advertiser. (channels.get)
   *
   * @param string $partnerId The ID of the partner that owns the fetched channel.
   * @param string $channelId Required. The ID of the channel to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the fetched
   * channel.
   * @return Channel
   */
  public function get($partnerId, $channelId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Channel::class);
  }
  /**
   * Lists channels for a partner or advertiser. (channels.listPartnersChannels)
   *
   * @param string $partnerId The ID of the partner that owns the channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the
   * channels.
   * @opt_param string filter Allows filtering by channel fields. Supported
   * syntax: * Filter expressions for channel currently can only contain at most
   * one * restriction. * A restriction has the form of `{field} {operator}
   * {value}`. * The operator must be `CONTAINS (:)`. * Supported fields: -
   * `displayName` Examples: * All channels for which the display name contains
   * "google": `displayName : "google"`. The length of this field should be no
   * more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) * `channelId` The default sorting order is
   * ascending. To specify descending order for a field, a suffix " desc" should
   * be added to the field name. Example: `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListChannels` method. If not specified, the first page
   * of results will be returned.
   * @return ListChannelsResponse
   */
  public function listPartnersChannels($partnerId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListChannelsResponse::class);
  }
  /**
   * Updates a channel. Returns the updated channel if successful.
   * (channels.patch)
   *
   * @param string $partnerId The ID of the partner that owns the created channel.
   * @param string $channelId Output only. The unique ID of the channel. Assigned
   * by the system.
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId The ID of the advertiser that owns the created
   * channel.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Channel
   */
  public function patch($partnerId, $channelId, Channel $postBody, $optParams = [])
  {
    $params = ['partnerId' => $partnerId, 'channelId' => $channelId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Channel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersChannels::class, 'Google_Service_DisplayVideo_Resource_PartnersChannels');
