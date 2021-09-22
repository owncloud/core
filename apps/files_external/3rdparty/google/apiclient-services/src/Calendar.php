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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for Calendar (v3).
 *
 * <p>
 * Manipulates events and other calendar data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/calendar/firstapp" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Calendar extends \Google\Service
{
  /** See, edit, share, and permanently delete all the calendars you can access using Google Calendar. */
  const CALENDAR =
      "https://www.googleapis.com/auth/calendar";
  /** View and edit events on all your calendars. */
  const CALENDAR_EVENTS =
      "https://www.googleapis.com/auth/calendar.events";
  /** View events on all your calendars. */
  const CALENDAR_EVENTS_READONLY =
      "https://www.googleapis.com/auth/calendar.events.readonly";
  /** See and download any calendar you can access using your Google Calendar. */
  const CALENDAR_READONLY =
      "https://www.googleapis.com/auth/calendar.readonly";
  /** View your Calendar settings. */
  const CALENDAR_SETTINGS_READONLY =
      "https://www.googleapis.com/auth/calendar.settings.readonly";

  public $acl;
  public $calendarList;
  public $calendars;
  public $channels;
  public $colors;
  public $events;
  public $freebusy;
  public $settings;

  /**
   * Constructs the internal representation of the Calendar service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'calendar/v3/';
    $this->batchPath = 'batch/calendar/v3';
    $this->version = 'v3';
    $this->serviceName = 'calendar';

    $this->acl = new Calendar\Resource\Acl(
        $this,
        $this->serviceName,
        'acl',
        [
          'methods' => [
            'delete' => [
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'calendars/{calendarId}/acl',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'calendars/{calendarId}/acl',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'calendars/{calendarId}/acl/{ruleId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'watch' => [
              'path' => 'calendars/{calendarId}/acl/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->calendarList = new Calendar\Resource\CalendarList(
        $this,
        $this->serviceName,
        'calendarList',
        [
          'methods' => [
            'delete' => [
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'users/me/calendarList',
              'httpMethod' => 'POST',
              'parameters' => [
                'colorRgbFormat' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'users/me/calendarList',
              'httpMethod' => 'GET',
              'parameters' => [
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minAccessRole' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showHidden' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'colorRgbFormat' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'users/me/calendarList/{calendarId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'colorRgbFormat' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'watch' => [
              'path' => 'users/me/calendarList/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'minAccessRole' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showHidden' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->calendars = new Calendar\Resource\Calendars(
        $this,
        $this->serviceName,
        'calendars',
        [
          'methods' => [
            'clear' => [
              'path' => 'calendars/{calendarId}/clear',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'calendars',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'patch' => [
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'calendars/{calendarId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->channels = new Calendar\Resource\Channels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'stop' => [
              'path' => 'channels/stop',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->colors = new Calendar\Resource\Colors(
        $this,
        $this->serviceName,
        'colors',
        [
          'methods' => [
            'get' => [
              'path' => 'colors',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->events = new Calendar\Resource\Events(
        $this,
        $this->serviceName,
        'events',
        [
          'methods' => [
            'delete' => [
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'timeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'import' => [
              'path' => 'calendars/{calendarId}/events/import',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'conferenceDataVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'supportsAttachments' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'insert' => [
              'path' => 'calendars/{calendarId}/events',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'conferenceDataVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAttachments' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'instances' => [
              'path' => 'calendars/{calendarId}/events/{eventId}/instances',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'originalStart' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'timeMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'calendars/{calendarId}/events',
              'httpMethod' => 'GET',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'iCalUID' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'privateExtendedProperty' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sharedExtendedProperty' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showHiddenInvitations' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'singleEvents' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'move' => [
              'path' => 'calendars/{calendarId}/events/{eventId}/move',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destination' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'conferenceDataVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAttachments' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'quickAdd' => [
              'path' => 'calendars/{calendarId}/events/quickAdd',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'text' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'calendars/{calendarId}/events/{eventId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'eventId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'conferenceDataVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'sendNotifications' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendUpdates' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAttachments' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'watch' => [
              'path' => 'calendars/{calendarId}/events/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'calendarId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alwaysIncludeEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'iCalUID' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxAttendees' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'privateExtendedProperty' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sharedExtendedProperty' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showHiddenInvitations' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'singleEvents' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeZone' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->freebusy = new Calendar\Resource\Freebusy(
        $this,
        $this->serviceName,
        'freebusy',
        [
          'methods' => [
            'query' => [
              'path' => 'freeBusy',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->settings = new Calendar\Resource\Settings(
        $this,
        $this->serviceName,
        'settings',
        [
          'methods' => [
            'get' => [
              'path' => 'users/me/settings/{setting}',
              'httpMethod' => 'GET',
              'parameters' => [
                'setting' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'users/me/settings',
              'httpMethod' => 'GET',
              'parameters' => [
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'watch' => [
              'path' => 'users/me/settings/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Calendar::class, 'Google_Service_Calendar');
