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
class Google_Service_Fitness extends Google_Service
{
  /** Use Google Fit to see and store your physical activity data. */
  const FITNESS_ACTIVITY_READ =
      "https://www.googleapis.com/auth/fitness.activity.read";
  /** See and add to your Google Fit physical activity data. */
  const FITNESS_ACTIVITY_WRITE =
      "https://www.googleapis.com/auth/fitness.activity.write";
  /** See info about your blood glucose in Google Fit. I consent to Google sharing my blood glucose information with this app.. */
  const FITNESS_BLOOD_GLUCOSE_READ =
      "https://www.googleapis.com/auth/fitness.blood_glucose.read";
  /** See and add info about your blood glucose to Google Fit. I consent to Google sharing my blood glucose information with this app.. */
  const FITNESS_BLOOD_GLUCOSE_WRITE =
      "https://www.googleapis.com/auth/fitness.blood_glucose.write";
  /** See info about your blood pressure in Google Fit. I consent to Google sharing my blood pressure information with this app.. */
  const FITNESS_BLOOD_PRESSURE_READ =
      "https://www.googleapis.com/auth/fitness.blood_pressure.read";
  /** See and add info about your blood pressure in Google Fit. I consent to Google sharing my blood pressure information with this app.. */
  const FITNESS_BLOOD_PRESSURE_WRITE =
      "https://www.googleapis.com/auth/fitness.blood_pressure.write";
  /** See info about your body measurements and heart rate in Google Fit. */
  const FITNESS_BODY_READ =
      "https://www.googleapis.com/auth/fitness.body.read";
  /** See and add info about your body measurements and heart rate to Google Fit. */
  const FITNESS_BODY_WRITE =
      "https://www.googleapis.com/auth/fitness.body.write";
  /** See info about your body temperature in Google Fit. I consent to Google sharing my body temperature information with this app.. */
  const FITNESS_BODY_TEMPERATURE_READ =
      "https://www.googleapis.com/auth/fitness.body_temperature.read";
  /** See and add to info about your body temperature in Google Fit. I consent to Google sharing my body temperature information with this app.. */
  const FITNESS_BODY_TEMPERATURE_WRITE =
      "https://www.googleapis.com/auth/fitness.body_temperature.write";
  /** See your heart rate data in Google Fit. I consent to Google sharing my heart rate information with this app.. */
  const FITNESS_HEART_RATE_READ =
      "https://www.googleapis.com/auth/fitness.heart_rate.read";
  /** See and add to your heart rate data in Google Fit. I consent to Google sharing my heart rate information with this app.. */
  const FITNESS_HEART_RATE_WRITE =
      "https://www.googleapis.com/auth/fitness.heart_rate.write";
  /** See your Google Fit speed and distance data. */
  const FITNESS_LOCATION_READ =
      "https://www.googleapis.com/auth/fitness.location.read";
  /** See and add to your Google Fit location data. */
  const FITNESS_LOCATION_WRITE =
      "https://www.googleapis.com/auth/fitness.location.write";
  /** See info about your nutrition in Google Fit. */
  const FITNESS_NUTRITION_READ =
      "https://www.googleapis.com/auth/fitness.nutrition.read";
  /** See and add to info about your nutrition in Google Fit. */
  const FITNESS_NUTRITION_WRITE =
      "https://www.googleapis.com/auth/fitness.nutrition.write";
  /** See info about your oxygen saturation in Google Fit. I consent to Google sharing my oxygen saturation information with this app.. */
  const FITNESS_OXYGEN_SATURATION_READ =
      "https://www.googleapis.com/auth/fitness.oxygen_saturation.read";
  /** See and add info about your oxygen saturation in Google Fit. I consent to Google sharing my oxygen saturation information with this app.. */
  const FITNESS_OXYGEN_SATURATION_WRITE =
      "https://www.googleapis.com/auth/fitness.oxygen_saturation.write";
  /** See info about your reproductive health in Google Fit. I consent to Google sharing my reproductive health information with this app.. */
  const FITNESS_REPRODUCTIVE_HEALTH_READ =
      "https://www.googleapis.com/auth/fitness.reproductive_health.read";
  /** See and add info about your reproductive health in Google Fit. I consent to Google sharing my reproductive health information with this app.. */
  const FITNESS_REPRODUCTIVE_HEALTH_WRITE =
      "https://www.googleapis.com/auth/fitness.reproductive_health.write";
  /** See your sleep data in Google Fit. I consent to Google sharing my sleep information with this app.. */
  const FITNESS_SLEEP_READ =
      "https://www.googleapis.com/auth/fitness.sleep.read";
  /** See and add to your sleep data in Google Fit. I consent to Google sharing my sleep information with this app.. */
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://fitness.googleapis.com/';
    $this->servicePath = 'fitness/v1/users/';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'fitness';

    $this->users_dataSources = new Google_Service_Fitness_Resource_UsersDataSources(
        $this,
        $this->serviceName,
        'dataSources',
        array(
          'methods' => array(
            'create' => array(
              'path' => '{userId}/dataSources',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{userId}/dataSources',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataTypeName' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{userId}/dataSources/{dataSourceId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->users_dataSources_dataPointChanges = new Google_Service_Fitness_Resource_UsersDataSourcesDataPointChanges(
        $this,
        $this->serviceName,
        'dataPointChanges',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{userId}/dataSources/{dataSourceId}/dataPointChanges',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_dataSources_datasets = new Google_Service_Fitness_Resource_UsersDataSourcesDatasets(
        $this,
        $this->serviceName,
        'datasets',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentTimeMillis' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedTimeMillis' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => '{userId}/dataSources/{dataSourceId}/datasets/{datasetId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dataSourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datasetId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentTimeMillis' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_dataset = new Google_Service_Fitness_Resource_UsersDataset(
        $this,
        $this->serviceName,
        'dataset',
        array(
          'methods' => array(
            'aggregate' => array(
              'path' => '{userId}/dataset:aggregate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->users_sessions = new Google_Service_Fitness_Resource_UsersSessions(
        $this,
        $this->serviceName,
        'sessions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{userId}/sessions/{sessionId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sessionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentTimeMillis' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => '{userId}/sessions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'activityType' => array(
                  'location' => 'query',
                  'type' => 'integer',
                  'repeated' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'update' => array(
              'path' => '{userId}/sessions/{sessionId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sessionId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'currentTimeMillis' => array(
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
