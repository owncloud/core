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
 * Service definition for Analytics (v3).
 *
 * <p>
 * Views and manages your Google Analytics data.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/analytics/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Analytics extends \Google\Service
{
  /** View and manage your Google Analytics data. */
  const ANALYTICS =
      "https://www.googleapis.com/auth/analytics";
  /** Edit Google Analytics management entities. */
  const ANALYTICS_EDIT =
      "https://www.googleapis.com/auth/analytics.edit";
  /** Manage Google Analytics Account users by email address. */
  const ANALYTICS_MANAGE_USERS =
      "https://www.googleapis.com/auth/analytics.manage.users";
  /** View Google Analytics user permissions. */
  const ANALYTICS_MANAGE_USERS_READONLY =
      "https://www.googleapis.com/auth/analytics.manage.users.readonly";
  /** Create a new Google Analytics account along with its default property and view. */
  const ANALYTICS_PROVISION =
      "https://www.googleapis.com/auth/analytics.provision";
  /** View your Google Analytics data. */
  const ANALYTICS_READONLY =
      "https://www.googleapis.com/auth/analytics.readonly";
  /** Manage Google Analytics user deletion requests. */
  const ANALYTICS_USER_DELETION =
      "https://www.googleapis.com/auth/analytics.user.deletion";

  public $data_ga;
  public $data_mcf;
  public $data_realtime;
  public $management_accountSummaries;
  public $management_accountUserLinks;
  public $management_accounts;
  public $management_clientId;
  public $management_customDataSources;
  public $management_customDimensions;
  public $management_customMetrics;
  public $management_experiments;
  public $management_filters;
  public $management_goals;
  public $management_profileFilterLinks;
  public $management_profileUserLinks;
  public $management_profiles;
  public $management_remarketingAudience;
  public $management_segments;
  public $management_unsampledReports;
  public $management_uploads;
  public $management_webPropertyAdWordsLinks;
  public $management_webproperties;
  public $management_webpropertyUserLinks;
  public $metadata_columns;
  public $provisioning;
  public $userDeletion_userDeletionRequest;

  /**
   * Constructs the internal representation of the Analytics service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://analytics.googleapis.com/';
    $this->servicePath = 'analytics/v3/';
    $this->batchPath = 'batch/analytics/v3';
    $this->version = 'v3';
    $this->serviceName = 'analytics';

    $this->data_ga = new Analytics\Resource\DataGa(
        $this,
        $this->serviceName,
        'ga',
        [
          'methods' => [
            'get' => [
              'path' => 'data/ga',
              'httpMethod' => 'GET',
              'parameters' => [
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'start-date' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'end-date' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'metrics' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'dimensions' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filters' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'include-empty-rows' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'output' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'samplingLevel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'segment' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->data_mcf = new Analytics\Resource\DataMcf(
        $this,
        $this->serviceName,
        'mcf',
        [
          'methods' => [
            'get' => [
              'path' => 'data/mcf',
              'httpMethod' => 'GET',
              'parameters' => [
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'start-date' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'end-date' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'metrics' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'dimensions' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filters' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'samplingLevel' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->data_realtime = new Analytics\Resource\DataRealtime(
        $this,
        $this->serviceName,
        'realtime',
        [
          'methods' => [
            'get' => [
              'path' => 'data/realtime',
              'httpMethod' => 'GET',
              'parameters' => [
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'metrics' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'dimensions' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filters' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_accountSummaries = new Analytics\Resource\ManagementAccountSummaries(
        $this,
        $this->serviceName,
        'accountSummaries',
        [
          'methods' => [
            'list' => [
              'path' => 'management/accountSummaries',
              'httpMethod' => 'GET',
              'parameters' => [
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_accountUserLinks = new Analytics\Resource\ManagementAccountUserLinks(
        $this,
        $this->serviceName,
        'accountUserLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/entityUserLinks/{linkId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/entityUserLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/entityUserLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/entityUserLinks/{linkId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_accounts = new Analytics\Resource\ManagementAccounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'list' => [
              'path' => 'management/accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_clientId = new Analytics\Resource\ManagementClientId(
        $this,
        $this->serviceName,
        'clientId',
        [
          'methods' => [
            'hashClientId' => [
              'path' => 'management/clientId:hashClientId',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->management_customDataSources = new Analytics\Resource\ManagementCustomDataSources(
        $this,
        $this->serviceName,
        'customDataSources',
        [
          'methods' => [
            'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_customDimensions = new Analytics\Resource\ManagementCustomDimensions(
        $this,
        $this->serviceName,
        'customDimensions',
        [
          'methods' => [
            'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDimensionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDimensionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ignoreCustomDataSourceLinks' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDimensions/{customDimensionId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDimensionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ignoreCustomDataSourceLinks' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_customMetrics = new Analytics\Resource\ManagementCustomMetrics(
        $this,
        $this->serviceName,
        'customMetrics',
        [
          'methods' => [
            'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customMetricId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customMetricId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ignoreCustomDataSourceLinks' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customMetrics/{customMetricId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customMetricId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ignoreCustomDataSourceLinks' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_experiments = new Analytics\Resource\ManagementExperiments(
        $this,
        $this->serviceName,
        'experiments',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'experimentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'experimentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'experimentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/experiments/{experimentId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'experimentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_filters = new Analytics\Resource\ManagementFilters(
        $this,
        $this->serviceName,
        'filters',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/filters/{filterId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/filters/{filterId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/filters',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/filters',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/filters/{filterId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/filters/{filterId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_goals = new Analytics\Resource\ManagementGoals(
        $this,
        $this->serviceName,
        'goals',
        [
          'methods' => [
            'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'goalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'goalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/goals/{goalId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'goalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_profileFilterLinks = new Analytics\Resource\ManagementProfileFilterLinks(
        $this,
        $this->serviceName,
        'profileFilterLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/profileFilterLinks/{linkId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_profileUserLinks = new Analytics\Resource\ManagementProfileUserLinks(
        $this,
        $this->serviceName,
        'profileUserLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks/{linkId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/entityUserLinks/{linkId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_profiles = new Analytics\Resource\ManagementProfiles(
        $this,
        $this->serviceName,
        'profiles',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_remarketingAudience = new Analytics\Resource\ManagementRemarketingAudience(
        $this,
        $this->serviceName,
        'remarketingAudience',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences/{remarketingAudienceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'remarketingAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences/{remarketingAudienceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'remarketingAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences/{remarketingAudienceId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'remarketingAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/remarketingAudiences/{remarketingAudienceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'remarketingAudienceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_segments = new Analytics\Resource\ManagementSegments(
        $this,
        $this->serviceName,
        'segments',
        [
          'methods' => [
            'list' => [
              'path' => 'management/segments',
              'httpMethod' => 'GET',
              'parameters' => [
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_unsampledReports = new Analytics\Resource\ManagementUnsampledReports(
        $this,
        $this->serviceName,
        'unsampledReports',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports/{unsampledReportId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'unsampledReportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports/{unsampledReportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'unsampledReportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/profiles/{profileId}/unsampledReports',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'profileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_uploads = new Analytics\Resource\ManagementUploads(
        $this,
        $this->serviceName,
        'uploads',
        [
          'methods' => [
            'deleteUploadData' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/deleteUploadData',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads/{uploadId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'uploadId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'uploadData' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/customDataSources/{customDataSourceId}/uploads',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customDataSourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_webPropertyAdWordsLinks = new Analytics\Resource\ManagementWebPropertyAdWordsLinks(
        $this,
        $this->serviceName,
        'webPropertyAdWordsLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyAdWordsLinkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyAdWordsLinkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyAdWordsLinkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityAdWordsLinks/{webPropertyAdWordsLinkId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyAdWordsLinkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_webproperties = new Analytics\Resource\ManagementWebproperties(
        $this,
        $this->serviceName,
        'webproperties',
        [
          'methods' => [
            'get' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'patch' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->management_webpropertyUserLinks = new Analytics\Resource\ManagementWebpropertyUserLinks(
        $this,
        $this->serviceName,
        'webpropertyUserLinks',
        [
          'methods' => [
            'delete' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks/{linkId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'max-results' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'start-index' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'update' => [
              'path' => 'management/accounts/{accountId}/webproperties/{webPropertyId}/entityUserLinks/{linkId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webPropertyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'linkId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->metadata_columns = new Analytics\Resource\MetadataColumns(
        $this,
        $this->serviceName,
        'columns',
        [
          'methods' => [
            'list' => [
              'path' => 'metadata/{reportType}/columns',
              'httpMethod' => 'GET',
              'parameters' => [
                'reportType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->provisioning = new Analytics\Resource\Provisioning(
        $this,
        $this->serviceName,
        'provisioning',
        [
          'methods' => [
            'createAccountTicket' => [
              'path' => 'provisioning/createAccountTicket',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'createAccountTree' => [
              'path' => 'provisioning/createAccountTree',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->userDeletion_userDeletionRequest = new Analytics\Resource\UserDeletionUserDeletionRequest(
        $this,
        $this->serviceName,
        'userDeletionRequest',
        [
          'methods' => [
            'upsert' => [
              'path' => 'userDeletion/userDeletionRequests:upsert',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Analytics::class, 'Google_Service_Analytics');
