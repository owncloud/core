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
 * Service definition for Apigee (v1).
 *
 * <p>
 * Use the Apigee API to programmatically develop and manage APIs with a set of
 * RESTful operations. Develop and secure API proxies, deploy and undeploy API
 * proxy revisions, monitor APIs, configure environments, manage users, and
 * more. Note: This product is available as a free trial for a time period of 60
 * days.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/apigee-api-management/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Apigee extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $hybrid_issuers;
  public $organizations;
  public $organizations_analytics_datastores;
  public $organizations_apiproducts;
  public $organizations_apiproducts_attributes;
  public $organizations_apiproducts_rateplans;
  public $organizations_apis;
  public $organizations_apis_deployments;
  public $organizations_apis_keyvaluemaps;
  public $organizations_apis_revisions;
  public $organizations_apis_revisions_deployments;
  public $organizations_apps;
  public $organizations_datacollectors;
  public $organizations_deployments;
  public $organizations_developers;
  public $organizations_developers_apps;
  public $organizations_developers_apps_attributes;
  public $organizations_developers_apps_keys;
  public $organizations_developers_apps_keys_apiproducts;
  public $organizations_developers_apps_keys_create;
  public $organizations_developers_attributes;
  public $organizations_developers_balance;
  public $organizations_developers_subscriptions;
  public $organizations_envgroups;
  public $organizations_envgroups_attachments;
  public $organizations_environments;
  public $organizations_environments_analytics_admin;
  public $organizations_environments_analytics_exports;
  public $organizations_environments_apis_deployments;
  public $organizations_environments_apis_revisions;
  public $organizations_environments_apis_revisions_debugsessions;
  public $organizations_environments_apis_revisions_debugsessions_data;
  public $organizations_environments_apis_revisions_deployments;
  public $organizations_environments_archiveDeployments;
  public $organizations_environments_caches;
  public $organizations_environments_deployments;
  public $organizations_environments_flowhooks;
  public $organizations_environments_keystores;
  public $organizations_environments_keystores_aliases;
  public $organizations_environments_keyvaluemaps;
  public $organizations_environments_optimizedStats;
  public $organizations_environments_queries;
  public $organizations_environments_references;
  public $organizations_environments_resourcefiles;
  public $organizations_environments_sharedflows_deployments;
  public $organizations_environments_sharedflows_revisions;
  public $organizations_environments_stats;
  public $organizations_environments_targetservers;
  public $organizations_environments_traceConfig_overrides;
  public $organizations_hostQueries;
  public $organizations_hostStats;
  public $organizations_instances;
  public $organizations_instances_attachments;
  public $organizations_instances_canaryevaluations;
  public $organizations_instances_natAddresses;
  public $organizations_keyvaluemaps;
  public $organizations_operations;
  public $organizations_optimizedHostStats;
  public $organizations_reports;
  public $organizations_sharedflows;
  public $organizations_sharedflows_deployments;
  public $organizations_sharedflows_revisions;
  public $organizations_sharedflows_revisions_deployments;
  public $organizations_sites_apicategories;
  public $projects;

  /**
   * Constructs the internal representation of the Apigee service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://apigee.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'apigee';

    $this->hybrid_issuers = new Apigee\Resource\HybridIssuers(
        $this,
        $this->serviceName,
        'issuers',
        [
          'methods' => [
            'list' => [
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
    $this->organizations = new Apigee\Resource\Organizations(
        $this,
        $this->serviceName,
        'organizations',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/organizations',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'getDeployedIngressConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getRuntimeConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getSyncAuthorization' => [
              'path' => 'v1/{+name}:getSyncAuthorization',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setAddons' => [
              'path' => 'v1/{+org}:setAddons',
              'httpMethod' => 'POST',
              'parameters' => [
                'org' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setSyncAuthorization' => [
              'path' => 'v1/{+name}:setSyncAuthorization',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_analytics_datastores = new Apigee\Resource\OrganizationsAnalyticsDatastores(
        $this,
        $this->serviceName,
        'datastores',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/analytics/datastores',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/analytics/datastores',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'test' => [
              'path' => 'v1/{+parent}/analytics/datastores:test',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_apiproducts = new Apigee\Resource\OrganizationsApiproducts(
        $this,
        $this->serviceName,
        'apiproducts',
        [
          'methods' => [
            'attributes' => [
              'path' => 'v1/{+name}/attributes',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/{+parent}/apiproducts',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/apiproducts',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'attributename' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'attributevalue' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'count' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_apiproducts_attributes = new Apigee\Resource\OrganizationsApiproductsAttributes(
        $this,
        $this->serviceName,
        'attributes',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/attributes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateApiProductAttribute' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
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
    $this->organizations_apiproducts_rateplans = new Apigee\Resource\OrganizationsApiproductsRateplans(
        $this,
        $this->serviceName,
        'rateplans',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/rateplans',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/rateplans',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'count' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'state' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_apis = new Apigee\Resource\OrganizationsApis(
        $this,
        $this->serviceName,
        'apis',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/apis',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validate' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/apis',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeMetaData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeRevisions' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_apis_deployments = new Apigee\Resource\OrganizationsApisDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_apis_keyvaluemaps = new Apigee\Resource\OrganizationsApisKeyvaluemaps(
        $this,
        $this->serviceName,
        'keyvaluemaps',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keyvaluemaps',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
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
    $this->organizations_apis_revisions = new Apigee\Resource\OrganizationsApisRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateApiProxyRevision' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'validate' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_apis_revisions_deployments = new Apigee\Resource\OrganizationsApisRevisionsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_apps = new Apigee\Resource\OrganizationsApps(
        $this,
        $this->serviceName,
        'apps',
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
              'path' => 'v1/{+parent}/apps',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'apiProduct' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'apptype' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeCred' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'keyStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'rows' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_datacollectors = new Apigee\Resource\OrganizationsDatacollectors(
        $this,
        $this->serviceName,
        'datacollectors',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/datacollectors',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataCollectorId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/datacollectors',
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
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_deployments = new Apigee\Resource\OrganizationsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sharedFlows' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_developers = new Apigee\Resource\OrganizationsDevelopers(
        $this,
        $this->serviceName,
        'developers',
        [
          'methods' => [
            'attributes' => [
              'path' => 'v1/{+parent}/attributes',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/{+parent}/developers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getBalance' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getMonetizationConfig' => [
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
              'path' => 'v1/{+parent}/developers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'app' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'count' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ids' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeCompany' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setDeveloperStatus' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateMonetizationConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_developers_apps = new Apigee\Resource\OrganizationsDevelopersApps(
        $this,
        $this->serviceName,
        'apps',
        [
          'methods' => [
            'attributes' => [
              'path' => 'v1/{+name}/attributes',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/{+parent}/apps',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateKeyPairOrUpdateDeveloperAppStatus' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
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
                'entity' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/apps',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'count' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'shallowExpand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_developers_apps_attributes = new Apigee\Resource\OrganizationsDevelopersAppsAttributes(
        $this,
        $this->serviceName,
        'attributes',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/attributes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateDeveloperAppAttribute' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
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
    $this->organizations_developers_apps_keys = new Apigee\Resource\OrganizationsDevelopersAppsKeys(
        $this,
        $this->serviceName,
        'keys',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keys',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'replaceDeveloperAppKey' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateDeveloperAppKey' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_developers_apps_keys_apiproducts = new Apigee\Resource\OrganizationsDevelopersAppsKeysApiproducts(
        $this,
        $this->serviceName,
        'apiproducts',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateDeveloperAppKeyApiProduct' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_developers_apps_keys_create = new Apigee\Resource\OrganizationsDevelopersAppsKeysCreate(
        $this,
        $this->serviceName,
        'create',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keys/create',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_developers_attributes = new Apigee\Resource\OrganizationsDevelopersAttributes(
        $this,
        $this->serviceName,
        'attributes',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/attributes',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateDeveloperAttribute' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
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
    $this->organizations_developers_balance = new Apigee\Resource\OrganizationsDevelopersBalance(
        $this,
        $this->serviceName,
        'balance',
        [
          'methods' => [
            'adjust' => [
              'path' => 'v1/{+name}:adjust',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'credit' => [
              'path' => 'v1/{+name}:credit',
              'httpMethod' => 'POST',
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
    $this->organizations_developers_subscriptions = new Apigee\Resource\OrganizationsDevelopersSubscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/subscriptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'expire' => [
              'path' => 'v1/{+name}:expire',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'count' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'startKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_envgroups = new Apigee\Resource\OrganizationsEnvgroups(
        $this,
        $this->serviceName,
        'envgroups',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/envgroups',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/envgroups',
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
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_envgroups_attachments = new Apigee\Resource\OrganizationsEnvgroupsAttachments(
        $this,
        $this->serviceName,
        'attachments',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/attachments',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/attachments',
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
    $this->organizations_environments = new Apigee\Resource\OrganizationsEnvironments(
        $this,
        $this->serviceName,
        'environments',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/environments',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'getDebugmask' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getDeployedConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getIamPolicy' => [
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'options.requestedPolicyVersion' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'getTraceConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setIamPolicy' => [
              'path' => 'v1/{+resource}:setIamPolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'subscribe' => [
              'path' => 'v1/{+parent}:subscribe',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'testIamPermissions' => [
              'path' => 'v1/{+resource}:testIamPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'resource' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unsubscribe' => [
              'path' => 'v1/{+parent}:unsubscribe',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateDebugmask' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replaceRepeatedFields' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateEnvironment' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateTraceConfig' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_analytics_admin = new Apigee\Resource\OrganizationsEnvironmentsAnalyticsAdmin(
        $this,
        $this->serviceName,
        'admin',
        [
          'methods' => [
            'getSchemav2' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disableCache' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_analytics_exports = new Apigee\Resource\OrganizationsEnvironmentsAnalyticsExports(
        $this,
        $this->serviceName,
        'exports',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/analytics/exports',
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
            ],'list' => [
              'path' => 'v1/{+parent}/analytics/exports',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_apis_deployments = new Apigee\Resource\OrganizationsEnvironmentsApisDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_apis_revisions = new Apigee\Resource\OrganizationsEnvironmentsApisRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'deploy' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'override' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sequencedRollout' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'serviceAccount' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getDeployments' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undeploy' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sequencedRollout' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_apis_revisions_debugsessions = new Apigee\Resource\OrganizationsEnvironmentsApisRevisionsDebugsessions(
        $this,
        $this->serviceName,
        'debugsessions',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/debugsessions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'timeout' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'deleteData' => [
              'path' => 'v1/{+name}/data',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/debugsessions',
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
    $this->organizations_environments_apis_revisions_debugsessions_data = new Apigee\Resource\OrganizationsEnvironmentsApisRevisionsDebugsessionsData(
        $this,
        $this->serviceName,
        'data',
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
            ],
          ]
        ]
    );
    $this->organizations_environments_apis_revisions_deployments = new Apigee\Resource\OrganizationsEnvironmentsApisRevisionsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'generateDeployChangeReport' => [
              'path' => 'v1/{+name}/deployments:generateDeployChangeReport',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'override' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'generateUndeployChangeReport' => [
              'path' => 'v1/{+name}/deployments:generateUndeployChangeReport',
              'httpMethod' => 'POST',
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
    $this->organizations_environments_archiveDeployments = new Apigee\Resource\OrganizationsEnvironmentsArchiveDeployments(
        $this,
        $this->serviceName,
        'archiveDeployments',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/archiveDeployments',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateDownloadUrl' => [
              'path' => 'v1/{+name}:generateDownloadUrl',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateUploadUrl' => [
              'path' => 'v1/{+parent}/archiveDeployments:generateUploadUrl',
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
            ],'list' => [
              'path' => 'v1/{+parent}/archiveDeployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_caches = new Apigee\Resource\OrganizationsEnvironmentsCaches(
        $this,
        $this->serviceName,
        'caches',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
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
    $this->organizations_environments_deployments = new Apigee\Resource\OrganizationsEnvironmentsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'sharedFlows' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_flowhooks = new Apigee\Resource\OrganizationsEnvironmentsFlowhooks(
        $this,
        $this->serviceName,
        'flowhooks',
        [
          'methods' => [
            'attachSharedFlowToFlowHook' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'detachSharedFlowFromFlowHook' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
    $this->organizations_environments_keystores = new Apigee\Resource\OrganizationsEnvironmentsKeystores(
        $this,
        $this->serviceName,
        'keystores',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keystores',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
    $this->organizations_environments_keystores_aliases = new Apigee\Resource\OrganizationsEnvironmentsKeystoresAliases(
        $this,
        $this->serviceName,
        'aliases',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/aliases',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                '_password' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'alias' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'ignoreExpiryValidation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ignoreNewlineValidation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'csr' => [
              'path' => 'v1/{+name}/csr',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'getCertificate' => [
              'path' => 'v1/{+name}/certificate',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ignoreExpiryValidation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ignoreNewlineValidation' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_keyvaluemaps = new Apigee\Resource\OrganizationsEnvironmentsKeyvaluemaps(
        $this,
        $this->serviceName,
        'keyvaluemaps',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keyvaluemaps',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
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
    $this->organizations_environments_optimizedStats = new Apigee\Resource\OrganizationsEnvironmentsOptimizedStats(
        $this,
        $this->serviceName,
        'optimizedStats',
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
                'accuracy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'aggTable' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'realtime' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'select' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sonar' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortby' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeUnit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'topk' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tsAscending' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'tzo' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_queries = new Apigee\Resource\OrganizationsEnvironmentsQueries(
        $this,
        $this->serviceName,
        'queries',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/queries',
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
            ],'getResult' => [
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
              'path' => 'v1/{+parent}/queries',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'from' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'inclQueriesWithoutReport' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'submittedBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'to' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_references = new Apigee\Resource\OrganizationsEnvironmentsReferences(
        $this,
        $this->serviceName,
        'references',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/references',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_environments_resourcefiles = new Apigee\Resource\OrganizationsEnvironmentsResourcefiles(
        $this,
        $this->serviceName,
        'resourcefiles',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/resourcefiles',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+parent}/resourcefiles/{type}/{name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+parent}/resourcefiles/{type}/{name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/resourcefiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listEnvironmentResources' => [
              'path' => 'v1/{+parent}/resourcefiles/{type}',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+parent}/resourcefiles/{type}/{name}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
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
    $this->organizations_environments_sharedflows_deployments = new Apigee\Resource\OrganizationsEnvironmentsSharedflowsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_sharedflows_revisions = new Apigee\Resource\OrganizationsEnvironmentsSharedflowsRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'deploy' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'override' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'serviceAccount' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getDeployments' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undeploy' => [
              'path' => 'v1/{+name}/deployments',
              'httpMethod' => 'DELETE',
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
    $this->organizations_environments_stats = new Apigee\Resource\OrganizationsEnvironmentsStats(
        $this,
        $this->serviceName,
        'stats',
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
                'accuracy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'aggTable' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'realtime' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'select' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sonar' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortby' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeUnit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'topk' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tsAscending' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'tzo' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_environments_targetservers = new Apigee\Resource\OrganizationsEnvironmentsTargetservers(
        $this,
        $this->serviceName,
        'targetservers',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/targetservers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_environments_traceConfig_overrides = new Apigee\Resource\OrganizationsEnvironmentsTraceConfigOverrides(
        $this,
        $this->serviceName,
        'overrides',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/overrides',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/overrides',
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
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_hostQueries = new Apigee\Resource\OrganizationsHostQueries(
        $this,
        $this->serviceName,
        'hostQueries',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/hostQueries',
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
            ],'getResult' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getResultView' => [
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
              'path' => 'v1/{+parent}/hostQueries',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dataset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'envgroupHostname' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'from' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'inclQueriesWithoutReport' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'submittedBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'to' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_hostStats = new Apigee\Resource\OrganizationsHostStats(
        $this,
        $this->serviceName,
        'hostStats',
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
                'accuracy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'envgroupHostname' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'realtime' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'select' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortby' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeUnit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'topk' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tsAscending' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'tzo' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_instances = new Apigee\Resource\OrganizationsInstances(
        $this,
        $this->serviceName,
        'instances',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/instances',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/instances',
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
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reportStatus' => [
              'path' => 'v1/{+instance}:reportStatus',
              'httpMethod' => 'POST',
              'parameters' => [
                'instance' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_instances_attachments = new Apigee\Resource\OrganizationsInstancesAttachments(
        $this,
        $this->serviceName,
        'attachments',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/attachments',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/attachments',
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
    $this->organizations_instances_canaryevaluations = new Apigee\Resource\OrganizationsInstancesCanaryevaluations(
        $this,
        $this->serviceName,
        'canaryevaluations',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/canaryevaluations',
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
    $this->organizations_instances_natAddresses = new Apigee\Resource\OrganizationsInstancesNatAddresses(
        $this,
        $this->serviceName,
        'natAddresses',
        [
          'methods' => [
            'activate' => [
              'path' => 'v1/{+name}:activate',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/{+parent}/natAddresses',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/natAddresses',
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
    $this->organizations_keyvaluemaps = new Apigee\Resource\OrganizationsKeyvaluemaps(
        $this,
        $this->serviceName,
        'keyvaluemaps',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/keyvaluemaps',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
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
    $this->organizations_operations = new Apigee\Resource\OrganizationsOperations(
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
              'path' => 'v1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
    $this->organizations_optimizedHostStats = new Apigee\Resource\OrganizationsOptimizedHostStats(
        $this,
        $this->serviceName,
        'optimizedHostStats',
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
                'accuracy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'envgroupHostname' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'limit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'offset' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'realtime' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'select' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sort' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortby' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeRange' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'timeUnit' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'topk' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'tsAscending' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'tzo' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_reports = new Apigee\Resource\OrganizationsReports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/reports',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/reports',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'expand' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PUT',
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
    $this->organizations_sharedflows = new Apigee\Resource\OrganizationsSharedflows(
        $this,
        $this->serviceName,
        'sharedflows',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/sharedflows',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'action' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/sharedflows',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeMetaData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeRevisions' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_sharedflows_deployments = new Apigee\Resource\OrganizationsSharedflowsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_sharedflows_revisions = new Apigee\Resource\OrganizationsSharedflowsRevisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
                'format' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateSharedFlowRevision' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'validate' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_sharedflows_revisions_deployments = new Apigee\Resource\OrganizationsSharedflowsRevisionsDeployments(
        $this,
        $this->serviceName,
        'deployments',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/deployments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->organizations_sites_apicategories = new Apigee\Resource\OrganizationsSitesApicategories(
        $this,
        $this->serviceName,
        'apicategories',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/apicategories',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
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
            ],'list' => [
              'path' => 'v1/{+parent}/apicategories',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
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
    $this->projects = new Apigee\Resource\Projects(
        $this,
        $this->serviceName,
        'projects',
        [
          'methods' => [
            'provisionOrganization' => [
              'path' => 'v1/{+project}:provisionOrganization',
              'httpMethod' => 'POST',
              'parameters' => [
                'project' => [
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
class_alias(Apigee::class, 'Google_Service_Apigee');
