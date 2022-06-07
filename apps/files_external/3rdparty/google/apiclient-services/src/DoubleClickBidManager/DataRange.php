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

namespace Google\Service\DoubleClickBidManager;

class DataRange extends \Google\Model
{
  protected $customEndDateType = Date::class;
  protected $customEndDateDataType = '';
  protected $customStartDateType = Date::class;
  protected $customStartDateDataType = '';
  /**
   * @var string
   */
  public $range;

  /**
   * @param Date
   */
  public function setCustomEndDate(Date $customEndDate)
  {
    $this->customEndDate = $customEndDate;
  }
  /**
   * @return Date
   */
  public function getCustomEndDate()
  {
    return $this->customEndDate;
  }
  /**
   * @param Date
   */
  public function setCustomStartDate(Date $customStartDate)
  {
    $this->customStartDate = $customStartDate;
  }
  /**
   * @return Date
   */
  public function getCustomStartDate()
  {
    return $this->customStartDate;
  }
  /**
   * @param string
   */
  public function setRange($range)
  {
    $this->range = $range;
  }
  /**
   * @return string
   */
  public function getRange()
  {
    return $this->range;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataRange::class, 'Google_Service_DoubleClickBidManager_DataRange');
