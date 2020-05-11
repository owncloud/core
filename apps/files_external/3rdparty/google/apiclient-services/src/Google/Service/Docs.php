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
class Google_Service_Docs extends Google_Service
{
  /** View and manage your Google Docs documents. */
  const DOCUMENTS =
      "https://www.googleapis.com/auth/documents";
  /** View your Google Docs documents. */
  const DOCUMENTS_READONLY =
      "https://www.googleapis.com/auth/documents.readonly";
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage Google Drive files and folders that you have opened or created with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";

  public $documents;
  
  /**
   * Constructs the internal representation of the Docs service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://docs.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'docs';

    $this->documents = new Google_Service_Docs_Resource_Documents(
        $this,
        $this->serviceName,
        'documents',
        array(
          'methods' => array(
            'batchUpdate' => array(
              'path' => 'v1/documents/{documentId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'documentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/documents',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v1/documents/{documentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'documentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'suggestionsViewMode' => array(
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
