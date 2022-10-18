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

class KnowledgeAnswersDateType extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowAllRangeResolutions;
  /**
   * @var bool
   */
  public $allowAllResolutions;
  /**
   * @var bool
   */
  public $allowAllResolutionsExceptHolidays;
  /**
   * @var bool
   */
  public $allowAllResolutionsWithout4digit24hrTime;
  /**
   * @var bool
   */
  public $allowAllResolutionsWithoutTime;
  /**
   * @var bool
   */
  public $allowDayResolution;
  /**
   * @var bool
   */
  public $allowDayResolutionExceptHolidaysOrOrdinal;
  /**
   * @var bool
   */
  public $allowHourResolution;
  /**
   * @var bool
   */
  public $allowMonthResolution;
  /**
   * @var bool
   */
  public $allowNowResolution;
  /**
   * @var bool
   */
  public $allowSymbolicTime;
  /**
   * @var bool
   */
  public $allowTimeResolutionsWithoutExplicitTimezone;
  /**
   * @var bool
   */
  public $allowYearResolution;
  protected $remodelingsType = NlpMeaningMeaningRemodelings::class;
  protected $remodelingsDataType = '';
  /**
   * @var string
   */
  public $subType;

  /**
   * @param bool
   */
  public function setAllowAllRangeResolutions($allowAllRangeResolutions)
  {
    $this->allowAllRangeResolutions = $allowAllRangeResolutions;
  }
  /**
   * @return bool
   */
  public function getAllowAllRangeResolutions()
  {
    return $this->allowAllRangeResolutions;
  }
  /**
   * @param bool
   */
  public function setAllowAllResolutions($allowAllResolutions)
  {
    $this->allowAllResolutions = $allowAllResolutions;
  }
  /**
   * @return bool
   */
  public function getAllowAllResolutions()
  {
    return $this->allowAllResolutions;
  }
  /**
   * @param bool
   */
  public function setAllowAllResolutionsExceptHolidays($allowAllResolutionsExceptHolidays)
  {
    $this->allowAllResolutionsExceptHolidays = $allowAllResolutionsExceptHolidays;
  }
  /**
   * @return bool
   */
  public function getAllowAllResolutionsExceptHolidays()
  {
    return $this->allowAllResolutionsExceptHolidays;
  }
  /**
   * @param bool
   */
  public function setAllowAllResolutionsWithout4digit24hrTime($allowAllResolutionsWithout4digit24hrTime)
  {
    $this->allowAllResolutionsWithout4digit24hrTime = $allowAllResolutionsWithout4digit24hrTime;
  }
  /**
   * @return bool
   */
  public function getAllowAllResolutionsWithout4digit24hrTime()
  {
    return $this->allowAllResolutionsWithout4digit24hrTime;
  }
  /**
   * @param bool
   */
  public function setAllowAllResolutionsWithoutTime($allowAllResolutionsWithoutTime)
  {
    $this->allowAllResolutionsWithoutTime = $allowAllResolutionsWithoutTime;
  }
  /**
   * @return bool
   */
  public function getAllowAllResolutionsWithoutTime()
  {
    return $this->allowAllResolutionsWithoutTime;
  }
  /**
   * @param bool
   */
  public function setAllowDayResolution($allowDayResolution)
  {
    $this->allowDayResolution = $allowDayResolution;
  }
  /**
   * @return bool
   */
  public function getAllowDayResolution()
  {
    return $this->allowDayResolution;
  }
  /**
   * @param bool
   */
  public function setAllowDayResolutionExceptHolidaysOrOrdinal($allowDayResolutionExceptHolidaysOrOrdinal)
  {
    $this->allowDayResolutionExceptHolidaysOrOrdinal = $allowDayResolutionExceptHolidaysOrOrdinal;
  }
  /**
   * @return bool
   */
  public function getAllowDayResolutionExceptHolidaysOrOrdinal()
  {
    return $this->allowDayResolutionExceptHolidaysOrOrdinal;
  }
  /**
   * @param bool
   */
  public function setAllowHourResolution($allowHourResolution)
  {
    $this->allowHourResolution = $allowHourResolution;
  }
  /**
   * @return bool
   */
  public function getAllowHourResolution()
  {
    return $this->allowHourResolution;
  }
  /**
   * @param bool
   */
  public function setAllowMonthResolution($allowMonthResolution)
  {
    $this->allowMonthResolution = $allowMonthResolution;
  }
  /**
   * @return bool
   */
  public function getAllowMonthResolution()
  {
    return $this->allowMonthResolution;
  }
  /**
   * @param bool
   */
  public function setAllowNowResolution($allowNowResolution)
  {
    $this->allowNowResolution = $allowNowResolution;
  }
  /**
   * @return bool
   */
  public function getAllowNowResolution()
  {
    return $this->allowNowResolution;
  }
  /**
   * @param bool
   */
  public function setAllowSymbolicTime($allowSymbolicTime)
  {
    $this->allowSymbolicTime = $allowSymbolicTime;
  }
  /**
   * @return bool
   */
  public function getAllowSymbolicTime()
  {
    return $this->allowSymbolicTime;
  }
  /**
   * @param bool
   */
  public function setAllowTimeResolutionsWithoutExplicitTimezone($allowTimeResolutionsWithoutExplicitTimezone)
  {
    $this->allowTimeResolutionsWithoutExplicitTimezone = $allowTimeResolutionsWithoutExplicitTimezone;
  }
  /**
   * @return bool
   */
  public function getAllowTimeResolutionsWithoutExplicitTimezone()
  {
    return $this->allowTimeResolutionsWithoutExplicitTimezone;
  }
  /**
   * @param bool
   */
  public function setAllowYearResolution($allowYearResolution)
  {
    $this->allowYearResolution = $allowYearResolution;
  }
  /**
   * @return bool
   */
  public function getAllowYearResolution()
  {
    return $this->allowYearResolution;
  }
  /**
   * @param NlpMeaningMeaningRemodelings
   */
  public function setRemodelings(NlpMeaningMeaningRemodelings $remodelings)
  {
    $this->remodelings = $remodelings;
  }
  /**
   * @return NlpMeaningMeaningRemodelings
   */
  public function getRemodelings()
  {
    return $this->remodelings;
  }
  /**
   * @param string
   */
  public function setSubType($subType)
  {
    $this->subType = $subType;
  }
  /**
   * @return string
   */
  public function getSubType()
  {
    return $this->subType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersDateType::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersDateType');
