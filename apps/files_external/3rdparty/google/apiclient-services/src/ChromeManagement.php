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
 * Service definition for ChromeManagement (v1).
 *
 * <p>
 * The Chrome Management API is a suite of services that allows Chrome
 * administrators to view, manage and gain insights on their Chrome OS and
 * Chrome Browser devices.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/chrome/management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ChromeManagement extends \Google\Service
{
  /** See detailed information about apps installed on Chrome browsers and devices managed by your organization. */
  const CHROME_MANAGEMENT_APPDETAILS_READONLY =
      "https://www.googleapis.com/auth/chrome.management.appdetails.readonly";
  /** See reports about devices and Chrome browsers managed within your organization. */
  const CHROME_MANAGEMENT_REPORTS_READONLY =
      "https://www.googleapis.com/auth/chrome.management.reports.readonly";
  /** See basic device and telemetry information collected from Chrome OS devices or users managed within your organization. */
  const CHROME_MANAGEMENT_TELEMETRY_READONLY =
      "https://www.googleapis.com/auth/chrome.management.telemetry.readonly";

  public $customers_apps;
  public $customers_apps_android;
  public $customers_apps_chrome;
  public $customers_apps_web;
  public $customers_reports;
  public $customers_telemetry_devices;

  /**
   * Constructs the internal representation of the ChromeManagement service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://chromemanagement.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromemanagement';

    $this->customers_apps = new ChromeManagement\Resource\CustomersApps(
        $this,
        $this->serviceName,
        'apps',
        [
          'methods' => [
            'countChromeAppRequests' => [
              'path' => 'v1/{+customer}/apps:countChromeAppRequests',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
    $this->customers_apps_android = new ChromeManagement\Resource\CustomersAppsAndroid(
        $this,
        $this->serviceName,
        'android',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_apps_chrome = new ChromeManagement\Resource\CustomersAppsChrome(
        $this,
        $this->serviceName,
        'chrome',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_apps_web = new ChromeManagement\Resource\CustomersAppsWeb(
        $this,
        $this->serviceName,
        'web',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_reports = new ChromeManagement\Resource\CustomersReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'countChromeVersions' => [
              'path' => 'v1/{+customer}/reports:countChromeVersions',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
            ],'countInstalledApps' => [
              'path' => 'v1/{+customer}/reports:countInstalledApps',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
            ],'findInstalledAppDevices' => [
              'path' => 'v1/{+customer}/reports:findInstalledAppDevices',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'appId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'appType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
    $this->customers_telemetry_devices = new ChromeManagement\Resource\CustomersTelemetryDevices(
        $this,
        $this->serviceName,
        'devices',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/telemetry/devices',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeManagement::class, 'Google_Service_ChromeManagement');
