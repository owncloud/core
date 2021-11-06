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

namespace Google\Service\CloudHealthcare;

class IngestMessageResponse extends \Google\Model
{
  public $hl7Ack;
  protected $messageType = Message::class;
  protected $messageDataType = '';

  public function setHl7Ack($hl7Ack)
  {
    $this->hl7Ack = $hl7Ack;
  }
  public function getHl7Ack()
  {
    return $this->hl7Ack;
  }
  /**
   * @param Message
   */
  public function setMessage(Message $message)
  {
    $this->message = $message;
  }
  /**
   * @return Message
   */
  public function getMessage()
  {
    return $this->message;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IngestMessageResponse::class, 'Google_Service_CloudHealthcare_IngestMessageResponse');
