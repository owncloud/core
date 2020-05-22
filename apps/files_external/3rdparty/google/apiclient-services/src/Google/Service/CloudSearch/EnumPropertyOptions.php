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

class Google_Service_CloudSearch_EnumPropertyOptions extends Google_Collection
{
  protected $collection_key = 'possibleValues';
  protected $operatorOptionsType = 'Google_Service_CloudSearch_EnumOperatorOptions';
  protected $operatorOptionsDataType = '';
  public $orderedRanking;
  protected $possibleValuesType = 'Google_Service_CloudSearch_EnumValuePair';
  protected $possibleValuesDataType = 'array';

  /**
   * @param Google_Service_CloudSearch_EnumOperatorOptions
   */
  public function setOperatorOptions(Google_Service_CloudSearch_EnumOperatorOptions $operatorOptions)
  {
    $this->operatorOptions = $operatorOptions;
  }
  /**
   * @return Google_Service_CloudSearch_EnumOperatorOptions
   */
  public function getOperatorOptions()
  {
    return $this->operatorOptions;
  }
  public function setOrderedRanking($orderedRanking)
  {
    $this->orderedRanking = $orderedRanking;
  }
  public function getOrderedRanking()
  {
    return $this->orderedRanking;
  }
  /**
   * @param Google_Service_CloudSearch_EnumValuePair
   */
  public function setPossibleValues($possibleValues)
  {
    $this->possibleValues = $possibleValues;
  }
  /**
   * @return Google_Service_CloudSearch_EnumValuePair
   */
  public function getPossibleValues()
  {
    return $this->possibleValues;
  }
}
