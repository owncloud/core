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
class Google_Service_Slides extends Google_Service
{
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage Google Drive files and folders that you have opened or created with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** View and manage your Google Slides presentations. */
  const PRESENTATIONS =
      "https://www.googleapis.com/auth/presentations";
  /** View your Google Slides presentations. */
  const PRESENTATIONS_READONLY =
      "https://www.googleapis.com/auth/presentations.readonly";
  /** See, edit, create, and delete your spreadsheets in Google Drive. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** View your Google Spreadsheets. */
  const SPREADSHEETS_READONLY =
      "https://www.googleapis.com/auth/spreadsheets.readonly";

  public $presentations;
  public $presentations_pages;
  
  /**
   * Constructs the internal representation of the Slides service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://slides.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'slides';

    $this->presentations = new Google_Service_Slides_Resource_Presentations(
        $this,
        $this->serviceName,
        'presentations',
        array(
          'methods' => array(
            'batchUpdate' => array(
              'path' => 'v1/presentations/{presentationId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'presentationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/presentations',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v1/presentations/{+presentationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'presentationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->presentations_pages = new Google_Service_Slides_Resource_PresentationsPages(
        $this,
        $this->serviceName,
        'pages',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/presentations/{presentationId}/pages/{pageObjectId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'presentationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageObjectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getThumbnail' => array(
              'path' => 'v1/presentations/{presentationId}/pages/{pageObjectId}/thumbnail',
              'httpMethod' => 'GET',
              'parameters' => array(
                'presentationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageObjectId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'thumbnailProperties.mimeType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'thumbnailProperties.thumbnailSize' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
