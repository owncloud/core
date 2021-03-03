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
 * Service definition for Script (v1).
 *
 * <p>
 * Manages and executes Google Apps Script projects.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/apps-script/api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Script extends Google_Service
{
  /** Read, compose, send, and permanently delete all your email from Gmail. */
  const MAIL_GOOGLE_COM =
      "https://mail.google.com/";
  /** See, edit, share, and permanently delete all the calendars you can access using Google Calendar. */
  const WWW_GOOGLE_COM_CALENDAR_FEEDS =
      "https://www.google.com/calendar/feeds";
  /** See, edit, download, and permanently delete your contacts. */
  const WWW_GOOGLE_COM_M8_FEEDS =
      "https://www.google.com/m8/feeds";
  /** View and manage the provisioning of groups on your domain. */
  const ADMIN_DIRECTORY_GROUP =
      "https://www.googleapis.com/auth/admin.directory.group";
  /** View and manage the provisioning of users on your domain. */
  const ADMIN_DIRECTORY_USER =
      "https://www.googleapis.com/auth/admin.directory.user";
  /** See, create, and edit all Google Docs documents you have access to. */
  const DOCUMENTS =
      "https://www.googleapis.com/auth/documents";
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** View and manage your forms in Google Drive. */
  const FORMS =
      "https://www.googleapis.com/auth/forms";
  /** View and manage forms that this application has been installed in. */
  const FORMS_CURRENTONLY =
      "https://www.googleapis.com/auth/forms.currentonly";
  /** View and manage your Google Groups. */
  const GROUPS =
      "https://www.googleapis.com/auth/groups";
  /** Create and update Google Apps Script deployments. */
  const SCRIPT_DEPLOYMENTS =
      "https://www.googleapis.com/auth/script.deployments";
  /** View Google Apps Script deployments. */
  const SCRIPT_DEPLOYMENTS_READONLY =
      "https://www.googleapis.com/auth/script.deployments.readonly";
  /** View Google Apps Script project's metrics. */
  const SCRIPT_METRICS =
      "https://www.googleapis.com/auth/script.metrics";
  /** View Google Apps Script processes. */
  const SCRIPT_PROCESSES =
      "https://www.googleapis.com/auth/script.processes";
  /** Create and update Google Apps Script projects. */
  const SCRIPT_PROJECTS =
      "https://www.googleapis.com/auth/script.projects";
  /** View Google Apps Script projects. */
  const SCRIPT_PROJECTS_READONLY =
      "https://www.googleapis.com/auth/script.projects.readonly";
  /** See, edit, create, and delete your spreadsheets in Google Drive. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** View your email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";

  public $processes;
  public $projects;
  public $projects_deployments;
  public $projects_versions;
  public $scripts;

  /**
   * Constructs the internal representation of the Script service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://script.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'script';

    $this->processes = new Google_Service_Script_Resource_Processes(
        $this,
        $this->serviceName,
        'processes',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/processes',
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
                'userProcessFilter.deploymentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.functionName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.projectName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.scriptId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userProcessFilter.statuses' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'userProcessFilter.types' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'userProcessFilter.userAccessLevels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'listScriptProcesses' => array(
              'path' => 'v1/processes:listScriptProcesses',
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
                'scriptId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scriptProcessFilter.deploymentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scriptProcessFilter.endTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scriptProcessFilter.functionName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scriptProcessFilter.startTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'scriptProcessFilter.statuses' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'scriptProcessFilter.types' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'scriptProcessFilter.userAccessLevels' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new Google_Service_Script_Resource_Projects(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/projects',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => 'v1/projects/{scriptId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getContent' => array(
              'path' => 'v1/projects/{scriptId}/content',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionNumber' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'getMetrics' => array(
              'path' => 'v1/projects/{scriptId}/metrics',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'metricsFilter.deploymentId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'metricsGranularity' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateContent' => array(
              'path' => 'v1/projects/{scriptId}/content',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_deployments = new Google_Service_Script_Resource_ProjectsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/projects/{scriptId}/deployments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deploymentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deploymentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{scriptId}/deployments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
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
            ),'update' => array(
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deploymentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_versions = new Google_Service_Script_Resource_ProjectsVersions(
        $this,
        $this->serviceName,
        'versions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/projects/{scriptId}/versions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/projects/{scriptId}/versions/{versionNumber}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'versionNumber' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/projects/{scriptId}/versions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'scriptId' => array(
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
    $this->scripts = new Google_Service_Script_Resource_Scripts(
        $this,
        $this->serviceName,
        'scripts',
        array(
          'methods' => array(
            'run' => array(
              'path' => 'v1/scripts/{scriptId}:run',
              'httpMethod' => 'POST',
              'parameters' => array(
                'scriptId' => array(
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
