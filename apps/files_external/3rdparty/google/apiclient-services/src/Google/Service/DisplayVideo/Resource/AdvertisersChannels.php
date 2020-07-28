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
 * The "channels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $channels = $displayvideoService->channels;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_AdvertisersChannels extends Google_Service_Resource
{
  /**
   * Creates a new channel. Returns the newly created channel if successful.
   * (channels.create)
   *
   * @param string $advertiserId The ID of the advertiser that owns the created
   * channel.
   * @param Google_Service_DisplayVideo_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the created
   * channel.
   * @return Google_Service_DisplayVideo_Channel
   */
  public function create($advertiserId, Google_Service_DisplayVideo_Channel $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_Channel");
  }
  /**
   * Gets a channel for a partner or advertiser. (channels.get)
   *
   * @param string $advertiserId The ID of the advertiser that owns the fetched
   * channel.
   * @param string $channelId Required. The ID of the channel to fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the fetched
   * channel.
   * @return Google_Service_DisplayVideo_Channel
   */
  public function get($advertiserId, $channelId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_Channel");
  }
  /**
   * Lists channels for a partner or advertiser.
   * (channels.listAdvertisersChannels)
   *
   * @param string $advertiserId The ID of the advertiser that owns the channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the channels.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) * `channelId` The default sorting order is
   * ascending. To specify descending order for a field, a suffix " desc" should
   * be added to the field name. Example: `displayName desc`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListChannels` method. If not specified, the first page
   * of results will be returned.
   * @opt_param string filter Allows filtering by channel fields. Supported
   * syntax: * Filter expressions for channel currently can only contain at most
   * one * restriction. * A restriction has the form of `{field} {operator}
   * {value}`. * The operator must be `CONTAINS (:)`. * Supported fields: -
   * `displayName` Examples: * All channels for which the display name contains
   * "google": `displayName : "google"`. The length of this field should be no
   * more than 500 characters.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`. Returns error code `INVALID_ARGUMENT`
   * if an invalid value is specified.
   * @return Google_Service_DisplayVideo_ListChannelsResponse
   */
  public function listAdvertisersChannels($advertiserId, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListChannelsResponse");
  }
  /**
   * Updates a channel. Returns the updated channel if successful.
   * (channels.patch)
   *
   * @param string $advertiserId The ID of the advertiser that owns the created
   * channel.
   * @param string $channelId Output only. The unique ID of the channel. Assigned
   * by the system.
   * @param Google_Service_DisplayVideo_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId The ID of the partner that owns the created
   * channel.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_Channel
   */
  public function patch($advertiserId, $channelId, Google_Service_DisplayVideo_Channel $postBody, $optParams = array())
  {
    $params = array('advertiserId' => $advertiserId, 'channelId' => $channelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_Channel");
  }
}
