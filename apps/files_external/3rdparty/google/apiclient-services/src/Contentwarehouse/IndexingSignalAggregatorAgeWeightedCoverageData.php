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

class IndexingSignalAggregatorAgeWeightedCoverageData extends \Google\Model
{
  public $averageChanceTime;
  public $chances;
  public $clicksBad;
  public $clicksGood;
  public $clicksImage;
  public $clicksTotal;
  public $clicksUnclassified;
  /**
   * @var string
   */
  public $coverageTimestamp;
  public $ctrWeightedImpressions;
  public $dwells;
  /**
   * @var string
   */
  public $firstBaseCoverageTimestamp;
  /**
   * @var int
   */
  public $firstCoveragePagerankNs;
  /**
   * @var string
   */
  public $firstCoverageTimestamp;
  /**
   * @var string
   */
  public $firstseen;
  public $impressions;
  protected $intervalDataType = IndexingSignalAggregatorAdaptiveIntervalData::class;
  protected $intervalDataDataType = '';
  /**
   * @var int
   */
  public $language;
  /**
   * @var int
   */
  public $lastDwellDateInDays;
  /**
   * @var int
   */
  public $lastGoodClickDateInDays;
  /**
   * @var int
   */
  public $lastImpressionDateInDays;
  /**
   * @var int
   */
  public $lastLuDwellDateInDays;
  /**
   * @var int
   */
  public $lastPseudoImpressionsDateInDays;
  public $luDwells;
  /**
   * @var string
   */
  public $repid;
  /**
   * @var string
   */
  public $totalChances;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $urlfp;

  public function setAverageChanceTime($averageChanceTime)
  {
    $this->averageChanceTime = $averageChanceTime;
  }
  public function getAverageChanceTime()
  {
    return $this->averageChanceTime;
  }
  public function setChances($chances)
  {
    $this->chances = $chances;
  }
  public function getChances()
  {
    return $this->chances;
  }
  public function setClicksBad($clicksBad)
  {
    $this->clicksBad = $clicksBad;
  }
  public function getClicksBad()
  {
    return $this->clicksBad;
  }
  public function setClicksGood($clicksGood)
  {
    $this->clicksGood = $clicksGood;
  }
  public function getClicksGood()
  {
    return $this->clicksGood;
  }
  public function setClicksImage($clicksImage)
  {
    $this->clicksImage = $clicksImage;
  }
  public function getClicksImage()
  {
    return $this->clicksImage;
  }
  public function setClicksTotal($clicksTotal)
  {
    $this->clicksTotal = $clicksTotal;
  }
  public function getClicksTotal()
  {
    return $this->clicksTotal;
  }
  public function setClicksUnclassified($clicksUnclassified)
  {
    $this->clicksUnclassified = $clicksUnclassified;
  }
  public function getClicksUnclassified()
  {
    return $this->clicksUnclassified;
  }
  /**
   * @param string
   */
  public function setCoverageTimestamp($coverageTimestamp)
  {
    $this->coverageTimestamp = $coverageTimestamp;
  }
  /**
   * @return string
   */
  public function getCoverageTimestamp()
  {
    return $this->coverageTimestamp;
  }
  public function setCtrWeightedImpressions($ctrWeightedImpressions)
  {
    $this->ctrWeightedImpressions = $ctrWeightedImpressions;
  }
  public function getCtrWeightedImpressions()
  {
    return $this->ctrWeightedImpressions;
  }
  public function setDwells($dwells)
  {
    $this->dwells = $dwells;
  }
  public function getDwells()
  {
    return $this->dwells;
  }
  /**
   * @param string
   */
  public function setFirstBaseCoverageTimestamp($firstBaseCoverageTimestamp)
  {
    $this->firstBaseCoverageTimestamp = $firstBaseCoverageTimestamp;
  }
  /**
   * @return string
   */
  public function getFirstBaseCoverageTimestamp()
  {
    return $this->firstBaseCoverageTimestamp;
  }
  /**
   * @param int
   */
  public function setFirstCoveragePagerankNs($firstCoveragePagerankNs)
  {
    $this->firstCoveragePagerankNs = $firstCoveragePagerankNs;
  }
  /**
   * @return int
   */
  public function getFirstCoveragePagerankNs()
  {
    return $this->firstCoveragePagerankNs;
  }
  /**
   * @param string
   */
  public function setFirstCoverageTimestamp($firstCoverageTimestamp)
  {
    $this->firstCoverageTimestamp = $firstCoverageTimestamp;
  }
  /**
   * @return string
   */
  public function getFirstCoverageTimestamp()
  {
    return $this->firstCoverageTimestamp;
  }
  /**
   * @param string
   */
  public function setFirstseen($firstseen)
  {
    $this->firstseen = $firstseen;
  }
  /**
   * @return string
   */
  public function getFirstseen()
  {
    return $this->firstseen;
  }
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  public function getImpressions()
  {
    return $this->impressions;
  }
  /**
   * @param IndexingSignalAggregatorAdaptiveIntervalData
   */
  public function setIntervalData(IndexingSignalAggregatorAdaptiveIntervalData $intervalData)
  {
    $this->intervalData = $intervalData;
  }
  /**
   * @return IndexingSignalAggregatorAdaptiveIntervalData
   */
  public function getIntervalData()
  {
    return $this->intervalData;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param int
   */
  public function setLastDwellDateInDays($lastDwellDateInDays)
  {
    $this->lastDwellDateInDays = $lastDwellDateInDays;
  }
  /**
   * @return int
   */
  public function getLastDwellDateInDays()
  {
    return $this->lastDwellDateInDays;
  }
  /**
   * @param int
   */
  public function setLastGoodClickDateInDays($lastGoodClickDateInDays)
  {
    $this->lastGoodClickDateInDays = $lastGoodClickDateInDays;
  }
  /**
   * @return int
   */
  public function getLastGoodClickDateInDays()
  {
    return $this->lastGoodClickDateInDays;
  }
  /**
   * @param int
   */
  public function setLastImpressionDateInDays($lastImpressionDateInDays)
  {
    $this->lastImpressionDateInDays = $lastImpressionDateInDays;
  }
  /**
   * @return int
   */
  public function getLastImpressionDateInDays()
  {
    return $this->lastImpressionDateInDays;
  }
  /**
   * @param int
   */
  public function setLastLuDwellDateInDays($lastLuDwellDateInDays)
  {
    $this->lastLuDwellDateInDays = $lastLuDwellDateInDays;
  }
  /**
   * @return int
   */
  public function getLastLuDwellDateInDays()
  {
    return $this->lastLuDwellDateInDays;
  }
  /**
   * @param int
   */
  public function setLastPseudoImpressionsDateInDays($lastPseudoImpressionsDateInDays)
  {
    $this->lastPseudoImpressionsDateInDays = $lastPseudoImpressionsDateInDays;
  }
  /**
   * @return int
   */
  public function getLastPseudoImpressionsDateInDays()
  {
    return $this->lastPseudoImpressionsDateInDays;
  }
  public function setLuDwells($luDwells)
  {
    $this->luDwells = $luDwells;
  }
  public function getLuDwells()
  {
    return $this->luDwells;
  }
  /**
   * @param string
   */
  public function setRepid($repid)
  {
    $this->repid = $repid;
  }
  /**
   * @return string
   */
  public function getRepid()
  {
    return $this->repid;
  }
  /**
   * @param string
   */
  public function setTotalChances($totalChances)
  {
    $this->totalChances = $totalChances;
  }
  /**
   * @return string
   */
  public function getTotalChances()
  {
    return $this->totalChances;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setUrlfp($urlfp)
  {
    $this->urlfp = $urlfp;
  }
  /**
   * @return string
   */
  public function getUrlfp()
  {
    return $this->urlfp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingSignalAggregatorAgeWeightedCoverageData::class, 'Google_Service_Contentwarehouse_IndexingSignalAggregatorAgeWeightedCoverageData');
