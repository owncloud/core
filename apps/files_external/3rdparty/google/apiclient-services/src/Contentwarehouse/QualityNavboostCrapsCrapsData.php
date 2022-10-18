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

class QualityNavboostCrapsCrapsData extends \Google\Collection
{
  protected $collection_key = 'features';
  protected $agingCountsType = QualityNavboostCrapsAgingData::class;
  protected $agingCountsDataType = '';
  public $badClicks;
  public $clicks;
  /**
   * @var string
   */
  public $country;
  protected $deviceType = QualityNavboostCrapsCrapsDevice::class;
  protected $deviceDataType = '';
  protected $featuresType = QualityNavboostCrapsFeatureCrapsData::class;
  protected $featuresDataType = 'array';
  public $goodClicks;
  public $impressions;
  /**
   * @var string
   */
  public $language;
  public $lastLongestClicks;
  protected $mobileDataType = QualityNavboostCrapsCrapsData::class;
  protected $mobileDataDataType = '';
  protected $mobileSignalsType = QualityNavboostCrapsCrapsClickSignals::class;
  protected $mobileSignalsDataType = '';
  /**
   * @var string
   */
  public $packedIpAddress;
  /**
   * @var int
   */
  public $patternLevel;
  protected $patternSccStatsType = QualityNavboostCrapsStatsWithWeightsProto::class;
  protected $patternSccStatsDataType = '';
  /**
   * @var string
   */
  public $query;
  /**
   * @var string
   */
  public $sliceTag;
  protected $squashedType = QualityNavboostCrapsCrapsClickSignals::class;
  protected $squashedDataType = '';
  public $unscaledIpPriorBadFraction;
  protected $unsquashedType = QualityNavboostCrapsCrapsClickSignals::class;
  protected $unsquashedDataType = '';
  protected $unsquashedMobileSignalsType = QualityNavboostCrapsCrapsClickSignals::class;
  protected $unsquashedMobileSignalsDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param QualityNavboostCrapsAgingData
   */
  public function setAgingCounts(QualityNavboostCrapsAgingData $agingCounts)
  {
    $this->agingCounts = $agingCounts;
  }
  /**
   * @return QualityNavboostCrapsAgingData
   */
  public function getAgingCounts()
  {
    return $this->agingCounts;
  }
  public function setBadClicks($badClicks)
  {
    $this->badClicks = $badClicks;
  }
  public function getBadClicks()
  {
    return $this->badClicks;
  }
  public function setClicks($clicks)
  {
    $this->clicks = $clicks;
  }
  public function getClicks()
  {
    return $this->clicks;
  }
  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param QualityNavboostCrapsCrapsDevice
   */
  public function setDevice(QualityNavboostCrapsCrapsDevice $device)
  {
    $this->device = $device;
  }
  /**
   * @return QualityNavboostCrapsCrapsDevice
   */
  public function getDevice()
  {
    return $this->device;
  }
  /**
   * @param QualityNavboostCrapsFeatureCrapsData[]
   */
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  /**
   * @return QualityNavboostCrapsFeatureCrapsData[]
   */
  public function getFeatures()
  {
    return $this->features;
  }
  public function setGoodClicks($goodClicks)
  {
    $this->goodClicks = $goodClicks;
  }
  public function getGoodClicks()
  {
    return $this->goodClicks;
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
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  public function setLastLongestClicks($lastLongestClicks)
  {
    $this->lastLongestClicks = $lastLongestClicks;
  }
  public function getLastLongestClicks()
  {
    return $this->lastLongestClicks;
  }
  /**
   * @param QualityNavboostCrapsCrapsData
   */
  public function setMobileData(QualityNavboostCrapsCrapsData $mobileData)
  {
    $this->mobileData = $mobileData;
  }
  /**
   * @return QualityNavboostCrapsCrapsData
   */
  public function getMobileData()
  {
    return $this->mobileData;
  }
  /**
   * @param QualityNavboostCrapsCrapsClickSignals
   */
  public function setMobileSignals(QualityNavboostCrapsCrapsClickSignals $mobileSignals)
  {
    $this->mobileSignals = $mobileSignals;
  }
  /**
   * @return QualityNavboostCrapsCrapsClickSignals
   */
  public function getMobileSignals()
  {
    return $this->mobileSignals;
  }
  /**
   * @param string
   */
  public function setPackedIpAddress($packedIpAddress)
  {
    $this->packedIpAddress = $packedIpAddress;
  }
  /**
   * @return string
   */
  public function getPackedIpAddress()
  {
    return $this->packedIpAddress;
  }
  /**
   * @param int
   */
  public function setPatternLevel($patternLevel)
  {
    $this->patternLevel = $patternLevel;
  }
  /**
   * @return int
   */
  public function getPatternLevel()
  {
    return $this->patternLevel;
  }
  /**
   * @param QualityNavboostCrapsStatsWithWeightsProto
   */
  public function setPatternSccStats(QualityNavboostCrapsStatsWithWeightsProto $patternSccStats)
  {
    $this->patternSccStats = $patternSccStats;
  }
  /**
   * @return QualityNavboostCrapsStatsWithWeightsProto
   */
  public function getPatternSccStats()
  {
    return $this->patternSccStats;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string
   */
  public function setSliceTag($sliceTag)
  {
    $this->sliceTag = $sliceTag;
  }
  /**
   * @return string
   */
  public function getSliceTag()
  {
    return $this->sliceTag;
  }
  /**
   * @param QualityNavboostCrapsCrapsClickSignals
   */
  public function setSquashed(QualityNavboostCrapsCrapsClickSignals $squashed)
  {
    $this->squashed = $squashed;
  }
  /**
   * @return QualityNavboostCrapsCrapsClickSignals
   */
  public function getSquashed()
  {
    return $this->squashed;
  }
  public function setUnscaledIpPriorBadFraction($unscaledIpPriorBadFraction)
  {
    $this->unscaledIpPriorBadFraction = $unscaledIpPriorBadFraction;
  }
  public function getUnscaledIpPriorBadFraction()
  {
    return $this->unscaledIpPriorBadFraction;
  }
  /**
   * @param QualityNavboostCrapsCrapsClickSignals
   */
  public function setUnsquashed(QualityNavboostCrapsCrapsClickSignals $unsquashed)
  {
    $this->unsquashed = $unsquashed;
  }
  /**
   * @return QualityNavboostCrapsCrapsClickSignals
   */
  public function getUnsquashed()
  {
    return $this->unsquashed;
  }
  /**
   * @param QualityNavboostCrapsCrapsClickSignals
   */
  public function setUnsquashedMobileSignals(QualityNavboostCrapsCrapsClickSignals $unsquashedMobileSignals)
  {
    $this->unsquashedMobileSignals = $unsquashedMobileSignals;
  }
  /**
   * @return QualityNavboostCrapsCrapsClickSignals
   */
  public function getUnsquashedMobileSignals()
  {
    return $this->unsquashedMobileSignals;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityNavboostCrapsCrapsData::class, 'Google_Service_Contentwarehouse_QualityNavboostCrapsCrapsData');
