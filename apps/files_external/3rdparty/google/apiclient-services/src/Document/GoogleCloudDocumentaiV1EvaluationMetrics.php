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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1EvaluationMetrics extends \Google\Model
{
  public $f1Score;
  public $falseNegativesCount;
  public $falsePositivesCount;
  public $groundTruthOccurrencesCount;
  public $precision;
  public $predictedOccurrencesCount;
  public $recall;
  public $totalDocumentsCount;
  public $truePositivesCount;

  public function setF1Score($f1Score)
  {
    $this->f1Score = $f1Score;
  }
  public function getF1Score()
  {
    return $this->f1Score;
  }
  public function setFalseNegativesCount($falseNegativesCount)
  {
    $this->falseNegativesCount = $falseNegativesCount;
  }
  public function getFalseNegativesCount()
  {
    return $this->falseNegativesCount;
  }
  public function setFalsePositivesCount($falsePositivesCount)
  {
    $this->falsePositivesCount = $falsePositivesCount;
  }
  public function getFalsePositivesCount()
  {
    return $this->falsePositivesCount;
  }
  public function setGroundTruthOccurrencesCount($groundTruthOccurrencesCount)
  {
    $this->groundTruthOccurrencesCount = $groundTruthOccurrencesCount;
  }
  public function getGroundTruthOccurrencesCount()
  {
    return $this->groundTruthOccurrencesCount;
  }
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  public function getPrecision()
  {
    return $this->precision;
  }
  public function setPredictedOccurrencesCount($predictedOccurrencesCount)
  {
    $this->predictedOccurrencesCount = $predictedOccurrencesCount;
  }
  public function getPredictedOccurrencesCount()
  {
    return $this->predictedOccurrencesCount;
  }
  public function setRecall($recall)
  {
    $this->recall = $recall;
  }
  public function getRecall()
  {
    return $this->recall;
  }
  public function setTotalDocumentsCount($totalDocumentsCount)
  {
    $this->totalDocumentsCount = $totalDocumentsCount;
  }
  public function getTotalDocumentsCount()
  {
    return $this->totalDocumentsCount;
  }
  public function setTruePositivesCount($truePositivesCount)
  {
    $this->truePositivesCount = $truePositivesCount;
  }
  public function getTruePositivesCount()
  {
    return $this->truePositivesCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1EvaluationMetrics::class, 'Google_Service_Document_GoogleCloudDocumentaiV1EvaluationMetrics');
