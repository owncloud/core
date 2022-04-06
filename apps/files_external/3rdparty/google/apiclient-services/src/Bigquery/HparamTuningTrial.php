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

class HparamTuningTrial extends \Google\Model
{
  /**
   * @var string
   */
  public $endTimeMs;
  /**
   * @var string
   */
  public $errorMessage;
  public $evalLoss;
  protected $evaluationMetricsType = EvaluationMetrics::class;
  protected $evaluationMetricsDataType = '';
  protected $hparamTuningEvaluationMetricsType = EvaluationMetrics::class;
  protected $hparamTuningEvaluationMetricsDataType = '';
  protected $hparamsType = TrainingOptions::class;
  protected $hparamsDataType = '';
  /**
   * @var string
   */
  public $startTimeMs;
  /**
   * @var string
   */
  public $status;
  public $trainingLoss;
  /**
   * @var string
   */
  public $trialId;

  /**
   * @param string
   */
  public function setEndTimeMs($endTimeMs)
  {
    $this->endTimeMs = $endTimeMs;
  }
  /**
   * @return string
   */
  public function getEndTimeMs()
  {
    return $this->endTimeMs;
  }
  /**
   * @param string
   */
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  /**
   * @return string
   */
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setEvalLoss($evalLoss)
  {
    $this->evalLoss = $evalLoss;
  }
  public function getEvalLoss()
  {
    return $this->evalLoss;
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
   * @param EvaluationMetrics
   */
  public function setHparamTuningEvaluationMetrics(EvaluationMetrics $hparamTuningEvaluationMetrics)
  {
    $this->hparamTuningEvaluationMetrics = $hparamTuningEvaluationMetrics;
  }
  /**
   * @return EvaluationMetrics
   */
  public function getHparamTuningEvaluationMetrics()
  {
    return $this->hparamTuningEvaluationMetrics;
  }
  /**
   * @param TrainingOptions
   */
  public function setHparams(TrainingOptions $hparams)
  {
    $this->hparams = $hparams;
  }
  /**
   * @return TrainingOptions
   */
  public function getHparams()
  {
    return $this->hparams;
  }
  /**
   * @param string
   */
  public function setStartTimeMs($startTimeMs)
  {
    $this->startTimeMs = $startTimeMs;
  }
  /**
   * @return string
   */
  public function getStartTimeMs()
  {
    return $this->startTimeMs;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  public function setTrainingLoss($trainingLoss)
  {
    $this->trainingLoss = $trainingLoss;
  }
  public function getTrainingLoss()
  {
    return $this->trainingLoss;
  }
  /**
   * @param string
   */
  public function setTrialId($trialId)
  {
    $this->trialId = $trialId;
  }
  /**
   * @return string
   */
  public function getTrialId()
  {
    return $this->trialId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HparamTuningTrial::class, 'Google_Service_Bigquery_HparamTuningTrial');
