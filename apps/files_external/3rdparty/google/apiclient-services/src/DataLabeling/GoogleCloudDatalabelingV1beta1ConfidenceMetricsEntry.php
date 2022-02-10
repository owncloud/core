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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry extends \Google\Model
{
  /**
   * @var float
   */
  public $confidenceThreshold;
  /**
   * @var float
   */
  public $f1Score;
  /**
   * @var float
   */
  public $f1ScoreAt1;
  /**
   * @var float
   */
  public $f1ScoreAt5;
  /**
   * @var float
   */
  public $precision;
  /**
   * @var float
   */
  public $precisionAt1;
  /**
   * @var float
   */
  public $precisionAt5;
  /**
   * @var float
   */
  public $recall;
  /**
   * @var float
   */
  public $recallAt1;
  /**
   * @var float
   */
  public $recallAt5;

  /**
   * @param float
   */
  public function setConfidenceThreshold($confidenceThreshold)
  {
    $this->confidenceThreshold = $confidenceThreshold;
  }
  /**
   * @return float
   */
  public function getConfidenceThreshold()
  {
    return $this->confidenceThreshold;
  }
  /**
   * @param float
   */
  public function setF1Score($f1Score)
  {
    $this->f1Score = $f1Score;
  }
  /**
   * @return float
   */
  public function getF1Score()
  {
    return $this->f1Score;
  }
  /**
   * @param float
   */
  public function setF1ScoreAt1($f1ScoreAt1)
  {
    $this->f1ScoreAt1 = $f1ScoreAt1;
  }
  /**
   * @return float
   */
  public function getF1ScoreAt1()
  {
    return $this->f1ScoreAt1;
  }
  /**
   * @param float
   */
  public function setF1ScoreAt5($f1ScoreAt5)
  {
    $this->f1ScoreAt5 = $f1ScoreAt5;
  }
  /**
   * @return float
   */
  public function getF1ScoreAt5()
  {
    return $this->f1ScoreAt5;
  }
  /**
   * @param float
   */
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  /**
   * @return float
   */
  public function getPrecision()
  {
    return $this->precision;
  }
  /**
   * @param float
   */
  public function setPrecisionAt1($precisionAt1)
  {
    $this->precisionAt1 = $precisionAt1;
  }
  /**
   * @return float
   */
  public function getPrecisionAt1()
  {
    return $this->precisionAt1;
  }
  /**
   * @param float
   */
  public function setPrecisionAt5($precisionAt5)
  {
    $this->precisionAt5 = $precisionAt5;
  }
  /**
   * @return float
   */
  public function getPrecisionAt5()
  {
    return $this->precisionAt5;
  }
  /**
   * @param float
   */
  public function setRecall($recall)
  {
    $this->recall = $recall;
  }
  /**
   * @return float
   */
  public function getRecall()
  {
    return $this->recall;
  }
  /**
   * @param float
   */
  public function setRecallAt1($recallAt1)
  {
    $this->recallAt1 = $recallAt1;
  }
  /**
   * @return float
   */
  public function getRecallAt1()
  {
    return $this->recallAt1;
  }
  /**
   * @param float
   */
  public function setRecallAt5($recallAt5)
  {
    $this->recallAt5 = $recallAt5;
  }
  /**
   * @return float
   */
  public function getRecallAt5()
  {
    return $this->recallAt5;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry');
