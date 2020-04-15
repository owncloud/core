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

class Google_Service_TagManager_VariableFormatValue extends Google_Model
{
  public $caseConversionType;
  protected $convertFalseToValueType = 'Google_Service_TagManager_Parameter';
  protected $convertFalseToValueDataType = '';
  protected $convertNullToValueType = 'Google_Service_TagManager_Parameter';
  protected $convertNullToValueDataType = '';
  protected $convertTrueToValueType = 'Google_Service_TagManager_Parameter';
  protected $convertTrueToValueDataType = '';
  protected $convertUndefinedToValueType = 'Google_Service_TagManager_Parameter';
  protected $convertUndefinedToValueDataType = '';

  public function setCaseConversionType($caseConversionType)
  {
    $this->caseConversionType = $caseConversionType;
  }
  public function getCaseConversionType()
  {
    return $this->caseConversionType;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setConvertFalseToValue(Google_Service_TagManager_Parameter $convertFalseToValue)
  {
    $this->convertFalseToValue = $convertFalseToValue;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getConvertFalseToValue()
  {
    return $this->convertFalseToValue;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setConvertNullToValue(Google_Service_TagManager_Parameter $convertNullToValue)
  {
    $this->convertNullToValue = $convertNullToValue;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getConvertNullToValue()
  {
    return $this->convertNullToValue;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setConvertTrueToValue(Google_Service_TagManager_Parameter $convertTrueToValue)
  {
    $this->convertTrueToValue = $convertTrueToValue;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getConvertTrueToValue()
  {
    return $this->convertTrueToValue;
  }
  /**
   * @param Google_Service_TagManager_Parameter
   */
  public function setConvertUndefinedToValue(Google_Service_TagManager_Parameter $convertUndefinedToValue)
  {
    $this->convertUndefinedToValue = $convertUndefinedToValue;
  }
  /**
   * @return Google_Service_TagManager_Parameter
   */
  public function getConvertUndefinedToValue()
  {
    return $this->convertUndefinedToValue;
  }
}
