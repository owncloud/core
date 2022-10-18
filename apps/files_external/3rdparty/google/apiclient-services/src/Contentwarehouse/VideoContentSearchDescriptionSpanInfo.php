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

class VideoContentSearchDescriptionSpanInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $contextTokenCount;
  protected $dolphinScoresType = VideoContentSearchSpanDolphinScores::class;
  protected $dolphinScoresDataType = '';
  protected $spanDolphinScoreStatsType = VideoContentSearchMetricStats::class;
  protected $spanDolphinScoreStatsDataType = '';
  /**
   * @var int
   */
  public $spanTokenCount;
  /**
   * @var float
   */
  public $spanTokenCountRatio;

  /**
   * @param int
   */
  public function setContextTokenCount($contextTokenCount)
  {
    $this->contextTokenCount = $contextTokenCount;
  }
  /**
   * @return int
   */
  public function getContextTokenCount()
  {
    return $this->contextTokenCount;
  }
  /**
   * @param VideoContentSearchSpanDolphinScores
   */
  public function setDolphinScores(VideoContentSearchSpanDolphinScores $dolphinScores)
  {
    $this->dolphinScores = $dolphinScores;
  }
  /**
   * @return VideoContentSearchSpanDolphinScores
   */
  public function getDolphinScores()
  {
    return $this->dolphinScores;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setSpanDolphinScoreStats(VideoContentSearchMetricStats $spanDolphinScoreStats)
  {
    $this->spanDolphinScoreStats = $spanDolphinScoreStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getSpanDolphinScoreStats()
  {
    return $this->spanDolphinScoreStats;
  }
  /**
   * @param int
   */
  public function setSpanTokenCount($spanTokenCount)
  {
    $this->spanTokenCount = $spanTokenCount;
  }
  /**
   * @return int
   */
  public function getSpanTokenCount()
  {
    return $this->spanTokenCount;
  }
  /**
   * @param float
   */
  public function setSpanTokenCountRatio($spanTokenCountRatio)
  {
    $this->spanTokenCountRatio = $spanTokenCountRatio;
  }
  /**
   * @return float
   */
  public function getSpanTokenCountRatio()
  {
    return $this->spanTokenCountRatio;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchDescriptionSpanInfo::class, 'Google_Service_Contentwarehouse_VideoContentSearchDescriptionSpanInfo');
