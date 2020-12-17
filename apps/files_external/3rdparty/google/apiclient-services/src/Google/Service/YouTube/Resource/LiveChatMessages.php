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
 * The "liveChatMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $liveChatMessages = $youtubeService->liveChatMessages;
 *  </code>
 */
class Google_Service_YouTube_Resource_LiveChatMessages extends Google_Service_Resource
{
  /**
   * Deletes a chat message. (liveChatMessages.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Inserts a new resource into this collection. (liveChatMessages.insert)
   *
   * @param string|array $part The *part* parameter serves two purposes. It
   * identifies the properties that the write operation will set as well as the
   * properties that the API response will include. Set the parameter value to
   * snippet.
   * @param Google_Service_YouTube_LiveChatMessage $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTube_LiveChatMessage
   */
  public function insert($part, Google_Service_YouTube_LiveChatMessage $postBody, $optParams = array())
  {
    $params = array('part' => $part, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_LiveChatMessage");
  }
  /**
   * Retrieves a list of resources, possibly filtered.
   * (liveChatMessages.listLiveChatMessages)
   *
   * @param string $liveChatId The id of the live chat for which comments should
   * be returned.
   * @param string|array $part The *part* parameter specifies the liveChatComment
   * resource parts that the API response will include. Supported values are id
   * and snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string hl Specifies the localization language in which the system
   * messages should be returned.
   * @opt_param string maxResults The *maxResults* parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string pageToken The *pageToken* parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken property identify other pages that could be retrieved.
   * @opt_param string profileImageSize Specifies the size of the profile image
   * that should be returned for each user.
   * @return Google_Service_YouTube_LiveChatMessageListResponse
   */
  public function listLiveChatMessages($liveChatId, $part, $optParams = array())
  {
    $params = array('liveChatId' => $liveChatId, 'part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_LiveChatMessageListResponse");
  }
}
