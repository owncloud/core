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

class SpecialHours extends \Google\Collection
{
  protected $collection_key = 'specialHourPeriods';
  protected $specialHourPeriodsType = SpecialHourPeriod::class;
  protected $specialHourPeriodsDataType = 'array';

  /**
   * @param SpecialHourPeriod[]
   */
  public function setSpecialHourPeriods($specialHourPeriods)
  {
    $this->specialHourPeriods = $specialHourPeriods;
  }
  /**
   * @return SpecialHourPeriod[]
   */
  public function getSpecialHourPeriods()
  {
    return $this->specialHourPeriods;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpecialHours::class, 'Google_Service_MyBusinessBusinessInformation_SpecialHours');
