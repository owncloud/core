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

namespace Google\Service\CloudTalentSolution;

class ClientEvent extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $eventId;
  /**
   * @var string
   */
  public $eventNotes;
  protected $jobEventType = JobEvent::class;
  protected $jobEventDataType = '';
  /**
   * @var string
   */
  public $requestId;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param string
   */
  public function setEventNotes($eventNotes)
  {
    $this->eventNotes = $eventNotes;
  }
  /**
   * @return string
   */
  public function getEventNotes()
  {
    return $this->eventNotes;
  }
  /**
   * @param JobEvent
   */
  public function setJobEvent(JobEvent $jobEvent)
  {
    $this->jobEvent = $jobEvent;
  }
  /**
   * @return JobEvent
   */
  public function getJobEvent()
  {
    return $this->jobEvent;
  }
  /**
   * @param string
   */
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  /**
   * @return string
   */
  public function getRequestId()
  {
    return $this->requestId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClientEvent::class, 'Google_Service_CloudTalentSolution_ClientEvent');
