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
 * Service definition for Forms (v1).
 *
 * <p>
 * Reads and writes Google Forms and responses.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/forms/api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Forms extends \Google\Service
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
  /** See, edit, create, and delete all your Google Forms forms. */
  const FORMS_BODY =
      "https://www.googleapis.com/auth/forms.body";
  /** See all your Google Forms forms. */
  const FORMS_BODY_READONLY =
      "https://www.googleapis.com/auth/forms.body.readonly";
  /** See all responses to your Google Forms forms. */
  const FORMS_RESPONSES_READONLY =
      "https://www.googleapis.com/auth/forms.responses.readonly";

  public $forms;
  public $forms_responses;
  public $forms_watches;

  /**
   * Constructs the internal representation of the Forms service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://forms.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'forms';

    $this->forms = new Forms\Resource\Forms(
        $this,
        $this->serviceName,
        'forms',
        [
          'methods' => [
            'batchUpdate' => [
              'path' => 'v1/forms/{formId}:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/forms',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/forms/{formId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->forms_responses = new Forms\Resource\FormsResponses(
        $this,
        $this->serviceName,
        'responses',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/forms/{formId}/responses/{responseId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'responseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/forms/{formId}/responses',
              'httpMethod' => 'GET',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
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
    $this->forms_watches = new Forms\Resource\FormsWatches(
        $this,
        $this->serviceName,
        'watches',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/forms/{formId}/watches',
              'httpMethod' => 'POST',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/forms/{formId}/watches/{watchId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'watchId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/forms/{formId}/watches',
              'httpMethod' => 'GET',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'renew' => [
              'path' => 'v1/forms/{formId}/watches/{watchId}:renew',
              'httpMethod' => 'POST',
              'parameters' => [
                'formId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'watchId' => [
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
class_alias(Forms::class, 'Google_Service_Forms');
