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

namespace Google\Service\ChromeUXReport;

class CollectionPeriod extends \Google\Model
{
  protected $firstDateType = Date::class;
  protected $firstDateDataType = '';
  protected $lastDateType = Date::class;
  protected $lastDateDataType = '';

  /**
   * @param Date
   */
  public function setFirstDate(Date $firstDate)
  {
    $this->firstDate = $firstDate;
  }
  /**
   * @return Date
   */
  public function getFirstDate()
  {
    return $this->firstDate;
  }
  /**
   * @param Date
   */
  public function setLastDate(Date $lastDate)
  {
    $this->lastDate = $lastDate;
  }
  /**
   * @return Date
   */
  public function getLastDate()
  {
    return $this->lastDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CollectionPeriod::class, 'Google_Service_ChromeUXReport_CollectionPeriod');
