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

class Google_Service_FirebaseManagement_StatusProto extends Google_Model
{
  public $canonicalCode;
  public $code;
  public $message;
  protected $messageSetType = 'Google_Service_FirebaseManagement_MessageSet';
  protected $messageSetDataType = '';
  protected $payloadType = 'Google_Service_FirebaseManagement_TypedMessage';
  protected $payloadDataType = '';
  public $space;

  public function setCanonicalCode($canonicalCode)
  {
    $this->canonicalCode = $canonicalCode;
  }
  public function getCanonicalCode()
  {
    return $this->canonicalCode;
  }
  public function setCode($code)
  {
    $this->code = $code;
  }
  public function getCode()
  {
    return $this->code;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param Google_Service_FirebaseManagement_MessageSet
   */
  public function setMessageSet(Google_Service_FirebaseManagement_MessageSet $messageSet)
  {
    $this->messageSet = $messageSet;
  }
  /**
   * @return Google_Service_FirebaseManagement_MessageSet
   */
  public function getMessageSet()
  {
    return $this->messageSet;
  }
  /**
   * @param Google_Service_FirebaseManagement_TypedMessage
   */
  public function setPayload(Google_Service_FirebaseManagement_TypedMessage $payload)
  {
    $this->payload = $payload;
  }
  /**
   * @return Google_Service_FirebaseManagement_TypedMessage
   */
  public function getPayload()
  {
    return $this->payload;
  }
  public function setSpace($space)
  {
    $this->space = $space;
  }
  public function getSpace()
  {
    return $this->space;
  }
}
