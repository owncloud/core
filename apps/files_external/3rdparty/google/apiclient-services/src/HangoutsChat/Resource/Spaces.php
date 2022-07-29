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

namespace Google\Service\HangoutsChat\Resource;

use Google\Service\HangoutsChat\ListSpacesResponse;
use Google\Service\HangoutsChat\Message;
use Google\Service\HangoutsChat\Space;

/**
 * The "spaces" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google\Service\HangoutsChat(...);
 *   $spaces = $chatService->spaces;
 *  </code>
 */
class Spaces extends \Google\Service\Resource
{
  /**
   * Returns a space. Requires [service account
   * authentication](https://developers.google.com/chat/api/guides/auth/service-
   * accounts). (spaces.get)
   *
   * @param string $name Required. Resource name of the space, in the form
   * "spaces". Format: spaces/{space}
   * @param array $optParams Optional parameters.
   * @return Space
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Space::class);
  }
  /**
   * Lists spaces the caller is a member of. Requires [service account
   * authentication](https://developers.google.com/chat/api/guides/auth/service-
   * accounts). (spaces.listSpaces)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. The value is capped at
   * 1000. Server may return fewer results than requested. If unspecified, server
   * will default to 100.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return.
   * @return ListSpacesResponse
   */
  public function listSpaces($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSpacesResponse::class);
  }
  /**
   * Legacy path for creating message. Calling these will result in a BadRequest
   * response. (spaces.webhooks)
   *
   * @param string $parent Required. Space resource name, in the form "spaces".
   * Example: spaces/AAAAAAAAAAA
   * @param Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID for this message.
   * Specifying an existing request ID returns the message created with that ID
   * instead of creating a new message.
   * @opt_param string threadKey Optional. Opaque thread identifier. To start or
   * add to a thread, create a message and specify a `threadKey` instead of
   * thread.name. (Setting thread.name has no effect.) The first message with a
   * given `threadKey` starts a new thread. Subsequent messages with the same
   * `threadKey` post into the same thread.
   * @return Message
   */
  public function webhooks($parent, Message $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('webhooks', [$params], Message::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Spaces::class, 'Google_Service_HangoutsChat_Resource_Spaces');
