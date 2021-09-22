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

class TrainingRun extends \Google\Collection
{
  protected $collection_key = 'results';
  protected $dataSplitResultType = DataSplitResult::class;
  protected $dataSplitResultDataType = '';
  protected $evaluationMetricsType = EvaluationMetrics::class;
  protected $evaluationMetricsDataType = '';
  protected $resultsType = IterationResult::class;
  protected $resultsDataType = 'array';
  public $startTime;
  protected $trainingOptionsType = TrainingOptions::class;
  protected $trainingOptionsDataType = '';

  /**
   * @param DataSplitResult
   */
  public function setDataSplitResult(DataSplitResult $dataSplitResult)
  {
    $this->dataSplitResult = $dataSplitResult;
  }
  /**
   * @return DataSplitResult
   */
  public function getDataSplitResult()
  {
    return $this->dataSplitResult;
  }
  /**
   * @param EvaluationMetrics
   */
  public function setEvaluationMetrics(EvaluationMetrics $evaluationMetrics)
  {
    $this->evaluationMetrics = $evaluationMetrics;
  }
  /**
   * @return EvaluationMetrics
   */
  public function getEvaluationMetrics()
  {
    return $this->evaluationMetrics;
  }
  /**
   * @param IterationResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return IterationResult[]
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
   * @param TrainingOptions
   */
  public function setTrainingOptions(TrainingOptions $trainingOptions)
  {
    $this->trainingOptions = $trainingOptions;
  }
  /**
   * @return TrainingOptions
   */
  public function getTrainingOptions()
  {
    return $this->trainingOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrainingRun::class, 'Google_Service_Bigquery_TrainingRun');
