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

class FreebaseMeasurementUnit extends \Google\Model
{
  /**
   * @var int
   */
  public $power;
  protected $unitType = FreebaseId::class;
  protected $unitDataType = '';
  /**
   * @var string
   */
  public $unitMid;

  /**
   * @param int
   */
  public function setPower($power)
  {
    $this->power = $power;
  }
  /**
   * @return int
   */
  public function getPower()
  {
    return $this->power;
  }
  /**
   * @param FreebaseId
   */
  public function setUnit(FreebaseId $unit)
  {
    $this->unit = $unit;
  }
  /**
   * @return FreebaseId
   */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
   * @param string
   */
  public function setUnitMid($unitMid)
  {
    $this->unitMid = $unitMid;
  }
  /**
   * @return string
   */
  public function getUnitMid()
  {
    return $this->unitMid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreebaseMeasurementUnit::class, 'Google_Service_Contentwarehouse_FreebaseMeasurementUnit');
