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

class ClassifierPornSiteData extends \Google\Collection
{
  protected $collection_key = 'versionedscore';
  /**
   * @var float
   */
  public $avgPedoPageScore;
  /**
   * @var float
   */
  public $finalPedoSiteScore;
  /**
   * @var string
   */
  public $numberOfPages;
  /**
   * @var string
   */
  public $numberOfPedoPages;
  /**
   * @var float
   */
  public $sitePornRatio;
  /**
   * @var float
   */
  public $siteSoftpornRatio;
  protected $versionedscoreType = ClassifierPornSiteDataVersionedScore::class;
  protected $versionedscoreDataType = 'array';
  protected $violenceStatsType = ClassifierPornSiteViolenceStats::class;
  protected $violenceStatsDataType = '';

  /**
   * @param float
   */
  public function setAvgPedoPageScore($avgPedoPageScore)
  {
    $this->avgPedoPageScore = $avgPedoPageScore;
  }
  /**
   * @return float
   */
  public function getAvgPedoPageScore()
  {
    return $this->avgPedoPageScore;
  }
  /**
   * @param float
   */
  public function setFinalPedoSiteScore($finalPedoSiteScore)
  {
    $this->finalPedoSiteScore = $finalPedoSiteScore;
  }
  /**
   * @return float
   */
  public function getFinalPedoSiteScore()
  {
    return $this->finalPedoSiteScore;
  }
  /**
   * @param string
   */
  public function setNumberOfPages($numberOfPages)
  {
    $this->numberOfPages = $numberOfPages;
  }
  /**
   * @return string
   */
  public function getNumberOfPages()
  {
    return $this->numberOfPages;
  }
  /**
   * @param string
   */
  public function setNumberOfPedoPages($numberOfPedoPages)
  {
    $this->numberOfPedoPages = $numberOfPedoPages;
  }
  /**
   * @return string
   */
  public function getNumberOfPedoPages()
  {
    return $this->numberOfPedoPages;
  }
  /**
   * @param float
   */
  public function setSitePornRatio($sitePornRatio)
  {
    $this->sitePornRatio = $sitePornRatio;
  }
  /**
   * @return float
   */
  public function getSitePornRatio()
  {
    return $this->sitePornRatio;
  }
  /**
   * @param float
   */
  public function setSiteSoftpornRatio($siteSoftpornRatio)
  {
    $this->siteSoftpornRatio = $siteSoftpornRatio;
  }
  /**
   * @return float
   */
  public function getSiteSoftpornRatio()
  {
    return $this->siteSoftpornRatio;
  }
  /**
   * @param ClassifierPornSiteDataVersionedScore[]
   */
  public function setVersionedscore($versionedscore)
  {
    $this->versionedscore = $versionedscore;
  }
  /**
   * @return ClassifierPornSiteDataVersionedScore[]
   */
  public function getVersionedscore()
  {
    return $this->versionedscore;
  }
  /**
   * @param ClassifierPornSiteViolenceStats
   */
  public function setViolenceStats(ClassifierPornSiteViolenceStats $violenceStats)
  {
    $this->violenceStats = $violenceStats;
  }
  /**
   * @return ClassifierPornSiteViolenceStats
   */
  public function getViolenceStats()
  {
    return $this->violenceStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassifierPornSiteData::class, 'Google_Service_Contentwarehouse_ClassifierPornSiteData');
