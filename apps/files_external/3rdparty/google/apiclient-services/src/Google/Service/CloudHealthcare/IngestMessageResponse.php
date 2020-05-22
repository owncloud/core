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

class Google_Service_CloudHealthcare_IngestMessageResponse extends Google_Model
{
  public $hl7Ack;
  protected $messageType = 'Google_Service_CloudHealthcare_Message';
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
   * @param Google_Service_CloudHealthcare_Message
   */
  public function setMessage(Google_Service_CloudHealthcare_Message $message)
  {
    $this->message = $message;
  }
  /**
   * @return Google_Service_CloudHealthcare_Message
   */
  public function getMessage()
  {
    return $this->message;
  }
}
