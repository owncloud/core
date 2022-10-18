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

class NlpSemanticParsingDatetimeShiftedRelativeDateTime extends \Google\Model
{
  protected $baseDataType = '';
  /**
   * @var string
   */
  public $baseType;
  /**
   * @var string
   */
  public $metadata;
  protected $relativeBaseType = NlpSemanticParsingDatetimeResolutionProperties::class;
  protected $relativeBaseDataType = '';
  protected $shiftAmountType = NlpSemanticParsingDatetimeQuantity::class;
  protected $shiftAmountDataType = '';
  /**
   * @var bool
   */
  public $shiftPast;

  /**
   * @param NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function setBase(NlpSemanticParsingDatetimeAbsoluteDateTime $base)
  {
    $this->base = $base;
  }
  /**
   * @return NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function getBase()
  {
    return $this->base;
  }
  /**
   * @param string
   */
  public function setBaseType($baseType)
  {
    $this->baseType = $baseType;
  }
  /**
   * @return string
   */
  public function getBaseType()
  {
    return $this->baseType;
  }
  /**
   * @param string
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param NlpSemanticParsingDatetimeResolutionProperties
   */
  public function setRelativeBase(NlpSemanticParsingDatetimeResolutionProperties $relativeBase)
  {
    $this->relativeBase = $relativeBase;
  }
  /**
   * @return NlpSemanticParsingDatetimeResolutionProperties
   */
  public function getRelativeBase()
  {
    return $this->relativeBase;
  }
  /**
   * @param NlpSemanticParsingDatetimeQuantity
   */
  public function setShiftAmount(NlpSemanticParsingDatetimeQuantity $shiftAmount)
  {
    $this->shiftAmount = $shiftAmount;
  }
  /**
   * @return NlpSemanticParsingDatetimeQuantity
   */
  public function getShiftAmount()
  {
    return $this->shiftAmount;
  }
  /**
   * @param bool
   */
  public function setShiftPast($shiftPast)
  {
    $this->shiftPast = $shiftPast;
  }
  /**
   * @return bool
   */
  public function getShiftPast()
  {
    return $this->shiftPast;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeShiftedRelativeDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeShiftedRelativeDateTime');
