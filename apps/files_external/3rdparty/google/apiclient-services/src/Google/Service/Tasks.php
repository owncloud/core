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
 * Service definition for Tasks (v1).
 *
 * <p>
 * The Google Tasks API lets you manage your tasks and task lists.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Tasks extends Google_Service
{
  /** Create, edit, organize, and delete all your tasks. */
  const TASKS =
      "https://www.googleapis.com/auth/tasks";
  /** View your tasks. */
  const TASKS_READONLY =
      "https://www.googleapis.com/auth/tasks.readonly";

  public $tasklists;
  public $tasks;
  
  /**
   * Constructs the internal representation of the Tasks service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch/tasks/v1';
    $this->version = 'v1';
    $this->serviceName = 'tasks';

    $this->tasklists = new Google_Service_Tasks_Resource_Tasklists(
        $this,
        $this->serviceName,
        'tasklists',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'tasks/v1/users/@me/lists',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'tasks/v1/users/@me/lists',
              'httpMethod' => 'GET',
              'parameters' => array(
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tasks = new Google_Service_Tasks_Resource_Tasks(
        $this,
        $this->serviceName,
        'tasks',
        array(
          'methods' => array(
            'clear' => array(
              'path' => 'tasks/v1/lists/{tasklist}/clear',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'previous' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parent' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'showCompleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'updatedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'completedMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'dueMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'completedMin' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showHidden' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'dueMax' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'move' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}/move',
              'httpMethod' => 'POST',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'previous' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parent' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'tasklist' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'task' => array(
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
