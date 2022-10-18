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

class AssistantApiCoreTypesCalendarEvent extends \Google\Collection
{
  protected $collection_key = 'rooms';
  protected $attendeesType = AssistantApiCoreTypesCalendarEventAttendee::class;
  protected $attendeesDataType = 'array';
  /**
   * @var int
   */
  public $backgroundColor;
  /**
   * @var string
   */
  public $calendarId;
  protected $creatorType = AssistantApiCoreTypesCalendarEventAttendee::class;
  protected $creatorDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $endType = AssistantApiDateTime::class;
  protected $endDataType = '';
  /**
   * @var string
   */
  public $eventId;
  /**
   * @var string
   */
  public $flairName;
  /**
   * @var int
   */
  public $foregroundColor;
  /**
   * @var bool
   */
  public $guestsCanInviteOthers;
  /**
   * @var bool
   */
  public $guestsCanModify;
  /**
   * @var bool
   */
  public $guestsCanSeeGuests;
  /**
   * @var string
   */
  public $habitId;
  /**
   * @var string
   */
  public $habitStatus;
  /**
   * @var string
   */
  public $htmlLink;
  /**
   * @var string
   */
  public $location;
  protected $meetingContactsType = AssistantApiCoreTypesCalendarEventMeetingContact::class;
  protected $meetingContactsDataType = 'array';
  protected $organizerType = AssistantApiCoreTypesCalendarEventAttendee::class;
  protected $organizerDataType = '';
  /**
   * @var bool
   */
  public $otherAttendeesExcluded;
  /**
   * @var string
   */
  public $participationResponse;
  /**
   * @var string
   */
  public $recurringEventId;
  protected $roomsType = AssistantApiCoreTypesCalendarEventRoom::class;
  protected $roomsDataType = 'array';
  protected $startType = AssistantApiDateTime::class;
  protected $startDataType = '';
  /**
   * @var string
   */
  public $summary;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param AssistantApiCoreTypesCalendarEventAttendee[]
   */
  public function setAttendees($attendees)
  {
    $this->attendees = $attendees;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventAttendee[]
   */
  public function getAttendees()
  {
    return $this->attendees;
  }
  /**
   * @param int
   */
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return int
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param string
   */
  public function setCalendarId($calendarId)
  {
    $this->calendarId = $calendarId;
  }
  /**
   * @return string
   */
  public function getCalendarId()
  {
    return $this->calendarId;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEventAttendee
   */
  public function setCreator(AssistantApiCoreTypesCalendarEventAttendee $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventAttendee
   */
  public function getCreator()
  {
    return $this->creator;
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
   * @param AssistantApiDateTime
   */
  public function setEnd(AssistantApiDateTime $end)
  {
    $this->end = $end;
  }
  /**
   * @return AssistantApiDateTime
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param string
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * @param string
   */
  public function setFlairName($flairName)
  {
    $this->flairName = $flairName;
  }
  /**
   * @return string
   */
  public function getFlairName()
  {
    return $this->flairName;
  }
  /**
   * @param int
   */
  public function setForegroundColor($foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return int
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  /**
   * @param bool
   */
  public function setGuestsCanInviteOthers($guestsCanInviteOthers)
  {
    $this->guestsCanInviteOthers = $guestsCanInviteOthers;
  }
  /**
   * @return bool
   */
  public function getGuestsCanInviteOthers()
  {
    return $this->guestsCanInviteOthers;
  }
  /**
   * @param bool
   */
  public function setGuestsCanModify($guestsCanModify)
  {
    $this->guestsCanModify = $guestsCanModify;
  }
  /**
   * @return bool
   */
  public function getGuestsCanModify()
  {
    return $this->guestsCanModify;
  }
  /**
   * @param bool
   */
  public function setGuestsCanSeeGuests($guestsCanSeeGuests)
  {
    $this->guestsCanSeeGuests = $guestsCanSeeGuests;
  }
  /**
   * @return bool
   */
  public function getGuestsCanSeeGuests()
  {
    return $this->guestsCanSeeGuests;
  }
  /**
   * @param string
   */
  public function setHabitId($habitId)
  {
    $this->habitId = $habitId;
  }
  /**
   * @return string
   */
  public function getHabitId()
  {
    return $this->habitId;
  }
  /**
   * @param string
   */
  public function setHabitStatus($habitStatus)
  {
    $this->habitStatus = $habitStatus;
  }
  /**
   * @return string
   */
  public function getHabitStatus()
  {
    return $this->habitStatus;
  }
  /**
   * @param string
   */
  public function setHtmlLink($htmlLink)
  {
    $this->htmlLink = $htmlLink;
  }
  /**
   * @return string
   */
  public function getHtmlLink()
  {
    return $this->htmlLink;
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
   * @param AssistantApiCoreTypesCalendarEventMeetingContact[]
   */
  public function setMeetingContacts($meetingContacts)
  {
    $this->meetingContacts = $meetingContacts;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventMeetingContact[]
   */
  public function getMeetingContacts()
  {
    return $this->meetingContacts;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEventAttendee
   */
  public function setOrganizer(AssistantApiCoreTypesCalendarEventAttendee $organizer)
  {
    $this->organizer = $organizer;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventAttendee
   */
  public function getOrganizer()
  {
    return $this->organizer;
  }
  /**
   * @param bool
   */
  public function setOtherAttendeesExcluded($otherAttendeesExcluded)
  {
    $this->otherAttendeesExcluded = $otherAttendeesExcluded;
  }
  /**
   * @return bool
   */
  public function getOtherAttendeesExcluded()
  {
    return $this->otherAttendeesExcluded;
  }
  /**
   * @param string
   */
  public function setParticipationResponse($participationResponse)
  {
    $this->participationResponse = $participationResponse;
  }
  /**
   * @return string
   */
  public function getParticipationResponse()
  {
    return $this->participationResponse;
  }
  /**
   * @param string
   */
  public function setRecurringEventId($recurringEventId)
  {
    $this->recurringEventId = $recurringEventId;
  }
  /**
   * @return string
   */
  public function getRecurringEventId()
  {
    return $this->recurringEventId;
  }
  /**
   * @param AssistantApiCoreTypesCalendarEventRoom[]
   */
  public function setRooms($rooms)
  {
    $this->rooms = $rooms;
  }
  /**
   * @return AssistantApiCoreTypesCalendarEventRoom[]
   */
  public function getRooms()
  {
    return $this->rooms;
  }
  /**
   * @param AssistantApiDateTime
   */
  public function setStart(AssistantApiDateTime $start)
  {
    $this->start = $start;
  }
  /**
   * @return AssistantApiDateTime
   */
  public function getStart()
  {
    return $this->start;
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
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesCalendarEvent::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesCalendarEvent');
