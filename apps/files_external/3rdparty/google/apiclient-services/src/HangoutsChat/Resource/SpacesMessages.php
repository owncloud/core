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

use Google\Service\HangoutsChat\ChatEmpty;
use Google\Service\HangoutsChat\Message;

/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google\Service\HangoutsChat(...);
 *   $messages = $chatService->messages;
 *  </code>
 */
class SpacesMessages extends \Google\Service\Resource
{
  /**
   * Creates a message. (messages.create)
   *
   * @param string $parent Required. Space resource name, in the form "spaces".
   * Example: spaces/AAAAAAAAAAA
   * @param Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID for this message.
   * If a message has already been created in the space with this request ID, the
   * subsequent request will return the existing message and no new message will
   * be created.
   * @opt_param string threadKey Optional. Opaque thread identifier string that
   * can be specified to group messages into a single thread. If this is the first
   * message with a given thread identifier, a new thread is created. Subsequent
   * messages with the same thread identifier will be posted into the same thread.
   * This relieves bots and webhooks from having to store the Google Chat thread
   * ID of a thread (created earlier by them) to post further updates to it. Has
   * no effect if thread field, corresponding to an existing thread, is set in
   * message.
   * @return Message
   */
  public function create($parent, Message $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Message::class);
  }
  /**
   * Deletes a message. (messages.delete)
   *
   * @param string $name Required. Resource name of the message to be deleted, in
   * the form "spaces/messages" Example:
   * spaces/AAAAAAAAAAA/messages/BBBBBBBBBBB.BBBBBBBBBBB
   * @param array $optParams Optional parameters.
   * @return ChatEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], ChatEmpty::class);
  }
  /**
   * Returns a message. (messages.get)
   *
   * @param string $name Required. Resource name of the message to be retrieved,
   * in the form "spaces/messages". Example:
   * spaces/AAAAAAAAAAA/messages/BBBBBBBBBBB.BBBBBBBBBBB
   * @param array $optParams Optional parameters.
   * @return Message
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Message::class);
  }
  /**
   * Updates a message. (messages.update)
   *
   * @param string $name Resource name in the form `spaces/messages`. Example:
   * `spaces/AAAAAAAAAAA/messages/BBBBBBBBBBB.BBBBBBBBBBB`
   * @param Message $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The field paths to be updated, comma
   * separated if there are multiple. Currently supported field paths: * text *
   * cards * gsuite_message_integration_render_data * attachment
   * @return Message
   */
  public function update($name, Message $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Message::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpacesMessages::class, 'Google_Service_HangoutsChat_Resource_SpacesMessages');
