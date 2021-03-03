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

class Google_Service_CloudTalentSolution_ClientEvent extends Google_Model
{
  public $createTime;
  public $eventId;
  public $eventNotes;
  protected $jobEventType = 'Google_Service_CloudTalentSolution_JobEvent';
  protected $jobEventDataType = '';
  public $requestId;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  public function getEventId()
  {
    return $this->eventId;
  }
  public function setEventNotes($eventNotes)
  {
    $this->eventNotes = $eventNotes;
  }
  public function getEventNotes()
  {
    return $this->eventNotes;
  }
  /**
   * @param Google_Service_CloudTalentSolution_JobEvent
   */
  public function setJobEvent(Google_Service_CloudTalentSolution_JobEvent $jobEvent)
  {
    $this->jobEvent = $jobEvent;
  }
  /**
   * @return Google_Service_CloudTalentSolution_JobEvent
   */
  public function getJobEvent()
  {
    return $this->jobEvent;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
}
