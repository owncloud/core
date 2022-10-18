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

class QualitySitemapScoringSignals extends \Google\Collection
{
  protected $collection_key = 'targetCdocLanguages';
  /**
   * @var string[]
   */
  public $annotations;
  /**
   * @var string
   */
  public $chromeTransCount;
  /**
   * @var float
   */
  public $chromeTransProb;
  /**
   * @var float
   */
  public $chromeWeight;
  /**
   * @var string[]
   */
  public $country;
  /**
   * @var float[]
   */
  public $countryConfidence;
  /**
   * @var string
   */
  public $impressions;
  /**
   * @var float[]
   */
  public $langConfidence;
  /**
   * @var string[]
   */
  public $language;
  /**
   * @var string[]
   */
  public $localCountryIdentifier;
  /**
   * @var string
   */
  public $longClicks;
  /**
   * @var float
   */
  public $longCtr;
  /**
   * @var float
   */
  public $navboostScore;
  /**
   * @var float
   */
  public $navmenuScore;
  /**
   * @var int
   */
  public $pagerank;
  /**
   * @var float
   */
  public $recentLongCtr;
  /**
   * @var int[]
   */
  public $targetCdocLanguages;
  /**
   * @var float
   */
  public $titleScore;

  /**
   * @param string[]
   */
  public function setAnnotations($annotations)
  {
    $this->annotations = $annotations;
  }
  /**
   * @return string[]
   */
  public function getAnnotations()
  {
    return $this->annotations;
  }
  /**
   * @param string
   */
  public function setChromeTransCount($chromeTransCount)
  {
    $this->chromeTransCount = $chromeTransCount;
  }
  /**
   * @return string
   */
  public function getChromeTransCount()
  {
    return $this->chromeTransCount;
  }
  /**
   * @param float
   */
  public function setChromeTransProb($chromeTransProb)
  {
    $this->chromeTransProb = $chromeTransProb;
  }
  /**
   * @return float
   */
  public function getChromeTransProb()
  {
    return $this->chromeTransProb;
  }
  /**
   * @param float
   */
  public function setChromeWeight($chromeWeight)
  {
    $this->chromeWeight = $chromeWeight;
  }
  /**
   * @return float
   */
  public function getChromeWeight()
  {
    return $this->chromeWeight;
  }
  /**
   * @param string[]
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string[]
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param float[]
   */
  public function setCountryConfidence($countryConfidence)
  {
    $this->countryConfidence = $countryConfidence;
  }
  /**
   * @return float[]
   */
  public function getCountryConfidence()
  {
    return $this->countryConfidence;
  }
  /**
   * @param string
   */
  public function setImpressions($impressions)
  {
    $this->impressions = $impressions;
  }
  /**
   * @return string
   */
  public function getImpressions()
  {
    return $this->impressions;
  }
  /**
   * @param float[]
   */
  public function setLangConfidence($langConfidence)
  {
    $this->langConfidence = $langConfidence;
  }
  /**
   * @return float[]
   */
  public function getLangConfidence()
  {
    return $this->langConfidence;
  }
  /**
   * @param string[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string[]
   */
  public function setLocalCountryIdentifier($localCountryIdentifier)
  {
    $this->localCountryIdentifier = $localCountryIdentifier;
  }
  /**
   * @return string[]
   */
  public function getLocalCountryIdentifier()
  {
    return $this->localCountryIdentifier;
  }
  /**
   * @param string
   */
  public function setLongClicks($longClicks)
  {
    $this->longClicks = $longClicks;
  }
  /**
   * @return string
   */
  public function getLongClicks()
  {
    return $this->longClicks;
  }
  /**
   * @param float
   */
  public function setLongCtr($longCtr)
  {
    $this->longCtr = $longCtr;
  }
  /**
   * @return float
   */
  public function getLongCtr()
  {
    return $this->longCtr;
  }
  /**
   * @param float
   */
  public function setNavboostScore($navboostScore)
  {
    $this->navboostScore = $navboostScore;
  }
  /**
   * @return float
   */
  public function getNavboostScore()
  {
    return $this->navboostScore;
  }
  /**
   * @param float
   */
  public function setNavmenuScore($navmenuScore)
  {
    $this->navmenuScore = $navmenuScore;
  }
  /**
   * @return float
   */
  public function getNavmenuScore()
  {
    return $this->navmenuScore;
  }
  /**
   * @param int
   */
  public function setPagerank($pagerank)
  {
    $this->pagerank = $pagerank;
  }
  /**
   * @return int
   */
  public function getPagerank()
  {
    return $this->pagerank;
  }
  /**
   * @param float
   */
  public function setRecentLongCtr($recentLongCtr)
  {
    $this->recentLongCtr = $recentLongCtr;
  }
  /**
   * @return float
   */
  public function getRecentLongCtr()
  {
    return $this->recentLongCtr;
  }
  /**
   * @param int[]
   */
  public function setTargetCdocLanguages($targetCdocLanguages)
  {
    $this->targetCdocLanguages = $targetCdocLanguages;
  }
  /**
   * @return int[]
   */
  public function getTargetCdocLanguages()
  {
    return $this->targetCdocLanguages;
  }
  /**
   * @param float
   */
  public function setTitleScore($titleScore)
  {
    $this->titleScore = $titleScore;
  }
  /**
   * @return float
   */
  public function getTitleScore()
  {
    return $this->titleScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualitySitemapScoringSignals::class, 'Google_Service_Contentwarehouse_QualitySitemapScoringSignals');
