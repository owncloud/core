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
class Google_Service_PolicySimulator extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://policysimulator.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'policysimulator';

    $this->folders_locations_replays = new Google_Service_PolicySimulator_Resource_FoldersLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
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
    $this->folders_locations_replays_results = new Google_Service_PolicySimulator_Resource_FoldersLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/results',
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
            ),
          )
        )
    );
    $this->operations = new Google_Service_PolicySimulator_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'name' => array(
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
    $this->organizations_locations_replays = new Google_Service_PolicySimulator_Resource_OrganizationsLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
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
    $this->organizations_locations_replays_results = new Google_Service_PolicySimulator_Resource_OrganizationsLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/results',
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
            ),
          )
        )
    );
    $this->projects_locations_replays = new Google_Service_PolicySimulator_Resource_ProjectsLocationsReplays(
        $this,
        $this->serviceName,
        'replays',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/{+parent}/replays',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
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
    $this->projects_locations_replays_results = new Google_Service_PolicySimulator_Resource_ProjectsLocationsReplaysResults(
        $this,
        $this->serviceName,
        'results',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/results',
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
            ),
          )
        )
    );
  }
}
