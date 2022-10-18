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

class NlpSemanticParsingModelsRecurrenceDailyPattern extends \Google\Model
{
  protected $dayPeriodType = NlpSemanticParsingDateTimeAnnotation::class;
  protected $dayPeriodDataType = '';
  protected $timeOfDayType = NlpSemanticParsingDateTimeAnnotation::class;
  protected $timeOfDayDataType = '';

  /**
   * @param NlpSemanticParsingDateTimeAnnotation
   */
  public function setDayPeriod(NlpSemanticParsingDateTimeAnnotation $dayPeriod)
  {
    $this->dayPeriod = $dayPeriod;
  }
  /**
   * @return NlpSemanticParsingDateTimeAnnotation
   */
  public function getDayPeriod()
  {
    return $this->dayPeriod;
  }
  /**
   * @param NlpSemanticParsingDateTimeAnnotation
   */
  public function setTimeOfDay(NlpSemanticParsingDateTimeAnnotation $timeOfDay)
  {
    $this->timeOfDay = $timeOfDay;
  }
  /**
   * @return NlpSemanticParsingDateTimeAnnotation
   */
  public function getTimeOfDay()
  {
    return $this->timeOfDay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrenceDailyPattern::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrenceDailyPattern');
