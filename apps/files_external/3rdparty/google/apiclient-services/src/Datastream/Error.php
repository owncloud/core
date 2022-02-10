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

namespace Google\Service\Datastream;

class Error extends \Google\Model
{
  /**
   * @var string[]
   */
  public $details;
  /**
   * @var string
   */
  public $errorTime;
  /**
   * @var string
   */
  public $errorUuid;
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $reason;

  /**
   * @param string[]
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return string[]
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param string
   */
  public function setErrorTime($errorTime)
  {
    $this->errorTime = $errorTime;
  }
  /**
   * @return string
   */
  public function getErrorTime()
  {
    return $this->errorTime;
  }
  /**
   * @param string
   */
  public function setErrorUuid($errorUuid)
  {
    $this->errorUuid = $errorUuid;
  }
  /**
   * @return string
   */
  public function getErrorUuid()
  {
    return $this->errorUuid;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Error::class, 'Google_Service_Datastream_Error');
