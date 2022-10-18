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

class VideoContentSearchListTrainingDataSetFeatures extends \Google\Model
{
  protected $editDistanceRatioStatsType = VideoContentSearchMetricStats::class;
  protected $editDistanceRatioStatsDataType = '';
  protected $editDistanceStatsType = VideoContentSearchMetricStats::class;
  protected $editDistanceStatsDataType = '';
  protected $matchedDescriptionAnchorsTimegapStatsType = VideoContentSearchMetricStats::class;
  protected $matchedDescriptionAnchorsTimegapStatsDataType = '';
  /**
   * @var int
   */
  public $numDescriptionAnchors;

  /**
   * @param VideoContentSearchMetricStats
   */
  public function setEditDistanceRatioStats(VideoContentSearchMetricStats $editDistanceRatioStats)
  {
    $this->editDistanceRatioStats = $editDistanceRatioStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getEditDistanceRatioStats()
  {
    return $this->editDistanceRatioStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setEditDistanceStats(VideoContentSearchMetricStats $editDistanceStats)
  {
    $this->editDistanceStats = $editDistanceStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getEditDistanceStats()
  {
    return $this->editDistanceStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setMatchedDescriptionAnchorsTimegapStats(VideoContentSearchMetricStats $matchedDescriptionAnchorsTimegapStats)
  {
    $this->matchedDescriptionAnchorsTimegapStats = $matchedDescriptionAnchorsTimegapStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getMatchedDescriptionAnchorsTimegapStats()
  {
    return $this->matchedDescriptionAnchorsTimegapStats;
  }
  /**
   * @param int
   */
  public function setNumDescriptionAnchors($numDescriptionAnchors)
  {
    $this->numDescriptionAnchors = $numDescriptionAnchors;
  }
  /**
   * @return int
   */
  public function getNumDescriptionAnchors()
  {
    return $this->numDescriptionAnchors;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchListTrainingDataSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchListTrainingDataSetFeatures');
