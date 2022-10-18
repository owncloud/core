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

class VideoContentSearchSpanDolphinScoresSpanCandidate extends \Google\Model
{
  protected $asrConfidenceStatsType = VideoContentSearchMetricStats::class;
  protected $asrConfidenceStatsDataType = '';
  protected $scoreStatsType = VideoContentSearchMetricStats::class;
  protected $scoreStatsDataType = '';
  /**
   * @var string
   */
  public $sourcePassage;
  /**
   * @var string
   */
  public $text;
  /**
   * @var string
   */
  public $timeMs;

  /**
   * @param VideoContentSearchMetricStats
   */
  public function setAsrConfidenceStats(VideoContentSearchMetricStats $asrConfidenceStats)
  {
    $this->asrConfidenceStats = $asrConfidenceStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getAsrConfidenceStats()
  {
    return $this->asrConfidenceStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setScoreStats(VideoContentSearchMetricStats $scoreStats)
  {
    $this->scoreStats = $scoreStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getScoreStats()
  {
    return $this->scoreStats;
  }
  /**
   * @param string
   */
  public function setSourcePassage($sourcePassage)
  {
    $this->sourcePassage = $sourcePassage;
  }
  /**
   * @return string
   */
  public function getSourcePassage()
  {
    return $this->sourcePassage;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param string
   */
  public function setTimeMs($timeMs)
  {
    $this->timeMs = $timeMs;
  }
  /**
   * @return string
   */
  public function getTimeMs()
  {
    return $this->timeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchSpanDolphinScoresSpanCandidate::class, 'Google_Service_Contentwarehouse_VideoContentSearchSpanDolphinScoresSpanCandidate');
