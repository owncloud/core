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

class AppsPeopleOzExternalMergedpeopleapiOpeningHours extends \Google\Collection
{
  protected $collection_key = 'weekdayTexts';
  /**
   * @var bool
   */
  public $openNow;
  protected $periodsType = AppsPeopleOzExternalMergedpeopleapiOpeningHoursPeriod::class;
  protected $periodsDataType = 'array';
  /**
   * @var string[]
   */
  public $weekdayTexts;

  /**
   * @param bool
   */
  public function setOpenNow($openNow)
  {
    $this->openNow = $openNow;
  }
  /**
   * @return bool
   */
  public function getOpenNow()
  {
    return $this->openNow;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiOpeningHoursPeriod[]
   */
  public function setPeriods($periods)
  {
    $this->periods = $periods;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiOpeningHoursPeriod[]
   */
  public function getPeriods()
  {
    return $this->periods;
  }
  /**
   * @param string[]
   */
  public function setWeekdayTexts($weekdayTexts)
  {
    $this->weekdayTexts = $weekdayTexts;
  }
  /**
   * @return string[]
   */
  public function getWeekdayTexts()
  {
    return $this->weekdayTexts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiOpeningHours::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiOpeningHours');
