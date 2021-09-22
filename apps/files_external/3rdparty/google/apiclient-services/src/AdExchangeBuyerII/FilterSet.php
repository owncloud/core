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
  public $breakdownDimensions;
  public $creativeId;
  public $dealId;
  public $environment;
  public $format;
  public $formats;
  public $name;
  public $platforms;
  public $publisherIdentifiers;
  protected $realtimeTimeRangeType = RealtimeTimeRange::class;
  protected $realtimeTimeRangeDataType = '';
  protected $relativeDateRangeType = RelativeDateRange::class;
  protected $relativeDateRangeDataType = '';
  public $sellerNetworkIds;
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
  public function setBreakdownDimensions($breakdownDimensions)
  {
    $this->breakdownDimensions = $breakdownDimensions;
  }
  public function getBreakdownDimensions()
  {
    return $this->breakdownDimensions;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  public function getDealId()
  {
    return $this->dealId;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setFormats($formats)
  {
    $this->formats = $formats;
  }
  public function getFormats()
  {
    return $this->formats;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlatforms($platforms)
  {
    $this->platforms = $platforms;
  }
  public function getPlatforms()
  {
    return $this->platforms;
  }
  public function setPublisherIdentifiers($publisherIdentifiers)
  {
    $this->publisherIdentifiers = $publisherIdentifiers;
  }
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
  public function setSellerNetworkIds($sellerNetworkIds)
  {
    $this->sellerNetworkIds = $sellerNetworkIds;
  }
  public function getSellerNetworkIds()
  {
    return $this->sellerNetworkIds;
  }
  public function setTimeSeriesGranularity($timeSeriesGranularity)
  {
    $this->timeSeriesGranularity = $timeSeriesGranularity;
  }
  public function getTimeSeriesGranularity()
  {
    return $this->timeSeriesGranularity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterSet::class, 'Google_Service_AdExchangeBuyerII_FilterSet');
