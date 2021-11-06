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
 * Service definition for AdExchangeBuyerII (v2beta1).
 *
 * <p>
 * Accesses the latest features for managing Authorized Buyers accounts, Real-
 * Time Bidding configurations and auction metrics, and Marketplace programmatic
 * deals.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/authorized-buyers/apis/reference/rest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AdExchangeBuyerII extends \Google\Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER =
      "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts_clients;
  public $accounts_clients_invitations;
  public $accounts_clients_users;
  public $accounts_creatives;
  public $accounts_creatives_dealAssociations;
  public $accounts_finalizedProposals;
  public $accounts_products;
  public $accounts_proposals;
  public $accounts_publisherProfiles;
  public $bidders_accounts_filterSets;
  public $bidders_accounts_filterSets_bidMetrics;
  public $bidders_accounts_filterSets_bidResponseErrors;
  public $bidders_accounts_filterSets_bidResponsesWithoutBids;
  public $bidders_accounts_filterSets_filteredBidRequests;
  public $bidders_accounts_filterSets_filteredBids;
  public $bidders_accounts_filterSets_filteredBids_creatives;
  public $bidders_accounts_filterSets_filteredBids_details;
  public $bidders_accounts_filterSets_impressionMetrics;
  public $bidders_accounts_filterSets_losingBids;
  public $bidders_accounts_filterSets_nonBillableWinningBids;
  public $bidders_filterSets;
  public $bidders_filterSets_bidMetrics;
  public $bidders_filterSets_bidResponseErrors;
  public $bidders_filterSets_bidResponsesWithoutBids;
  public $bidders_filterSets_filteredBidRequests;
  public $bidders_filterSets_filteredBids;
  public $bidders_filterSets_filteredBids_creatives;
  public $bidders_filterSets_filteredBids_details;
  public $bidders_filterSets_impressionMetrics;
  public $bidders_filterSets_losingBids;
  public $bidders_filterSets_nonBillableWinningBids;

  /**
   * Constructs the internal representation of the AdExchangeBuyerII service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://adexchangebuyer.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2beta1';
    $this->serviceName = 'adexchangebuyer2';

    $this->accounts_clients = new AdExchangeBuyerII\Resource\AccountsClients(
        $this,
        $this->serviceName,
        'clients',
        [
          'methods' => [
            'create' => [
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/clients',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
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
                'partnerClientId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_clients_invitations = new AdExchangeBuyerII\Resource\AccountsClientsInvitations(
        $this,
        $this->serviceName,
        'invitations',
        [
          'methods' => [
            'create' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations/{invitationId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'invitationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/invitations',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
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
    $this->accounts_clients_users = new AdExchangeBuyerII\Resource\AccountsClientsUsers(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'get' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
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
            ],'update' => [
              'path' => 'v2beta1/accounts/{accountId}/clients/{clientAccountId}/users/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_creatives = new AdExchangeBuyerII\Resource\AccountsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'create' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'duplicateIdMode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
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
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'stopWatching' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}:stopWatching',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'watch' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}:watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_creatives_dealAssociations = new AdExchangeBuyerII\Resource\AccountsCreativesDealAssociations(
        $this,
        $this->serviceName,
        'dealAssociations',
        [
          'methods' => [
            'add' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations:add',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
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
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'remove' => [
              'path' => 'v2beta1/accounts/{accountId}/creatives/{creativeId}/dealAssociations:remove',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_finalizedProposals = new AdExchangeBuyerII\Resource\AccountsFinalizedProposals(
        $this,
        $this->serviceName,
        'finalizedProposals',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/accounts/{accountId}/finalizedProposals',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterSyntax' => [
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
            ],'pause' => [
              'path' => 'v2beta1/accounts/{accountId}/finalizedProposals/{proposalId}:pause',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resume' => [
              'path' => 'v2beta1/accounts/{accountId}/finalizedProposals/{proposalId}:resume',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_products = new AdExchangeBuyerII\Resource\AccountsProducts(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'get' => [
              'path' => 'v2beta1/accounts/{accountId}/products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/products',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
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
    $this->accounts_proposals = new AdExchangeBuyerII\Resource\AccountsProposals(
        $this,
        $this->serviceName,
        'proposals',
        [
          'methods' => [
            'accept' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:accept',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'addNote' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:addNote',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancelNegotiation' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:cancelNegotiation',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'completeSetup' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:completeSetup',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filterSyntax' => [
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
            ],'pause' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:pause',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resume' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}:resume',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'v2beta1/accounts/{accountId}/proposals/{proposalId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_publisherProfiles = new AdExchangeBuyerII\Resource\AccountsPublisherProfiles(
        $this,
        $this->serviceName,
        'publisherProfiles',
        [
          'methods' => [
            'get' => [
              'path' => 'v2beta1/accounts/{accountId}/publisherProfiles/{publisherProfileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'publisherProfileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/accounts/{accountId}/publisherProfiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
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
    $this->bidders_accounts_filterSets = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSets(
        $this,
        $this->serviceName,
        'filterSets',
        [
          'methods' => [
            'create' => [
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'POST',
              'parameters' => [
                'ownerName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'isTransient' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'GET',
              'parameters' => [
                'ownerName' => [
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
    $this->bidders_accounts_filterSets_bidMetrics = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsBidMetrics(
        $this,
        $this->serviceName,
        'bidMetrics',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidMetrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_bidResponseErrors = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsBidResponseErrors(
        $this,
        $this->serviceName,
        'bidResponseErrors',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidResponseErrors',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_bidResponsesWithoutBids = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsBidResponsesWithoutBids(
        $this,
        $this->serviceName,
        'bidResponsesWithoutBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidResponsesWithoutBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_filteredBidRequests = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsFilteredBidRequests(
        $this,
        $this->serviceName,
        'filteredBidRequests',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBidRequests',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_filteredBids = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsFilteredBids(
        $this,
        $this->serviceName,
        'filteredBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_filteredBids_creatives = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsFilteredBidsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeStatusId' => [
                  'location' => 'path',
                  'type' => 'integer',
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
    $this->bidders_accounts_filterSets_filteredBids_details = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsFilteredBidsDetails(
        $this,
        $this->serviceName,
        'details',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/details',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeStatusId' => [
                  'location' => 'path',
                  'type' => 'integer',
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
    $this->bidders_accounts_filterSets_impressionMetrics = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsImpressionMetrics(
        $this,
        $this->serviceName,
        'impressionMetrics',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/impressionMetrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_losingBids = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsLosingBids(
        $this,
        $this->serviceName,
        'losingBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/losingBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_accounts_filterSets_nonBillableWinningBids = new AdExchangeBuyerII\Resource\BiddersAccountsFilterSetsNonBillableWinningBids(
        $this,
        $this->serviceName,
        'nonBillableWinningBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/nonBillableWinningBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets = new AdExchangeBuyerII\Resource\BiddersFilterSets(
        $this,
        $this->serviceName,
        'filterSets',
        [
          'methods' => [
            'create' => [
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'POST',
              'parameters' => [
                'ownerName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'isTransient' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v2beta1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v2beta1/{+ownerName}/filterSets',
              'httpMethod' => 'GET',
              'parameters' => [
                'ownerName' => [
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
    $this->bidders_filterSets_bidMetrics = new AdExchangeBuyerII\Resource\BiddersFilterSetsBidMetrics(
        $this,
        $this->serviceName,
        'bidMetrics',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidMetrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_bidResponseErrors = new AdExchangeBuyerII\Resource\BiddersFilterSetsBidResponseErrors(
        $this,
        $this->serviceName,
        'bidResponseErrors',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidResponseErrors',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_bidResponsesWithoutBids = new AdExchangeBuyerII\Resource\BiddersFilterSetsBidResponsesWithoutBids(
        $this,
        $this->serviceName,
        'bidResponsesWithoutBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/bidResponsesWithoutBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_filteredBidRequests = new AdExchangeBuyerII\Resource\BiddersFilterSetsFilteredBidRequests(
        $this,
        $this->serviceName,
        'filteredBidRequests',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBidRequests',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_filteredBids = new AdExchangeBuyerII\Resource\BiddersFilterSetsFilteredBids(
        $this,
        $this->serviceName,
        'filteredBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_filteredBids_creatives = new AdExchangeBuyerII\Resource\BiddersFilterSetsFilteredBidsCreatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeStatusId' => [
                  'location' => 'path',
                  'type' => 'integer',
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
    $this->bidders_filterSets_filteredBids_details = new AdExchangeBuyerII\Resource\BiddersFilterSetsFilteredBidsDetails(
        $this,
        $this->serviceName,
        'details',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/filteredBids/{creativeStatusId}/details',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'creativeStatusId' => [
                  'location' => 'path',
                  'type' => 'integer',
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
    $this->bidders_filterSets_impressionMetrics = new AdExchangeBuyerII\Resource\BiddersFilterSetsImpressionMetrics(
        $this,
        $this->serviceName,
        'impressionMetrics',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/impressionMetrics',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_losingBids = new AdExchangeBuyerII\Resource\BiddersFilterSetsLosingBids(
        $this,
        $this->serviceName,
        'losingBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/losingBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
    $this->bidders_filterSets_nonBillableWinningBids = new AdExchangeBuyerII\Resource\BiddersFilterSetsNonBillableWinningBids(
        $this,
        $this->serviceName,
        'nonBillableWinningBids',
        [
          'methods' => [
            'list' => [
              'path' => 'v2beta1/{+filterSetName}/nonBillableWinningBids',
              'httpMethod' => 'GET',
              'parameters' => [
                'filterSetName' => [
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
class_alias(AdExchangeBuyerII::class, 'Google_Service_AdExchangeBuyerII');
