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

class GoogleInternalAppsWaldoV1alphaUserAvailabilities extends \Google\Collection
{
  protected $collection_key = 'availabilities';
  protected $availabilitiesType = GoogleInternalAppsWaldoV1alphaUserAvailability::class;
  protected $availabilitiesDataType = 'array';
  /**
   * @var string
   */
  public $nextPollTime;
  protected $workingHoursType = GoogleInternalAppsWaldoV1alphaWorkingHours::class;
  protected $workingHoursDataType = '';

  /**
   * @param GoogleInternalAppsWaldoV1alphaUserAvailability[]
   */
  public function setAvailabilities($availabilities)
  {
    $this->availabilities = $availabilities;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaUserAvailability[]
   */
  public function getAvailabilities()
  {
    return $this->availabilities;
  }
  /**
   * @param string
   */
  public function setNextPollTime($nextPollTime)
  {
    $this->nextPollTime = $nextPollTime;
  }
  /**
   * @return string
   */
  public function getNextPollTime()
  {
    return $this->nextPollTime;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaWorkingHours
   */
  public function setWorkingHours(GoogleInternalAppsWaldoV1alphaWorkingHours $workingHours)
  {
    $this->workingHours = $workingHours;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaWorkingHours
   */
  public function getWorkingHours()
  {
    return $this->workingHours;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaUserAvailabilities::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaUserAvailabilities');
