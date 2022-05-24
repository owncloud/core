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

namespace Google\Service\Sheets;

class ExtendedValue extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  protected $errorValueType = ErrorValue::class;
  protected $errorValueDataType = '';
  /**
   * @var string
   */
  public $formulaValue;
  public $numberValue;
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param ErrorValue
   */
  public function setErrorValue(ErrorValue $errorValue)
  {
    $this->errorValue = $errorValue;
  }
  /**
   * @return ErrorValue
   */
  public function getErrorValue()
  {
    return $this->errorValue;
  }
  /**
   * @param string
   */
  public function setFormulaValue($formulaValue)
  {
    $this->formulaValue = $formulaValue;
  }
  /**
   * @return string
   */
  public function getFormulaValue()
  {
    return $this->formulaValue;
  }
  public function setNumberValue($numberValue)
  {
    $this->numberValue = $numberValue;
  }
  public function getNumberValue()
  {
    return $this->numberValue;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtendedValue::class, 'Google_Service_Sheets_ExtendedValue');
