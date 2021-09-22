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

namespace Google\Service\YouTube\Resource;

use Google\Service\YouTube\LiveChatMessage;
use Google\Service\YouTube\LiveChatMessageListResponse;

/**
 * The "liveChatMessages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google\Service\YouTube(...);
 *   $liveChatMessages = $youtubeService->liveChatMessages;
 *  </code>
 */
class LiveChatMessages extends \Google\Service\Resource
{
  /**
   * Deletes a chat message. (liveChatMessages.delete)
   *
   * @param string $id
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = [])
  {
    $params = ['id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Inserts a new resource into this collection. (liveChatMessages.insert)
   *
   * @param string|array $part The *part* parameter serves two purposes. It
   * identifies the properties that the write operation will set as well as the
   * properties that the API response will include. Set the parameter value to
   * snippet.
   * @param LiveChatMessage $postBody
   * @param array $optParams Optional parameters.
   * @return LiveChatMessage
   */
  public function insert($part, LiveChatMessage $postBody, $optParams = [])
  {
    $params = ['part' => $part, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], LiveChatMessage::class);
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
   * @return LiveChatMessageListResponse
   */
  public function listLiveChatMessages($liveChatId, $part, $optParams = [])
  {
    $params = ['liveChatId' => $liveChatId, 'part' => $part];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], LiveChatMessageListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveChatMessages::class, 'Google_Service_YouTube_Resource_LiveChatMessages');
