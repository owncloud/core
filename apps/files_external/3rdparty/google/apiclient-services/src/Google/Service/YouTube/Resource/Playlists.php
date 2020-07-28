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
 * The "playlists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $playlists = $youtubeService->playlists;
 *  </code>
 */
class Google_Service_YouTube_Resource_Playlists extends Google_Service_Resource
{
  /**
   * Deletes a resource. (playlists.delete)
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
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new resource into this collection. (playlists.insert)
   *
   * @param string|array $part The part parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include.
   * @param Google_Service_YouTube_Playlist $postBody
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
   * @return Google_Service_YouTube_Playlist
   */
  public function insert($part, Google_Service_YouTube_Playlist $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_Playlist");
  }
  /**
   * Retrieves a list of resources, possibly filtered. (playlists.listPlaylists)
   *
   * @param string|array $part The part parameter specifies a comma-separated list
   * of one or more playlist resource properties that the API response will
   * include.If the parameter identifies a property that contains child
   * properties, the child properties will be included in the response. For
   * example, in a playlist resource, the snippet property contains properties
   * like author, title, description, tags, and timeCreated. As such, if you set
   * part=snippet, the API response will contain all of those properties.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool mine Return the playlists owned by the authenticated user.
   * @opt_param string channelId Return the playlists owned by the specified
   * channel ID.
   * @opt_param string hl Returen content in specified language
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
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string id Return the playlists with the given IDs for Stubby or
   * Apiary.
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
   * @return Google_Service_YouTube_PlaylistListResponse
   */
  public function listPlaylists($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_PlaylistListResponse");
  }
  /**
   * Updates an existing resource. (playlists.update)
   *
   * @param string|array $part The part parameter serves two purposes in this
   * operation. It identifies the properties that the write operation will set as
   * well as the properties that the API response will include.Note that this
   * method will override the existing values for mutable properties that are
   * contained in any parts that the request body specifies. For example, a
   * playlist's description is contained in the snippet part, which must be
   * included in the request body. If the request does not specify a value for the
   * snippet.description property, the playlist's existing description will be
   * deleted.
   * @param Google_Service_YouTube_Playlist $postBody
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
   * @return Google_Service_YouTube_Playlist
   */
  public function update($part, Google_Service_YouTube_Playlist $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_YouTube_Playlist");
  }
}
