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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails extends \Google\Model
{
  protected $categoricalStatsResultType = GooglePrivacyDlpV2CategoricalStatsResult::class;
  protected $categoricalStatsResultDataType = '';
  protected $deltaPresenceEstimationResultType = GooglePrivacyDlpV2DeltaPresenceEstimationResult::class;
  protected $deltaPresenceEstimationResultDataType = '';
  protected $kAnonymityResultType = GooglePrivacyDlpV2KAnonymityResult::class;
  protected $kAnonymityResultDataType = '';
  protected $kMapEstimationResultType = GooglePrivacyDlpV2KMapEstimationResult::class;
  protected $kMapEstimationResultDataType = '';
  protected $lDiversityResultType = GooglePrivacyDlpV2LDiversityResult::class;
  protected $lDiversityResultDataType = '';
  protected $numericalStatsResultType = GooglePrivacyDlpV2NumericalStatsResult::class;
  protected $numericalStatsResultDataType = '';
  protected $requestedOptionsType = GooglePrivacyDlpV2RequestedRiskAnalysisOptions::class;
  protected $requestedOptionsDataType = '';
  protected $requestedPrivacyMetricType = GooglePrivacyDlpV2PrivacyMetric::class;
  protected $requestedPrivacyMetricDataType = '';
  protected $requestedSourceTableType = GooglePrivacyDlpV2BigQueryTable::class;
  protected $requestedSourceTableDataType = '';

  /**
   * @param GooglePrivacyDlpV2CategoricalStatsResult
   */
  public function setCategoricalStatsResult(GooglePrivacyDlpV2CategoricalStatsResult $categoricalStatsResult)
  {
    $this->categoricalStatsResult = $categoricalStatsResult;
  }
  /**
   * @return GooglePrivacyDlpV2CategoricalStatsResult
   */
  public function getCategoricalStatsResult()
  {
    return $this->categoricalStatsResult;
  }
  /**
   * @param GooglePrivacyDlpV2DeltaPresenceEstimationResult
   */
  public function setDeltaPresenceEstimationResult(GooglePrivacyDlpV2DeltaPresenceEstimationResult $deltaPresenceEstimationResult)
  {
    $this->deltaPresenceEstimationResult = $deltaPresenceEstimationResult;
  }
  /**
   * @return GooglePrivacyDlpV2DeltaPresenceEstimationResult
   */
  public function getDeltaPresenceEstimationResult()
  {
    return $this->deltaPresenceEstimationResult;
  }
  /**
   * @param GooglePrivacyDlpV2KAnonymityResult
   */
  public function setKAnonymityResult(GooglePrivacyDlpV2KAnonymityResult $kAnonymityResult)
  {
    $this->kAnonymityResult = $kAnonymityResult;
  }
  /**
   * @return GooglePrivacyDlpV2KAnonymityResult
   */
  public function getKAnonymityResult()
  {
    return $this->kAnonymityResult;
  }
  /**
   * @param GooglePrivacyDlpV2KMapEstimationResult
   */
  public function setKMapEstimationResult(GooglePrivacyDlpV2KMapEstimationResult $kMapEstimationResult)
  {
    $this->kMapEstimationResult = $kMapEstimationResult;
  }
  /**
   * @return GooglePrivacyDlpV2KMapEstimationResult
   */
  public function getKMapEstimationResult()
  {
    return $this->kMapEstimationResult;
  }
  /**
   * @param GooglePrivacyDlpV2LDiversityResult
   */
  public function setLDiversityResult(GooglePrivacyDlpV2LDiversityResult $lDiversityResult)
  {
    $this->lDiversityResult = $lDiversityResult;
  }
  /**
   * @return GooglePrivacyDlpV2LDiversityResult
   */
  public function getLDiversityResult()
  {
    return $this->lDiversityResult;
  }
  /**
   * @param GooglePrivacyDlpV2NumericalStatsResult
   */
  public function setNumericalStatsResult(GooglePrivacyDlpV2NumericalStatsResult $numericalStatsResult)
  {
    $this->numericalStatsResult = $numericalStatsResult;
  }
  /**
   * @return GooglePrivacyDlpV2NumericalStatsResult
   */
  public function getNumericalStatsResult()
  {
    return $this->numericalStatsResult;
  }
  /**
   * @param GooglePrivacyDlpV2RequestedRiskAnalysisOptions
   */
  public function setRequestedOptions(GooglePrivacyDlpV2RequestedRiskAnalysisOptions $requestedOptions)
  {
    $this->requestedOptions = $requestedOptions;
  }
  /**
   * @return GooglePrivacyDlpV2RequestedRiskAnalysisOptions
   */
  public function getRequestedOptions()
  {
    return $this->requestedOptions;
  }
  /**
   * @param GooglePrivacyDlpV2PrivacyMetric
   */
  public function setRequestedPrivacyMetric(GooglePrivacyDlpV2PrivacyMetric $requestedPrivacyMetric)
  {
    $this->requestedPrivacyMetric = $requestedPrivacyMetric;
  }
  /**
   * @return GooglePrivacyDlpV2PrivacyMetric
   */
  public function getRequestedPrivacyMetric()
  {
    return $this->requestedPrivacyMetric;
  }
  /**
   * @param GooglePrivacyDlpV2BigQueryTable
   */
  public function setRequestedSourceTable(GooglePrivacyDlpV2BigQueryTable $requestedSourceTable)
  {
    $this->requestedSourceTable = $requestedSourceTable;
  }
  /**
   * @return GooglePrivacyDlpV2BigQueryTable
   */
  public function getRequestedSourceTable()
  {
    return $this->requestedSourceTable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails::class, 'Google_Service_DLP_GooglePrivacyDlpV2AnalyzeDataSourceRiskDetails');
