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

class VideoContentSearchCaptionSpanAnchorFeatures extends \Google\Collection
{
  protected $collection_key = 'embeddingDistance';
  protected $dolphinFeaturesType = VideoContentSearchSpanDolphinFeatures::class;
  protected $dolphinFeaturesDataType = '';
  protected $dolphinScoresType = VideoContentSearchSpanDolphinScores::class;
  protected $dolphinScoresDataType = '';
  /**
   * @var float[]
   */
  public $embeddingDistance;
  /**
   * @var int
   */
  public $postGapInMs;
  /**
   * @var int
   */
  public $preGapInMs;
  /**
   * @var int
   */
  public $saftBeginTokenIndex;
  /**
   * @var int
   */
  public $saftEndTokenIndex;
  /**
   * @var int
   */
  public $saftTranscriptEndCharOffset;
  /**
   * @var int
   */
  public $saftTranscriptStartCharOffset;
  protected $spanAsrConfidenceStatsType = VideoContentSearchMetricStats::class;
  protected $spanAsrConfidenceStatsDataType = '';
  protected $spanDolphinScoreType = VideoContentSearchMetricStats::class;
  protected $spanDolphinScoreDataType = '';
  /**
   * @var int
   */
  public $wordCount;

  /**
   * @param VideoContentSearchSpanDolphinFeatures
   */
  public function setDolphinFeatures(VideoContentSearchSpanDolphinFeatures $dolphinFeatures)
  {
    $this->dolphinFeatures = $dolphinFeatures;
  }
  /**
   * @return VideoContentSearchSpanDolphinFeatures
   */
  public function getDolphinFeatures()
  {
    return $this->dolphinFeatures;
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
   * @param float[]
   */
  public function setEmbeddingDistance($embeddingDistance)
  {
    $this->embeddingDistance = $embeddingDistance;
  }
  /**
   * @return float[]
   */
  public function getEmbeddingDistance()
  {
    return $this->embeddingDistance;
  }
  /**
   * @param int
   */
  public function setPostGapInMs($postGapInMs)
  {
    $this->postGapInMs = $postGapInMs;
  }
  /**
   * @return int
   */
  public function getPostGapInMs()
  {
    return $this->postGapInMs;
  }
  /**
   * @param int
   */
  public function setPreGapInMs($preGapInMs)
  {
    $this->preGapInMs = $preGapInMs;
  }
  /**
   * @return int
   */
  public function getPreGapInMs()
  {
    return $this->preGapInMs;
  }
  /**
   * @param int
   */
  public function setSaftBeginTokenIndex($saftBeginTokenIndex)
  {
    $this->saftBeginTokenIndex = $saftBeginTokenIndex;
  }
  /**
   * @return int
   */
  public function getSaftBeginTokenIndex()
  {
    return $this->saftBeginTokenIndex;
  }
  /**
   * @param int
   */
  public function setSaftEndTokenIndex($saftEndTokenIndex)
  {
    $this->saftEndTokenIndex = $saftEndTokenIndex;
  }
  /**
   * @return int
   */
  public function getSaftEndTokenIndex()
  {
    return $this->saftEndTokenIndex;
  }
  /**
   * @param int
   */
  public function setSaftTranscriptEndCharOffset($saftTranscriptEndCharOffset)
  {
    $this->saftTranscriptEndCharOffset = $saftTranscriptEndCharOffset;
  }
  /**
   * @return int
   */
  public function getSaftTranscriptEndCharOffset()
  {
    return $this->saftTranscriptEndCharOffset;
  }
  /**
   * @param int
   */
  public function setSaftTranscriptStartCharOffset($saftTranscriptStartCharOffset)
  {
    $this->saftTranscriptStartCharOffset = $saftTranscriptStartCharOffset;
  }
  /**
   * @return int
   */
  public function getSaftTranscriptStartCharOffset()
  {
    return $this->saftTranscriptStartCharOffset;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setSpanAsrConfidenceStats(VideoContentSearchMetricStats $spanAsrConfidenceStats)
  {
    $this->spanAsrConfidenceStats = $spanAsrConfidenceStats;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getSpanAsrConfidenceStats()
  {
    return $this->spanAsrConfidenceStats;
  }
  /**
   * @param VideoContentSearchMetricStats
   */
  public function setSpanDolphinScore(VideoContentSearchMetricStats $spanDolphinScore)
  {
    $this->spanDolphinScore = $spanDolphinScore;
  }
  /**
   * @return VideoContentSearchMetricStats
   */
  public function getSpanDolphinScore()
  {
    return $this->spanDolphinScore;
  }
  /**
   * @param int
   */
  public function setWordCount($wordCount)
  {
    $this->wordCount = $wordCount;
  }
  /**
   * @return int
   */
  public function getWordCount()
  {
    return $this->wordCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchCaptionSpanAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchCaptionSpanAnchorFeatures');
