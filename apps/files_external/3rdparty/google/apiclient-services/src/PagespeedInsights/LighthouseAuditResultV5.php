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

namespace Google\Service\PagespeedInsights;

class LighthouseAuditResultV5 extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var array[]
   */
  public $details;
  /**
   * @var string
   */
  public $displayValue;
  /**
   * @var string
   */
  public $errorMessage;
  /**
   * @var string
   */
  public $explanation;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $numericUnit;
  public $numericValue;
  /**
   * @var array
   */
  public $score;
  /**
   * @var string
   */
  public $scoreDisplayMode;
  /**
   * @var string
   */
  public $title;
  /**
   * @var array
   */
  public $warnings;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param array[]
   */
  public function setDetails($details)
  {
    $this->details = $details;
  }
  /**
   * @return array[]
   */
  public function getDetails()
  {
    return $this->details;
  }
  /**
   * @param string
   */
  public function setDisplayValue($displayValue)
  {
    $this->displayValue = $displayValue;
  }
  /**
   * @return string
   */
  public function getDisplayValue()
  {
    return $this->displayValue;
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
  /**
   * @param string
   */
  public function setExplanation($explanation)
  {
    $this->explanation = $explanation;
  }
  /**
   * @return string
   */
  public function getExplanation()
  {
    return $this->explanation;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setNumericUnit($numericUnit)
  {
    $this->numericUnit = $numericUnit;
  }
  /**
   * @return string
   */
  public function getNumericUnit()
  {
    return $this->numericUnit;
  }
  public function setNumericValue($numericValue)
  {
    $this->numericValue = $numericValue;
  }
  public function getNumericValue()
  {
    return $this->numericValue;
  }
  /**
   * @param array
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return array
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param string
   */
  public function setScoreDisplayMode($scoreDisplayMode)
  {
    $this->scoreDisplayMode = $scoreDisplayMode;
  }
  /**
   * @return string
   */
  public function getScoreDisplayMode()
  {
    return $this->scoreDisplayMode;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param array
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return array
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LighthouseAuditResultV5::class, 'Google_Service_PagespeedInsights_LighthouseAuditResultV5');
