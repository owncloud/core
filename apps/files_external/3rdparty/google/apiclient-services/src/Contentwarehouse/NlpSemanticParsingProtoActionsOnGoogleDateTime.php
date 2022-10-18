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

class NlpSemanticParsingProtoActionsOnGoogleDateTime extends \Google\Model
{
  protected $dateType = GoogleTypeDate::class;
  protected $dateDataType = '';
  protected $propertyType = NlpSemanticParsingProtoActionsOnGoogleDateTimeProperty::class;
  protected $propertyDataType = '';
  protected $timeType = GoogleTypeTimeOfDay::class;
  protected $timeDataType = '';
  protected $timeZoneType = GoogleTypeTimeZone::class;
  protected $timeZoneDataType = '';

  /**
   * @param GoogleTypeDate
   */
  public function setDate(GoogleTypeDate $date)
  {
    $this->date = $date;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param NlpSemanticParsingProtoActionsOnGoogleDateTimeProperty
   */
  public function setProperty(NlpSemanticParsingProtoActionsOnGoogleDateTimeProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return NlpSemanticParsingProtoActionsOnGoogleDateTimeProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  /**
   * @param GoogleTypeTimeOfDay
   */
  public function setTime(GoogleTypeTimeOfDay $time)
  {
    $this->time = $time;
  }
  /**
   * @return GoogleTypeTimeOfDay
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param GoogleTypeTimeZone
   */
  public function setTimeZone(GoogleTypeTimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return GoogleTypeTimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingProtoActionsOnGoogleDateTime::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingProtoActionsOnGoogleDateTime');
