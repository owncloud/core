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

class Google_Service_JobService_ExtendedCompensationInfoCompensationEntry extends Google_Model
{
  protected $amountType = 'Google_Service_JobService_ExtendedCompensationInfoDecimal';
  protected $amountDataType = '';
  public $description;
  protected $expectedUnitsPerYearType = 'Google_Service_JobService_ExtendedCompensationInfoDecimal';
  protected $expectedUnitsPerYearDataType = '';
  protected $rangeType = 'Google_Service_JobService_ExtendedCompensationInfoCompensationRange';
  protected $rangeDataType = '';
  public $type;
  public $unit;
  public $unspecified;

  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoDecimal
   */
  public function setAmount(Google_Service_JobService_ExtendedCompensationInfoDecimal $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoDecimal
   */
  public function getAmount()
  {
    return $this->amount;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoDecimal
   */
  public function setExpectedUnitsPerYear(Google_Service_JobService_ExtendedCompensationInfoDecimal $expectedUnitsPerYear)
  {
    $this->expectedUnitsPerYear = $expectedUnitsPerYear;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoDecimal
   */
  public function getExpectedUnitsPerYear()
  {
    return $this->expectedUnitsPerYear;
  }
  /**
   * @param Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function setRange(Google_Service_JobService_ExtendedCompensationInfoCompensationRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return Google_Service_JobService_ExtendedCompensationInfoCompensationRange
   */
  public function getRange()
  {
    return $this->range;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  public function getUnit()
  {
    return $this->unit;
  }
  public function setUnspecified($unspecified)
  {
    $this->unspecified = $unspecified;
  }
  public function getUnspecified()
  {
    return $this->unspecified;
  }
}
