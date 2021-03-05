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

class Google_Service_Bigquery_EvaluationMetrics extends Google_Model
{
  protected $arimaForecastingMetricsType = 'Google_Service_Bigquery_ArimaForecastingMetrics';
  protected $arimaForecastingMetricsDataType = '';
  protected $binaryClassificationMetricsType = 'Google_Service_Bigquery_BinaryClassificationMetrics';
  protected $binaryClassificationMetricsDataType = '';
  protected $clusteringMetricsType = 'Google_Service_Bigquery_ClusteringMetrics';
  protected $clusteringMetricsDataType = '';
  protected $dimensionalityReductionMetricsType = 'Google_Service_Bigquery_DimensionalityReductionMetrics';
  protected $dimensionalityReductionMetricsDataType = '';
  protected $multiClassClassificationMetricsType = 'Google_Service_Bigquery_MultiClassClassificationMetrics';
  protected $multiClassClassificationMetricsDataType = '';
  protected $rankingMetricsType = 'Google_Service_Bigquery_RankingMetrics';
  protected $rankingMetricsDataType = '';
  protected $regressionMetricsType = 'Google_Service_Bigquery_RegressionMetrics';
  protected $regressionMetricsDataType = '';

  /**
   * @param Google_Service_Bigquery_ArimaForecastingMetrics
   */
  public function setArimaForecastingMetrics(Google_Service_Bigquery_ArimaForecastingMetrics $arimaForecastingMetrics)
  {
    $this->arimaForecastingMetrics = $arimaForecastingMetrics;
  }
  /**
   * @return Google_Service_Bigquery_ArimaForecastingMetrics
   */
  public function getArimaForecastingMetrics()
  {
    return $this->arimaForecastingMetrics;
  }
  /**
   * @param Google_Service_Bigquery_BinaryClassificationMetrics
   */
  public function setBinaryClassificationMetrics(Google_Service_Bigquery_BinaryClassificationMetrics $binaryClassificationMetrics)
  {
    $this->binaryClassificationMetrics = $binaryClassificationMetrics;
  }
  /**
   * @return Google_Service_Bigquery_BinaryClassificationMetrics
   */
  public function getBinaryClassificationMetrics()
  {
    return $this->binaryClassificationMetrics;
  }
  /**
   * @param Google_Service_Bigquery_ClusteringMetrics
   */
  public function setClusteringMetrics(Google_Service_Bigquery_ClusteringMetrics $clusteringMetrics)
  {
    $this->clusteringMetrics = $clusteringMetrics;
  }
  /**
   * @return Google_Service_Bigquery_ClusteringMetrics
   */
  public function getClusteringMetrics()
  {
    return $this->clusteringMetrics;
  }
  /**
   * @param Google_Service_Bigquery_DimensionalityReductionMetrics
   */
  public function setDimensionalityReductionMetrics(Google_Service_Bigquery_DimensionalityReductionMetrics $dimensionalityReductionMetrics)
  {
    $this->dimensionalityReductionMetrics = $dimensionalityReductionMetrics;
  }
  /**
   * @return Google_Service_Bigquery_DimensionalityReductionMetrics
   */
  public function getDimensionalityReductionMetrics()
  {
    return $this->dimensionalityReductionMetrics;
  }
  /**
   * @param Google_Service_Bigquery_MultiClassClassificationMetrics
   */
  public function setMultiClassClassificationMetrics(Google_Service_Bigquery_MultiClassClassificationMetrics $multiClassClassificationMetrics)
  {
    $this->multiClassClassificationMetrics = $multiClassClassificationMetrics;
  }
  /**
   * @return Google_Service_Bigquery_MultiClassClassificationMetrics
   */
  public function getMultiClassClassificationMetrics()
  {
    return $this->multiClassClassificationMetrics;
  }
  /**
   * @param Google_Service_Bigquery_RankingMetrics
   */
  public function setRankingMetrics(Google_Service_Bigquery_RankingMetrics $rankingMetrics)
  {
    $this->rankingMetrics = $rankingMetrics;
  }
  /**
   * @return Google_Service_Bigquery_RankingMetrics
   */
  public function getRankingMetrics()
  {
    return $this->rankingMetrics;
  }
  /**
   * @param Google_Service_Bigquery_RegressionMetrics
   */
  public function setRegressionMetrics(Google_Service_Bigquery_RegressionMetrics $regressionMetrics)
  {
    $this->regressionMetrics = $regressionMetrics;
  }
  /**
   * @return Google_Service_Bigquery_RegressionMetrics
   */
  public function getRegressionMetrics()
  {
    return $this->regressionMetrics;
  }
}
