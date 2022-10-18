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

class IndexingSignalAggregatorUrlPatternSignals extends \Google\Collection
{
  protected $collection_key = 'priorSignal';
  protected $coverageType = IndexingSignalAggregatorAgeWeightedCoverageData::class;
  protected $coverageDataType = '';
  protected $pagerankScoreType = IndexingSignalAggregatorAggregatedScore::class;
  protected $pagerankScoreDataType = '';
  protected $patternScoreType = IndexingSignalAggregatorAggregatedScore::class;
  protected $patternScoreDataType = '';
  protected $priorSignalType = IndexingSignalAggregatorUrlPatternSignalsPriorSignal::class;
  protected $priorSignalDataType = 'array';
  protected $regexpPatternScoreType = IndexingSignalAggregatorAggregatedScore::class;
  protected $regexpPatternScoreDataType = '';
  protected $sccDataType = IndexingSignalAggregatorSccData::class;
  protected $sccDataDataType = '';

  /**
   * @param IndexingSignalAggregatorAgeWeightedCoverageData
   */
  public function setCoverage(IndexingSignalAggregatorAgeWeightedCoverageData $coverage)
  {
    $this->coverage = $coverage;
  }
  /**
   * @return IndexingSignalAggregatorAgeWeightedCoverageData
   */
  public function getCoverage()
  {
    return $this->coverage;
  }
  /**
   * @param IndexingSignalAggregatorAggregatedScore
   */
  public function setPagerankScore(IndexingSignalAggregatorAggregatedScore $pagerankScore)
  {
    $this->pagerankScore = $pagerankScore;
  }
  /**
   * @return IndexingSignalAggregatorAggregatedScore
   */
  public function getPagerankScore()
  {
    return $this->pagerankScore;
  }
  /**
   * @param IndexingSignalAggregatorAggregatedScore
   */
  public function setPatternScore(IndexingSignalAggregatorAggregatedScore $patternScore)
  {
    $this->patternScore = $patternScore;
  }
  /**
   * @return IndexingSignalAggregatorAggregatedScore
   */
  public function getPatternScore()
  {
    return $this->patternScore;
  }
  /**
   * @param IndexingSignalAggregatorUrlPatternSignalsPriorSignal[]
   */
  public function setPriorSignal($priorSignal)
  {
    $this->priorSignal = $priorSignal;
  }
  /**
   * @return IndexingSignalAggregatorUrlPatternSignalsPriorSignal[]
   */
  public function getPriorSignal()
  {
    return $this->priorSignal;
  }
  /**
   * @param IndexingSignalAggregatorAggregatedScore
   */
  public function setRegexpPatternScore(IndexingSignalAggregatorAggregatedScore $regexpPatternScore)
  {
    $this->regexpPatternScore = $regexpPatternScore;
  }
  /**
   * @return IndexingSignalAggregatorAggregatedScore
   */
  public function getRegexpPatternScore()
  {
    return $this->regexpPatternScore;
  }
  /**
   * @param IndexingSignalAggregatorSccData
   */
  public function setSccData(IndexingSignalAggregatorSccData $sccData)
  {
    $this->sccData = $sccData;
  }
  /**
   * @return IndexingSignalAggregatorSccData
   */
  public function getSccData()
  {
    return $this->sccData;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorUrlPatternSignals::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorUrlPatternSignals');
