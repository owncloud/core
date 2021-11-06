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

namespace Google\Service\DisplayVideo;

class FrequencyCap extends \Google\Model
{
  public $maxImpressions;
  public $timeUnit;
  public $timeUnitCount;
  public $unlimited;

  public function setMaxImpressions($maxImpressions)
  {
    $this->maxImpressions = $maxImpressions;
  }
  public function getMaxImpressions()
  {
    return $this->maxImpressions;
  }
  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
  public function setTimeUnitCount($timeUnitCount)
  {
    $this->timeUnitCount = $timeUnitCount;
  }
  public function getTimeUnitCount()
  {
    return $this->timeUnitCount;
  }
  public function setUnlimited($unlimited)
  {
    $this->unlimited = $unlimited;
  }
  public function getUnlimited()
  {
    return $this->unlimited;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FrequencyCap::class, 'Google_Service_DisplayVideo_FrequencyCap');
