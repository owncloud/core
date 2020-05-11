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

class Google_Service_Monitoring_WindowsBasedSli extends Google_Model
{
  public $goodBadMetricFilter;
  protected $goodTotalRatioThresholdType = 'Google_Service_Monitoring_PerformanceThreshold';
  protected $goodTotalRatioThresholdDataType = '';
  protected $metricMeanInRangeType = 'Google_Service_Monitoring_MetricRange';
  protected $metricMeanInRangeDataType = '';
  protected $metricSumInRangeType = 'Google_Service_Monitoring_MetricRange';
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
   * @param Google_Service_Monitoring_PerformanceThreshold
   */
  public function setGoodTotalRatioThreshold(Google_Service_Monitoring_PerformanceThreshold $goodTotalRatioThreshold)
  {
    $this->goodTotalRatioThreshold = $goodTotalRatioThreshold;
  }
  /**
   * @return Google_Service_Monitoring_PerformanceThreshold
   */
  public function getGoodTotalRatioThreshold()
  {
    return $this->goodTotalRatioThreshold;
  }
  /**
   * @param Google_Service_Monitoring_MetricRange
   */
  public function setMetricMeanInRange(Google_Service_Monitoring_MetricRange $metricMeanInRange)
  {
    $this->metricMeanInRange = $metricMeanInRange;
  }
  /**
   * @return Google_Service_Monitoring_MetricRange
   */
  public function getMetricMeanInRange()
  {
    return $this->metricMeanInRange;
  }
  /**
   * @param Google_Service_Monitoring_MetricRange
   */
  public function setMetricSumInRange(Google_Service_Monitoring_MetricRange $metricSumInRange)
  {
    $this->metricSumInRange = $metricSumInRange;
  }
  /**
   * @return Google_Service_Monitoring_MetricRange
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
