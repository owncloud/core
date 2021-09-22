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

namespace Google\Service\FirebaseCloudMessaging\Resource;

use Google\Service\FirebaseCloudMessaging\Message;
use Google\Service\FirebaseCloudMessaging\SendMessageRequest;

/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fcmService = new Google\Service\FirebaseCloudMessaging(...);
 *   $messages = $fcmService->messages;
 *  </code>
 */
class ProjectsMessages extends \Google\Service\Resource
{
  /**
   * Send a message to specified target (a registration token, topic or
   * condition). (messages.send)
   *
   * @param string $parent Required. It contains the Firebase project id (i.e. the
   * unique identifier for your Firebase project), in the format of
   * `projects/{project_id}`. For legacy support, the numeric project number with
   * no padding is also supported in the format of `projects/{project_number}`.
   * @param SendMessageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Message
   */
  public function send($parent, SendMessageRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('send', [$params], Message::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsMessages::class, 'Google_Service_FirebaseCloudMessaging_Resource_ProjectsMessages');
