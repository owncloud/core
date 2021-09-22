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
  public $anyoneCanAddSelf;
  protected $attachmentsType = EventAttachment::class;
  protected $attachmentsDataType = 'array';
  protected $attendeesType = EventAttendee::class;
  protected $attendeesDataType = 'array';
  public $attendeesOmitted;
  public $colorId;
  protected $conferenceDataType = ConferenceData::class;
  protected $conferenceDataDataType = '';
  public $created;
  protected $creatorType = EventCreator::class;
  protected $creatorDataType = '';
  public $description;
  protected $endType = EventDateTime::class;
  protected $endDataType = '';
  public $endTimeUnspecified;
  public $etag;
  public $eventType;
  protected $extendedPropertiesType = EventExtendedProperties::class;
  protected $extendedPropertiesDataType = '';
  protected $gadgetType = EventGadget::class;
  protected $gadgetDataType = '';
  public $guestsCanInviteOthers;
  public $guestsCanModify;
  public $guestsCanSeeOtherGuests;
  public $hangoutLink;
  public $htmlLink;
  public $iCalUID;
  public $id;
  public $kind;
  public $location;
  public $locked;
  protected $organizerType = EventOrganizer::class;
  protected $organizerDataType = '';
  protected $originalStartTimeType = EventDateTime::class;
  protected $originalStartTimeDataType = '';
  public $privateCopy;
  public $recurrence;
  public $recurringEventId;
  protected $remindersType = EventReminders::class;
  protected $remindersDataType = '';
  public $sequence;
  protected $sourceType = EventSource::class;
  protected $sourceDataType = '';
  protected $startType = EventDateTime::class;
  protected $startDataType = '';
  public $status;
  public $summary;
  public $transparency;
  public $updated;
  public $visibility;

  public function setAnyoneCanAddSelf($anyoneCanAddSelf)
  {
    $this->anyoneCanAddSelf = $anyoneCanAddSelf;
  }
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
  public function setAttendeesOmitted($attendeesOmitted)
  {
    $this->attendeesOmitted = $attendeesOmitted;
  }
  public function getAttendeesOmitted()
  {
    return $this->attendeesOmitted;
  }
  public function setColorId($colorId)
  {
    $this->colorId = $colorId;
  }
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
  public function setCreated($created)
  {
    $this->created = $created;
  }
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
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
  public function setEndTimeUnspecified($endTimeUnspecified)
  {
    $this->endTimeUnspecified = $endTimeUnspecified;
  }
  public function getEndTimeUnspecified()
  {
    return $this->endTimeUnspecified;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
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
  public function setGuestsCanInviteOthers($guestsCanInviteOthers)
  {
    $this->guestsCanInviteOthers = $guestsCanInviteOthers;
  }
  public function getGuestsCanInviteOthers()
  {
    return $this->guestsCanInviteOthers;
  }
  public function setGuestsCanModify($guestsCanModify)
  {
    $this->guestsCanModify = $guestsCanModify;
  }
  public function getGuestsCanModify()
  {
    return $this->guestsCanModify;
  }
  public function setGuestsCanSeeOtherGuests($guestsCanSeeOtherGuests)
  {
    $this->guestsCanSeeOtherGuests = $guestsCanSeeOtherGuests;
  }
  public function getGuestsCanSeeOtherGuests()
  {
    return $this->guestsCanSeeOtherGuests;
  }
  public function setHangoutLink($hangoutLink)
  {
    $this->hangoutLink = $hangoutLink;
  }
  public function getHangoutLink()
  {
    return $this->hangoutLink;
  }
  public function setHtmlLink($htmlLink)
  {
    $this->htmlLink = $htmlLink;
  }
  public function getHtmlLink()
  {
    return $this->htmlLink;
  }
  public function setICalUID($iCalUID)
  {
    $this->iCalUID = $iCalUID;
  }
  public function getICalUID()
  {
    return $this->iCalUID;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  public function setLocked($locked)
  {
    $this->locked = $locked;
  }
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
  public function setPrivateCopy($privateCopy)
  {
    $this->privateCopy = $privateCopy;
  }
  public function getPrivateCopy()
  {
    return $this->privateCopy;
  }
  public function setRecurrence($recurrence)
  {
    $this->recurrence = $recurrence;
  }
  public function getRecurrence()
  {
    return $this->recurrence;
  }
  public function setRecurringEventId($recurringEventId)
  {
    $this->recurringEventId = $recurringEventId;
  }
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
  public function setSequence($sequence)
  {
    $this->sequence = $sequence;
  }
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSummary($summary)
  {
    $this->summary = $summary;
  }
  public function getSummary()
  {
    return $this->summary;
  }
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  public function getTransparency()
  {
    return $this->transparency;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Event::class, 'Google_Service_Calendar_Event');
