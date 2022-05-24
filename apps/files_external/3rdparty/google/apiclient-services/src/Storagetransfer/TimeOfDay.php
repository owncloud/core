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

namespace Google\Service\Storagetransfer;

class TimeOfDay extends \Google\Model
{
  /**
   * @var int
   */
  public $hours;
  /**
   * @var int
   */
  public $minutes;
  /**
   * @var int
   */
  public $nanos;
  /**
   * @var int
   */
  public $seconds;

  /**
   * @param int
   */
  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  /**
   * @return int
   */
  public function getHours()
  {
    return $this->hours;
  }
  /**
   * @param int
   */
  public function setMinutes($minutes)
  {
    $this->minutes = $minutes;
  }
  /**
   * @return int
   */
  public function getMinutes()
  {
    return $this->minutes;
  }
  /**
   * @param int
   */
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  /**
   * @return int
   */
  public function getNanos()
  {
    return $this->nanos;
  }
  /**
   * @param int
   */
  public function setSeconds($seconds)
  {
    $this->seconds = $seconds;
  }
  /**
   * @return int
   */
  public function getSeconds()
  {
    return $this->seconds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeOfDay::class, 'Google_Service_Storagetransfer_TimeOfDay');
