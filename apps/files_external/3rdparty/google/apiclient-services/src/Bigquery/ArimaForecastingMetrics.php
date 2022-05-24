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

class ArimaForecastingMetrics extends \Google\Collection
{
  protected $collection_key = 'timeSeriesId';
  protected $arimaFittingMetricsType = ArimaFittingMetrics::class;
  protected $arimaFittingMetricsDataType = 'array';
  protected $arimaSingleModelForecastingMetricsType = ArimaSingleModelForecastingMetrics::class;
  protected $arimaSingleModelForecastingMetricsDataType = 'array';
  /**
   * @var bool[]
   */
  public $hasDrift;
  protected $nonSeasonalOrderType = ArimaOrder::class;
  protected $nonSeasonalOrderDataType = 'array';
  /**
   * @var string[]
   */
  public $seasonalPeriods;
  /**
   * @var string[]
   */
  public $timeSeriesId;

  /**
   * @param ArimaFittingMetrics[]
   */
  public function setArimaFittingMetrics($arimaFittingMetrics)
  {
    $this->arimaFittingMetrics = $arimaFittingMetrics;
  }
  /**
   * @return ArimaFittingMetrics[]
   */
  public function getArimaFittingMetrics()
  {
    return $this->arimaFittingMetrics;
  }
  /**
   * @param ArimaSingleModelForecastingMetrics[]
   */
  public function setArimaSingleModelForecastingMetrics($arimaSingleModelForecastingMetrics)
  {
    $this->arimaSingleModelForecastingMetrics = $arimaSingleModelForecastingMetrics;
  }
  /**
   * @return ArimaSingleModelForecastingMetrics[]
   */
  public function getArimaSingleModelForecastingMetrics()
  {
    return $this->arimaSingleModelForecastingMetrics;
  }
  /**
   * @param bool[]
   */
  public function setHasDrift($hasDrift)
  {
    $this->hasDrift = $hasDrift;
  }
  /**
   * @return bool[]
   */
  public function getHasDrift()
  {
    return $this->hasDrift;
  }
  /**
   * @param ArimaOrder[]
   */
  public function setNonSeasonalOrder($nonSeasonalOrder)
  {
    $this->nonSeasonalOrder = $nonSeasonalOrder;
  }
  /**
   * @return ArimaOrder[]
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
   * @param string[]
   */
  public function setTimeSeriesId($timeSeriesId)
  {
    $this->timeSeriesId = $timeSeriesId;
  }
  /**
   * @return string[]
   */
  public function getTimeSeriesId()
  {
    return $this->timeSeriesId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ArimaForecastingMetrics::class, 'Google_Service_Bigquery_ArimaForecastingMetrics');
