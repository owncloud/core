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

namespace Google\Service\Contentwarehouse;

class EventIdMessage extends \Google\Model
{
  /**
   * @var string
   */
  public $processId;
  /**
   * @var string
   */
  public $serverIp;
  /**
   * @var string
   */
  public $timeUsec;

  /**
   * @param string
   */
  public function setProcessId($processId)
  {
    $this->processId = $processId;
  }
  /**
   * @return string
   */
  public function getProcessId()
  {
    return $this->processId;
  }
  /**
   * @param string
   */
  public function setServerIp($serverIp)
  {
    $this->serverIp = $serverIp;
  }
  /**
   * @return string
   */
  public function getServerIp()
  {
    return $this->serverIp;
  }
  /**
   * @param string
   */
  public function setTimeUsec($timeUsec)
  {
    $this->timeUsec = $timeUsec;
  }
  /**
   * @return string
   */
  public function getTimeUsec()
  {
    return $this->timeUsec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EventIdMessage::class, 'Google_Service_Contentwarehouse_EventIdMessage');
