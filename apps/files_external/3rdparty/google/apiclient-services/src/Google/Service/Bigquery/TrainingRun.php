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

class Google_Service_Bigquery_TrainingRun extends Google_Collection
{
  protected $collection_key = 'results';
  protected $dataSplitResultType = 'Google_Service_Bigquery_DataSplitResult';
  protected $dataSplitResultDataType = '';
  protected $evaluationMetricsType = 'Google_Service_Bigquery_EvaluationMetrics';
  protected $evaluationMetricsDataType = '';
  protected $resultsType = 'Google_Service_Bigquery_IterationResult';
  protected $resultsDataType = 'array';
  public $startTime;
  protected $trainingOptionsType = 'Google_Service_Bigquery_TrainingOptions';
  protected $trainingOptionsDataType = '';

  /**
   * @param Google_Service_Bigquery_DataSplitResult
   */
  public function setDataSplitResult(Google_Service_Bigquery_DataSplitResult $dataSplitResult)
  {
    $this->dataSplitResult = $dataSplitResult;
  }
  /**
   * @return Google_Service_Bigquery_DataSplitResult
   */
  public function getDataSplitResult()
  {
    return $this->dataSplitResult;
  }
  /**
   * @param Google_Service_Bigquery_EvaluationMetrics
   */
  public function setEvaluationMetrics(Google_Service_Bigquery_EvaluationMetrics $evaluationMetrics)
  {
    $this->evaluationMetrics = $evaluationMetrics;
  }
  /**
   * @return Google_Service_Bigquery_EvaluationMetrics
   */
  public function getEvaluationMetrics()
  {
    return $this->evaluationMetrics;
  }
  /**
   * @param Google_Service_Bigquery_IterationResult
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_Bigquery_IterationResult
   */
  public function getResults()
  {
    return $this->results;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param Google_Service_Bigquery_TrainingOptions
   */
  public function setTrainingOptions(Google_Service_Bigquery_TrainingOptions $trainingOptions)
  {
    $this->trainingOptions = $trainingOptions;
  }
  /**
   * @return Google_Service_Bigquery_TrainingOptions
   */
  public function getTrainingOptions()
  {
    return $this->trainingOptions;
  }
}
