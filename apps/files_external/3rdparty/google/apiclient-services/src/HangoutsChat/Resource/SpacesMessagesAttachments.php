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

use Google\Service\HangoutsChat\Attachment;

/**
 * The "attachments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google\Service\HangoutsChat(...);
 *   $attachments = $chatService->attachments;
 *  </code>
 */
class SpacesMessagesAttachments extends \Google\Service\Resource
{
  /**
   * Gets the metadata of a message attachment. The attachment data is fetched
   * using the media API. (attachments.get)
   *
   * @param string $name Required. Resource name of the attachment, in the form
   * "spaces/messages/attachments".
   * @param array $optParams Optional parameters.
   * @return Attachment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Attachment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpacesMessagesAttachments::class, 'Google_Service_HangoutsChat_Resource_SpacesMessagesAttachments');
