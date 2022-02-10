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

class Event extends \Google\Collection
{
  protected $collection_key = 'recurrence';
  /**
   * @var bool
   */
  public $anyoneCanAddSelf;
  protected $attachmentsType = EventAttachment::class;
  protected $attachmentsDataType = 'array';
  protected $attendeesType = EventAttendee::class;
  protected $attendeesDataType = 'array';
  /**
   * @var bool
   */
  public $attendeesOmitted;
  /**
   * @var string
   */
  public $colorId;
  protected $conferenceDataType = ConferenceData::class;
  protected $conferenceDataDataType = '';
  /**
   * @var string
   */
  public $created;
  protected $creatorType = EventCreator::class;
  protected $creatorDataType = '';
  /**
   * @var string
   */
  public $description;
  protected $endType = EventDateTime::class;
  protected $endDataType = '';
  /**
   * @var bool
   */
  public $endTimeUnspecified;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $eventType;
  protected $extendedPropertiesType = EventExtendedProperties::class;
  protected $extendedPropertiesDataType = '';
  protected $gadgetType = EventGadget::class;
  protected $gadgetDataType = '';
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
  public $guestsCanSeeOtherGuests;
  /**
   * @var string
   */
  public $hangoutLink;
  /**
   * @var string
   */
  public $htmlLink;
  /**
   * @var string
   */
  public $iCalUID;
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
  /**
   * @var bool
   */
  public $locked;
  protected $organizerType = EventOrganizer::class;
  protected $organizerDataType = '';
  protected $originalStartTimeType = EventDateTime::class;
  protected $originalStartTimeDataType = '';
  /**
   * @var bool
   */
  public $privateCopy;
  /**
   * @var string[]
   */
  public $recurrence;
  /**
   * @var string
   */
  public $recurringEventId;
  protected $remindersType = EventReminders::class;
  protected $remindersDataType = '';
  /**
   * @var int
   */
  public $sequence;
  protected $sourceType = EventSource::class;
  protected $sourceDataType = '';
  protected $startType = EventDateTime::class;
  protected $startDataType = '';
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $summary;
  /**
   * @var string
   */
  public $transparency;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param bool
   */
  public function setAnyoneCanAddSelf($anyoneCanAddSelf)
  {
    $this->anyoneCanAddSelf = $anyoneCanAddSelf;
  }
  /**
   * @return bool
   */
  public function getAnyoneCanAddSelf()
  {
    return $this->anyoneCanAddSelf;
  }
  /**
   * @param EventAttachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return EventAttachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param EventAttendee[]
   */
  public function setAttendees($attendees)
  {
    $this->attendees = $attendees;
  }
  /**
   * @return EventAttendee[]
   */
  public function getAttendees()
  {
    return $this->attendees;
  }
  /**
   * @param bool
   */
  public function setAttendeesOmitted($attendeesOmitted)
  {
    $this->attendeesOmitted = $attendeesOmitted;
  }
  /**
   * @return bool
   */
  public function getAttendeesOmitted()
  {
    return $this->attendeesOmitted;
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
   * @param ConferenceData
   */
  public function setConferenceData(ConferenceData $conferenceData)
  {
    $this->conferenceData = $conferenceData;
  }
  /**
   * @return ConferenceData
   */
  public function getConferenceData()
  {
    return $this->conferenceData;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param EventCreator
   */
  public function setCreator(EventCreator $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return EventCreator
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
   * @param EventDateTime
   */
  public function setEnd(EventDateTime $end)
  {
    $this->end = $end;
  }
  /**
   * @return EventDateTime
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param bool
   */
  public function setEndTimeUnspecified($endTimeUnspecified)
  {
    $this->endTimeUnspecified = $endTimeUnspecified;
  }
  /**
   * @return bool
   */
  public function getEndTimeUnspecified()
  {
    return $this->endTimeUnspecified;
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
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param EventExtendedProperties
   */
  public function setExtendedProperties(EventExtendedProperties $extendedProperties)
  {
    $this->extendedProperties = $extendedProperties;
  }
  /**
   * @return EventExtendedProperties
   */
  public function getExtendedProperties()
  {
    return $this->extendedProperties;
  }
  /**
   * @param EventGadget
   */
  public function setGadget(EventGadget $gadget)
  {
    $this->gadget = $gadget;
  }
  /**
   * @return EventGadget
   */
  public function getGadget()
  {
    return $this->gadget;
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
  public function setGuestsCanSeeOtherGuests($guestsCanSeeOtherGuests)
  {
    $this->guestsCanSeeOtherGuests = $guestsCanSeeOtherGuests;
  }
  /**
   * @return bool
   */
  public function getGuestsCanSeeOtherGuests()
  {
    return $this->guestsCanSeeOtherGuests;
  }
  /**
   * @param string
   */
  public function setHangoutLink($hangoutLink)
  {
    $this->hangoutLink = $hangoutLink;
  }
  /**
   * @return string
   */
  public function getHangoutLink()
  {
    return $this->hangoutLink;
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
  public function setICalUID($iCalUID)
  {
    $this->iCalUID = $iCalUID;
  }
  /**
   * @return string
   */
  public function getICalUID()
  {
    return $this->iCalUID;
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
   * @param bool
   */
  public function setLocked($locked)
  {
    $this->locked = $locked;
  }
  /**
   * @return bool
   */
  public function getLocked()
  {
    return $this->locked;
  }
  /**
   * @param EventOrganizer
   */
  public function setOrganizer(EventOrganizer $organizer)
  {
    $this->organizer = $organizer;
  }
  /**
   * @return EventOrganizer
   */
  public function getOrganizer()
  {
    return $this->organizer;
  }
  /**
   * @param EventDateTime
   */
  public function setOriginalStartTime(EventDateTime $originalStartTime)
  {
    $this->originalStartTime = $originalStartTime;
  }
  /**
   * @return EventDateTime
   */
  public function getOriginalStartTime()
  {
    return $this->originalStartTime;
  }
  /**
   * @param bool
   */
  public function setPrivateCopy($privateCopy)
  {
    $this->privateCopy = $privateCopy;
  }
  /**
   * @return bool
   */
  public function getPrivateCopy()
  {
    return $this->privateCopy;
  }
  /**
   * @param string[]
   */
  public function setRecurrence($recurrence)
  {
    $this->recurrence = $recurrence;
  }
  /**
   * @return string[]
   */
  public function getRecurrence()
  {
    return $this->recurrence;
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
   * @param EventReminders
   */
  public function setReminders(EventReminders $reminders)
  {
    $this->reminders = $reminders;
  }
  /**
   * @return EventReminders
   */
  public function getReminders()
  {
    return $this->reminders;
  }
  /**
   * @param int
   */
  public function setSequence($sequence)
  {
    $this->sequence = $sequence;
  }
  /**
   * @return int
   */
  public function getSequence()
  {
    return $this->sequence;
  }
  /**
   * @param EventSource
   */
  public function setSource(EventSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return EventSource
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param EventDateTime
   */
  public function setStart(EventDateTime $start)
  {
    $this->start = $start;
  }
  /**
   * @return EventDateTime
   */
  public function getStart()
  {
    return $this->start;
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
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  /**
   * @return string
   */
  public function getTransparency()
  {
    return $this->transparency;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
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
class_alias(Event::class, 'Google_Service_Calendar_Event');
