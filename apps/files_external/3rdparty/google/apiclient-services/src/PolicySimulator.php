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
 * Service definition for PolicySimulator (v1).
 *
 * <p>
 * Policy Simulator is a collection of endpoints for creating, running, and
 * viewing a Replay. A `Replay` is a type of simulation that lets you see how
 * your members' access to resources might change if you changed your IAM
 * policy. During a `Replay`, Policy Simulator re-evaluates, or replays, past
 * access attempts under both the current policy and your proposed policy, and
 * compares those results to determine how your members' access might change
 * under the proposed policy.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/iam/docs/simulating-access" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PolicySimulator extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $folders_locations_replays;
  public $folders_locations_replays_results;
  public $operations;
  public $organizations_locations_replays;
  public $organizations_locations_replays_results;
  public $projects_locations_replays;
  public $projects_locations_replays_results;

  /**
   * Constructs the internal representation of the PolicySimulator service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://policysimulator.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'policysimulator';

    $this->folders_locations_replays = new PolicySimulator\Resource\FoldersLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
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
    $this->folders_locations_replays_results = new PolicySimulator\Resource\FoldersLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/results',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->operations = new PolicySimulator\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
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
            ],'list' => [
              'path' => 'v1/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
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
    $this->organizations_locations_replays = new PolicySimulator\Resource\OrganizationsLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
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
    $this->organizations_locations_replays_results = new PolicySimulator\Resource\OrganizationsLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/results',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
    $this->projects_locations_replays = new PolicySimulator\Resource\ProjectsLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
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
    $this->projects_locations_replays_results = new PolicySimulator\Resource\ProjectsLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/results',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PolicySimulator::class, 'Google_Service_PolicySimulator');
