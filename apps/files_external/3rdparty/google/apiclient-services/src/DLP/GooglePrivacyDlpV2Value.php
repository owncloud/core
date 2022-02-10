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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2Value extends \Google\Model
{
  /**
   * @var bool
   */
  public $booleanValue;
  protected $dateValueType = GoogleTypeDate::class;
  protected $dateValueDataType = '';
  /**
   * @var string
   */
  public $dayOfWeekValue;
  public $floatValue;
  /**
   * @var string
   */
  public $integerValue;
  /**
   * @var string
   */
  public $stringValue;
  protected $timeValueType = GoogleTypeTimeOfDay::class;
  protected $timeValueDataType = '';
  /**
   * @var string
   */
  public $timestampValue;

  /**
   * @param bool
   */
  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  /**
   * @return bool
   */
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setDateValue(GoogleTypeDate $dateValue)
  {
    $this->dateValue = $dateValue;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getDateValue()
  {
    return $this->dateValue;
  }
  /**
   * @param string
   */
  public function setDayOfWeekValue($dayOfWeekValue)
  {
    $this->dayOfWeekValue = $dayOfWeekValue;
  }
  /**
   * @return string
   */
  public function getDayOfWeekValue()
  {
    return $this->dayOfWeekValue;
  }
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  public function getFloatValue()
  {
    return $this->floatValue;
  }
  /**
   * @param string
   */
  public function setIntegerValue($integerValue)
  {
    $this->integerValue = $integerValue;
  }
  /**
   * @return string
   */
  public function getIntegerValue()
  {
    return $this->integerValue;
  }
  /**
   * @param string
   */
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
  /**
   * @param GoogleTypeTimeOfDay
   */
  public function setTimeValue(GoogleTypeTimeOfDay $timeValue)
  {
    $this->timeValue = $timeValue;
  }
  /**
   * @return GoogleTypeTimeOfDay
   */
  public function getTimeValue()
  {
    return $this->timeValue;
  }
  /**
   * @param string
   */
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  /**
   * @return string
   */
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Value::class, 'Google_Service_DLP_GooglePrivacyDlpV2Value');
