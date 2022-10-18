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

class CrawlerChangerateUrlChangerate extends \Google\Model
{
  protected $approximatedPosteriorType = CrawlerChangerateMultipleComponentDistribution::class;
  protected $approximatedPosteriorDataType = '';
  public $averageChangeSignificance;
  /**
   * @var int
   */
  public $changeperiod;
  public $confidence;
  /**
   * @var int
   */
  public $globalBasedChangePeriod;
  public $globalBasedChangePeriodConfidence;
  public $globalBasedPriorPeriod;
  public $globalBasedPriorStrength;
  public $lastChangeSignificance;
  /**
   * @var int
   */
  public $lastChanged;
  /**
   * @var int
   */
  public $lastFetched;
  /**
   * @var int
   */
  public $numIntervals;
  /**
   * @var int
   */
  public $patternBasedChangePeriod;
  public $patternBasedChangePeriodConfidence;
  /**
   * @var int
   */
  public $patternBasedLowerChangePeriod;
  public $patternBasedPriorPeriod;
  public $patternBasedPriorStrength;
  /**
   * @var int
   */
  public $patternChangePeriodVersion;
  /**
   * @var int
   */
  public $type;
  /**
   * @var int
   */
  public $ugcChangePeriod;
  public $ugcChangePeriodConfidence;

  /**
   * @param CrawlerChangerateMultipleComponentDistribution
   */
  public function setApproximatedPosterior(CrawlerChangerateMultipleComponentDistribution $approximatedPosterior)
  {
    $this->approximatedPosterior = $approximatedPosterior;
  }
  /**
   * @return CrawlerChangerateMultipleComponentDistribution
   */
  public function getApproximatedPosterior()
  {
    return $this->approximatedPosterior;
  }
  public function setAverageChangeSignificance($averageChangeSignificance)
  {
    $this->averageChangeSignificance = $averageChangeSignificance;
  }
  public function getAverageChangeSignificance()
  {
    return $this->averageChangeSignificance;
  }
  /**
   * @param int
   */
  public function setChangeperiod($changeperiod)
  {
    $this->changeperiod = $changeperiod;
  }
  /**
   * @return int
   */
  public function getChangeperiod()
  {
    return $this->changeperiod;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param int
   */
  public function setGlobalBasedChangePeriod($globalBasedChangePeriod)
  {
    $this->globalBasedChangePeriod = $globalBasedChangePeriod;
  }
  /**
   * @return int
   */
  public function getGlobalBasedChangePeriod()
  {
    return $this->globalBasedChangePeriod;
  }
  public function setGlobalBasedChangePeriodConfidence($globalBasedChangePeriodConfidence)
  {
    $this->globalBasedChangePeriodConfidence = $globalBasedChangePeriodConfidence;
  }
  public function getGlobalBasedChangePeriodConfidence()
  {
    return $this->globalBasedChangePeriodConfidence;
  }
  public function setGlobalBasedPriorPeriod($globalBasedPriorPeriod)
  {
    $this->globalBasedPriorPeriod = $globalBasedPriorPeriod;
  }
  public function getGlobalBasedPriorPeriod()
  {
    return $this->globalBasedPriorPeriod;
  }
  public function setGlobalBasedPriorStrength($globalBasedPriorStrength)
  {
    $this->globalBasedPriorStrength = $globalBasedPriorStrength;
  }
  public function getGlobalBasedPriorStrength()
  {
    return $this->globalBasedPriorStrength;
  }
  public function setLastChangeSignificance($lastChangeSignificance)
  {
    $this->lastChangeSignificance = $lastChangeSignificance;
  }
  public function getLastChangeSignificance()
  {
    return $this->lastChangeSignificance;
  }
  /**
   * @param int
   */
  public function setLastChanged($lastChanged)
  {
    $this->lastChanged = $lastChanged;
  }
  /**
   * @return int
   */
  public function getLastChanged()
  {
    return $this->lastChanged;
  }
  /**
   * @param int
   */
  public function setLastFetched($lastFetched)
  {
    $this->lastFetched = $lastFetched;
  }
  /**
   * @return int
   */
  public function getLastFetched()
  {
    return $this->lastFetched;
  }
  /**
   * @param int
   */
  public function setNumIntervals($numIntervals)
  {
    $this->numIntervals = $numIntervals;
  }
  /**
   * @return int
   */
  public function getNumIntervals()
  {
    return $this->numIntervals;
  }
  /**
   * @param int
   */
  public function setPatternBasedChangePeriod($patternBasedChangePeriod)
  {
    $this->patternBasedChangePeriod = $patternBasedChangePeriod;
  }
  /**
   * @return int
   */
  public function getPatternBasedChangePeriod()
  {
    return $this->patternBasedChangePeriod;
  }
  public function setPatternBasedChangePeriodConfidence($patternBasedChangePeriodConfidence)
  {
    $this->patternBasedChangePeriodConfidence = $patternBasedChangePeriodConfidence;
  }
  public function getPatternBasedChangePeriodConfidence()
  {
    return $this->patternBasedChangePeriodConfidence;
  }
  /**
   * @param int
   */
  public function setPatternBasedLowerChangePeriod($patternBasedLowerChangePeriod)
  {
    $this->patternBasedLowerChangePeriod = $patternBasedLowerChangePeriod;
  }
  /**
   * @return int
   */
  public function getPatternBasedLowerChangePeriod()
  {
    return $this->patternBasedLowerChangePeriod;
  }
  public function setPatternBasedPriorPeriod($patternBasedPriorPeriod)
  {
    $this->patternBasedPriorPeriod = $patternBasedPriorPeriod;
  }
  public function getPatternBasedPriorPeriod()
  {
    return $this->patternBasedPriorPeriod;
  }
  public function setPatternBasedPriorStrength($patternBasedPriorStrength)
  {
    $this->patternBasedPriorStrength = $patternBasedPriorStrength;
  }
  public function getPatternBasedPriorStrength()
  {
    return $this->patternBasedPriorStrength;
  }
  /**
   * @param int
   */
  public function setPatternChangePeriodVersion($patternChangePeriodVersion)
  {
    $this->patternChangePeriodVersion = $patternChangePeriodVersion;
  }
  /**
   * @return int
   */
  public function getPatternChangePeriodVersion()
  {
    return $this->patternChangePeriodVersion;
  }
  /**
   * @param int
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return int
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param int
   */
  public function setUgcChangePeriod($ugcChangePeriod)
  {
    $this->ugcChangePeriod = $ugcChangePeriod;
  }
  /**
   * @return int
   */
  public function getUgcChangePeriod()
  {
    return $this->ugcChangePeriod;
  }
  public function setUgcChangePeriodConfidence($ugcChangePeriodConfidence)
  {
    $this->ugcChangePeriodConfidence = $ugcChangePeriodConfidence;
  }
  public function getUgcChangePeriodConfidence()
  {
    return $this->ugcChangePeriodConfidence;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrawlerChangerateUrlChangerate::class, 'Google_Service_Contentwarehouse_CrawlerChangerateUrlChangerate');
