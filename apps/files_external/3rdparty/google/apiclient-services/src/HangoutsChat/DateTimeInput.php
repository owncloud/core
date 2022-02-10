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

namespace Google\Service\HangoutsChat;

class DateTimeInput extends \Google\Model
{
  /**
   * @var bool
   */
  public $hasDate;
  /**
   * @var bool
   */
  public $hasTime;
  /**
   * @var string
   */
  public $msSinceEpoch;

  /**
   * @param bool
   */
  public function setHasDate($hasDate)
  {
    $this->hasDate = $hasDate;
  }
  /**
   * @return bool
   */
  public function getHasDate()
  {
    return $this->hasDate;
  }
  /**
   * @param bool
   */
  public function setHasTime($hasTime)
  {
    $this->hasTime = $hasTime;
  }
  /**
   * @return bool
   */
  public function getHasTime()
  {
    return $this->hasTime;
  }
  /**
   * @param string
   */
  public function setMsSinceEpoch($msSinceEpoch)
  {
    $this->msSinceEpoch = $msSinceEpoch;
  }
  /**
   * @return string
   */
  public function getMsSinceEpoch()
  {
    return $this->msSinceEpoch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DateTimeInput::class, 'Google_Service_HangoutsChat_DateTimeInput');
