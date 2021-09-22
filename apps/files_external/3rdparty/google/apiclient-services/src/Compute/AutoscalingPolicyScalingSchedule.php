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

namespace Google\Service\Compute;

class AutoscalingPolicyScalingSchedule extends \Google\Model
{
  public $description;
  public $disabled;
  public $durationSec;
  public $minRequiredReplicas;
  public $schedule;
  public $timeZone;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setDurationSec($durationSec)
  {
    $this->durationSec = $durationSec;
  }
  public function getDurationSec()
  {
    return $this->durationSec;
  }
  public function setMinRequiredReplicas($minRequiredReplicas)
  {
    $this->minRequiredReplicas = $minRequiredReplicas;
  }
  public function getMinRequiredReplicas()
  {
    return $this->minRequiredReplicas;
  }
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingPolicyScalingSchedule::class, 'Google_Service_Compute_AutoscalingPolicyScalingSchedule');
