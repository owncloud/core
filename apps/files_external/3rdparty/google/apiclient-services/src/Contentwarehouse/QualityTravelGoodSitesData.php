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

class QualityTravelGoodSitesData extends \Google\Collection
{
  protected $collection_key = 'signal';
  protected $i18nType = QualityTravelGoodSitesDataI18n::class;
  protected $i18nDataType = 'array';
  /**
   * @var bool
   */
  public $isAggr;
  /**
   * @var bool
   */
  public $isAttractionOfficial;
  /**
   * @var bool
   */
  public $isEntity;
  /**
   * @var bool
   */
  public $isHotelOfficial;
  /**
   * @var float
   */
  public $normalizationFactor;
  protected $signalType = QualityTravelGoodSitesDataSignal::class;
  protected $signalDataType = 'array';
  /**
   * @var string
   */
  public $site;
  /**
   * @var float
   */
  public $totalScore;
  /**
   * @var string
   */
  public $type;

  /**
   * @param QualityTravelGoodSitesDataI18n[]
   */
  public function setI18n($i18n)
  {
    $this->i18n = $i18n;
  }
  /**
   * @return QualityTravelGoodSitesDataI18n[]
   */
  public function getI18n()
  {
    return $this->i18n;
  }
  /**
   * @param bool
   */
  public function setIsAggr($isAggr)
  {
    $this->isAggr = $isAggr;
  }
  /**
   * @return bool
   */
  public function getIsAggr()
  {
    return $this->isAggr;
  }
  /**
   * @param bool
   */
  public function setIsAttractionOfficial($isAttractionOfficial)
  {
    $this->isAttractionOfficial = $isAttractionOfficial;
  }
  /**
   * @return bool
   */
  public function getIsAttractionOfficial()
  {
    return $this->isAttractionOfficial;
  }
  /**
   * @param bool
   */
  public function setIsEntity($isEntity)
  {
    $this->isEntity = $isEntity;
  }
  /**
   * @return bool
   */
  public function getIsEntity()
  {
    return $this->isEntity;
  }
  /**
   * @param bool
   */
  public function setIsHotelOfficial($isHotelOfficial)
  {
    $this->isHotelOfficial = $isHotelOfficial;
  }
  /**
   * @return bool
   */
  public function getIsHotelOfficial()
  {
    return $this->isHotelOfficial;
  }
  /**
   * @param float
   */
  public function setNormalizationFactor($normalizationFactor)
  {
    $this->normalizationFactor = $normalizationFactor;
  }
  /**
   * @return float
   */
  public function getNormalizationFactor()
  {
    return $this->normalizationFactor;
  }
  /**
   * @param QualityTravelGoodSitesDataSignal[]
   */
  public function setSignal($signal)
  {
    $this->signal = $signal;
  }
  /**
   * @return QualityTravelGoodSitesDataSignal[]
   */
  public function getSignal()
  {
    return $this->signal;
  }
  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
  /**
   * @param float
   */
  public function setTotalScore($totalScore)
  {
    $this->totalScore = $totalScore;
  }
  /**
   * @return float
   */
  public function getTotalScore()
  {
    return $this->totalScore;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityTravelGoodSitesData::class, 'Google_Service_Contentwarehouse_QualityTravelGoodSitesData');
