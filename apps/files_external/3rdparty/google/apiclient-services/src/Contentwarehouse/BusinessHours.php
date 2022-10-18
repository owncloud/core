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

class BusinessHours extends \Google\Collection
{
  protected $collection_key = 'interval';
  /**
   * @var int
   */
  public $dayopen;
  protected $intervalType = BusinessHoursInterval::class;
  protected $intervalDataType = 'array';

  /**
   * @param int
   */
  public function setDayopen($dayopen)
  {
    $this->dayopen = $dayopen;
  }
  /**
   * @return int
   */
  public function getDayopen()
  {
    return $this->dayopen;
  }
  /**
   * @param BusinessHoursInterval[]
   */
  public function setInterval($interval)
  {
    $this->interval = $interval;
  }
  /**
   * @return BusinessHoursInterval[]
   */
  public function getInterval()
  {
    return $this->interval;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BusinessHours::class, 'Google_Service_Contentwarehouse_BusinessHours');
