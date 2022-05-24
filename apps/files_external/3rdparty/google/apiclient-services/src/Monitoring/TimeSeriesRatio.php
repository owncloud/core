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

namespace Google\Service\Monitoring;

class TimeSeriesRatio extends \Google\Model
{
  /**
   * @var string
   */
  public $badServiceFilter;
  /**
   * @var string
   */
  public $goodServiceFilter;
  /**
   * @var string
   */
  public $totalServiceFilter;

  /**
   * @param string
   */
  public function setBadServiceFilter($badServiceFilter)
  {
    $this->badServiceFilter = $badServiceFilter;
  }
  /**
   * @return string
   */
  public function getBadServiceFilter()
  {
    return $this->badServiceFilter;
  }
  /**
   * @param string
   */
  public function setGoodServiceFilter($goodServiceFilter)
  {
    $this->goodServiceFilter = $goodServiceFilter;
  }
  /**
   * @return string
   */
  public function getGoodServiceFilter()
  {
    return $this->goodServiceFilter;
  }
  /**
   * @param string
   */
  public function setTotalServiceFilter($totalServiceFilter)
  {
    $this->totalServiceFilter = $totalServiceFilter;
  }
  /**
   * @return string
   */
  public function getTotalServiceFilter()
  {
    return $this->totalServiceFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeSeriesRatio::class, 'Google_Service_Monitoring_TimeSeriesRatio');
