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
 * The "liveBroadcasts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveBroadcasts = $youtubeService->liveBroadcasts;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveBroadcasts extends Google_Service_Resource
{
  /**
   * Bind a broadcast to a stream. (liveBroadcasts.bind)
   *
   * @param string $id Broadcast to bind to the stream
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string streamId Stream to bind, if not set unbind the current one.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function bind($id, $part, $optParams = array())
  {
    $params = array('id' => $id, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('bind', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Slate and recording control of the live broadcast. Support actions: slate
   * on/off, recording start/stop/pause/resume. Design doc: goto/yt-api-
   * liveBroadcast-control (liveBroadcasts.control)
   *
   * @param string $id Broadcast to operate.
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string offsetTimeMs The exact time when the actions (e.g. slate
   * on) are executed. It is an offset from the first frame of the monitor stream.
   * If not set, it means "now" or ASAP. This field should not be set if the
   * monitor stream is disabled, otherwise an error will be returned.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @opt_param bool displaySlate Whether display or hide slate.
   * @opt_param string walltime The wall clock time at which the action should be
   * executed. Only one of offset_time_ms and walltime may be set at a time.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function control($id, $part, $optParams = array())
  {
    $params = array('id' => $id, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('control', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Delete a given broadcast. (liveBroadcasts.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new stream for the authenticated user. (liveBroadcasts.insert)
   *
   * @param string|array $part The part parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include.The part properties
   * that you can include in the parameter value are id, snippet, contentDetails,
   * and status.
   * @param Google_Service_YouTube_LiveBroadcast $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function insert($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Retrieve the list of broadcasts associated with the given channel.
   * (liveBroadcasts.listLiveBroadcasts)
   *
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string id Return broadcasts with the given ids from Stubby or
   * Apiary.
   * @opt_param string broadcastType Return only broadcasts with the selected
   * type.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string broadcastStatus Return broadcasts with a certain status,
   * e.g. active broadcasts.
   * @opt_param bool mine
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @return Google_Service_YouTube_LiveBroadcastListResponse
   */
  public function listLiveBroadcasts($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveBroadcastListResponse");
  }
  /**
   * Transition a broadcast to a given status. (liveBroadcasts.transition)
   *
   * @param string $id Broadcast to transition.
   * @param string $broadcastStatus The status to which the broadcast is going to
   * transition.
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more liveBroadcast resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, contentDetails, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function transition($id, $broadcastStatus, $part, $optParams = array())
  {
    $params = array('id' => $id, 'broadcastStatus' => $broadcastStatus, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('transition', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
  /**
   * Updates an existing broadcast for the authenticated user.
   * (liveBroadcasts.update)
   *
   * @param string|array $part The part parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include.The part properties
   * that you can include in the parameter value are id, snippet, contentDetails,
   * and status.Note that this method will override the existing values for all of
   * the mutable properties that are contained in any parts that the parameter
   * value specifies. For example, a broadcast's privacy status is defined in the
   * status part. As such, if your request is updating a private or unlisted
   * broadcast, and the request's part parameter value includes the status part,
   * the broadcast's privacy setting will be updated to whatever value the request
   * body specifies. If the request body does not specify a value, the existing
   * privacy setting will be removed and the broadcast will revert to the default
   * privacy setting.
   * @param Google_Service_YouTube_LiveBroadcast $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwnerChannel
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies.This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.The onBehalfOfContentOwner parameter
   * indicates that the request's authorization credentials identify a YouTube CMS
   * user who is acting on behalf of the content owner specified in the parameter
   * value. This parameter is intended for YouTube content partners that own and
   * manage many different YouTube channels. It allows content owners to
   * authenticate once and get access to all their video and channel data, without
   * having to provide authentication credentials for each individual channel. The
   * CMS account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @return Google_Service_YouTube_LiveBroadcast
   */
  public function update($part, Google_Service_YouTube_LiveBroadcast $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_LiveBroadcast");
  }
}
