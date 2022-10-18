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

class NlpSemanticParsingDatetimeRecurrent extends \Google\Collection
{
  protected $collection_key = 'startRelative';
  /**
   * @var int
   */
  public $countRestriction;
  protected $exceptionType = NlpSemanticParsingDatetimeDateTime::class;
  protected $exceptionDataType = 'array';
  /**
   * @var string
   */
  public $frequency;
  /**
   * @var string
   */
  public $metadata;
  /**
   * @var string
   */
  public $period;
  protected $rangeRestrictionType = NlpSemanticParsingDatetimeRange::class;
  protected $rangeRestrictionDataType = '';
  protected $relativeRangeRestrictionType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $relativeRangeRestrictionDataType = '';
  protected $restrictionType = NlpSemanticParsingDatetimeDateTime::class;
  protected $restrictionDataType = '';
  protected $startType = NlpSemanticParsingDatetimeDateTime::class;
  protected $startDataType = 'array';
  protected $startPointType = NlpSemanticParsingDatetimeAbsoluteDateTime::class;
  protected $startPointDataType = 'array';
  protected $startRangeType = NlpSemanticParsingDatetimeRange::class;
  protected $startRangeDataType = 'array';
  protected $startRelativeType = NlpSemanticParsingDatetimeRelativeDateTime::class;
  protected $startRelativeDataType = 'array';
  protected $targetType = NlpSemanticParsingDatetimeTargetToFetch::class;
  protected $targetDataType = '';
  protected $timeIntervalType = NlpSemanticParsingDatetimeQuantity::class;
  protected $timeIntervalDataType = '';
  /**
   * @var string
   */
  public $unit;

  /**
   * @param int
   */
  public function setCountRestriction($countRestriction)
  {
    $this->countRestriction = $countRestriction;
  }
  /**
   * @return int
   */
  public function getCountRestriction()
  {
    return $this->countRestriction;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime[]
   */
  public function setException($exception)
  {
    $this->exception = $exception;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime[]
   */
  public function getException()
  {
    return $this->exception;
  }
  /**
   * @param string
   */
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  /**
   * @return string
   */
  public function getFrequency()
  {
    return $this->frequency;
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
   * @param string
   */
  public function setPeriod($period)
  {
    $this->period = $period;
  }
  /**
   * @return string
   */
  public function getPeriod()
  {
    return $this->period;
  }
  /**
   * @param NlpSemanticParsingDatetimeRange
   */
  public function setRangeRestriction(NlpSemanticParsingDatetimeRange $rangeRestriction)
  {
    $this->rangeRestriction = $rangeRestriction;
  }
  /**
   * @return NlpSemanticParsingDatetimeRange
   */
  public function getRangeRestriction()
  {
    return $this->rangeRestriction;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function setRelativeRangeRestriction(NlpSemanticParsingDatetimeRelativeDateTime $relativeRangeRestriction)
  {
    $this->relativeRangeRestriction = $relativeRangeRestriction;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime
   */
  public function getRelativeRangeRestriction()
  {
    return $this->relativeRangeRestriction;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime
   */
  public function setRestriction(NlpSemanticParsingDatetimeDateTime $restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTime[]
   */
  public function setStart($start)
  {
    $this->start = $start;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTime[]
   */
  public function getStart()
  {
    return $this->start;
  }
  /**
   * @param NlpSemanticParsingDatetimeAbsoluteDateTime[]
   */
  public function setStartPoint($startPoint)
  {
    $this->startPoint = $startPoint;
  }
  /**
   * @return NlpSemanticParsingDatetimeAbsoluteDateTime[]
   */
  public function getStartPoint()
  {
    return $this->startPoint;
  }
  /**
   * @param NlpSemanticParsingDatetimeRange[]
   */
  public function setStartRange($startRange)
  {
    $this->startRange = $startRange;
  }
  /**
   * @return NlpSemanticParsingDatetimeRange[]
   */
  public function getStartRange()
  {
    return $this->startRange;
  }
  /**
   * @param NlpSemanticParsingDatetimeRelativeDateTime[]
   */
  public function setStartRelative($startRelative)
  {
    $this->startRelative = $startRelative;
  }
  /**
   * @return NlpSemanticParsingDatetimeRelativeDateTime[]
   */
  public function getStartRelative()
  {
    return $this->startRelative;
  }
  /**
   * @param NlpSemanticParsingDatetimeTargetToFetch
   */
  public function setTarget(NlpSemanticParsingDatetimeTargetToFetch $target)
  {
    $this->target = $target;
  }
  /**
   * @return NlpSemanticParsingDatetimeTargetToFetch
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param NlpSemanticParsingDatetimeQuantity
   */
  public function setTimeInterval(NlpSemanticParsingDatetimeQuantity $timeInterval)
  {
    $this->timeInterval = $timeInterval;
  }
  /**
   * @return NlpSemanticParsingDatetimeQuantity
   */
  public function getTimeInterval()
  {
    return $this->timeInterval;
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
class_alias(NlpSemanticParsingDatetimeRecurrent::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeRecurrent');
