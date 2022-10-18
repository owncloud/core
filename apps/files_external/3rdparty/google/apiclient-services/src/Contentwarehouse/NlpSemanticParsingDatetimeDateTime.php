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

class NlpSemanticParsingDatetimeDateTime extends \Google\Collection
{
  protected $collection_key = 'range';
  protected $compositionElementType = NlpSemanticParsingDatetimeDateTime::class;
  protected $compositionElementDataType = '';
  /**
   * @var bool
   */
  public $deleted7;
  /**
   * @var bool
   */
  public $deleted8;
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var string
   */
  public $groundingStage;
  protected $pointType = NlpSemanticParsingDatetimeAbsoluteDateTime::class;
  protected $pointDataType = 'array';
  protected $propertiesType = NlpSemanticParsingDatetimeResolutionProperties::class;
  protected $propertiesDataType = '';
  protected $rangeType = NlpSemanticParsingDatetimeRange::class;
  protected $rangeDataType = 'array';
  protected $recurrentType = NlpSemanticParsingDatetimeRecurrent::class;
  protected $recurrentDataType = '';
  protected $relativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $relativeDataType = '';
  protected $spanType = NlpSemanticParsingDatetimeSpan::class;
  protected $spanDataType = '';

  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setCompositionElement(NlpSemanticParsingDatetimeDateTime $compositionElement)
  {
    $this->compositionElement = $compositionElement;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getCompositionElement()
  {
    return $this->compositionElement;
  }
  /**
   * @param bool
   */
  public function setDeleted7($deleted7)
  {
    $this->deleted7 = $deleted7;
  }
  /**
   * @return bool
   */
  public function getDeleted7()
  {
    return $this->deleted7;
  }
  /**
   * @param bool
   */
  public function setDeleted8($deleted8)
  {
    $this->deleted8 = $deleted8;
  }
  /**
   * @return bool
   */
  public function getDeleted8()
  {
    return $this->deleted8;
  }
  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param string
   */
  public function setGroundingStage($groundingStage)
  {
    $this->groundingStage = $groundingStage;
  }
  /**
   * @return string
   */
  public function getGroundingStage()
  {
    return $this->groundingStage;
  }
  /**
   * @param NlpSemanticParsingDatetimeAbsoluteDateTime[]
   */
  public function setPoint($point)
  {
    $this->point = $point;
  }
  /**
   * @return NlpSemanticParsingDatetimeAbsoluteDateTime[]
   */
  public function getPoint()
  {
    return $this->point;
  }
  /**
   * @param NlpSemanticParsingDatetimeResolutionProperties
   */
  public function setProperties(NlpSemanticParsingDatetimeResolutionProperties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return NlpSemanticParsingDatetimeResolutionProperties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param NlpSemanticParsingDatetimeRange[]
   */
  public function setRange($range)
  {
    $this->range = $range;
  }
  /**
   * @return NlpSemanticParsingDatetimeRange[]
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param NlpSemanticParsingDatetimeRecurrent
   */
  public function setRecurrent(NlpSemanticParsingDatetimeRecurrent $recurrent)
  {
    $this->recurrent = $recurrent;
  }
  /**
   * @return NlpSemanticParsingDatetimeRecurrent
   */
  public function getRecurrent()
  {
    return $this->recurrent;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function setRelative(NlpSemanticParsingDatetimeRelativeDateTime $relative)
  {
    $this->relative = $relative;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function getRelative()
  {
    return $this->relative;
  }
  /**
   * @param NlpSemanticParsingDatetimeSpan
   */
  public function setSpan(NlpSemanticParsingDatetimeSpan $span)
  {
    $this->span = $span;
  }
  /**
   * @return NlpSemanticParsingDatetimeSpan
   */
  public function getSpan()
  {
    return $this->span;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeDateTime');
