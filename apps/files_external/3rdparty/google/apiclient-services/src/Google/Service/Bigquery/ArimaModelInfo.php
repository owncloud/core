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

class Google_Service_Bigquery_ArimaModelInfo extends Google_Model
{
  protected $arimaCoefficientsType = 'Google_Service_Bigquery_ArimaCoefficients';
  protected $arimaCoefficientsDataType = '';
  protected $arimaFittingMetricsType = 'Google_Service_Bigquery_ArimaFittingMetrics';
  protected $arimaFittingMetricsDataType = '';
  protected $nonSeasonalOrderType = 'Google_Service_Bigquery_ArimaOrder';
  protected $nonSeasonalOrderDataType = '';

  /**
   * @param Google_Service_Bigquery_ArimaCoefficients
   */
  public function setArimaCoefficients(Google_Service_Bigquery_ArimaCoefficients $arimaCoefficients)
  {
    $this->arimaCoefficients = $arimaCoefficients;
  }
  /**
   * @return Google_Service_Bigquery_ArimaCoefficients
   */
  public function getArimaCoefficients()
  {
    return $this->arimaCoefficients;
  }
  /**
   * @param Google_Service_Bigquery_ArimaFittingMetrics
   */
  public function setArimaFittingMetrics(Google_Service_Bigquery_ArimaFittingMetrics $arimaFittingMetrics)
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
   * @param Google_Service_Bigquery_ArimaOrder
   */
  public function setNonSeasonalOrder(Google_Service_Bigquery_ArimaOrder $nonSeasonalOrder)
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
}
