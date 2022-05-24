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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1ScheduleSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $nextJobTime;
  /**
   * @var string
   */
  public $schedule;
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param string
   */
  public function setNextJobTime($nextJobTime)
  {
    $this->nextJobTime = $nextJobTime;
  }
  /**
   * @return string
   */
  public function getNextJobTime()
  {
    return $this->nextJobTime;
  }
  /**
   * @param string
   */
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return string
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1ScheduleSpec::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1ScheduleSpec');
