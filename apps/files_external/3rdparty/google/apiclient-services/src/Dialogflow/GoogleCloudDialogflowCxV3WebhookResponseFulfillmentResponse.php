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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse extends \Google\Collection
{
  protected $collection_key = 'messages';
  /**
   * @var string
   */
  public $mergeBehavior;
  protected $messagesType = GoogleCloudDialogflowCxV3ResponseMessage::class;
  protected $messagesDataType = 'array';

  /**
   * @param string
   */
  public function setMergeBehavior($mergeBehavior)
  {
    $this->mergeBehavior = $mergeBehavior;
  }
  /**
   * @return string
   */
  public function getMergeBehavior()
  {
    return $this->mergeBehavior;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookResponseFulfillmentResponse');
