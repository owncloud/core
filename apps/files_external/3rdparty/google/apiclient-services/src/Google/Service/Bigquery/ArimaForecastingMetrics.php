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

class Google_Service_Bigquery_ArimaForecastingMetrics extends Google_Collection
{
  protected $collection_key = 'timeSeriesId';
  protected $arimaFittingMetricsType = 'Google_Service_Bigquery_ArimaFittingMetrics';
  protected $arimaFittingMetricsDataType = 'array';
  protected $arimaSingleModelForecastingMetricsType = 'Google_Service_Bigquery_ArimaSingleModelForecastingMetrics';
  protected $arimaSingleModelForecastingMetricsDataType = 'array';
  public $hasDrift;
  protected $nonSeasonalOrderType = 'Google_Service_Bigquery_ArimaOrder';
  protected $nonSeasonalOrderDataType = 'array';
  public $seasonalPeriods;
  public $timeSeriesId;

  /**
   * @param Google_Service_Bigquery_ArimaFittingMetrics
   */
  public function setArimaFittingMetrics($arimaFittingMetrics)
  {
    $this->arimaFittingMetrics = $arimaFittingMetrics;
  }
  /**
   * @return Google_Service_Bigquery_ArimaFittingMetrics
   */
  public function getArimaFittingMetrics()
  {
    return $this->arimaFittingMetrics;
  }
  /**
   * @param Google_Service_Bigquery_ArimaSingleModelForecastingMetrics
   */
  public function setArimaSingleModelForecastingMetrics($arimaSingleModelForecastingMetrics)
  {
    $this->arimaSingleModelForecastingMetrics = $arimaSingleModelForecastingMetrics;
  }
  /**
   * @return Google_Service_Bigquery_ArimaSingleModelForecastingMetrics
   */
  public function getArimaSingleModelForecastingMetrics()
  {
    return $this->arimaSingleModelForecastingMetrics;
  }
  public function setHasDrift($hasDrift)
  {
    $this->hasDrift = $hasDrift;
  }
  public function getHasDrift()
  {
    return $this->hasDrift;
  }
  /**
   * @param Google_Service_Bigquery_ArimaOrder
   */
  public function setNonSeasonalOrder($nonSeasonalOrder)
  {
    $this->nonSeasonalOrder = $nonSeasonalOrder;
  }
  /**
   * @return Google_Service_Bigquery_ArimaOrder
   */
  public function getNonSeasonalOrder()
  {
    return $this->nonSeasonalOrder;
  }
  public function setSeasonalPeriods($seasonalPeriods)
  {
    $this->seasonalPeriods = $seasonalPeriods;
  }
  public function getSeasonalPeriods()
  {
    return $this->seasonalPeriods;
  }
  public function setTimeSeriesId($timeSeriesId)
  {
    $this->timeSeriesId = $timeSeriesId;
  }
  public function getTimeSeriesId()
  {
    return $this->timeSeriesId;
  }
}
