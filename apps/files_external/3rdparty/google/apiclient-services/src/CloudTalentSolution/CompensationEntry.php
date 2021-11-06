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

namespace Google\Service\CloudTalentSolution;

class CompensationEntry extends \Google\Model
{
  protected $amountType = Money::class;
  protected $amountDataType = '';
  public $description;
  public $expectedUnitsPerYear;
  protected $rangeType = CompensationRange::class;
  protected $rangeDataType = '';
  public $type;
  public $unit;

  /**
   * @param Money
   */
  public function setAmount(Money $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return Money
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
  public function setExpectedUnitsPerYear($expectedUnitsPerYear)
  {
    $this->expectedUnitsPerYear = $expectedUnitsPerYear;
  }
  public function getExpectedUnitsPerYear()
  {
    return $this->expectedUnitsPerYear;
  }
  /**
   * @param CompensationRange
   */
  public function setRange(CompensationRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return CompensationRange
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompensationEntry::class, 'Google_Service_CloudTalentSolution_CompensationEntry');
