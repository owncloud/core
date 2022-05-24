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

namespace Google\Service\CloudSearch;

class EnumPropertyOptions extends \Google\Collection
{
  protected $collection_key = 'possibleValues';
  protected $operatorOptionsType = EnumOperatorOptions::class;
  protected $operatorOptionsDataType = '';
  /**
   * @var string
   */
  public $orderedRanking;
  protected $possibleValuesType = EnumValuePair::class;
  protected $possibleValuesDataType = 'array';

  /**
   * @param EnumOperatorOptions
   */
  public function setOperatorOptions(EnumOperatorOptions $operatorOptions)
  {
    $this->operatorOptions = $operatorOptions;
  }
  /**
   * @return EnumOperatorOptions
   */
  public function getOperatorOptions()
  {
    return $this->operatorOptions;
  }
  /**
   * @param string
   */
  public function setOrderedRanking($orderedRanking)
  {
    $this->orderedRanking = $orderedRanking;
  }
  /**
   * @return string
   */
  public function getOrderedRanking()
  {
    return $this->orderedRanking;
  }
  /**
   * @param EnumValuePair[]
   */
  public function setPossibleValues($possibleValues)
  {
    $this->possibleValues = $possibleValues;
  }
  /**
   * @return EnumValuePair[]
   */
  public function getPossibleValues()
  {
    return $this->possibleValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnumPropertyOptions::class, 'Google_Service_CloudSearch_EnumPropertyOptions');
