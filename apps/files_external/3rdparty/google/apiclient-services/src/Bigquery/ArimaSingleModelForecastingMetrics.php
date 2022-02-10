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

namespace Google\Service\Bigquery;

class ArimaSingleModelForecastingMetrics extends \Google\Collection
{
  protected $collection_key = 'timeSeriesIds';
  protected $arimaFittingMetricsType = ArimaFittingMetrics::class;
  protected $arimaFittingMetricsDataType = '';
  /**
   * @var bool
   */
  public $hasDrift;
  /**
   * @var bool
   */
  public $hasHolidayEffect;
  /**
   * @var bool
   */
  public $hasSpikesAndDips;
  /**
   * @var bool
   */
  public $hasStepChanges;
  protected $nonSeasonalOrderType = ArimaOrder::class;
  protected $nonSeasonalOrderDataType = '';
  /**
   * @var string[]
   */
  public $seasonalPeriods;
  /**
   * @var string
   */
  public $timeSeriesId;
  /**
   * @var string[]
   */
  public $timeSeriesIds;

  /**
   * @param ArimaFittingMetrics
   */
  public function setArimaFittingMetrics(ArimaFittingMetrics $arimaFittingMetrics)
  {
    $this->arimaFittingMetrics = $arimaFittingMetrics;
  }
  /**
   * @return ArimaFittingMetrics
   */
  public function getArimaFittingMetrics()
  {
    return $this->arimaFittingMetrics;
  }
  /**
   * @param bool
   */
  public function setHasDrift($hasDrift)
  {
    $this->hasDrift = $hasDrift;
  }
  /**
   * @return bool
   */
  public function getHasDrift()
  {
    return $this->hasDrift;
  }
  /**
   * @param bool
   */
  public function setHasHolidayEffect($hasHolidayEffect)
  {
    $this->hasHolidayEffect = $hasHolidayEffect;
  }
  /**
   * @return bool
   */
  public function getHasHolidayEffect()
  {
    return $this->hasHolidayEffect;
  }
  /**
   * @param bool
   */
  public function setHasSpikesAndDips($hasSpikesAndDips)
  {
    $this->hasSpikesAndDips = $hasSpikesAndDips;
  }
  /**
   * @return bool
   */
  public function getHasSpikesAndDips()
  {
    return $this->hasSpikesAndDips;
  }
  /**
   * @param bool
   */
  public function setHasStepChanges($hasStepChanges)
  {
    $this->hasStepChanges = $hasStepChanges;
  }
  /**
   * @return bool
   */
  public function getHasStepChanges()
  {
    return $this->hasStepChanges;
  }
  /**
   * @param ArimaOrder
   */
  public function setNonSeasonalOrder(ArimaOrder $nonSeasonalOrder)
  {
    $this->nonSeasonalOrder = $nonSeasonalOrder;
  }
  /**
   * @return ArimaOrder
   */
  public function getNonSeasonalOrder()
  {
    return $this->nonSeasonalOrder;
  }
  /**
   * @param string[]
   */
  public function setSeasonalPeriods($seasonalPeriods)
  {
    $this->seasonalPeriods = $seasonalPeriods;
  }
  /**
   * @return string[]
   */
  public function getSeasonalPeriods()
  {
    return $this->seasonalPeriods;
  }
  /**
   * @param string
   */
  public function setTimeSeriesId($timeSeriesId)
  {
    $this->timeSeriesId = $timeSeriesId;
  }
  /**
   * @return string
   */
  public function getTimeSeriesId()
  {
    return $this->timeSeriesId;
  }
  /**
   * @param string[]
   */
  public function setTimeSeriesIds($timeSeriesIds)
  {
    $this->timeSeriesIds = $timeSeriesIds;
  }
  /**
   * @return string[]
   */
  public function getTimeSeriesIds()
  {
    return $this->timeSeriesIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ArimaSingleModelForecastingMetrics::class, 'Google_Service_Bigquery_ArimaSingleModelForecastingMetrics');
