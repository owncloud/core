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

class Google_Service_Monitoring_PerformanceThreshold extends Google_Model
{
  protected $basicSliPerformanceType = 'Google_Service_Monitoring_BasicSli';
  protected $basicSliPerformanceDataType = '';
  protected $performanceType = 'Google_Service_Monitoring_RequestBasedSli';
  protected $performanceDataType = '';
  public $threshold;

  /**
   * @param Google_Service_Monitoring_BasicSli
   */
  public function setBasicSliPerformance(Google_Service_Monitoring_BasicSli $basicSliPerformance)
  {
    $this->basicSliPerformance = $basicSliPerformance;
  }
  /**
   * @return Google_Service_Monitoring_BasicSli
   */
  public function getBasicSliPerformance()
  {
    return $this->basicSliPerformance;
  }
  /**
   * @param Google_Service_Monitoring_RequestBasedSli
   */
  public function setPerformance(Google_Service_Monitoring_RequestBasedSli $performance)
  {
    $this->performance = $performance;
  }
  /**
   * @return Google_Service_Monitoring_RequestBasedSli
   */
  public function getPerformance()
  {
    return $this->performance;
  }
  public function setThreshold($threshold)
  {
    $this->threshold = $threshold;
  }
  public function getThreshold()
  {
    return $this->threshold;
  }
}
