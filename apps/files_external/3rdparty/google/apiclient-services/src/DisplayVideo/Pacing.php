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

class Pacing extends \Google\Model
{
  /**
   * @var string
   */
  public $dailyMaxImpressions;
  /**
   * @var string
   */
  public $dailyMaxMicros;
  /**
   * @var string
   */
  public $pacingPeriod;
  /**
   * @var string
   */
  public $pacingType;

  /**
   * @param string
   */
  public function setDailyMaxImpressions($dailyMaxImpressions)
  {
    $this->dailyMaxImpressions = $dailyMaxImpressions;
  }
  /**
   * @return string
   */
  public function getDailyMaxImpressions()
  {
    return $this->dailyMaxImpressions;
  }
  /**
   * @param string
   */
  public function setDailyMaxMicros($dailyMaxMicros)
  {
    $this->dailyMaxMicros = $dailyMaxMicros;
  }
  /**
   * @return string
   */
  public function getDailyMaxMicros()
  {
    return $this->dailyMaxMicros;
  }
  /**
   * @param string
   */
  public function setPacingPeriod($pacingPeriod)
  {
    $this->pacingPeriod = $pacingPeriod;
  }
  /**
   * @return string
   */
  public function getPacingPeriod()
  {
    return $this->pacingPeriod;
  }
  /**
   * @param string
   */
  public function setPacingType($pacingType)
  {
    $this->pacingType = $pacingType;
  }
  /**
   * @return string
   */
  public function getPacingType()
  {
    return $this->pacingType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pacing::class, 'Google_Service_DisplayVideo_Pacing');
