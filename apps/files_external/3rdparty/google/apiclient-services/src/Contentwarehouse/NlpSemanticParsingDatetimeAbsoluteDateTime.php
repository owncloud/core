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

class NlpSemanticParsingDatetimeAbsoluteDateTime extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowPersonal;
  /**
   * @var int
   */
  public $day;
  /**
   * @var string
   */
  public $deleted11;
  protected $holidayType = NlpSemanticParsingDatetimeHoliday::class;
  protected $holidayDataType = '';
  /**
   * @var int
   */
  public $hour;
  /**
   * @var string
   */
  public $hourState;
  /**
   * @var bool
   */
  public $isBc;
  /**
   * @var int
   */
  public $minute;
  /**
   * @var string
   */
  public $modifier;
  /**
   * @var string
   */
  public $month;
  protected $nonGregorianDateType = NlpSemanticParsingDatetimeNonGregorianDate::class;
  protected $nonGregorianDateDataType = '';
  public $partialSecond;
  protected $propertiesType = NlpSemanticParsingDatetimeDateTimeProperty::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $quarter;
  /**
   * @var string
   */
  public $rangeModifier;
  /**
   * @var string
   */
  public $season;
  /**
   * @var int
   */
  public $second;
  /**
   * @var string
   */
  public $timezone;
  /**
   * @var string
   */
  public $weekday;
  /**
   * @var int
   */
  public $year;

  /**
   * @param bool
   */
  public function setAllowPersonal($allowPersonal)
  {
    $this->allowPersonal = $allowPersonal;
  }
  /**
   * @return bool
   */
  public function getAllowPersonal()
  {
    return $this->allowPersonal;
  }
  /**
   * @param int
   */
  public function setDay($day)
  {
    $this->day = $day;
  }
  /**
   * @return int
   */
  public function getDay()
  {
    return $this->day;
  }
  /**
   * @param string
   */
  public function setDeleted11($deleted11)
  {
    $this->deleted11 = $deleted11;
  }
  /**
   * @return string
   */
  public function getDeleted11()
  {
    return $this->deleted11;
  }
  /**
   * @param NlpSemanticParsingDatetimeHoliday
   */
  public function setHoliday(NlpSemanticParsingDatetimeHoliday $holiday)
  {
    $this->holiday = $holiday;
  }
  /**
   * @return NlpSemanticParsingDatetimeHoliday
   */
  public function getHoliday()
  {
    return $this->holiday;
  }
  /**
   * @param int
   */
  public function setHour($hour)
  {
    $this->hour = $hour;
  }
  /**
   * @return int
   */
  public function getHour()
  {
    return $this->hour;
  }
  /**
   * @param string
   */
  public function setHourState($hourState)
  {
    $this->hourState = $hourState;
  }
  /**
   * @return string
   */
  public function getHourState()
  {
    return $this->hourState;
  }
  /**
   * @param bool
   */
  public function setIsBc($isBc)
  {
    $this->isBc = $isBc;
  }
  /**
   * @return bool
   */
  public function getIsBc()
  {
    return $this->isBc;
  }
  /**
   * @param int
   */
  public function setMinute($minute)
  {
    $this->minute = $minute;
  }
  /**
   * @return int
   */
  public function getMinute()
  {
    return $this->minute;
  }
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
  /**
   * @param string
   */
  public function setMonth($month)
  {
    $this->month = $month;
  }
  /**
   * @return string
   */
  public function getMonth()
  {
    return $this->month;
  }
  /**
   * @param NlpSemanticParsingDatetimeNonGregorianDate
   */
  public function setNonGregorianDate(NlpSemanticParsingDatetimeNonGregorianDate $nonGregorianDate)
  {
    $this->nonGregorianDate = $nonGregorianDate;
  }
  /**
   * @return NlpSemanticParsingDatetimeNonGregorianDate
   */
  public function getNonGregorianDate()
  {
    return $this->nonGregorianDate;
  }
  public function setPartialSecond($partialSecond)
  {
    $this->partialSecond = $partialSecond;
  }
  public function getPartialSecond()
  {
    return $this->partialSecond;
  }
  /**
   * @param NlpSemanticParsingDatetimeDateTimeProperty
   */
  public function setProperties(NlpSemanticParsingDatetimeDateTimeProperty $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return NlpSemanticParsingDatetimeDateTimeProperty
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setQuarter($quarter)
  {
    $this->quarter = $quarter;
  }
  /**
   * @return string
   */
  public function getQuarter()
  {
    return $this->quarter;
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
   * @param string
   */
  public function setSeason($season)
  {
    $this->season = $season;
  }
  /**
   * @return string
   */
  public function getSeason()
  {
    return $this->season;
  }
  /**
   * @param int
   */
  public function setSecond($second)
  {
    $this->second = $second;
  }
  /**
   * @return int
   */
  public function getSecond()
  {
    return $this->second;
  }
  /**
   * @param string
   */
  public function setTimezone($timezone)
  {
    $this->timezone = $timezone;
  }
  /**
   * @return string
   */
  public function getTimezone()
  {
    return $this->timezone;
  }
  /**
   * @param string
   */
  public function setWeekday($weekday)
  {
    $this->weekday = $weekday;
  }
  /**
   * @return string
   */
  public function getWeekday()
  {
    return $this->weekday;
  }
  /**
   * @param int
   */
  public function setYear($year)
  {
    $this->year = $year;
  }
  /**
   * @return int
   */
  public function getYear()
  {
    return $this->year;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeAbsoluteDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeAbsoluteDateTime');
