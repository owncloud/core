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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_DailyCycle extends Google_Model
{
  public $duration;
  protected $startTimeType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TimeOfDay';
  protected $startTimeDataType = '';

  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TimeOfDay
   */
  public function setStartTime(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TimeOfDay $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_TimeOfDay
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}
