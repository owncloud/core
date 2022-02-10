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

namespace Google\Service\BigQueryDataTransfer;

class TransferMessage extends \Google\Model
{
  /**
   * @var string
   */
  public $messageText;
  /**
   * @var string
   */
  public $messageTime;
  /**
   * @var string
   */
  public $severity;

  /**
   * @param string
   */
  public function setMessageText($messageText)
  {
    $this->messageText = $messageText;
  }
  /**
   * @return string
   */
  public function getMessageText()
  {
    return $this->messageText;
  }
  /**
   * @param string
   */
  public function setMessageTime($messageTime)
  {
    $this->messageTime = $messageTime;
  }
  /**
   * @return string
   */
  public function getMessageTime()
  {
    return $this->messageTime;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransferMessage::class, 'Google_Service_BigQueryDataTransfer_TransferMessage');
