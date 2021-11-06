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
 * Service definition for AdExchangeBuyer (v1.4).
 *
 * <p>
 * Accesses your bidding-account information, submits creatives for validation,
 * finds available direct deals, and retrieves performance reports.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/ad-exchange/buyer-rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AdExchangeBuyer extends \Google\Service
{
  /** Manage your Ad Exchange buyer account configuration. */
  const ADEXCHANGE_BUYER =
      "https://www.googleapis.com/auth/adexchange.buyer";

  public $accounts;
  public $billingInfo;
  public $budget;
  public $creatives;
  public $marketplacedeals;
  public $marketplacenotes;
  public $marketplaceprivateauction;
  public $performanceReport;
  public $pretargetingConfig;
  public $products;
  public $proposals;
  public $pubprofiles;

  /**
   * Constructs the internal representation of the AdExchangeBuyer service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'adexchangebuyer/v1.4/';
    $this->batchPath = 'batch/adexchangebuyer/v1.4';
    $this->version = 'v1.4';
    $this->serviceName = 'adexchangebuyer';

    $this->accounts = new AdExchangeBuyer\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'get' => [
              'path' => 'accounts/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'patch' => [
              'path' => 'accounts/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'confirmUnsafeAccountChange' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'accounts/{id}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'confirmUnsafeAccountChange' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->billingInfo = new AdExchangeBuyer\Resource\BillingInfo(
        $this,
        $this->serviceName,
        'billingInfo',
        [
          'methods' => [
            'get' => [
              'path' => 'billinginfo/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'billinginfo',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->budget = new AdExchangeBuyer\Resource\Budget(
        $this,
        $this->serviceName,
        'budget',
        [
          'methods' => [
            'get' => [
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'billinginfo/{accountId}/{billingId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'billingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->creatives = new AdExchangeBuyer\Resource\Creatives(
        $this,
        $this->serviceName,
        'creatives',
        [
          'methods' => [
            'addDeal' => [
              'path' => 'creatives/{accountId}/{buyerCreativeId}/addDeal/{dealId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'buyerCreativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dealId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'creatives/{accountId}/{buyerCreativeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'buyerCreativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'creatives',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'creatives',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'query',
                  'type' => 'integer',
                  'repeated' => true,
                ],
                'buyerCreativeId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'dealsStatusFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'openAuctionStatusFilter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'listDeals' => [
              'path' => 'creatives/{accountId}/{buyerCreativeId}/listDeals',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'buyerCreativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'removeDeal' => [
              'path' => 'creatives/{accountId}/{buyerCreativeId}/removeDeal/{dealId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
                'buyerCreativeId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'dealId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->marketplacedeals = new AdExchangeBuyer\Resource\Marketplacedeals(
        $this,
        $this->serviceName,
        'marketplacedeals',
        [
          'methods' => [
            'delete' => [
              'path' => 'proposals/{proposalId}/deals/delete',
              'httpMethod' => 'POST',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'proposals/{proposalId}/deals/insert',
              'httpMethod' => 'POST',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'proposals/{proposalId}/deals',
              'httpMethod' => 'GET',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pqlQuery' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'proposals/{proposalId}/deals/update',
              'httpMethod' => 'POST',
              'parameters' => [
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
    $this->marketplacenotes = new AdExchangeBuyer\Resource\Marketplacenotes(
        $this,
        $this->serviceName,
        'marketplacenotes',
        [
          'methods' => [
            'insert' => [
              'path' => 'proposals/{proposalId}/notes/insert',
              'httpMethod' => 'POST',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'proposals/{proposalId}/notes',
              'httpMethod' => 'GET',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pqlQuery' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->marketplaceprivateauction = new AdExchangeBuyer\Resource\Marketplaceprivateauction(
        $this,
        $this->serviceName,
        'marketplaceprivateauction',
        [
          'methods' => [
            'updateproposal' => [
              'path' => 'privateauction/{privateAuctionId}/updateproposal',
              'httpMethod' => 'POST',
              'parameters' => [
                'privateAuctionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->performanceReport = new AdExchangeBuyer\Resource\PerformanceReport(
        $this,
        $this->serviceName,
        'performanceReport',
        [
          'methods' => [
            'list' => [
              'path' => 'performancereport',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDateTime' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'startDateTime' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
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
    $this->pretargetingConfig = new AdExchangeBuyer\Resource\PretargetingConfig(
        $this,
        $this->serviceName,
        'pretargetingConfig',
        [
          'methods' => [
            'delete' => [
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'pretargetingconfigs/{accountId}',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'pretargetingconfigs/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'pretargetingconfigs/{accountId}/{configId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->products = new AdExchangeBuyer\Resource\Products(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'get' => [
              'path' => 'products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'products/search',
              'httpMethod' => 'GET',
              'parameters' => [
                'pqlQuery' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->proposals = new AdExchangeBuyer\Resource\Proposals(
        $this,
        $this->serviceName,
        'proposals',
        [
          'methods' => [
            'get' => [
              'path' => 'proposals/{proposalId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'proposals/insert',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'patch' => [
              'path' => 'proposals/{proposalId}/{revisionNumber}/{updateAction}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revisionNumber' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateAction' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'search' => [
              'path' => 'proposals/search',
              'httpMethod' => 'GET',
              'parameters' => [
                'pqlQuery' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'setupcomplete' => [
              'path' => 'proposals/{proposalId}/setupcomplete',
              'httpMethod' => 'POST',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'proposals/{proposalId}/{revisionNumber}/{updateAction}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'proposalId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revisionNumber' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateAction' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->pubprofiles = new AdExchangeBuyer\Resource\Pubprofiles(
        $this,
        $this->serviceName,
        'pubprofiles',
        [
          'methods' => [
            'list' => [
              'path' => 'publisher/{accountId}/profiles',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'integer',
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
class_alias(AdExchangeBuyer::class, 'Google_Service_AdExchangeBuyer');
