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

class MetricRange extends \Google\Model
{
  protected $rangeType = GoogleMonitoringV3Range::class;
  protected $rangeDataType = '';
  /**
   * @var string
   */
  public $timeSeries;

  /**
   * @param GoogleMonitoringV3Range
   */
  public function setRange(GoogleMonitoringV3Range $range)
  {
    $this->range = $range;
  }
  /**
   * @return GoogleMonitoringV3Range
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param string
   */
  public function setTimeSeries($timeSeries)
  {
    $this->timeSeries = $timeSeries;
  }
  /**
   * @return string
   */
  public function getTimeSeries()
  {
    return $this->timeSeries;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MetricRange::class, 'Google_Service_Monitoring_MetricRange');
