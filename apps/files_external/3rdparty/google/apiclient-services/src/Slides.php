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
 * Service definition for Slides (v1).
 *
 * <p>
 * Reads and writes Google Slides presentations.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/slides/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Slides extends \Google\Service
{
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** See, edit, create, and delete only the specific Google Drive files you use with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** See, edit, create, and delete all your Google Slides presentations. */
  const PRESENTATIONS =
      "https://www.googleapis.com/auth/presentations";
  /** See all your Google Slides presentations. */
  const PRESENTATIONS_READONLY =
      "https://www.googleapis.com/auth/presentations.readonly";
  /** See, edit, create, and delete all your Google Sheets spreadsheets. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** See all your Google Sheets spreadsheets. */
  const SPREADSHEETS_READONLY =
      "https://www.googleapis.com/auth/spreadsheets.readonly";

  public $presentations;
  public $presentations_pages;

  /**
   * Constructs the internal representation of the Slides service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://slides.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'slides';

    $this->presentations = new Slides\Resource\Presentations(
        $this,
        $this->serviceName,
        'presentations',
        [
          'methods' => [
            'batchUpdate' => [
              'path' => 'v1/presentations/{presentationId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'presentationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/presentations',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/presentations/{+presentationId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'presentationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->presentations_pages = new Slides\Resource\PresentationsPages(
        $this,
        $this->serviceName,
        'pages',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/presentations/{presentationId}/pages/{pageObjectId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'presentationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageObjectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getThumbnail' => [
              'path' => 'v1/presentations/{presentationId}/pages/{pageObjectId}/thumbnail',
              'httpMethod' => 'GET',
              'parameters' => [
                'presentationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageObjectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'thumbnailProperties.mimeType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'thumbnailProperties.thumbnailSize' => [
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
class_alias(Slides::class, 'Google_Service_Slides');
