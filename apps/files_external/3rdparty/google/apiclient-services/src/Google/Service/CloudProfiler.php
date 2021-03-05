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
 * Service definition for CloudProfiler (v2).
 *
 * <p>
 * Manages continuous profiling information.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/profiler/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudProfiler extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and write monitoring data for all of your Google and third-party Cloud and API projects. */
  const MONITORING =
      "https://www.googleapis.com/auth/monitoring";
  /** Publish metric data to your Google Cloud projects. */
  const MONITORING_WRITE =
      "https://www.googleapis.com/auth/monitoring.write";

  public $projects_profiles;

  /**
   * Constructs the internal representation of the CloudProfiler service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://cloudprofiler.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'cloudprofiler';

    $this->projects_profiles = new Google_Service_CloudProfiler_Resource_ProjectsProfiles(
        $this,
        $this->serviceName,
        'profiles',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v2/{+parent}/profiles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'createOffline' => array(
              'path' => 'v2/{+parent}/profiles:createOffline',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v2/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
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
