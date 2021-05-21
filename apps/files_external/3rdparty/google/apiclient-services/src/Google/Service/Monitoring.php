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
 * Service definition for Monitoring (v3).
 *
 * <p>
 * Manages your Cloud Monitoring data and configurations. Most projects must be
 * associated with a Workspace, with a few exceptions as noted on the individual
 * method pages. The table entries below are presented in alphabetical order,
 * not in order of common use. For explanations of the concepts found in the
 * table entries, read the Cloud Monitoring documentation.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/monitoring/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Monitoring extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and write monitoring data for all of your Google and third-party Cloud and API projects. */
  const MONITORING =
      "https://www.googleapis.com/auth/monitoring";
  /** View monitoring data for all of your Google Cloud and third-party projects. */
  const MONITORING_READ =
      "https://www.googleapis.com/auth/monitoring.read";
  /** Publish metric data to your Google Cloud projects. */
  const MONITORING_WRITE =
      "https://www.googleapis.com/auth/monitoring.write";

  public $folders_timeSeries;
  public $organizations_timeSeries;
  public $projects_alertPolicies;
  public $projects_collectdTimeSeries;
  public $projects_groups;
  public $projects_groups_members;
  public $projects_metricDescriptors;
  public $projects_monitoredResourceDescriptors;
  public $projects_notificationChannelDescriptors;
  public $projects_notificationChannels;
  public $projects_timeSeries;
  public $projects_uptimeCheckConfigs;
  public $services;
  public $services_serviceLevelObjectives;
  public $uptimeCheckIps;

  /**
   * Constructs the internal representation of the Monitoring service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://monitoring.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v3';
    $this->serviceName = 'monitoring';

    $this->folders_timeSeries = new Google_Service_Monitoring_Resource_FoldersTimeSeries(
        $this,
        $this->serviceName,
        'timeSeries',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'aggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'aggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
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
                'secondaryAggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'secondaryAggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->organizations_timeSeries = new Google_Service_Monitoring_Resource_OrganizationsTimeSeries(
        $this,
        $this->serviceName,
        'timeSeries',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'aggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'aggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
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
                'secondaryAggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'secondaryAggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_alertPolicies = new Google_Service_Monitoring_Resource_ProjectsAlertPolicies(
        $this,
        $this->serviceName,
        'alertPolicies',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/alertPolicies',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/alertPolicies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
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
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v3/{+name}',
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
    $this->projects_collectdTimeSeries = new Google_Service_Monitoring_Resource_ProjectsCollectdTimeSeries(
        $this,
        $this->serviceName,
        'collectdTimeSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/collectdTimeSeries',
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
    $this->projects_groups = new Google_Service_Monitoring_Resource_ProjectsGroups(
        $this,
        $this->serviceName,
        'groups',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/groups',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'recursive' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/groups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'ancestorsOfGroup' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'childrenOfGroup' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'descendantsOfGroup' => array(
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
            ),'update' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'validateOnly' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_groups_members = new Google_Service_Monitoring_Resource_ProjectsGroupsMembers(
        $this,
        $this->serviceName,
        'members',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v3/{+name}/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
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
    $this->projects_metricDescriptors = new Google_Service_Monitoring_Resource_ProjectsMetricDescriptors(
        $this,
        $this->serviceName,
        'metricDescriptors',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/metricDescriptors',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/metricDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->projects_monitoredResourceDescriptors = new Google_Service_Monitoring_Resource_ProjectsMonitoredResourceDescriptors(
        $this,
        $this->serviceName,
        'monitoredResourceDescriptors',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/monitoredResourceDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->projects_notificationChannelDescriptors = new Google_Service_Monitoring_Resource_ProjectsNotificationChannelDescriptors(
        $this,
        $this->serviceName,
        'notificationChannelDescriptors',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/notificationChannelDescriptors',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->projects_notificationChannels = new Google_Service_Monitoring_Resource_ProjectsNotificationChannels(
        $this,
        $this->serviceName,
        'notificationChannels',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/notificationChannels',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'force' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getVerificationCode' => array(
              'path' => 'v3/{+name}:getVerificationCode',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/notificationChannels',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
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
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v3/{+name}',
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
            ),'sendVerificationCode' => array(
              'path' => 'v3/{+name}:sendVerificationCode',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'verify' => array(
              'path' => 'v3/{+name}:verify',
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
    $this->projects_timeSeries = new Google_Service_Monitoring_Resource_ProjectsTimeSeries(
        $this,
        $this->serviceName,
        'timeSeries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+name}/timeSeries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'aggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'aggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'aggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'interval.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
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
                'secondaryAggregation.alignmentPeriod' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.crossSeriesReducer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'secondaryAggregation.groupByFields' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'secondaryAggregation.perSeriesAligner' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'query' => array(
              'path' => 'v3/{+name}/timeSeries:query',
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
    $this->projects_uptimeCheckConfigs = new Google_Service_Monitoring_Resource_ProjectsUptimeCheckConfigs(
        $this,
        $this->serviceName,
        'uptimeCheckConfigs',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+parent}/uptimeCheckConfigs',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+parent}/uptimeCheckConfigs',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'patch' => array(
              'path' => 'v3/{+name}',
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
    $this->services = new Google_Service_Monitoring_Resource_Services(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+parent}/services',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'serviceId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+parent}/services',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
            ),'patch' => array(
              'path' => 'v3/{+name}',
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
    $this->services_serviceLevelObjectives = new Google_Service_Monitoring_Resource_ServicesServiceLevelObjectives(
        $this,
        $this->serviceName,
        'serviceLevelObjectives',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v3/{+parent}/serviceLevelObjectives',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'serviceLevelObjectiveId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'delete' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v3/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v3/{+parent}/serviceLevelObjectives',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'v3/{+name}',
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
    $this->uptimeCheckIps = new Google_Service_Monitoring_Resource_UptimeCheckIps(
        $this,
        $this->serviceName,
        'uptimeCheckIps',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v3/uptimeCheckIps',
              'httpMethod' => 'GET',
              'parameters' => array(
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
