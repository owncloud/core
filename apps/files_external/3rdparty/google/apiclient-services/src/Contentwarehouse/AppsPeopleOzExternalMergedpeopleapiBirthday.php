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

class AppsPeopleOzExternalMergedpeopleapiBirthday extends \Google\Model
{
  protected $ageDisableGracePeriodType = AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod::class;
  protected $ageDisableGracePeriodDataType = '';
  protected $birthdayDecorationType = SocialGraphApiProtoBirthdayDecoration::class;
  protected $birthdayDecorationDataType = '';
  /**
   * @var string
   */
  public $birthdayResolution;
  protected $calendarDayType = GoogleTypeDate::class;
  protected $calendarDayDataType = '';
  /**
   * @var string
   */
  public $dateMs;
  /**
   * @var string
   */
  public $dateMsAsNumber;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $value;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod
   */
  public function setAgeDisableGracePeriod(AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod $ageDisableGracePeriod)
  {
    $this->ageDisableGracePeriod = $ageDisableGracePeriod;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiBirthdayAgeDisableGracePeriod
   */
  public function getAgeDisableGracePeriod()
  {
    return $this->ageDisableGracePeriod;
  }
  /**
   * @param SocialGraphApiProtoBirthdayDecoration
   */
  public function setBirthdayDecoration(SocialGraphApiProtoBirthdayDecoration $birthdayDecoration)
  {
    $this->birthdayDecoration = $birthdayDecoration;
  }
  /**
   * @return SocialGraphApiProtoBirthdayDecoration
   */
  public function getBirthdayDecoration()
  {
    return $this->birthdayDecoration;
  }
  /**
   * @param string
   */
  public function setBirthdayResolution($birthdayResolution)
  {
    $this->birthdayResolution = $birthdayResolution;
  }
  /**
   * @return string
   */
  public function getBirthdayResolution()
  {
    return $this->birthdayResolution;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setCalendarDay(GoogleTypeDate $calendarDay)
  {
    $this->calendarDay = $calendarDay;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getCalendarDay()
  {
    return $this->calendarDay;
  }
  /**
   * @param string
   */
  public function setDateMs($dateMs)
  {
    $this->dateMs = $dateMs;
  }
  /**
   * @return string
   */
  public function getDateMs()
  {
    return $this->dateMs;
  }
  /**
   * @param string
   */
  public function setDateMsAsNumber($dateMsAsNumber)
  {
    $this->dateMsAsNumber = $dateMsAsNumber;
  }
  /**
   * @return string
   */
  public function getDateMsAsNumber()
  {
    return $this->dateMsAsNumber;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiBirthday::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiBirthday');
