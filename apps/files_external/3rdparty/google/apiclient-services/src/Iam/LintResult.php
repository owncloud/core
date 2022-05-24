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

namespace Google\Service\Iam;

class LintResult extends \Google\Model
{
  /**
   * @var string
   */
  public $debugMessage;
  /**
   * @var string
   */
  public $fieldName;
  /**
   * @var string
   */
  public $level;
  /**
   * @var int
   */
  public $locationOffset;
  /**
   * @var string
   */
  public $severity;
  /**
   * @var string
   */
  public $validationUnitName;

  /**
   * @param string
   */
  public function setDebugMessage($debugMessage)
  {
    $this->debugMessage = $debugMessage;
  }
  /**
   * @return string
   */
  public function getDebugMessage()
  {
    return $this->debugMessage;
  }
  /**
   * @param string
   */
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  /**
   * @return string
   */
  public function getFieldName()
  {
    return $this->fieldName;
  }
  /**
   * @param string
   */
  public function setLevel($level)
  {
    $this->level = $level;
  }
  /**
   * @return string
   */
  public function getLevel()
  {
    return $this->level;
  }
  /**
   * @param int
   */
  public function setLocationOffset($locationOffset)
  {
    $this->locationOffset = $locationOffset;
  }
  /**
   * @return int
   */
  public function getLocationOffset()
  {
    return $this->locationOffset;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param string
   */
  public function setValidationUnitName($validationUnitName)
  {
    $this->validationUnitName = $validationUnitName;
  }
  /**
   * @return string
   */
  public function getValidationUnitName()
  {
    return $this->validationUnitName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LintResult::class, 'Google_Service_Iam_LintResult');
