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

namespace Google\Service\MyBusinessBusinessInformation;

class MoreHours extends \Google\Collection
{
  protected $collection_key = 'periods';
  /**
   * @var string
   */
  public $hoursTypeId;
  protected $periodsType = TimePeriod::class;
  protected $periodsDataType = 'array';

  /**
   * @param string
   */
  public function setHoursTypeId($hoursTypeId)
  {
    $this->hoursTypeId = $hoursTypeId;
  }
  /**
   * @return string
   */
  public function getHoursTypeId()
  {
    return $this->hoursTypeId;
  }
  /**
   * @param TimePeriod[]
   */
  public function setPeriods($periods)
  {
    $this->periods = $periods;
  }
  /**
   * @return TimePeriod[]
   */
  public function getPeriods()
  {
    return $this->periods;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MoreHours::class, 'Google_Service_MyBusinessBusinessInformation_MoreHours');
