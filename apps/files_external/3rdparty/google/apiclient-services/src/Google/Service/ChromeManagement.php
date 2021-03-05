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
 * Service definition for ChromeManagement (v1).
 *
 * <p>
 * The Chrome Management API is a suite of services that allows Chrome
 * administrators to view, manage and gain insights on their Chrome OS The
 * Chrome Management API is a suite of services that allows GSuite domain
 * administrators to view, manage and gain insights on their Chrome OS and
 * Chrome Browser devices and users.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/chrome/management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ChromeManagement extends Google_Service
{
  /** See reports about devices and Chrome browsers managed within your organization. */
  const CHROME_MANAGEMENT_REPORTS_READONLY =
      "https://www.googleapis.com/auth/chrome.management.reports.readonly";

  public $customers_reports;

  /**
   * Constructs the internal representation of the ChromeManagement service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://chromemanagement.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromemanagement';

    $this->customers_reports = new Google_Service_ChromeManagement_Resource_CustomersReports(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'countChromeVersions' => array(
              'path' => 'v1/{+customer}/reports:countChromeVersions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'countInstalledApps' => array(
              'path' => 'v1/{+customer}/reports:countInstalledApps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'findInstalledAppDevices' => array(
              'path' => 'v1/{+customer}/reports:findInstalledAppDevices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'appId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'appType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
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
  }
}
