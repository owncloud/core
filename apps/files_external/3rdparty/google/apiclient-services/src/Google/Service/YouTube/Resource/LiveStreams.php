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
 * The "liveStreams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveStreams = $youtubeService->liveStreams;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveStreams extends Google_Service_Resource
{
  /**
   * Deletes an existing stream for the authenticated user. (liveStreams.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwnerChannel*
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies. This
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
   * Inserts a new stream for the authenticated user. (liveStreams.insert)
   *
   * @param string|array $part The *part* parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include. The part
   * properties that you can include in the parameter value are id, snippet, cdn,
   * content_details, and status.
   * @param Google_Service_YouTube_LiveStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwnerChannel*
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies. This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @return Google_Service_YouTube_LiveStream
   */
  public function insert($part, Google_Service_YouTube_LiveStream $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveStream");
  }
  /**
   * Retrieve the list of streams associated with the given channel. --
   * (liveStreams.listLiveStreams)
   *
   * @param string|array $part The *part* parameter specifies a comma-separated
   * list of one or more liveStream resource properties that the API response will
   * include. The part names that you can include in the parameter value are id,
   * snippet, cdn, and status.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string id Return LiveStreams with the given ids from Stubby or
   * Apiary.
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param bool mine
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwnerChannel*
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies. This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @return Google_Service_YouTube_LiveStreamListResponse
   */
  public function listLiveStreams($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveStreamListResponse");
  }
  /**
   * Updates an existing stream for the authenticated user. (liveStreams.update)
   *
   * @param string|array $part The *part* parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include. The part
   * properties that you can include in the parameter value are id, snippet, cdn,
   * and status. Note that this method will override the existing values for all
   * of the mutable properties that are contained in any parts that the parameter
   * value specifies. If the request body does not specify a value for a mutable
   * property, the existing value for that property will be removed.
   * @param Google_Service_YouTube_LiveStream $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwner*
   * parameter indicates that the request's authorization credentials identify a
   * YouTube CMS user who is acting on behalf of the content owner specified in
   * the parameter value. This parameter is intended for YouTube content partners
   * that own and manage many different YouTube channels. It allows content owners
   * to authenticate once and get access to all their video and channel data,
   * without having to provide authentication credentials for each individual
   * channel. The CMS account that the user authenticates with must be linked to
   * the specified YouTube content owner.
   * @opt_param string onBehalfOfContentOwnerChannel This parameter can only be
   * used in a properly authorized request. *Note:* This parameter is intended
   * exclusively for YouTube content partners. The *onBehalfOfContentOwnerChannel*
   * parameter specifies the YouTube channel ID of the channel to which a video is
   * being added. This parameter is required when a request specifies a value for
   * the onBehalfOfContentOwner parameter, and it can only be used in conjunction
   * with that parameter. In addition, the request must be authorized using a CMS
   * account that is linked to the content owner that the onBehalfOfContentOwner
   * parameter specifies. Finally, the channel that the
   * onBehalfOfContentOwnerChannel parameter value specifies must be linked to the
   * content owner that the onBehalfOfContentOwner parameter specifies. This
   * parameter is intended for YouTube content partners that own and manage many
   * different YouTube channels. It allows content owners to authenticate once and
   * perform actions on behalf of the channel specified in the parameter value,
   * without having to provide authentication credentials for each separate
   * channel.
   * @return Google_Service_YouTube_LiveStream
   */
  public function update($part, Google_Service_YouTube_LiveStream $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_LiveStream");
  }
}
