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
 * Service definition for Tasks (v1).
 *
 * <p>
 * The Google Tasks API lets you manage your tasks and task lists.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/tasks/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Tasks extends \Google\Service
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
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://tasks.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'tasks';

    $this->tasklists = new Tasks\Resource\Tasklists(
        $this,
        $this->serviceName,
        'tasklists',
        [
          'methods' => [
            'delete' => [
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'GET',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'tasks/v1/users/@me/lists',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'tasks/v1/users/@me/lists',
              'httpMethod' => 'GET',
              'parameters' => [
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'tasks/v1/users/@me/lists/{tasklist}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->tasks = new Tasks\Resource\Tasks(
        $this,
        $this->serviceName,
        'tasks',
        [
          'methods' => [
            'clear' => [
              'path' => 'tasks/v1/lists/{tasklist}/clear',
              'httpMethod' => 'POST',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'task' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'GET',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'task' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks',
              'httpMethod' => 'POST',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'previous' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks',
              'httpMethod' => 'GET',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'completedMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'completedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dueMax' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'dueMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showCompleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'showHidden' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'updatedMin' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'move' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}/move',
              'httpMethod' => 'POST',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'task' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'previous' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'task' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'tasks/v1/lists/{tasklist}/tasks/{task}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'tasklist' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'task' => [
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
class_alias(Tasks::class, 'Google_Service_Tasks');
