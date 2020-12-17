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
 * Service definition for ChromeUXReport (v1).
 *
 * <p>
 * The Chrome UX Report API lets you view real user experience data for millions
 * of websites.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/web/tools/chrome-user-experience-report/api/reference" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ChromeUXReport extends Google_Service
{


  public $records;

  /**
   * Constructs the internal representation of the ChromeUXReport service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://chromeuxreport.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromeuxreport';

    $this->records = new Google_Service_ChromeUXReport_Resource_Records(
        $this,
        $this->serviceName,
        'records',
        array(
          'methods' => array(
            'queryRecord' => array(
              'path' => 'v1/records:queryRecord',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
