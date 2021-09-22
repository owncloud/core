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

namespace Google\Service\SQLAdmin;

class SqlScheduledMaintenance extends \Google\Model
{
  public $canDefer;
  public $canReschedule;
  public $scheduleDeadlineTime;
  public $startTime;

  public function setCanDefer($canDefer)
  {
    $this->canDefer = $canDefer;
  }
  public function getCanDefer()
  {
    return $this->canDefer;
  }
  public function setCanReschedule($canReschedule)
  {
    $this->canReschedule = $canReschedule;
  }
  public function getCanReschedule()
  {
    return $this->canReschedule;
  }
  public function setScheduleDeadlineTime($scheduleDeadlineTime)
  {
    $this->scheduleDeadlineTime = $scheduleDeadlineTime;
  }
  public function getScheduleDeadlineTime()
  {
    return $this->scheduleDeadlineTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SqlScheduledMaintenance::class, 'Google_Service_SQLAdmin_SqlScheduledMaintenance');
