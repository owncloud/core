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

namespace Google\Service\AdExchangeBuyerII;

class FilterSet extends \Google\Collection
{
  protected $collection_key = 'sellerNetworkIds';
  protected $absoluteDateRangeType = AbsoluteDateRange::class;
  protected $absoluteDateRangeDataType = '';
  /**
   * @var string[]
   */
  public $breakdownDimensions;
  /**
   * @var string
   */
  public $creativeId;
  /**
   * @var string
   */
  public $dealId;
  /**
   * @var string
   */
  public $environment;
  /**
   * @var string
   */
  public $format;
  /**
   * @var string[]
   */
  public $formats;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $platforms;
  /**
   * @var string[]
   */
  public $publisherIdentifiers;
  protected $realtimeTimeRangeType = RealtimeTimeRange::class;
  protected $realtimeTimeRangeDataType = '';
  protected $relativeDateRangeType = RelativeDateRange::class;
  protected $relativeDateRangeDataType = '';
  /**
   * @var int[]
   */
  public $sellerNetworkIds;
  /**
   * @var string
   */
  public $timeSeriesGranularity;

  /**
   * @param AbsoluteDateRange
   */
  public function setAbsoluteDateRange(AbsoluteDateRange $absoluteDateRange)
  {
    $this->absoluteDateRange = $absoluteDateRange;
  }
  /**
   * @return AbsoluteDateRange
   */
  public function getAbsoluteDateRange()
  {
    return $this->absoluteDateRange;
  }
  /**
   * @param string[]
   */
  public function setBreakdownDimensions($breakdownDimensions)
  {
    $this->breakdownDimensions = $breakdownDimensions;
  }
  /**
   * @return string[]
   */
  public function getBreakdownDimensions()
  {
    return $this->breakdownDimensions;
  }
  /**
   * @param string
   */
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  /**
   * @return string
   */
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  /**
   * @param string
   */
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  /**
   * @return string
   */
  public function getDealId()
  {
    return $this->dealId;
  }
  /**
   * @param string
   */
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string[]
   */
  public function setFormats($formats)
  {
    $this->formats = $formats;
  }
  /**
   * @return string[]
   */
  public function getFormats()
  {
    return $this->formats;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPlatforms($platforms)
  {
    $this->platforms = $platforms;
  }
  /**
   * @return string[]
   */
  public function getPlatforms()
  {
    return $this->platforms;
  }
  /**
   * @param string[]
   */
  public function setPublisherIdentifiers($publisherIdentifiers)
  {
    $this->publisherIdentifiers = $publisherIdentifiers;
  }
  /**
   * @return string[]
   */
  public function getPublisherIdentifiers()
  {
    return $this->publisherIdentifiers;
  }
  /**
   * @param RealtimeTimeRange
   */
  public function setRealtimeTimeRange(RealtimeTimeRange $realtimeTimeRange)
  {
    $this->realtimeTimeRange = $realtimeTimeRange;
  }
  /**
   * @return RealtimeTimeRange
   */
  public function getRealtimeTimeRange()
  {
    return $this->realtimeTimeRange;
  }
  /**
   * @param RelativeDateRange
   */
  public function setRelativeDateRange(RelativeDateRange $relativeDateRange)
  {
    $this->relativeDateRange = $relativeDateRange;
  }
  /**
   * @return RelativeDateRange
   */
  public function getRelativeDateRange()
  {
    return $this->relativeDateRange;
  }
  /**
   * @param int[]
   */
  public function setSellerNetworkIds($sellerNetworkIds)
  {
    $this->sellerNetworkIds = $sellerNetworkIds;
  }
  /**
   * @return int[]
   */
  public function getSellerNetworkIds()
  {
    return $this->sellerNetworkIds;
  }
  /**
   * @param string
   */
  public function setTimeSeriesGranularity($timeSeriesGranularity)
  {
    $this->timeSeriesGranularity = $timeSeriesGranularity;
  }
  /**
   * @return string
   */
  public function getTimeSeriesGranularity()
  {
    return $this->timeSeriesGranularity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterSet::class, 'Google_Service_AdExchangeBuyerII_FilterSet');
