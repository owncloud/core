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
 * Service definition for Vault (v1).
 *
 * <p>
 * Archiving and eDiscovery for G Suite.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/vault" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Vault extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://vault.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'vault';

    $this->matters = new Google_Service_Vault_Resource_Matters(
        $this,
        $this->serviceName,
        'matters',
        array(
          'methods' => array(
            'addPermissions' => array(
              'path' => 'v1/matters/{matterId}:addPermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'close' => array(
              'path' => 'v1/matters/{matterId}:close',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/matters',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'state' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'removePermissions' => array(
              'path' => 'v1/matters/{matterId}:removePermissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'reopen' => array(
              'path' => 'v1/matters/{matterId}:reopen',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'v1/matters/{matterId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1/matters/{matterId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->matters_exports = new Google_Service_Vault_Resource_MattersExports(
        $this,
        $this->serviceName,
        'exports',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/matters/{matterId}/exports',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/exports/{exportId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'exportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}/exports/{exportId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'exportId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/exports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->matters_holds = new Google_Service_Vault_Resource_MattersHolds(
        $this,
        $this->serviceName,
        'holds',
        array(
          'methods' => array(
            'addHeldAccounts' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}:addHeldAccounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/holds',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'view' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'removeHeldAccounts' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}:removeHeldAccounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->matters_holds_accounts = new Google_Service_Vault_Resource_MattersHoldsAccounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts/{accountId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/holds/{holdId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'holdId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->matters_savedQueries = new Google_Service_Vault_Resource_MattersSavedQueries(
        $this,
        $this->serviceName,
        'savedQueries',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1/matters/{matterId}/savedQueries',
              'httpMethod' => 'POST',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1/matters/{matterId}/savedQueries/{savedQueryId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'savedQueryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1/matters/{matterId}/savedQueries/{savedQueryId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'savedQueryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1/matters/{matterId}/savedQueries',
              'httpMethod' => 'GET',
              'parameters' => array(
                'matterId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
    $this->operations = new Google_Service_Vault_Resource_Operations(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
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
  }
}
