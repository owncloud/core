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

class GoogleInternalAppsWaldoV1alphaInMeeting extends \Google\Model
{
  /**
   * @var string
   */
  public $eventSummary;
  /**
   * @var string
   */
  public $inMeetingsUntil;
  /**
   * @var string
   */
  public $nextAvailable;
  /**
   * @var string
   */
  public $occupiedUntil;

  /**
   * @param string
   */
  public function setEventSummary($eventSummary)
  {
    $this->eventSummary = $eventSummary;
  }
  /**
   * @return string
   */
  public function getEventSummary()
  {
    return $this->eventSummary;
  }
  /**
   * @param string
   */
  public function setInMeetingsUntil($inMeetingsUntil)
  {
    $this->inMeetingsUntil = $inMeetingsUntil;
  }
  /**
   * @return string
   */
  public function getInMeetingsUntil()
  {
    return $this->inMeetingsUntil;
  }
  /**
   * @param string
   */
  public function setNextAvailable($nextAvailable)
  {
    $this->nextAvailable = $nextAvailable;
  }
  /**
   * @return string
   */
  public function getNextAvailable()
  {
    return $this->nextAvailable;
  }
  /**
   * @param string
   */
  public function setOccupiedUntil($occupiedUntil)
  {
    $this->occupiedUntil = $occupiedUntil;
  }
  /**
   * @return string
   */
  public function getOccupiedUntil()
  {
    return $this->occupiedUntil;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaInMeeting::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaInMeeting');
