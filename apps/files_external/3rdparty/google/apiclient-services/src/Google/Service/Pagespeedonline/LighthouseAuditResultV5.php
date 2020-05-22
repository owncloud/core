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

class Google_Service_Pagespeedonline_LighthouseAuditResultV5 extends Google_Model
{
  public $description;
  public $details;
  public $displayValue;
  public $errorMessage;
  public $explanation;
  public $id;
  public $numericValue;
  public $score;
  public $scoreDisplayMode;
  public $title;
  public $warnings;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDetails($details)
  {
    $this->details = $details;
  }
  public function getDetails()
  {
    return $this->details;
  }
  public function setDisplayValue($displayValue)
  {
    $this->displayValue = $displayValue;
  }
  public function getDisplayValue()
  {
    return $this->displayValue;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setExplanation($explanation)
  {
    $this->explanation = $explanation;
  }
  public function getExplanation()
  {
    return $this->explanation;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setNumericValue($numericValue)
  {
    $this->numericValue = $numericValue;
  }
  public function getNumericValue()
  {
    return $this->numericValue;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setScoreDisplayMode($scoreDisplayMode)
  {
    $this->scoreDisplayMode = $scoreDisplayMode;
  }
  public function getScoreDisplayMode()
  {
    return $this->scoreDisplayMode;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}
