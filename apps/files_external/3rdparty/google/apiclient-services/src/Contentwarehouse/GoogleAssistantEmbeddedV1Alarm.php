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

class GoogleAssistantEmbeddedV1Alarm extends \Google\Model
{
  /**
   * @var string
   */
  public $alarmId;
  protected $datePatternType = GoogleTypeDate::class;
  protected $datePatternDataType = '';
  /**
   * @var string
   */
  public $label;
  protected $recurrencePatternType = GoogleAssistantEmbeddedV1AlarmRecurrence::class;
  protected $recurrencePatternDataType = '';
  /**
   * @var string
   */
  public $scheduledTime;
  /**
   * @var string
   */
  public $status;
  protected $timePatternType = GoogleTypeTimeOfDay::class;
  protected $timePatternDataType = '';

  /**
   * @param string
   */
  public function setAlarmId($alarmId)
  {
    $this->alarmId = $alarmId;
  }
  /**
   * @return string
   */
  public function getAlarmId()
  {
    return $this->alarmId;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setDatePattern(GoogleTypeDate $datePattern)
  {
    $this->datePattern = $datePattern;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getDatePattern()
  {
    return $this->datePattern;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param GoogleAssistantEmbeddedV1AlarmRecurrence
   */
  public function setRecurrencePattern(GoogleAssistantEmbeddedV1AlarmRecurrence $recurrencePattern)
  {
    $this->recurrencePattern = $recurrencePattern;
  }
  /**
   * @return GoogleAssistantEmbeddedV1AlarmRecurrence
   */
  public function getRecurrencePattern()
  {
    return $this->recurrencePattern;
  }
  /**
   * @param string
   */
  public function setScheduledTime($scheduledTime)
  {
    $this->scheduledTime = $scheduledTime;
  }
  /**
   * @return string
   */
  public function getScheduledTime()
  {
    return $this->scheduledTime;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param GoogleTypeTimeOfDay
   */
  public function setTimePattern(GoogleTypeTimeOfDay $timePattern)
  {
    $this->timePattern = $timePattern;
  }
  /**
   * @return GoogleTypeTimeOfDay
   */
  public function getTimePattern()
  {
    return $this->timePattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAssistantEmbeddedV1Alarm::class, 'Google_Service_Contentwarehouse_GoogleAssistantEmbeddedV1Alarm');
