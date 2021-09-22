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

namespace Google\Service\Genomics;

class CheckInRequest extends \Google\Collection
{
  protected $collection_key = 'events';
  protected $deadlineExpiredType = GenomicsEmpty::class;
  protected $deadlineExpiredDataType = '';
  public $event;
  protected $eventsType = TimestampedEvent::class;
  protected $eventsDataType = 'array';
  protected $resultType = Status::class;
  protected $resultDataType = '';
  public $sosReport;
  protected $workerStatusType = WorkerStatus::class;
  protected $workerStatusDataType = '';

  /**
   * @param GenomicsEmpty
   */
  public function setDeadlineExpired(GenomicsEmpty $deadlineExpired)
  {
    $this->deadlineExpired = $deadlineExpired;
  }
  /**
   * @return GenomicsEmpty
   */
  public function getDeadlineExpired()
  {
    return $this->deadlineExpired;
  }
  public function setEvent($event)
  {
    $this->event = $event;
  }
  public function getEvent()
  {
    return $this->event;
  }
  /**
   * @param TimestampedEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return TimestampedEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param Status
   */
  public function setResult(Status $result)
  {
    $this->result = $result;
  }
  /**
   * @return Status
   */
  public function getResult()
  {
    return $this->result;
  }
  public function setSosReport($sosReport)
  {
    $this->sosReport = $sosReport;
  }
  public function getSosReport()
  {
    return $this->sosReport;
  }
  /**
   * @param WorkerStatus
   */
  public function setWorkerStatus(WorkerStatus $workerStatus)
  {
    $this->workerStatus = $workerStatus;
  }
  /**
   * @return WorkerStatus
   */
  public function getWorkerStatus()
  {
    return $this->workerStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckInRequest::class, 'Google_Service_Genomics_CheckInRequest');
