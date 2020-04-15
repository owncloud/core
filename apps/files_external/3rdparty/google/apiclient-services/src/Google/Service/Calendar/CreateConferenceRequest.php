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

class Google_Service_Calendar_CreateConferenceRequest extends Google_Model
{
  protected $conferenceSolutionKeyType = 'Google_Service_Calendar_ConferenceSolutionKey';
  protected $conferenceSolutionKeyDataType = '';
  public $requestId;
  protected $statusType = 'Google_Service_Calendar_ConferenceRequestStatus';
  protected $statusDataType = '';

  /**
   * @param Google_Service_Calendar_ConferenceSolutionKey
   */
  public function setConferenceSolutionKey(Google_Service_Calendar_ConferenceSolutionKey $conferenceSolutionKey)
  {
    $this->conferenceSolutionKey = $conferenceSolutionKey;
  }
  /**
   * @return Google_Service_Calendar_ConferenceSolutionKey
   */
  public function getConferenceSolutionKey()
  {
    return $this->conferenceSolutionKey;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
  /**
   * @param Google_Service_Calendar_ConferenceRequestStatus
   */
  public function setStatus(Google_Service_Calendar_ConferenceRequestStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_Calendar_ConferenceRequestStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}
