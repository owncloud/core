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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1DateTimePicker extends \Google\Model
{
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $name;
  protected $onChangeActionType = GoogleAppsCardV1Action::class;
  protected $onChangeActionDataType = '';
  /**
   * @var int
   */
  public $timezoneOffsetDate;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $valueMsEpoch;

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
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleAppsCardV1Action
   */
  public function setOnChangeAction(GoogleAppsCardV1Action $onChangeAction)
  {
    $this->onChangeAction = $onChangeAction;
  }
  /**
   * @return GoogleAppsCardV1Action
   */
  public function getOnChangeAction()
  {
    return $this->onChangeAction;
  }
  /**
   * @param int
   */
  public function setTimezoneOffsetDate($timezoneOffsetDate)
  {
    $this->timezoneOffsetDate = $timezoneOffsetDate;
  }
  /**
   * @return int
   */
  public function getTimezoneOffsetDate()
  {
    return $this->timezoneOffsetDate;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValueMsEpoch($valueMsEpoch)
  {
    $this->valueMsEpoch = $valueMsEpoch;
  }
  /**
   * @return string
   */
  public function getValueMsEpoch()
  {
    return $this->valueMsEpoch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1DateTimePicker::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1DateTimePicker');
