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

namespace Google\Service\Contentwarehouse;

class VideoContentSearchAnchorsCommonFeatureSet extends \Google\Model
{
  protected $dolphinDescriptivenessStatsType = VideoContentSearchMetricStats::class;
  protected $dolphinDescriptivenessStatsDataType = '';
  protected $dolphinUsefulnessStatsType = VideoContentSearchMetricStats::class;
  protected $dolphinUsefulnessStatsDataType = '';
  protected $mumDescriptivenessStatsType = VideoContentSearchMetricStats::class;
  protected $mumDescriptivenessStatsDataType = '';
  protected $mumUsefulnessStatsType = VideoContentSearchMetricStats::class;
  protected $mumUsefulnessStatsDataType = '';

  /**
   * @param VideoContentSearchMetricStats
   */
  public function setDolphinDescriptivenessStats(VideoContentSearchMetricStats $dolphinDescriptivenessStats)
  {
    $this->dolphinDescriptivenessStats = $dolphinDescriptivenessStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getDolphinDescriptivenessStats()
  {
    return $this->dolphinDescriptivenessStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setDolphinUsefulnessStats(VideoContentSearchMetricStats $dolphinUsefulnessStats)
  {
    $this->dolphinUsefulnessStats = $dolphinUsefulnessStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getDolphinUsefulnessStats()
  {
    return $this->dolphinUsefulnessStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setMumDescriptivenessStats(VideoContentSearchMetricStats $mumDescriptivenessStats)
  {
    $this->mumDescriptivenessStats = $mumDescriptivenessStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getMumDescriptivenessStats()
  {
    return $this->mumDescriptivenessStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setMumUsefulnessStats(VideoContentSearchMetricStats $mumUsefulnessStats)
  {
    $this->mumUsefulnessStats = $mumUsefulnessStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getMumUsefulnessStats()
  {
    return $this->mumUsefulnessStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchAnchorsCommonFeatureSet::class, 'Google_Service_Contentwarehouse_VideoContentSearchAnchorsCommonFeatureSet');
