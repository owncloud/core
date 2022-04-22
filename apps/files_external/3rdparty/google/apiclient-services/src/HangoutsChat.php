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
 * Service definition for HangoutsChat (v1).
 *
 * <p>
 * Enables apps to fetch information and perform actions in Google Chat.
 * Authentication is a prerequisite for using the Google Chat REST API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/hangouts/chat" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class HangoutsChat extends \Google\Service
{


  public $dms;
  public $dms_conversations;
  public $media;
  public $rooms;
  public $rooms_conversations;
  public $spaces;
  public $spaces_members;
  public $spaces_messages;
  public $spaces_messages_attachments;

  /**
   * Constructs the internal representation of the HangoutsChat service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://chat.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chat';

    $this->dms = new HangoutsChat\Resource\Dms(
        $this,
        $this->serviceName,
        'dms',
        [
          'methods' => [
            'messages' => [
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'webhooks' => [
              'path' => 'v1/{+parent}/webhooks',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->dms_conversations = new HangoutsChat\Resource\DmsConversations(
        $this,
        $this->serviceName,
        'conversations',
        [
          'methods' => [
            'messages' => [
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->media = new HangoutsChat\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'download' => [
              'path' => 'v1/media/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->rooms = new HangoutsChat\Resource\Rooms(
        $this,
        $this->serviceName,
        'rooms',
        [
          'methods' => [
            'messages' => [
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'webhooks' => [
              'path' => 'v1/{+parent}/webhooks',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->rooms_conversations = new HangoutsChat\Resource\RoomsConversations(
        $this,
        $this->serviceName,
        'conversations',
        [
          'methods' => [
            'messages' => [
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->spaces = new HangoutsChat\Resource\Spaces(
        $this,
        $this->serviceName,
        'spaces',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/spaces',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'webhooks' => [
              'path' => 'v1/{+parent}/webhooks',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->spaces_members = new HangoutsChat\Resource\SpacesMembers(
        $this,
        $this->serviceName,
        'members',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/members',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->spaces_messages = new HangoutsChat\Resource\SpacesMessages(
        $this,
        $this->serviceName,
        'messages',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/messages',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'threadKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->spaces_messages_attachments = new HangoutsChat\Resource\SpacesMessagesAttachments(
        $this,
        $this->serviceName,
        'attachments',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HangoutsChat::class, 'Google_Service_HangoutsChat');
