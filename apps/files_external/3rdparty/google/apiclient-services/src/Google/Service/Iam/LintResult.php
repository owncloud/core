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

class Google_Service_Iam_LintResult extends Google_Model
{
  public $debugMessage;
  public $fieldName;
  public $level;
  public $locationOffset;
  public $severity;
  public $validationUnitName;

  public function setDebugMessage($debugMessage)
  {
    $this->debugMessage = $debugMessage;
  }
  public function getDebugMessage()
  {
    return $this->debugMessage;
  }
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  public function getFieldName()
  {
    return $this->fieldName;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
  public function getLevel()
  {
    return $this->level;
  }
  public function setLocationOffset($locationOffset)
  {
    $this->locationOffset = $locationOffset;
  }
  public function getLocationOffset()
  {
    return $this->locationOffset;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  public function setValidationUnitName($validationUnitName)
  {
    $this->validationUnitName = $validationUnitName;
  }
  public function getValidationUnitName()
  {
    return $this->validationUnitName;
  }
}
