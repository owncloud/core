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

namespace Google\Service\MyBusinessLodging;

class Business extends \Google\Model
{
  /**
   * @var bool
   */
  public $businessCenter;
  /**
   * @var string
   */
  public $businessCenterException;
  /**
   * @var bool
   */
  public $meetingRooms;
  /**
   * @var int
   */
  public $meetingRoomsCount;
  /**
   * @var string
   */
  public $meetingRoomsCountException;
  /**
   * @var string
   */
  public $meetingRoomsException;

  /**
   * @param bool
   */
  public function setBusinessCenter($businessCenter)
  {
    $this->businessCenter = $businessCenter;
  }
  /**
   * @return bool
   */
  public function getBusinessCenter()
  {
    return $this->businessCenter;
  }
  /**
   * @param string
   */
  public function setBusinessCenterException($businessCenterException)
  {
    $this->businessCenterException = $businessCenterException;
  }
  /**
   * @return string
   */
  public function getBusinessCenterException()
  {
    return $this->businessCenterException;
  }
  /**
   * @param bool
   */
  public function setMeetingRooms($meetingRooms)
  {
    $this->meetingRooms = $meetingRooms;
  }
  /**
   * @return bool
   */
  public function getMeetingRooms()
  {
    return $this->meetingRooms;
  }
  /**
   * @param int
   */
  public function setMeetingRoomsCount($meetingRoomsCount)
  {
    $this->meetingRoomsCount = $meetingRoomsCount;
  }
  /**
   * @return int
   */
  public function getMeetingRoomsCount()
  {
    return $this->meetingRoomsCount;
  }
  /**
   * @param string
   */
  public function setMeetingRoomsCountException($meetingRoomsCountException)
  {
    $this->meetingRoomsCountException = $meetingRoomsCountException;
  }
  /**
   * @return string
   */
  public function getMeetingRoomsCountException()
  {
    return $this->meetingRoomsCountException;
  }
  /**
   * @param string
   */
  public function setMeetingRoomsException($meetingRoomsException)
  {
    $this->meetingRoomsException = $meetingRoomsException;
  }
  /**
   * @return string
   */
  public function getMeetingRoomsException()
  {
    return $this->meetingRoomsException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Business::class, 'Google_Service_MyBusinessLodging_Business');
