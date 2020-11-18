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

class Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1ConfidenceMetricsEntry extends Google_Model
{
  public $confidenceThreshold;
  public $f1Score;
  public $f1ScoreAt1;
  public $f1ScoreAt5;
  public $precision;
  public $precisionAt1;
  public $precisionAt5;
  public $recall;
  public $recallAt1;
  public $recallAt5;

  public function setConfidenceThreshold($confidenceThreshold)
  {
    $this->confidenceThreshold = $confidenceThreshold;
  }
  public function getConfidenceThreshold()
  {
    return $this->confidenceThreshold;
  }
  public function setF1Score($f1Score)
  {
    $this->f1Score = $f1Score;
  }
  public function getF1Score()
  {
    return $this->f1Score;
  }
  public function setF1ScoreAt1($f1ScoreAt1)
  {
    $this->f1ScoreAt1 = $f1ScoreAt1;
  }
  public function getF1ScoreAt1()
  {
    return $this->f1ScoreAt1;
  }
  public function setF1ScoreAt5($f1ScoreAt5)
  {
    $this->f1ScoreAt5 = $f1ScoreAt5;
  }
  public function getF1ScoreAt5()
  {
    return $this->f1ScoreAt5;
  }
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  public function getPrecision()
  {
    return $this->precision;
  }
  public function setPrecisionAt1($precisionAt1)
  {
    $this->precisionAt1 = $precisionAt1;
  }
  public function getPrecisionAt1()
  {
    return $this->precisionAt1;
  }
  public function setPrecisionAt5($precisionAt5)
  {
    $this->precisionAt5 = $precisionAt5;
  }
  public function getPrecisionAt5()
  {
    return $this->precisionAt5;
  }
  public function setRecall($recall)
  {
    $this->recall = $recall;
  }
  public function getRecall()
  {
    return $this->recall;
  }
  public function setRecallAt1($recallAt1)
  {
    $this->recallAt1 = $recallAt1;
  }
  public function getRecallAt1()
  {
    return $this->recallAt1;
  }
  public function setRecallAt5($recallAt5)
  {
    $this->recallAt5 = $recallAt5;
  }
  public function getRecallAt5()
  {
    return $this->recallAt5;
  }
}
