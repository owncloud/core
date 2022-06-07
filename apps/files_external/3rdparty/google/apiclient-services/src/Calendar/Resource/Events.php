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

namespace Google\Service\Calendar\Resource;

use Google\Service\Calendar\Channel;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\Events as EventsModel;

/**
 * The "events" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google\Service\Calendar(...);
 *   $events = $calendarService->events;
 *  </code>
 */
class Events extends \Google\Service\Resource
{
  /**
   * Deletes an event. (events.delete)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the deletion of the event. Note that some
   * emails might still be sent even if you set the value to false. The default is
   * false.
   * @opt_param string sendUpdates Guests who should receive notifications about
   * the deletion of the event.
   */
  public function delete($calendarId, $eventId, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Returns an event. (events.get)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @return Event
   */
  public function get($calendarId, $eventId, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Event::class);
  }
  /**
   * Imports an event. This operation is used to add a private copy of an existing
   * event to a calendar. (events.import)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int conferenceDataVersion Version number of conference data
   * supported by the API client. Version 0 assumes no conference data support and
   * ignores conference data in the event's body. Version 1 enables support for
   * copying of ConferenceData as well as for creating new conferences using the
   * createRequest field of conferenceData. The default is 0.
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Event
   */
  public function import($calendarId, Event $postBody, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], Event::class);
  }
  /**
   * Creates an event. (events.insert)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int conferenceDataVersion Version number of conference data
   * supported by the API client. Version 0 assumes no conference data support and
   * ignores conference data in the event's body. Version 1 enables support for
   * copying of ConferenceData as well as for creating new conferences using the
   * createRequest field of conferenceData. The default is 0.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the creation of the new event. Note that
   * some emails might still be sent even if you set the value to false. The
   * default is false.
   * @opt_param string sendUpdates Whether to send notifications about the
   * creation of the new event. Note that some emails might still be sent. The
   * default is false.
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Event
   */
  public function insert($calendarId, Event $postBody, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Event::class);
  }
  /**
   * Returns instances of the specified recurring event. (events.instances)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Recurring event identifier.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. By default the value is 250 events. The page size can never be larger
   * than 2500 events. Optional.
   * @opt_param string originalStart The original start time of the instance in
   * the result. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * will still be included if singleEvents is False. Optional. The default is
   * False.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset.
   * @opt_param string timeMin Lower bound (inclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @return EventsModel
   */
  public function instances($calendarId, $eventId, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId];
    $params = array_merge($params, $optParams);
    return $this->call('instances', [$params], EventsModel::class);
  }
  /**
   * Returns events on the specified calendar. (events.listEvents)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
   * included in the response. Optional.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. The number of events in the resulting page may be less than this value,
   * or none at all, even if there are more events matching the query. Incomplete
   * pages can be detected by a non-empty nextPageToken field in the response. By
   * default the value is 250 events. The page size can never be larger than 2500
   * events. Optional.
   * @opt_param string orderBy The order of the events returned in the result.
   * Optional. The default is an unspecified, stable order.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string privateExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only private properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param string q Free text search terms to find events that match these
   * terms in the following fields: summary, description, location, attendee's
   * displayName, attendee's email. Optional.
   * @opt_param string sharedExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only shared properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * (but not the underlying recurring event) will still be included if
   * showDeleted and singleEvents are both False. If showDeleted and singleEvents
   * are both True, only single instances of deleted events (but not the
   * underlying recurring events) are returned. Optional. The default is False.
   * @opt_param bool showHiddenInvitations Whether to include hidden invitations
   * in the result. Optional. The default is False.
   * @opt_param bool singleEvents Whether to expand recurring events into
   * instances and only return single one-off events and instances of recurring
   * events, but not the underlying recurring events themselves. Optional. The
   * default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All events deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. There are
   * several query parameters that cannot be specified together with nextSyncToken
   * to ensure consistency of the client state.
   *
   * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
   * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
   * expires, the server will respond with a 410 GONE response code and the client
   * should clear its storage and perform a full synchronization without any
   * syncToken. Learn more about incremental synchronization. Optional. The
   * default is to return all entries.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset, for example,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but are ignored. If timeMin is set, timeMax must be greater than timeMin.
   * @opt_param string timeMin Lower bound (exclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset, for example,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but are ignored. If timeMax is set, timeMin must be smaller than timeMax.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @opt_param string updatedMin Lower bound for an event's last modification
   * time (as a RFC3339 timestamp) to filter by. When specified, entries deleted
   * since this time will always be included regardless of showDeleted. Optional.
   * The default is not to filter by last modification time.
   * @return EventsModel
   */
  public function listEvents($calendarId, $optParams = [])
  {
    $params = ['calendarId' => $calendarId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], EventsModel::class);
  }
  /**
   * Moves an event to another calendar, i.e. changes an event's organizer.
   * (events.move)
   *
   * @param string $calendarId Calendar identifier of the source calendar where
   * the event currently is on.
   * @param string $eventId Event identifier.
   * @param string $destination Calendar identifier of the target calendar where
   * the event is to be moved to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the change of the event's organizer. Note
   * that some emails might still be sent even if you set the value to false. The
   * default is false.
   * @opt_param string sendUpdates Guests who should receive notifications about
   * the change of the event's organizer.
   * @return Event
   */
  public function move($calendarId, $eventId, $destination, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'destination' => $destination];
    $params = array_merge($params, $optParams);
    return $this->call('move', [$params], Event::class);
  }
  /**
   * Updates an event. This method supports patch semantics. (events.patch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param int conferenceDataVersion Version number of conference data
   * supported by the API client. Version 0 assumes no conference data support and
   * ignores conference data in the event's body. Version 1 enables support for
   * copying of ConferenceData as well as for creating new conferences using the
   * createRequest field of conferenceData. The default is 0.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the event update (for example,
   * description changes, etc.). Note that some emails might still be sent even if
   * you set the value to false. The default is false.
   * @opt_param string sendUpdates Guests who should receive notifications about
   * the event update (for example, title changes, etc.).
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Event
   */
  public function patch($calendarId, $eventId, Event $postBody, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Event::class);
  }
  /**
   * Creates an event based on a simple text string. (events.quickAdd)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $text The text describing the event to be created.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the creation of the event. Note that some
   * emails might still be sent even if you set the value to false. The default is
   * false.
   * @opt_param string sendUpdates Guests who should receive notifications about
   * the creation of the new event.
   * @return Event
   */
  public function quickAdd($calendarId, $text, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'text' => $text];
    $params = array_merge($params, $optParams);
    return $this->call('quickAdd', [$params], Event::class);
  }
  /**
   * Updates an event. (events.update)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param string $eventId Event identifier.
   * @param Event $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param int conferenceDataVersion Version number of conference data
   * supported by the API client. Version 0 assumes no conference data support and
   * ignores conference data in the event's body. Version 1 enables support for
   * copying of ConferenceData as well as for creating new conferences using the
   * createRequest field of conferenceData. The default is 0.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param bool sendNotifications Deprecated. Please use sendUpdates instead.
   *
   * Whether to send notifications about the event update (for example,
   * description changes, etc.). Note that some emails might still be sent even if
   * you set the value to false. The default is false.
   * @opt_param string sendUpdates Guests who should receive notifications about
   * the event update (for example, title changes, etc.).
   * @opt_param bool supportsAttachments Whether API client performing operation
   * supports event attachments. Optional. The default is False.
   * @return Event
   */
  public function update($calendarId, $eventId, Event $postBody, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Event::class);
  }
  /**
   * Watch for changes to Events resources. (events.watch)
   *
   * @param string $calendarId Calendar identifier. To retrieve calendar IDs call
   * the calendarList.list method. If you want to access the primary calendar of
   * the currently logged in user, use the "primary" keyword.
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool alwaysIncludeEmail Deprecated and ignored. A value will
   * always be returned in the email field for the organizer, creator and
   * attendees, even if no real email address is available (i.e. a generated, non-
   * working value will be provided).
   * @opt_param string iCalUID Specifies event ID in the iCalendar format to be
   * included in the response. Optional.
   * @opt_param int maxAttendees The maximum number of attendees to include in the
   * response. If there are more than the specified number of attendees, only the
   * participant is returned. Optional.
   * @opt_param int maxResults Maximum number of events returned on one result
   * page. The number of events in the resulting page may be less than this value,
   * or none at all, even if there are more events matching the query. Incomplete
   * pages can be detected by a non-empty nextPageToken field in the response. By
   * default the value is 250 events. The page size can never be larger than 2500
   * events. Optional.
   * @opt_param string orderBy The order of the events returned in the result.
   * Optional. The default is an unspecified, stable order.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string privateExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only private properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param string q Free text search terms to find events that match these
   * terms in the following fields: summary, description, location, attendee's
   * displayName, attendee's email. Optional.
   * @opt_param string sharedExtendedProperty Extended properties constraint
   * specified as propertyName=value. Matches only shared properties. This
   * parameter might be repeated multiple times to return events that match all
   * given constraints.
   * @opt_param bool showDeleted Whether to include deleted events (with status
   * equals "cancelled") in the result. Cancelled instances of recurring events
   * (but not the underlying recurring event) will still be included if
   * showDeleted and singleEvents are both False. If showDeleted and singleEvents
   * are both True, only single instances of deleted events (but not the
   * underlying recurring events) are returned. Optional. The default is False.
   * @opt_param bool showHiddenInvitations Whether to include hidden invitations
   * in the result. Optional. The default is False.
   * @opt_param bool singleEvents Whether to expand recurring events into
   * instances and only return single one-off events and instances of recurring
   * events, but not the underlying recurring events themselves. Optional. The
   * default is False.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. All events deleted since the previous list request will always be in
   * the result set and it is not allowed to set showDeleted to False. There are
   * several query parameters that cannot be specified together with nextSyncToken
   * to ensure consistency of the client state.
   *
   * These are:  - iCalUID  - orderBy  - privateExtendedProperty  - q  -
   * sharedExtendedProperty  - timeMin  - timeMax  - updatedMin If the syncToken
   * expires, the server will respond with a 410 GONE response code and the client
   * should clear its storage and perform a full synchronization without any
   * syncToken. Learn more about incremental synchronization. Optional. The
   * default is to return all entries.
   * @opt_param string timeMax Upper bound (exclusive) for an event's start time
   * to filter by. Optional. The default is not to filter by start time. Must be
   * an RFC3339 timestamp with mandatory time zone offset, for example,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but are ignored. If timeMin is set, timeMax must be greater than timeMin.
   * @opt_param string timeMin Lower bound (exclusive) for an event's end time to
   * filter by. Optional. The default is not to filter by end time. Must be an
   * RFC3339 timestamp with mandatory time zone offset, for example,
   * 2011-06-03T10:00:00-07:00, 2011-06-03T10:00:00Z. Milliseconds may be provided
   * but are ignored. If timeMax is set, timeMin must be smaller than timeMax.
   * @opt_param string timeZone Time zone used in the response. Optional. The
   * default is the time zone of the calendar.
   * @opt_param string updatedMin Lower bound for an event's last modification
   * time (as a RFC3339 timestamp) to filter by. When specified, entries deleted
   * since this time will always be included regardless of showDeleted. Optional.
   * The default is not to filter by last modification time.
   * @return Channel
   */
  public function watch($calendarId, Channel $postBody, $optParams = [])
  {
    $params = ['calendarId' => $calendarId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watch', [$params], Channel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Events::class, 'Google_Service_Calendar_Resource_Events');
