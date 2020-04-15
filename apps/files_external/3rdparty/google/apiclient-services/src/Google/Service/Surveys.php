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
 * Service definition for Surveys (v2).
 *
 * <p>
 * Creates and conducts surveys, lists the surveys that an authenticated user
 * owns, and retrieves survey results and information about specified surveys.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Surveys extends Google_Service
{
  /** View and manage your surveys and results. */
  const SURVEYS =
      "https://www.googleapis.com/auth/surveys";
  /** View your surveys and survey results. */
  const SURVEYS_READONLY =
      "https://www.googleapis.com/auth/surveys.readonly";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $results;
  public $surveys;
  
  /**
   * Constructs the internal representation of the Surveys service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'surveys/v2/';
    $this->batchPath = 'batch/surveys/v2';
    $this->version = 'v2';
    $this->serviceName = 'surveys';

    $this->results = new Google_Service_Surveys_Resource_Results(
        $this,
        $this->serviceName,
        'results',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'surveys/{surveyUrlId}/results',
              'httpMethod' => 'GET',
              'parameters' => array(
                'surveyUrlId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->surveys = new Google_Service_Surveys_Resource_Surveys(
        $this,
        $this->serviceName,
        'surveys',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'surveys/{surveyUrlId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'surveyUrlId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'surveys/{surveyUrlId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'surveyUrlId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'surveys',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'surveys',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'startIndex' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'token' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'start' => array(
              'path' => 'surveys/{resourceId}/start',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'stop' => array(
              'path' => 'surveys/{resourceId}/stop',
              'httpMethod' => 'POST',
              'parameters' => array(
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'surveys/{surveyUrlId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'surveyUrlId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}
