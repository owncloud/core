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

class Google_Service_Genomics_CheckInRequest extends Google_Collection
{
  protected $collection_key = 'events';
  protected $deadlineExpiredType = 'Google_Service_Genomics_GenomicsEmpty';
  protected $deadlineExpiredDataType = '';
  public $event;
  protected $eventsType = 'Google_Service_Genomics_TimestampedEvent';
  protected $eventsDataType = 'array';
  protected $resultType = 'Google_Service_Genomics_Status';
  protected $resultDataType = '';
  public $sosReport;
  protected $workerStatusType = 'Google_Service_Genomics_WorkerStatus';
  protected $workerStatusDataType = '';

  /**
   * @param Google_Service_Genomics_GenomicsEmpty
   */
  public function setDeadlineExpired(Google_Service_Genomics_GenomicsEmpty $deadlineExpired)
  {
    $this->deadlineExpired = $deadlineExpired;
  }
  /**
   * @return Google_Service_Genomics_GenomicsEmpty
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
   * @param Google_Service_Genomics_TimestampedEvent[]
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return Google_Service_Genomics_TimestampedEvent[]
   */
  public function getEvents()
  {
    return $this->events;
  }
  /**
   * @param Google_Service_Genomics_Status
   */
  public function setResult(Google_Service_Genomics_Status $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_Genomics_Status
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
   * @param Google_Service_Genomics_WorkerStatus
   */
  public function setWorkerStatus(Google_Service_Genomics_WorkerStatus $workerStatus)
  {
    $this->workerStatus = $workerStatus;
  }
  /**
   * @return Google_Service_Genomics_WorkerStatus
   */
  public function getWorkerStatus()
  {
    return $this->workerStatus;
  }
}
