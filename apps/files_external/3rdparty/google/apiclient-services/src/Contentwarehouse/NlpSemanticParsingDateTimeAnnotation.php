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

class NlpSemanticParsingDateTimeAnnotation extends \Google\Collection
{
  protected $collection_key = 'startTime';
  /**
   * @var string
   */
  public $dateType;
  /**
   * @var string[]
   */
  public $endDate;
  /**
   * @var string[]
   */
  public $endTime;
  /**
   * @var string
   */
  public $endWeekday;
  /**
   * @var string
   */
  public $rawText;
  /**
   * @var string[]
   */
  public $startDate;
  /**
   * @var string[]
   */
  public $startTime;
  /**
   * @var string
   */
  public $startWeekday;
  /**
   * @var string
   */
  public $timeType;

  /**
   * @param string
   */
  public function setDateType($dateType)
  {
    $this->dateType = $dateType;
  }
  /**
   * @return string
   */
  public function getDateType()
  {
    return $this->dateType;
  }
  /**
   * @param string[]
   */
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return string[]
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param string[]
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string[]
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setEndWeekday($endWeekday)
  {
    $this->endWeekday = $endWeekday;
  }
  /**
   * @return string
   */
  public function getEndWeekday()
  {
    return $this->endWeekday;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param string[]
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string[]
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param string[]
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string[]
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param string
   */
  public function setStartWeekday($startWeekday)
  {
    $this->startWeekday = $startWeekday;
  }
  /**
   * @return string
   */
  public function getStartWeekday()
  {
    return $this->startWeekday;
  }
  /**
   * @param string
   */
  public function setTimeType($timeType)
  {
    $this->timeType = $timeType;
  }
  /**
   * @return string
   */
  public function getTimeType()
  {
    return $this->timeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDateTimeAnnotation::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDateTimeAnnotation');
