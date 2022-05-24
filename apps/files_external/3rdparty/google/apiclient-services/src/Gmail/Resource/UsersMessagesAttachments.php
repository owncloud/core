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

namespace Google\Service\Gmail\Resource;

use Google\Service\Gmail\MessagePartBody;

/**
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $attachments = $gmailService->attachments;
 *  </code>
 */
class UsersMessagesAttachments extends \Google\Service\Resource
{
  /**
   * Gets the specified message attachment. (attachments.get)
   *
   * @param string $userId The user's email address. The special value `me` can be
   * used to indicate the authenticated user.
   * @param string $messageId The ID of the message containing the attachment.
   * @param string $id The ID of the attachment.
   * @param array $optParams Optional parameters.
   * @return MessagePartBody
   */
  public function get($userId, $messageId, $id, $optParams = [])
  {
    $params = ['userId' => $userId, 'messageId' => $messageId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MessagePartBody::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersMessagesAttachments::class, 'Google_Service_Gmail_Resource_UsersMessagesAttachments');
