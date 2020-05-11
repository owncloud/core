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

class Google_Service_FirebaseCloudMessaging_SendMessageRequest extends Google_Model
{
  protected $messageType = 'Google_Service_FirebaseCloudMessaging_Message';
  protected $messageDataType = '';
  public $validateOnly;

  /**
   * @param Google_Service_FirebaseCloudMessaging_Message
   */
  public function setMessage(Google_Service_FirebaseCloudMessaging_Message $message)
  {
    $this->message = $message;
  }
  /**
   * @return Google_Service_FirebaseCloudMessaging_Message
   */
  public function getMessage()
  {
    return $this->message;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
