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

namespace Google\Service\DriveLabels;

class GoogleAppsDriveLabelsV2FieldDateOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $dateFormat;
  /**
   * @var string
   */
  public $dateFormatType;
  protected $maxValueType = GoogleTypeDate::class;
  protected $maxValueDataType = '';
  protected $minValueType = GoogleTypeDate::class;
  protected $minValueDataType = '';

  /**
   * @param string
   */
  public function setDateFormat($dateFormat)
  {
    $this->dateFormat = $dateFormat;
  }
  /**
   * @return string
   */
  public function getDateFormat()
  {
    return $this->dateFormat;
  }
  /**
   * @param string
   */
  public function setDateFormatType($dateFormatType)
  {
    $this->dateFormatType = $dateFormatType;
  }
  /**
   * @return string
   */
  public function getDateFormatType()
  {
    return $this->dateFormatType;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setMaxValue(GoogleTypeDate $maxValue)
  {
    $this->maxValue = $maxValue;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setMinValue(GoogleTypeDate $minValue)
  {
    $this->minValue = $minValue;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getMinValue()
  {
    return $this->minValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2FieldDateOptions::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2FieldDateOptions');
