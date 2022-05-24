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
 * Service definition for Docs (v1).
 *
 * <p>
 * Reads and writes Google Docs documents.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Docs extends \Google\Service
{
  /** See, edit, create, and delete all your Google Docs documents. */
  const DOCUMENTS =
      "https://www.googleapis.com/auth/documents";
  /** See all your Google Docs documents. */
  const DOCUMENTS_READONLY =
      "https://www.googleapis.com/auth/documents.readonly";
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** See, edit, create, and delete only the specific Google Drive files you use with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";

  public $documents;

  /**
   * Constructs the internal representation of the Docs service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://docs.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'docs';

    $this->documents = new Docs\Resource\Documents(
        $this,
        $this->serviceName,
        'documents',
        [
          'methods' => [
            'batchUpdate' => [
              'path' => 'v1/documents/{documentId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'documentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/documents',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/documents/{documentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'documentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'suggestionsViewMode' => [
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
class_alias(Docs::class, 'Google_Service_Docs');
