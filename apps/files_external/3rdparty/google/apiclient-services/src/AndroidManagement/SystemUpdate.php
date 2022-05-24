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

namespace Google\Service\AndroidManagement;

class SystemUpdate extends \Google\Collection
{
  protected $collection_key = 'freezePeriods';
  /**
   * @var int
   */
  public $endMinutes;
  protected $freezePeriodsType = FreezePeriod::class;
  protected $freezePeriodsDataType = 'array';
  /**
   * @var int
   */
  public $startMinutes;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setEndMinutes($endMinutes)
  {
    $this->endMinutes = $endMinutes;
  }
  /**
   * @return int
   */
  public function getEndMinutes()
  {
    return $this->endMinutes;
  }
  /**
   * @param FreezePeriod[]
   */
  public function setFreezePeriods($freezePeriods)
  {
    $this->freezePeriods = $freezePeriods;
  }
  /**
   * @return FreezePeriod[]
   */
  public function getFreezePeriods()
  {
    return $this->freezePeriods;
  }
  /**
   * @param int
   */
  public function setStartMinutes($startMinutes)
  {
    $this->startMinutes = $startMinutes;
  }
  /**
   * @return int
   */
  public function getStartMinutes()
  {
    return $this->startMinutes;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SystemUpdate::class, 'Google_Service_AndroidManagement_SystemUpdate');
