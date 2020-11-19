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
 * Service definition for Document (v1beta3).
 *
 * <p>
 * Service to parse structured information from unstructured or semi-structured
 * documents using state-of-the-art Google AI such as natural language, computer
 * vision, translation, and AutoML.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/document-ai/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Document extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $projects_locations;
  public $projects_locations_operations;
  public $projects_locations_processors;
  public $projects_locations_processors_humanReviewConfig;
  
  /**
   * Constructs the internal representation of the Document service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://documentai.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta3';
    $this->serviceName = 'documentai';

    $this->projects_locations = new Google_Service_Document_Resource_ProjectsLocations(
        $this,
        $this->serviceName,
        'locations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta3/{+name}/locations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_operations = new Google_Service_Document_Resource_ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_processors = new Google_Service_Document_Resource_ProjectsLocationsProcessors(
        $this,
        $this->serviceName,
        'processors',
        array(
          'methods' => array(
            'batchProcess' => array(
              'path' => 'v1beta3/{+name}:batchProcess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'process' => array(
              'path' => 'v1beta3/{+name}:process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_locations_processors_humanReviewConfig = new Google_Service_Document_Resource_ProjectsLocationsProcessorsHumanReviewConfig(
        $this,
        $this->serviceName,
        'humanReviewConfig',
        array(
          'methods' => array(
            'reviewDocument' => array(
              'path' => 'v1beta3/{+humanReviewConfig}:reviewDocument',
              'httpMethod' => 'POST',
              'parameters' => array(
                'humanReviewConfig' => array(
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
