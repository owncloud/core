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

class Google_Service_MyBusinessLodging_Business extends Google_Model
{
  public $businessCenter;
  public $businessCenterException;
  public $meetingRooms;
  public $meetingRoomsCount;
  public $meetingRoomsCountException;
  public $meetingRoomsException;

  public function setBusinessCenter($businessCenter)
  {
    $this->businessCenter = $businessCenter;
  }
  public function getBusinessCenter()
  {
    return $this->businessCenter;
  }
  public function setBusinessCenterException($businessCenterException)
  {
    $this->businessCenterException = $businessCenterException;
  }
  public function getBusinessCenterException()
  {
    return $this->businessCenterException;
  }
  public function setMeetingRooms($meetingRooms)
  {
    $this->meetingRooms = $meetingRooms;
  }
  public function getMeetingRooms()
  {
    return $this->meetingRooms;
  }
  public function setMeetingRoomsCount($meetingRoomsCount)
  {
    $this->meetingRoomsCount = $meetingRoomsCount;
  }
  public function getMeetingRoomsCount()
  {
    return $this->meetingRoomsCount;
  }
  public function setMeetingRoomsCountException($meetingRoomsCountException)
  {
    $this->meetingRoomsCountException = $meetingRoomsCountException;
  }
  public function getMeetingRoomsCountException()
  {
    return $this->meetingRoomsCountException;
  }
  public function setMeetingRoomsException($meetingRoomsException)
  {
    $this->meetingRoomsException = $meetingRoomsException;
  }
  public function getMeetingRoomsException()
  {
    return $this->meetingRoomsException;
  }
}
