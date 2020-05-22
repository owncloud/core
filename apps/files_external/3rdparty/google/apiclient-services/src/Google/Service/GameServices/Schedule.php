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

class Google_Service_GameServices_Schedule extends Google_Model
{
  public $cronJobDuration;
  public $cronSpec;
  public $endTime;
  public $startTime;

  public function setCronJobDuration($cronJobDuration)
  {
    $this->cronJobDuration = $cronJobDuration;
  }
  public function getCronJobDuration()
  {
    return $this->cronJobDuration;
  }
  public function setCronSpec($cronSpec)
  {
    $this->cronSpec = $cronSpec;
  }
  public function getCronSpec()
  {
    return $this->cronSpec;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
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
