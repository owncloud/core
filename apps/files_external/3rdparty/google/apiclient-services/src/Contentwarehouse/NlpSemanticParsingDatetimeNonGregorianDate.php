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

class NlpSemanticParsingDatetimeNonGregorianDate extends \Google\Model
{
  /**
   * @var string
   */
  public $chineseMonth;
  /**
   * @var int
   */
  public $day;
  /**
   * @var string
   */
  public $hebrewMonth;
  /**
   * @var string
   */
  public $islamicMonth;
  /**
   * @var int
   */
  public $year;

  /**
   * @param string
   */
  public function setChineseMonth($chineseMonth)
  {
    $this->chineseMonth = $chineseMonth;
  }
  /**
   * @return string
   */
  public function getChineseMonth()
  {
    return $this->chineseMonth;
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
  public function setHebrewMonth($hebrewMonth)
  {
    $this->hebrewMonth = $hebrewMonth;
  }
  /**
   * @return string
   */
  public function getHebrewMonth()
  {
    return $this->hebrewMonth;
  }
  /**
   * @param string
   */
  public function setIslamicMonth($islamicMonth)
  {
    $this->islamicMonth = $islamicMonth;
  }
  /**
   * @return string
   */
  public function getIslamicMonth()
  {
    return $this->islamicMonth;
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
class_alias(NlpSemanticParsingDatetimeNonGregorianDate::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeNonGregorianDate');
