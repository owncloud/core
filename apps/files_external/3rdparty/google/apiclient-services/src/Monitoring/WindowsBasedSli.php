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

class WindowsBasedSli extends \Google\Model
{
  public $goodBadMetricFilter;
  protected $goodTotalRatioThresholdType = PerformanceThreshold::class;
  protected $goodTotalRatioThresholdDataType = '';
  protected $metricMeanInRangeType = MetricRange::class;
  protected $metricMeanInRangeDataType = '';
  protected $metricSumInRangeType = MetricRange::class;
  protected $metricSumInRangeDataType = '';
  public $windowPeriod;

  public function setGoodBadMetricFilter($goodBadMetricFilter)
  {
    $this->goodBadMetricFilter = $goodBadMetricFilter;
  }
  public function getGoodBadMetricFilter()
  {
    return $this->goodBadMetricFilter;
  }
  /**
   * @param PerformanceThreshold
   */
  public function setGoodTotalRatioThreshold(PerformanceThreshold $goodTotalRatioThreshold)
  {
    $this->goodTotalRatioThreshold = $goodTotalRatioThreshold;
  }
  /**
   * @return PerformanceThreshold
   */
  public function getGoodTotalRatioThreshold()
  {
    return $this->goodTotalRatioThreshold;
  }
  /**
   * @param MetricRange
   */
  public function setMetricMeanInRange(MetricRange $metricMeanInRange)
  {
    $this->metricMeanInRange = $metricMeanInRange;
  }
  /**
   * @return MetricRange
   */
  public function getMetricMeanInRange()
  {
    return $this->metricMeanInRange;
  }
  /**
   * @param MetricRange
   */
  public function setMetricSumInRange(MetricRange $metricSumInRange)
  {
    $this->metricSumInRange = $metricSumInRange;
  }
  /**
   * @return MetricRange
   */
  public function getMetricSumInRange()
  {
    return $this->metricSumInRange;
  }
  public function setWindowPeriod($windowPeriod)
  {
    $this->windowPeriod = $windowPeriod;
  }
  public function getWindowPeriod()
  {
    return $this->windowPeriod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WindowsBasedSli::class, 'Google_Service_Monitoring_WindowsBasedSli');
