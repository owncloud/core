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

class NlpSemanticParsingDatetimeRange extends \Google\Model
{
  protected $beginType = NlpSemanticParsingDatetimeAbsoluteDateTime::class;
  protected $beginDataType = '';
  protected $beginRelativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $beginRelativeDataType = '';
  protected $durationType = NlpSemanticParsingDatetimeQuantity::class;
  protected $durationDataType = '';
  protected $endType = NlpSemanticParsingDatetimeAbsoluteDateTime::class;
  protected $endDataType = '';
  protected $endRelativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $endRelativeDataType = '';
  /**
   * @var bool
   */
  public $exclusive;
  protected $finishType = NlpSemanticParsingDatetimeDateTime::class;
  protected $finishDataType = '';
  /**
   * @var string
   */
  public $fuzzyRange;
  /**
   * @var string
   */
  public $metadata;
  protected $propertiesType = NlpSemanticParsingDatetimeResolutionProperties::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $rangeModifier;
  protected $startType = NlpSemanticParsingDatetimeDateTime::class;
  protected $startDataType = '';
  /**
   * @var string
   */
  public $symbolicValue;

  /**
   * @param NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function setBegin(NlpSemanticParsingDatetimeAbsoluteDateTime $begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function setBeginRelative(NlpSemanticParsingDatetimeRelativeDateTime $beginRelative)
  {
    $this->beginRelative = $beginRelative;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function getBeginRelative()
  {
    return $this->beginRelative;
  }
  /**
   * @param NlpSemanticParsingDatetimeQuantity
   */
  public function setDuration(NlpSemanticParsingDatetimeQuantity $duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return NlpSemanticParsingDatetimeQuantity
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function setEnd(NlpSemanticParsingDatetimeAbsoluteDateTime $end)
  {
    $this->end = $end;
  }
  /**
   * @return NlpSemanticParsingDatetimeAbsoluteDateTime
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function setEndRelative(NlpSemanticParsingDatetimeRelativeDateTime $endRelative)
  {
    $this->endRelative = $endRelative;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function getEndRelative()
  {
    return $this->endRelative;
  }
  /**
   * @param bool
   */
  public function setExclusive($exclusive)
  {
    $this->exclusive = $exclusive;
  }
  /**
   * @return bool
   */
  public function getExclusive()
  {
    return $this->exclusive;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setFinish(NlpSemanticParsingDatetimeDateTime $finish)
  {
    $this->finish = $finish;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getFinish()
  {
    return $this->finish;
  }
  /**
   * @param string
   */
  public function setFuzzyRange($fuzzyRange)
  {
    $this->fuzzyRange = $fuzzyRange;
  }
  /**
   * @return string
   */
  public function getFuzzyRange()
  {
    return $this->fuzzyRange;
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
   * @param string
   */
  public function setRangeModifier($rangeModifier)
  {
    $this->rangeModifier = $rangeModifier;
  }
  /**
   * @return string
   */
  public function getRangeModifier()
  {
    return $this->rangeModifier;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setStart(NlpSemanticParsingDatetimeDateTime $start)
  {
    $this->start = $start;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getStart()
  {
    return $this->start;
  }
  /**
   * @param string
   */
  public function setSymbolicValue($symbolicValue)
  {
    $this->symbolicValue = $symbolicValue;
  }
  /**
   * @return string
   */
  public function getSymbolicValue()
  {
    return $this->symbolicValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeRange::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeRange');
