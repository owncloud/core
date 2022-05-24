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

class BinaryConfusionMatrix extends \Google\Model
{
  public $accuracy;
  public $f1Score;
  /**
   * @var string
   */
  public $falseNegatives;
  /**
   * @var string
   */
  public $falsePositives;
  public $positiveClassThreshold;
  public $precision;
  public $recall;
  /**
   * @var string
   */
  public $trueNegatives;
  /**
   * @var string
   */
  public $truePositives;

  public function setAccuracy($accuracy)
  {
    $this->accuracy = $accuracy;
  }
  public function getAccuracy()
  {
    return $this->accuracy;
  }
  public function setF1Score($f1Score)
  {
    $this->f1Score = $f1Score;
  }
  public function getF1Score()
  {
    return $this->f1Score;
  }
  /**
   * @param string
   */
  public function setFalseNegatives($falseNegatives)
  {
    $this->falseNegatives = $falseNegatives;
  }
  /**
   * @return string
   */
  public function getFalseNegatives()
  {
    return $this->falseNegatives;
  }
  /**
   * @param string
   */
  public function setFalsePositives($falsePositives)
  {
    $this->falsePositives = $falsePositives;
  }
  /**
   * @return string
   */
  public function getFalsePositives()
  {
    return $this->falsePositives;
  }
  public function setPositiveClassThreshold($positiveClassThreshold)
  {
    $this->positiveClassThreshold = $positiveClassThreshold;
  }
  public function getPositiveClassThreshold()
  {
    return $this->positiveClassThreshold;
  }
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  public function getPrecision()
  {
    return $this->precision;
  }
  public function setRecall($recall)
  {
    $this->recall = $recall;
  }
  public function getRecall()
  {
    return $this->recall;
  }
  /**
   * @param string
   */
  public function setTrueNegatives($trueNegatives)
  {
    $this->trueNegatives = $trueNegatives;
  }
  /**
   * @return string
   */
  public function getTrueNegatives()
  {
    return $this->trueNegatives;
  }
  /**
   * @param string
   */
  public function setTruePositives($truePositives)
  {
    $this->truePositives = $truePositives;
  }
  /**
   * @return string
   */
  public function getTruePositives()
  {
    return $this->truePositives;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BinaryConfusionMatrix::class, 'Google_Service_Bigquery_BinaryConfusionMatrix');
