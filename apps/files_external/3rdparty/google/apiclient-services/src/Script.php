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
class Script extends \Google\Service
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
  /** See, edit, create, and delete all your Google Docs documents. */
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
  /** See, edit, create, and delete all your Google Sheets spreadsheets. */
  const SPREADSHEETS =
      "https://www.googleapis.com/auth/spreadsheets";
  /** See your primary Google Account email address. */
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://script.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'script';

    $this->processes = new Script\Resource\Processes(
        $this,
        $this->serviceName,
        'processes',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/processes',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.deploymentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.functionName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.projectName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.scriptId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userProcessFilter.statuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'userProcessFilter.types' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'userProcessFilter.userAccessLevels' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'listScriptProcesses' => [
              'path' => 'v1/processes:listScriptProcesses',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptProcessFilter.deploymentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptProcessFilter.endTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptProcessFilter.functionName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptProcessFilter.startTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'scriptProcessFilter.statuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'scriptProcessFilter.types' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'scriptProcessFilter.userAccessLevels' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects = new Script\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/projects',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/projects/{scriptId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getContent' => [
              'path' => 'v1/projects/{scriptId}/content',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionNumber' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getMetrics' => [
              'path' => 'v1/projects/{scriptId}/metrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'metricsFilter.deploymentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'metricsGranularity' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateContent' => [
              'path' => 'v1/projects/{scriptId}/content',
              'httpMethod' => 'PUT',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_deployments = new Script\Resource\ProjectsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/projects/{scriptId}/deployments',
              'httpMethod' => 'POST',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deploymentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deploymentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/projects/{scriptId}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ],'update' => [
              'path' => 'v1/projects/{scriptId}/deployments/{deploymentId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deploymentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_versions = new Script\Resource\ProjectsVersions(
        $this,
        $this->serviceName,
        'versions',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/projects/{scriptId}/versions',
              'httpMethod' => 'POST',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{scriptId}/versions/{versionNumber}',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'versionNumber' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/projects/{scriptId}/versions',
              'httpMethod' => 'GET',
              'parameters' => [
                'scriptId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
    $this->scripts = new Script\Resource\Scripts(
        $this,
        $this->serviceName,
        'scripts',
        [
          'methods' => [
            'run' => [
              'path' => 'v1/scripts/{scriptId}:run',
              'httpMethod' => 'POST',
              'parameters' => [
                'scriptId' => [
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
class_alias(Script::class, 'Google_Service_Script');
