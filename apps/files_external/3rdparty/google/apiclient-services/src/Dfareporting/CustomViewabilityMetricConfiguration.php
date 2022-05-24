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

namespace Google\Service\Dfareporting;

class CustomViewabilityMetricConfiguration extends \Google\Model
{
  /**
   * @var bool
   */
  public $audible;
  /**
   * @var int
   */
  public $timeMillis;
  /**
   * @var int
   */
  public $timePercent;
  /**
   * @var int
   */
  public $viewabilityPercent;

  /**
   * @param bool
   */
  public function setAudible($audible)
  {
    $this->audible = $audible;
  }
  /**
   * @return bool
   */
  public function getAudible()
  {
    return $this->audible;
  }
  /**
   * @param int
   */
  public function setTimeMillis($timeMillis)
  {
    $this->timeMillis = $timeMillis;
  }
  /**
   * @return int
   */
  public function getTimeMillis()
  {
    return $this->timeMillis;
  }
  /**
   * @param int
   */
  public function setTimePercent($timePercent)
  {
    $this->timePercent = $timePercent;
  }
  /**
   * @return int
   */
  public function getTimePercent()
  {
    return $this->timePercent;
  }
  /**
   * @param int
   */
  public function setViewabilityPercent($viewabilityPercent)
  {
    $this->viewabilityPercent = $viewabilityPercent;
  }
  /**
   * @return int
   */
  public function getViewabilityPercent()
  {
    return $this->viewabilityPercent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomViewabilityMetricConfiguration::class, 'Google_Service_Dfareporting_CustomViewabilityMetricConfiguration');
