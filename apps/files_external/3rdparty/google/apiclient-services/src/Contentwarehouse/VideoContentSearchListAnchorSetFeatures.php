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

class VideoContentSearchListAnchorSetFeatures extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregatedSpanText;
  protected $anchorSetSpanScoreStatsType = VideoContentSearchMetricStats::class;
  protected $anchorSetSpanScoreStatsDataType = '';
  protected $babelMatchScoreStatsType = VideoContentSearchMetricStats::class;
  protected $babelMatchScoreStatsDataType = '';
  protected $contextTokenCountStatsType = VideoContentSearchMetricStats::class;
  protected $contextTokenCountStatsDataType = '';
  /**
   * @var float
   */
  public $durationSpanRatio;
  protected $durationToPredictedTimeMsStatsType = VideoContentSearchMetricStats::class;
  protected $durationToPredictedTimeMsStatsDataType = '';
  /**
   * @var string
   */
  public $listAnchorSource;
  /**
   * @var int
   */
  public $listDescriptionItemsSize;
  /**
   * @var float
   */
  public $matchedListDescriptionAnchorsRatio;
  /**
   * @var int
   */
  public $matchedListDescriptionAnchorsSize;
  /**
   * @var int
   */
  public $postFilteringListDescriptionItemsSize;
  protected $pretriggerScoreStatsType = VideoContentSearchMetricStats::class;
  protected $pretriggerScoreStatsDataType = '';
  protected $spanTokenCountRatioStatsType = VideoContentSearchMetricStats::class;
  protected $spanTokenCountRatioStatsDataType = '';
  protected $spanTokenCountStatsType = VideoContentSearchMetricStats::class;
  protected $spanTokenCountStatsDataType = '';

  /**
   * @param string
   */
  public function setAggregatedSpanText($aggregatedSpanText)
  {
    $this->aggregatedSpanText = $aggregatedSpanText;
  }
  /**
   * @return string
   */
  public function getAggregatedSpanText()
  {
    return $this->aggregatedSpanText;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setAnchorSetSpanScoreStats(VideoContentSearchMetricStats $anchorSetSpanScoreStats)
  {
    $this->anchorSetSpanScoreStats = $anchorSetSpanScoreStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getAnchorSetSpanScoreStats()
  {
    return $this->anchorSetSpanScoreStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setBabelMatchScoreStats(VideoContentSearchMetricStats $babelMatchScoreStats)
  {
    $this->babelMatchScoreStats = $babelMatchScoreStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getBabelMatchScoreStats()
  {
    return $this->babelMatchScoreStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setContextTokenCountStats(VideoContentSearchMetricStats $contextTokenCountStats)
  {
    $this->contextTokenCountStats = $contextTokenCountStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getContextTokenCountStats()
  {
    return $this->contextTokenCountStats;
  }
  /**
   * @param float
   */
  public function setDurationSpanRatio($durationSpanRatio)
  {
    $this->durationSpanRatio = $durationSpanRatio;
  }
  /**
   * @return float
   */
  public function getDurationSpanRatio()
  {
    return $this->durationSpanRatio;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setDurationToPredictedTimeMsStats(VideoContentSearchMetricStats $durationToPredictedTimeMsStats)
  {
    $this->durationToPredictedTimeMsStats = $durationToPredictedTimeMsStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getDurationToPredictedTimeMsStats()
  {
    return $this->durationToPredictedTimeMsStats;
  }
  /**
   * @param string
   */
  public function setListAnchorSource($listAnchorSource)
  {
    $this->listAnchorSource = $listAnchorSource;
  }
  /**
   * @return string
   */
  public function getListAnchorSource()
  {
    return $this->listAnchorSource;
  }
  /**
   * @param int
   */
  public function setListDescriptionItemsSize($listDescriptionItemsSize)
  {
    $this->listDescriptionItemsSize = $listDescriptionItemsSize;
  }
  /**
   * @return int
   */
  public function getListDescriptionItemsSize()
  {
    return $this->listDescriptionItemsSize;
  }
  /**
   * @param float
   */
  public function setMatchedListDescriptionAnchorsRatio($matchedListDescriptionAnchorsRatio)
  {
    $this->matchedListDescriptionAnchorsRatio = $matchedListDescriptionAnchorsRatio;
  }
  /**
   * @return float
   */
  public function getMatchedListDescriptionAnchorsRatio()
  {
    return $this->matchedListDescriptionAnchorsRatio;
  }
  /**
   * @param int
   */
  public function setMatchedListDescriptionAnchorsSize($matchedListDescriptionAnchorsSize)
  {
    $this->matchedListDescriptionAnchorsSize = $matchedListDescriptionAnchorsSize;
  }
  /**
   * @return int
   */
  public function getMatchedListDescriptionAnchorsSize()
  {
    return $this->matchedListDescriptionAnchorsSize;
  }
  /**
   * @param int
   */
  public function setPostFilteringListDescriptionItemsSize($postFilteringListDescriptionItemsSize)
  {
    $this->postFilteringListDescriptionItemsSize = $postFilteringListDescriptionItemsSize;
  }
  /**
   * @return int
   */
  public function getPostFilteringListDescriptionItemsSize()
  {
    return $this->postFilteringListDescriptionItemsSize;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setPretriggerScoreStats(VideoContentSearchMetricStats $pretriggerScoreStats)
  {
    $this->pretriggerScoreStats = $pretriggerScoreStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getPretriggerScoreStats()
  {
    return $this->pretriggerScoreStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setSpanTokenCountRatioStats(VideoContentSearchMetricStats $spanTokenCountRatioStats)
  {
    $this->spanTokenCountRatioStats = $spanTokenCountRatioStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getSpanTokenCountRatioStats()
  {
    return $this->spanTokenCountRatioStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setSpanTokenCountStats(VideoContentSearchMetricStats $spanTokenCountStats)
  {
    $this->spanTokenCountStats = $spanTokenCountStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getSpanTokenCountStats()
  {
    return $this->spanTokenCountStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchListAnchorSetFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchListAnchorSetFeatures');
