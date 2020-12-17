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
 * Service definition for CloudTrace (v2).
 *
 * <p>
 * Sends application trace data to Cloud Trace for viewing. Trace data is
 * collected for all App Engine applications by default. Trace data from other
 * applications can be provided using this API. This library is used to interact
 * with the Cloud Trace API directly. If you are looking to instrument your
 * application for Cloud Trace, we recommend using OpenCensus.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/trace" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_CloudTrace extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Write Trace data for a project or application. */
  const TRACE_APPEND =
      "https://www.googleapis.com/auth/trace.append";

  public $projects_traces;
  public $projects_traces_spans;

  /**
   * Constructs the internal representation of the CloudTrace service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://cloudtrace.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'cloudtrace';

    $this->projects_traces = new Google_Service_CloudTrace_Resource_ProjectsTraces(
        $this,
        $this->serviceName,
        'traces',
        array(
          'methods' => array(
            'batchWrite' => array(
              'path' => 'v2/{+name}/traces:batchWrite',
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
    $this->projects_traces_spans = new Google_Service_CloudTrace_Resource_ProjectsTracesSpans(
        $this,
        $this->serviceName,
        'spans',
        array(
          'methods' => array(
            'createSpan' => array(
              'path' => 'v2/{+name}',
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
  }
}
