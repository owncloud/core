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
 * Service definition for Fitness (v1).
 *
 * <p>
 * The Fitness API for managing users' fitness tracking data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/fit/rest/v1/get-started" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Fitness extends \Google\Service
{
  /** Use Google Fit to see and store your physical activity data. */
  const FITNESS_ACTIVITY_READ =
      "https://www.googleapis.com/auth/fitness.activity.read";
  /** Add to your Google Fit physical activity data. */
  const FITNESS_ACTIVITY_WRITE =
      "https://www.googleapis.com/auth/fitness.activity.write";
  /** See info about your blood glucose in Google Fit. I consent to Google sharing my blood glucose information with this app.. */
  const FITNESS_BLOOD_GLUCOSE_READ =
      "https://www.googleapis.com/auth/fitness.blood_glucose.read";
  /** Add info about your blood glucose to Google Fit. I consent to Google using my blood glucose information with this app.. */
  const FITNESS_BLOOD_GLUCOSE_WRITE =
      "https://www.googleapis.com/auth/fitness.blood_glucose.write";
  /** See info about your blood pressure in Google Fit. I consent to Google sharing my blood pressure information with this app.. */
  const FITNESS_BLOOD_PRESSURE_READ =
      "https://www.googleapis.com/auth/fitness.blood_pressure.read";
  /** Add info about your blood pressure in Google Fit. I consent to Google using my blood pressure information with this app.. */
  const FITNESS_BLOOD_PRESSURE_WRITE =
      "https://www.googleapis.com/auth/fitness.blood_pressure.write";
  /** See info about your body measurements in Google Fit. */
  const FITNESS_BODY_READ =
      "https://www.googleapis.com/auth/fitness.body.read";
  /** Add info about your body measurements to Google Fit. */
  const FITNESS_BODY_WRITE =
      "https://www.googleapis.com/auth/fitness.body.write";
  /** See info about your body temperature in Google Fit. I consent to Google sharing my body temperature information with this app.. */
  const FITNESS_BODY_TEMPERATURE_READ =
      "https://www.googleapis.com/auth/fitness.body_temperature.read";
  /** Add to info about your body temperature in Google Fit. I consent to Google using my body temperature information with this app.. */
  const FITNESS_BODY_TEMPERATURE_WRITE =
      "https://www.googleapis.com/auth/fitness.body_temperature.write";
  /** See your heart rate data in Google Fit. I consent to Google sharing my heart rate information with this app.. */
  const FITNESS_HEART_RATE_READ =
      "https://www.googleapis.com/auth/fitness.heart_rate.read";
  /** Add to your heart rate data in Google Fit. I consent to Google using my heart rate information with this app.. */
  const FITNESS_HEART_RATE_WRITE =
      "https://www.googleapis.com/auth/fitness.heart_rate.write";
  /** See your Google Fit speed and distance data. */
  const FITNESS_LOCATION_READ =
      "https://www.googleapis.com/auth/fitness.location.read";
  /** Add to your Google Fit location data. */
  const FITNESS_LOCATION_WRITE =
      "https://www.googleapis.com/auth/fitness.location.write";
  /** See info about your nutrition in Google Fit. */
  const FITNESS_NUTRITION_READ =
      "https://www.googleapis.com/auth/fitness.nutrition.read";
  /** Add to info about your nutrition in Google Fit. */
  const FITNESS_NUTRITION_WRITE =
      "https://www.googleapis.com/auth/fitness.nutrition.write";
  /** See info about your oxygen saturation in Google Fit. I consent to Google sharing my oxygen saturation information with this app.. */
  const FITNESS_OXYGEN_SATURATION_READ =
      "https://www.googleapis.com/auth/fitness.oxygen_saturation.read";
  /** Add info about your oxygen saturation in Google Fit. I consent to Google using my oxygen saturation information with this app.. */
  const FITNESS_OXYGEN_SATURATION_WRITE =
      "https://www.googleapis.com/auth/fitness.oxygen_saturation.write";
  /** See info about your reproductive health in Google Fit. I consent to Google sharing my reproductive health information with this app.. */
  const FITNESS_REPRODUCTIVE_HEALTH_READ =
      "https://www.googleapis.com/auth/fitness.reproductive_health.read";
  /** Add info about your reproductive health in Google Fit. I consent to Google using my reproductive health information with this app.. */
  const FITNESS_REPRODUCTIVE_HEALTH_WRITE =
      "https://www.googleapis.com/auth/fitness.reproductive_health.write";
  /** See your sleep data in Google Fit. I consent to Google sharing my sleep information with this app.. */
  const FITNESS_SLEEP_READ =
      "https://www.googleapis.com/auth/fitness.sleep.read";
  /** Add to your sleep data in Google Fit. I consent to Google using my sleep information with this app.. */
  const FITNESS_SLEEP_WRITE =
      "https://www.googleapis.com/auth/fitness.sleep.write";

  public $users_dataSources;
  public $users_dataSources_dataPointChanges;
  public $users_dataSources_datasets;
  public $users_dataset;
  public $users_sessions;

  /**
   * Constructs the internal representation of the Fitness service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://fitness.googleapis.com/';
    $this->servicePath = 'fitness/v1/users/';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'fitness';

    $this->users_dataSources = new Fitness\Resource\UsersDataSources(
        $this,
        $this->serviceName,
        'dataSources',
        [
          'methods' => [
            'create' => [
              'path' => '{userId}/dataSources',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{userId}/dataSources',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataTypeName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'update' => [
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_dataSources_dataPointChanges = new Fitness\Resource\UsersDataSourcesDataPointChanges(
        $this,
        $this->serviceName,
        'dataPointChanges',
        [
          'methods' => [
            'list' => [
              'path' => '{userId}/dataSources/{dataSourceId}/dataPointChanges',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'limit' => [
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
    $this->users_dataSources_datasets = new Fitness\Resource\UsersDataSourcesDatasets(
        $this,
        $this->serviceName,
        'datasets',
        [
          'methods' => [
            'delete' => [
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datasetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datasetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datasetId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_dataset = new Fitness\Resource\UsersDataset(
        $this,
        $this->serviceName,
        'dataset',
        [
          'methods' => [
            'aggregate' => [
              'path' => '{userId}/dataset:aggregate',
              'httpMethod' => 'POST',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_sessions = new Fitness\Resource\UsersSessions(
        $this,
        $this->serviceName,
        'sessions',
        [
          'methods' => [
            'delete' => [
              'path' => '{userId}/sessions/{sessionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sessionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{userId}/sessions',
              'httpMethod' => 'GET',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'activityType' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'repeated' => true,
                ],
                'endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => '{userId}/sessions/{sessionId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sessionId' => [
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
class_alias(Fitness::class, 'Google_Service_Fitness');
