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

class NlpSemanticParsingDatetimeQuantity extends \Google\Collection
{
  protected $collection_key = 'symbolicQuantity';
  /**
   * @var string
   */
  public $modifier;
  public $number;
  protected $numberSpanType = NlpSemanticParsingAnnotationEvalData::class;
  protected $numberSpanDataType = '';
  protected $symbolicQuantityType = NlpSemanticParsingDatetimeQuantity::class;
  protected $symbolicQuantityDataType = 'array';
  /**
   * @var string
   */
  public $unit;

  /**
   * @param string
   */
  public function setModifier($modifier)
  {
    $this->modifier = $modifier;
  }
  /**
   * @return string
   */
  public function getModifier()
  {
    return $this->modifier;
  }
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setNumberSpan(NlpSemanticParsingAnnotationEvalData $numberSpan)
  {
    $this->numberSpan = $numberSpan;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getNumberSpan()
  {
    return $this->numberSpan;
  }
  /**
   * @param NlpSemanticParsingDatetimeQuantity[]
   */
  public function setSymbolicQuantity($symbolicQuantity)
  {
    $this->symbolicQuantity = $symbolicQuantity;
  }
  /**
   * @return NlpSemanticParsingDatetimeQuantity[]
   */
  public function getSymbolicQuantity()
  {
    return $this->symbolicQuantity;
  }
  /**
   * @param string
   */
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return string
   */
  public function getUnit()
  {
    return $this->unit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeQuantity::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeQuantity');
