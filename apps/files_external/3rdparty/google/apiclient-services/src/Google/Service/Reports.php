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
 * Service definition for Reports (reports_v1).
 *
 * <p>
 * Admin SDK lets administrators of enterprise domains to view and manage
 * resources like user, groups etc. It also provides audit and usage reports of
 * domain.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/admin-sdk/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Reports extends Google_Service
{
  /** View audit reports for your G Suite domain. */
  const ADMIN_REPORTS_AUDIT_READONLY =
      "https://www.googleapis.com/auth/admin.reports.audit.readonly";
  /** View usage reports for your G Suite domain. */
  const ADMIN_REPORTS_USAGE_READONLY =
      "https://www.googleapis.com/auth/admin.reports.usage.readonly";

  public $activities;
  public $channels;
  public $customerUsageReports;
  public $entityUsageReports;
  public $userUsageReport;
  
  /**
   * Constructs the internal representation of the Reports service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch/admin/reports_v1';
    $this->version = 'reports_v1';
    $this->serviceName = 'admin';

    $this->activities = new Google_Service_Reports_Resource_Activities(
        $this,
        $this->serviceName,
        'activities',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'admin/reports/v1/activity/users/{userKey}/applications/{applicationName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'applicationName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'actorIpAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitID' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'eventName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'watch' => array(
              'path' => 'admin/reports/v1/activity/users/{userKey}/applications/{applicationName}/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'applicationName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'eventName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'actorIpAddress' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitID' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Reports_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'stop' => array(
              'path' => 'admin/reports_v1/channels/stop',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->customerUsageReports = new Google_Service_Reports_Resource_CustomerUsageReports(
        $this,
        $this->serviceName,
        'customerUsageReports',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/reports/v1/usage/dates/{date}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'date' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'parameters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->entityUsageReports = new Google_Service_Reports_Resource_EntityUsageReports(
        $this,
        $this->serviceName,
        'entityUsageReports',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/reports/v1/usage/{entityType}/{entityKey}/dates/{date}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'entityType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'entityKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'date' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'parameters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->userUsageReport = new Google_Service_Reports_Resource_UserUsageReport(
        $this,
        $this->serviceName,
        'userUsageReport',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/reports/v1/usage/users/{userKey}/dates/{date}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'date' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'parameters' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitID' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filters' => array(
                  'location' => 'query',
                  'type' => 'string',
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
