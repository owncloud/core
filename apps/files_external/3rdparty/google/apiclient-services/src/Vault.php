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
 * Service definition for Vault (v1).
 *
 * <p>
 * Retention and eDiscovery for Google Workspace. To work with Vault resources,
 * the account must have the [required Vault
 * privileges](https://support.google.com/vault/answer/2799699) and access to
 * the matter. To access a matter, the account must have created the matter,
 * have the matter shared with them, or have the **View All Matters** privilege.
 * For example, to download an export, an account needs the **Manage Exports**
 * privilege and the matter shared with them.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/vault" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Vault extends \Google\Service
{
  /** Manage your eDiscovery data. */
  const EDISCOVERY =
      "https://www.googleapis.com/auth/ediscovery";
  /** View your eDiscovery data. */
  const EDISCOVERY_READONLY =
      "https://www.googleapis.com/auth/ediscovery.readonly";

  public $matters;
  public $matters_exports;
  public $matters_holds;
  public $matters_holds_accounts;
  public $matters_savedQueries;
  public $operations;

  /**
   * Constructs the internal representation of the Vault service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://vault.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'vault';

    $this->matters = new Vault\Resource\Matters(
        $this,
        $this->serviceName,
        'matters',
        [
          'methods' => [
            'addPermissions' => [
              'path' => 'v1/matters/{matterId}:addPermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'close' => [
              'path' => 'v1/matters/{matterId}:close',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'count' => [
              'path' => 'v1/matters/{matterId}:count',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/matters',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/matters',
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
                'state' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removePermissions' => [
              'path' => 'v1/matters/{matterId}:removePermissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'reopen' => [
              'path' => 'v1/matters/{matterId}:reopen',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undelete' => [
              'path' => 'v1/matters/{matterId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->matters_exports = new Vault\Resource\MattersExports(
        $this,
        $this->serviceName,
        'exports',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/matters/{matterId}/exports',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/matters/{matterId}/exports/{exportId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'exportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/matters/{matterId}/exports/{exportId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'exportId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/matters/{matterId}/exports',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
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
    $this->matters_holds = new Vault\Resource\MattersHolds(
        $this,
        $this->serviceName,
        'holds',
        [
          'methods' => [
            'addHeldAccounts' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}:addHeldAccounts',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
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
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeHeldAccounts' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}:removeHeldAccounts',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->matters_holds_accounts = new Vault\Resource\MattersHoldsAccounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts/{accountId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'holdId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->matters_savedQueries = new Vault\Resource\MattersSavedQueries(
        $this,
        $this->serviceName,
        'savedQueries',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/matters/{matterId}/savedQueries',
              'httpMethod' => 'POST',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'v1/matters/{matterId}/savedQueries/{savedQueryId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'savedQueryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/matters/{matterId}/savedQueries/{savedQueryId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'savedQueryId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/matters/{matterId}/savedQueries',
              'httpMethod' => 'GET',
              'parameters' => [
                'matterId' => [
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
    $this->operations = new Vault\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
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
              'path' => 'v1/{+name}',
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Vault::class, 'Google_Service_Vault');
