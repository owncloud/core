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

class IndexingSignalAggregatorAggregatedScore extends \Google\Collection
{
  protected $collection_key = 'scores';
  public $deviation;
  public $m2;
  protected $maxScoreUrlType = IndexingSignalAggregatorUrlScore::class;
  protected $maxScoreUrlDataType = '';
  public $mean;
  public $meanScore;
  protected $minScoreUrlType = IndexingSignalAggregatorUrlScore::class;
  protected $minScoreUrlDataType = '';
  /**
   * @var string
   */
  public $numImportantUrls;
  /**
   * @var string
   */
  public $numUrlsMatched;
  /**
   * @var string
   */
  public $numUrlsWithSignal;
  /**
   * @var string
   */
  public $patternLayer;
  /**
   * @var string[]
   */
  public $patternsUsedInMediation;
  public $percentile;
  protected $runningMeanAndVarianceInternalStateType = IndexingSignalAggregatorRunningMeanAndVarianceInternalState::class;
  protected $runningMeanAndVarianceInternalStateDataType = '';
  protected $samplesType = IndexingSignalAggregatorUrlScore::class;
  protected $samplesDataType = 'array';
  public $scores;
  /**
   * @var int
   */
  public $signalId;
  protected $singleUrlScoreType = IndexingSignalAggregatorUrlScore::class;
  protected $singleUrlScoreDataType = '';
  public $totalScore;
  public $totalScoreLow;
  public $totalScoreSqr;
  public $totalScoreSqrLow;
  public $totalWeight;
  public $totalWeightLow;

  public function setDeviation($deviation)
  {
    $this->deviation = $deviation;
  }
  public function getDeviation()
  {
    return $this->deviation;
  }
  public function setM2($m2)
  {
    $this->m2 = $m2;
  }
  public function getM2()
  {
    return $this->m2;
  }
  /**
   * @param IndexingSignalAggregatorUrlScore
   */
  public function setMaxScoreUrl(IndexingSignalAggregatorUrlScore $maxScoreUrl)
  {
    $this->maxScoreUrl = $maxScoreUrl;
  }
  /**
   * @return IndexingSignalAggregatorUrlScore
   */
  public function getMaxScoreUrl()
  {
    return $this->maxScoreUrl;
  }
  public function setMean($mean)
  {
    $this->mean = $mean;
  }
  public function getMean()
  {
    return $this->mean;
  }
  public function setMeanScore($meanScore)
  {
    $this->meanScore = $meanScore;
  }
  public function getMeanScore()
  {
    return $this->meanScore;
  }
  /**
   * @param IndexingSignalAggregatorUrlScore
   */
  public function setMinScoreUrl(IndexingSignalAggregatorUrlScore $minScoreUrl)
  {
    $this->minScoreUrl = $minScoreUrl;
  }
  /**
   * @return IndexingSignalAggregatorUrlScore
   */
  public function getMinScoreUrl()
  {
    return $this->minScoreUrl;
  }
  /**
   * @param string
   */
  public function setNumImportantUrls($numImportantUrls)
  {
    $this->numImportantUrls = $numImportantUrls;
  }
  /**
   * @return string
   */
  public function getNumImportantUrls()
  {
    return $this->numImportantUrls;
  }
  /**
   * @param string
   */
  public function setNumUrlsMatched($numUrlsMatched)
  {
    $this->numUrlsMatched = $numUrlsMatched;
  }
  /**
   * @return string
   */
  public function getNumUrlsMatched()
  {
    return $this->numUrlsMatched;
  }
  /**
   * @param string
   */
  public function setNumUrlsWithSignal($numUrlsWithSignal)
  {
    $this->numUrlsWithSignal = $numUrlsWithSignal;
  }
  /**
   * @return string
   */
  public function getNumUrlsWithSignal()
  {
    return $this->numUrlsWithSignal;
  }
  /**
   * @param string
   */
  public function setPatternLayer($patternLayer)
  {
    $this->patternLayer = $patternLayer;
  }
  /**
   * @return string
   */
  public function getPatternLayer()
  {
    return $this->patternLayer;
  }
  /**
   * @param string[]
   */
  public function setPatternsUsedInMediation($patternsUsedInMediation)
  {
    $this->patternsUsedInMediation = $patternsUsedInMediation;
  }
  /**
   * @return string[]
   */
  public function getPatternsUsedInMediation()
  {
    return $this->patternsUsedInMediation;
  }
  public function setPercentile($percentile)
  {
    $this->percentile = $percentile;
  }
  public function getPercentile()
  {
    return $this->percentile;
  }
  /**
   * @param IndexingSignalAggregatorRunningMeanAndVarianceInternalState
   */
  public function setRunningMeanAndVarianceInternalState(IndexingSignalAggregatorRunningMeanAndVarianceInternalState $runningMeanAndVarianceInternalState)
  {
    $this->runningMeanAndVarianceInternalState = $runningMeanAndVarianceInternalState;
  }
  /**
   * @return IndexingSignalAggregatorRunningMeanAndVarianceInternalState
   */
  public function getRunningMeanAndVarianceInternalState()
  {
    return $this->runningMeanAndVarianceInternalState;
  }
  /**
   * @param IndexingSignalAggregatorUrlScore[]
   */
  public function setSamples($samples)
  {
    $this->samples = $samples;
  }
  /**
   * @return IndexingSignalAggregatorUrlScore[]
   */
  public function getSamples()
  {
    return $this->samples;
  }
  public function setScores($scores)
  {
    $this->scores = $scores;
  }
  public function getScores()
  {
    return $this->scores;
  }
  /**
   * @param int
   */
  public function setSignalId($signalId)
  {
    $this->signalId = $signalId;
  }
  /**
   * @return int
   */
  public function getSignalId()
  {
    return $this->signalId;
  }
  /**
   * @param IndexingSignalAggregatorUrlScore
   */
  public function setSingleUrlScore(IndexingSignalAggregatorUrlScore $singleUrlScore)
  {
    $this->singleUrlScore = $singleUrlScore;
  }
  /**
   * @return IndexingSignalAggregatorUrlScore
   */
  public function getSingleUrlScore()
  {
    return $this->singleUrlScore;
  }
  public function setTotalScore($totalScore)
  {
    $this->totalScore = $totalScore;
  }
  public function getTotalScore()
  {
    return $this->totalScore;
  }
  public function setTotalScoreLow($totalScoreLow)
  {
    $this->totalScoreLow = $totalScoreLow;
  }
  public function getTotalScoreLow()
  {
    return $this->totalScoreLow;
  }
  public function setTotalScoreSqr($totalScoreSqr)
  {
    $this->totalScoreSqr = $totalScoreSqr;
  }
  public function getTotalScoreSqr()
  {
    return $this->totalScoreSqr;
  }
  public function setTotalScoreSqrLow($totalScoreSqrLow)
  {
    $this->totalScoreSqrLow = $totalScoreSqrLow;
  }
  public function getTotalScoreSqrLow()
  {
    return $this->totalScoreSqrLow;
  }
  public function setTotalWeight($totalWeight)
  {
    $this->totalWeight = $totalWeight;
  }
  public function getTotalWeight()
  {
    return $this->totalWeight;
  }
  public function setTotalWeightLow($totalWeightLow)
  {
    $this->totalWeightLow = $totalWeightLow;
  }
  public function getTotalWeightLow()
  {
    return $this->totalWeightLow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorAggregatedScore::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorAggregatedScore');
