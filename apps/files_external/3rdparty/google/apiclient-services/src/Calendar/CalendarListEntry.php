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

namespace Google\Service\Calendar;

class CalendarListEntry extends \Google\Collection
{
  protected $collection_key = 'defaultReminders';
  /**
   * @var string
   */
  public $accessRole;
  /**
   * @var string
   */
  public $backgroundColor;
  /**
   * @var string
   */
  public $colorId;
  protected $conferencePropertiesType = ConferenceProperties::class;
  protected $conferencePropertiesDataType = '';
  protected $defaultRemindersType = EventReminder::class;
  protected $defaultRemindersDataType = 'array';
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $foregroundColor;
  /**
   * @var bool
   */
  public $hidden;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $location;
  protected $notificationSettingsType = CalendarListEntryNotificationSettings::class;
  protected $notificationSettingsDataType = '';
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var bool
   */
  public $selected;
  /**
   * @var string
   */
  public $summary;
  /**
   * @var string
   */
  public $summaryOverride;
  /**
   * @var string
   */
  public $timeZone;

  /**
   * @param string
   */
  public function setAccessRole($accessRole)
  {
    $this->accessRole = $accessRole;
  }
  /**
   * @return string
   */
  public function getAccessRole()
  {
    return $this->accessRole;
  }
  /**
   * @param string
   */
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return string
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param string
   */
  public function setColorId($colorId)
  {
    $this->colorId = $colorId;
  }
  /**
   * @return string
   */
  public function getColorId()
  {
    return $this->colorId;
  }
  /**
   * @param ConferenceProperties
   */
  public function setConferenceProperties(ConferenceProperties $conferenceProperties)
  {
    $this->conferenceProperties = $conferenceProperties;
  }
  /**
   * @return ConferenceProperties
   */
  public function getConferenceProperties()
  {
    return $this->conferenceProperties;
  }
  /**
   * @param EventReminder[]
   */
  public function setDefaultReminders($defaultReminders)
  {
    $this->defaultReminders = $defaultReminders;
  }
  /**
   * @return EventReminder[]
   */
  public function getDefaultReminders()
  {
    return $this->defaultReminders;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setForegroundColor($foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return string
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  /**
   * @param bool
   */
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  /**
   * @return bool
   */
  public function getHidden()
  {
    return $this->hidden;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param CalendarListEntryNotificationSettings
   */
  public function setNotificationSettings(CalendarListEntryNotificationSettings $notificationSettings)
  {
    $this->notificationSettings = $notificationSettings;
  }
  /**
   * @return CalendarListEntryNotificationSettings
   */
  public function getNotificationSettings()
  {
    return $this->notificationSettings;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param bool
   */
  public function setSelected($selected)
  {
    $this->selected = $selected;
  }
  /**
   * @return bool
   */
  public function getSelected()
  {
    return $this->selected;
  }
  /**
   * @param string
   */
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  /**
   * @return string
   */
  public function getSummary()
  {
    return $this->summary;
  }
  /**
   * @param string
   */
  public function setSummaryOverride($summaryOverride)
  {
    $this->summaryOverride = $summaryOverride;
  }
  /**
   * @return string
   */
  public function getSummaryOverride()
  {
    return $this->summaryOverride;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CalendarListEntry::class, 'Google_Service_Calendar_CalendarListEntry');
