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

namespace Google\Service\Contentwarehouse;

class ClassifierPornQueryClassifierOutput extends \Google\Model
{
  /**
   * @var string
   */
  public $csaiClassification;
  /**
   * @var string
   */
  public $csaiRegexpHighConfidenceClassification;
  /**
   * @var string
   */
  public $debug;
  /**
   * @var bool
   */
  public $isPositive;
  /**
   * @var float
   */
  public $score;

  /**
   * @param string
   */
  public function setCsaiClassification($csaiClassification)
  {
    $this->csaiClassification = $csaiClassification;
  }
  /**
   * @return string
   */
  public function getCsaiClassification()
  {
    return $this->csaiClassification;
  }
  /**
   * @param string
   */
  public function setCsaiRegexpHighConfidenceClassification($csaiRegexpHighConfidenceClassification)
  {
    $this->csaiRegexpHighConfidenceClassification = $csaiRegexpHighConfidenceClassification;
  }
  /**
   * @return string
   */
  public function getCsaiRegexpHighConfidenceClassification()
  {
    return $this->csaiRegexpHighConfidenceClassification;
  }
  /**
   * @param string
   */
  public function setDebug($debug)
  {
    $this->debug = $debug;
  }
  /**
   * @return string
   */
  public function getDebug()
  {
    return $this->debug;
  }
  /**
   * @param bool
   */
  public function setIsPositive($isPositive)
  {
    $this->isPositive = $isPositive;
  }
  /**
   * @return bool
   */
  public function getIsPositive()
  {
    return $this->isPositive;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClassifierPornQueryClassifierOutput::class, 'Google_Service_Contentwarehouse_ClassifierPornQueryClassifierOutput');
