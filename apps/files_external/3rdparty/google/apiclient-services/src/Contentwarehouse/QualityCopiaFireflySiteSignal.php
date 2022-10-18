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

class QualityCopiaFireflySiteSignal extends \Google\Collection
{
  protected $collection_key = 'numOfUrlsByPeriods';
  /**
   * @var string
   */
  public $dailyClicks;
  /**
   * @var string
   */
  public $dailyGoodClicks;
  /**
   * @var string
   */
  public $dataTimeSec;
  /**
   * @var string
   */
  public $firstBoostedTimeSec;
  /**
   * @var string
   */
  public $impressionsInBoostedPeriod;
  /**
   * @var string
   */
  public $latestBylineDateSec;
  /**
   * @var string
   */
  public $latestFirstseenSec;
  /**
   * @var string
   */
  public $numOfArticles8;
  /**
   * @var string[]
   */
  public $numOfArticlesByPeriods;
  /**
   * @var string
   */
  public $numOfGamblingPages;
  /**
   * @var string
   */
  public $numOfUrls;
  /**
   * @var string[]
   */
  public $numOfUrlsByPeriods;
  /**
   * @var string
   */
  public $recentImpForQuotaSystem;
  /**
   * @var string
   */
  public $siteFp;
  /**
   * @var string
   */
  public $totalImpressions;

  /**
   * @param string
   */
  public function setDailyClicks($dailyClicks)
  {
    $this->dailyClicks = $dailyClicks;
  }
  /**
   * @return string
   */
  public function getDailyClicks()
  {
    return $this->dailyClicks;
  }
  /**
   * @param string
   */
  public function setDailyGoodClicks($dailyGoodClicks)
  {
    $this->dailyGoodClicks = $dailyGoodClicks;
  }
  /**
   * @return string
   */
  public function getDailyGoodClicks()
  {
    return $this->dailyGoodClicks;
  }
  /**
   * @param string
   */
  public function setDataTimeSec($dataTimeSec)
  {
    $this->dataTimeSec = $dataTimeSec;
  }
  /**
   * @return string
   */
  public function getDataTimeSec()
  {
    return $this->dataTimeSec;
  }
  /**
   * @param string
   */
  public function setFirstBoostedTimeSec($firstBoostedTimeSec)
  {
    $this->firstBoostedTimeSec = $firstBoostedTimeSec;
  }
  /**
   * @return string
   */
  public function getFirstBoostedTimeSec()
  {
    return $this->firstBoostedTimeSec;
  }
  /**
   * @param string
   */
  public function setImpressionsInBoostedPeriod($impressionsInBoostedPeriod)
  {
    $this->impressionsInBoostedPeriod = $impressionsInBoostedPeriod;
  }
  /**
   * @return string
   */
  public function getImpressionsInBoostedPeriod()
  {
    return $this->impressionsInBoostedPeriod;
  }
  /**
   * @param string
   */
  public function setLatestBylineDateSec($latestBylineDateSec)
  {
    $this->latestBylineDateSec = $latestBylineDateSec;
  }
  /**
   * @return string
   */
  public function getLatestBylineDateSec()
  {
    return $this->latestBylineDateSec;
  }
  /**
   * @param string
   */
  public function setLatestFirstseenSec($latestFirstseenSec)
  {
    $this->latestFirstseenSec = $latestFirstseenSec;
  }
  /**
   * @return string
   */
  public function getLatestFirstseenSec()
  {
    return $this->latestFirstseenSec;
  }
  /**
   * @param string
   */
  public function setNumOfArticles8($numOfArticles8)
  {
    $this->numOfArticles8 = $numOfArticles8;
  }
  /**
   * @return string
   */
  public function getNumOfArticles8()
  {
    return $this->numOfArticles8;
  }
  /**
   * @param string[]
   */
  public function setNumOfArticlesByPeriods($numOfArticlesByPeriods)
  {
    $this->numOfArticlesByPeriods = $numOfArticlesByPeriods;
  }
  /**
   * @return string[]
   */
  public function getNumOfArticlesByPeriods()
  {
    return $this->numOfArticlesByPeriods;
  }
  /**
   * @param string
   */
  public function setNumOfGamblingPages($numOfGamblingPages)
  {
    $this->numOfGamblingPages = $numOfGamblingPages;
  }
  /**
   * @return string
   */
  public function getNumOfGamblingPages()
  {
    return $this->numOfGamblingPages;
  }
  /**
   * @param string
   */
  public function setNumOfUrls($numOfUrls)
  {
    $this->numOfUrls = $numOfUrls;
  }
  /**
   * @return string
   */
  public function getNumOfUrls()
  {
    return $this->numOfUrls;
  }
  /**
   * @param string[]
   */
  public function setNumOfUrlsByPeriods($numOfUrlsByPeriods)
  {
    $this->numOfUrlsByPeriods = $numOfUrlsByPeriods;
  }
  /**
   * @return string[]
   */
  public function getNumOfUrlsByPeriods()
  {
    return $this->numOfUrlsByPeriods;
  }
  /**
   * @param string
   */
  public function setRecentImpForQuotaSystem($recentImpForQuotaSystem)
  {
    $this->recentImpForQuotaSystem = $recentImpForQuotaSystem;
  }
  /**
   * @return string
   */
  public function getRecentImpForQuotaSystem()
  {
    return $this->recentImpForQuotaSystem;
  }
  /**
   * @param string
   */
  public function setSiteFp($siteFp)
  {
    $this->siteFp = $siteFp;
  }
  /**
   * @return string
   */
  public function getSiteFp()
  {
    return $this->siteFp;
  }
  /**
   * @param string
   */
  public function setTotalImpressions($totalImpressions)
  {
    $this->totalImpressions = $totalImpressions;
  }
  /**
   * @return string
   */
  public function getTotalImpressions()
  {
    return $this->totalImpressions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityCopiaFireflySiteSignal::class, 'Google_Service_Contentwarehouse_QualityCopiaFireflySiteSignal');
