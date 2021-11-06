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
 * Service definition for Iam (v1).
 *
 * <p>
 * Manages identity and access control for Google Cloud Platform resources,
 * including the creation of service accounts, which you can use to authenticate
 * to Google and make API calls.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/iam/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Iam extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $iamPolicies;
  public $organizations_roles;
  public $permissions;
  public $projects_locations_workloadIdentityPools;
  public $projects_locations_workloadIdentityPools_operations;
  public $projects_locations_workloadIdentityPools_providers;
  public $projects_locations_workloadIdentityPools_providers_operations;
  public $projects_roles;
  public $projects_serviceAccounts;
  public $projects_serviceAccounts_keys;
  public $roles;

  /**
   * Constructs the internal representation of the Iam service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://iam.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'iam';

    $this->iamPolicies = new Iam\Resource\IamPolicies(
        $this,
        $this->serviceName,
        'iamPolicies',
        [
          'methods' => [
            'lintPolicy' => [
              'path' => 'v1/iamPolicies:lintPolicy',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'queryAuditableServices' => [
              'path' => 'v1/iamPolicies:queryAuditableServices',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->organizations_roles = new Iam\Resource\OrganizationsRoles(
        $this,
        $this->serviceName,
        'roles',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/roles',
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
                'etag' => [
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
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/roles',
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
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'view' => [
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
            ],'undelete' => [
              'path' => 'v1/{+name}:undelete',
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
    $this->permissions = new Iam\Resource\Permissions(
        $this,
        $this->serviceName,
        'permissions',
        [
          'methods' => [
            'queryTestablePermissions' => [
              'path' => 'v1/permissions:queryTestablePermissions',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->projects_locations_workloadIdentityPools = new Iam\Resource\ProjectsLocationsWorkloadIdentityPools(
        $this,
        $this->serviceName,
        'workloadIdentityPools',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/workloadIdentityPools',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'workloadIdentityPoolId' => [
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
              'path' => 'v1/{+parent}/workloadIdentityPools',
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
                'showDeleted' => [
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
            ],'undelete' => [
              'path' => 'v1/{+name}:undelete',
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
    $this->projects_locations_workloadIdentityPools_operations = new Iam\Resource\ProjectsLocationsWorkloadIdentityPoolsOperations(
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
            ],
          ]
        ]
    );
    $this->projects_locations_workloadIdentityPools_providers = new Iam\Resource\ProjectsLocationsWorkloadIdentityPoolsProviders(
        $this,
        $this->serviceName,
        'providers',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/providers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'workloadIdentityPoolProviderId' => [
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
              'path' => 'v1/{+parent}/providers',
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
                'showDeleted' => [
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
            ],'undelete' => [
              'path' => 'v1/{+name}:undelete',
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
    $this->projects_locations_workloadIdentityPools_providers_operations = new Iam\Resource\ProjectsLocationsWorkloadIdentityPoolsProvidersOperations(
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
            ],
          ]
        ]
    );
    $this->projects_roles = new Iam\Resource\ProjectsRoles(
        $this,
        $this->serviceName,
        'roles',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/roles',
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
                'etag' => [
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
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/roles',
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
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'view' => [
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
            ],'undelete' => [
              'path' => 'v1/{+name}:undelete',
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
    $this->projects_serviceAccounts = new Iam\Resource\ProjectsServiceAccounts(
        $this,
        $this->serviceName,
        'serviceAccounts',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+name}/serviceAccounts',
              'httpMethod' => 'POST',
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
            ],'disable' => [
              'path' => 'v1/{+name}:disable',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'enable' => [
              'path' => 'v1/{+name}:enable',
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
            ],'getIamPolicy' => [
              'path' => 'v1/{+resource}:getIamPolicy',
              'httpMethod' => 'POST',
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
            ],'list' => [
              'path' => 'v1/{+name}/serviceAccounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
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
            ],'signBlob' => [
              'path' => 'v1/{+name}:signBlob',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'signJwt' => [
              'path' => 'v1/{+name}:signJwt',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
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
            ],'undelete' => [
              'path' => 'v1/{+name}:undelete',
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
    $this->projects_serviceAccounts_keys = new Iam\Resource\ProjectsServiceAccountsKeys(
        $this,
        $this->serviceName,
        'keys',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+name}/keys',
              'httpMethod' => 'POST',
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
            ],'disable' => [
              'path' => 'v1/{+name}:disable',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'enable' => [
              'path' => 'v1/{+name}:enable',
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
                'publicKeyType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+name}/keys',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keyTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'upload' => [
              'path' => 'v1/{+name}/keys:upload',
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
    $this->roles = new Iam\Resource\Roles(
        $this,
        $this->serviceName,
        'roles',
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
              'path' => 'v1/roles',
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
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'queryGrantableRoles' => [
              'path' => 'v1/roles:queryGrantableRoles',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Iam::class, 'Google_Service_Iam');
