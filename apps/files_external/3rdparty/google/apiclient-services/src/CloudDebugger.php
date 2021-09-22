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
 * Service definition for CloudDebugger (v2).
 *
 * <p>
 * Examines the call stack and variables of a running application without
 * stopping or slowing it down.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/debugger" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudDebugger extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Use Stackdriver Debugger. */
  const CLOUD_DEBUGGER =
      "https://www.googleapis.com/auth/cloud_debugger";

  public $controller_debuggees;
  public $controller_debuggees_breakpoints;
  public $debugger_debuggees;
  public $debugger_debuggees_breakpoints;

  /**
   * Constructs the internal representation of the CloudDebugger service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://clouddebugger.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'clouddebugger';

    $this->controller_debuggees = new CloudDebugger\Resource\ControllerDebuggees(
        $this,
        $this->serviceName,
        'debuggees',
        [
          'methods' => [
            'register' => [
              'path' => 'v2/controller/debuggees/register',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->controller_debuggees_breakpoints = new CloudDebugger\Resource\ControllerDebuggeesBreakpoints(
        $this,
        $this->serviceName,
        'breakpoints',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/controller/debuggees/{debuggeeId}/breakpoints',
              'httpMethod' => 'GET',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'agentId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'successOnTimeout' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'waitToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v2/controller/debuggees/{debuggeeId}/breakpoints/{id}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->debugger_debuggees = new CloudDebugger\Resource\DebuggerDebuggees(
        $this,
        $this->serviceName,
        'debuggees',
        [
          'methods' => [
            'list' => [
              'path' => 'v2/debugger/debuggees',
              'httpMethod' => 'GET',
              'parameters' => [
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeInactive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'project' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->debugger_debuggees_breakpoints = new CloudDebugger\Resource\DebuggerDebuggeesBreakpoints(
        $this,
        $this->serviceName,
        'breakpoints',
        [
          'methods' => [
            'delete' => [
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/{breakpointId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'breakpointId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/{breakpointId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'breakpointId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints',
              'httpMethod' => 'GET',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action.value' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientVersion' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeAllUsers' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeInactive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'stripResults' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'waitToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'set' => [
              'path' => 'v2/debugger/debuggees/{debuggeeId}/breakpoints/set',
              'httpMethod' => 'POST',
              'parameters' => [
                'debuggeeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'canaryOption' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'clientVersion' => [
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
class_alias(CloudDebugger::class, 'Google_Service_CloudDebugger');
