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
 * Service definition for Keep (v1).
 *
 * <p>
 * The Google Keep API is used in an enterprise environment to manage Google
 * Keep content and resolve issues identified by cloud security software.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/keep/api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Keep extends \Google\Service
{
  /** See, edit, create and permanently delete all your Google Keep data. */
  const KEEP =
      "https://www.googleapis.com/auth/keep";
  /** View all your Google Keep data. */
  const KEEP_READONLY =
      "https://www.googleapis.com/auth/keep.readonly";

  public $media;
  public $notes;
  public $notes_permissions;

  /**
   * Constructs the internal representation of the Keep service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://keep.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'keep';

    $this->media = new Keep\Resource\Media(
        $this,
        $this->serviceName,
        'media',
        [
          'methods' => [
            'download' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'mimeType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->notes = new Keep\Resource\Notes(
        $this,
        $this->serviceName,
        'notes',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/notes',
              'httpMethod' => 'POST',
              'parameters' => [],
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
            ],'list' => [
              'path' => 'v1/notes',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->notes_permissions = new Keep\Resource\NotesPermissions(
        $this,
        $this->serviceName,
        'permissions',
        [
          'methods' => [
            'batchCreate' => [
              'path' => 'v1/{+parent}/permissions:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchDelete' => [
              'path' => 'v1/{+parent}/permissions:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
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
class_alias(Keep::class, 'Google_Service_Keep');
