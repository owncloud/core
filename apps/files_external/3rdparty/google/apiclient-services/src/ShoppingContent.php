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
 * Service definition for ShoppingContent (v2.1).
 *
 * <p>
 * Manage your product listings and accounts for Google Shopping</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/shopping-content/v2/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ShoppingContent extends \Google\Service
{
  /** Manage your product listings and accounts for Google Shopping. */
  const CONTENT =
      "https://www.googleapis.com/auth/content";

  public $accounts;
  public $accounts_credentials;
  public $accounts_labels;
  public $accounts_returncarrier;
  public $accountstatuses;
  public $accounttax;
  public $buyongoogleprograms;
  public $collections;
  public $collectionstatuses;
  public $csses;
  public $datafeeds;
  public $datafeedstatuses;
  public $freelistingsprogram;
  public $liasettings;
  public $localinventory;
  public $orderinvoices;
  public $orderreports;
  public $orderreturns;
  public $orderreturns_labels;
  public $orders;
  public $ordertrackingsignals;
  public $pos;
  public $products;
  public $productstatuses;
  public $productstatuses_repricingreports;
  public $promotions;
  public $pubsubnotificationsettings;
  public $regionalinventory;
  public $regions;
  public $reports;
  public $repricingrules;
  public $repricingrules_repricingreports;
  public $returnaddress;
  public $returnpolicy;
  public $returnpolicyonline;
  public $settlementreports;
  public $settlementtransactions;
  public $shippingsettings;
  public $shoppingadsprogram;

  /**
   * Constructs the internal representation of the ShoppingContent service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://shoppingcontent.googleapis.com/';
    $this->servicePath = 'content/v2.1/';
    $this->batchPath = 'batch';
    $this->version = 'v2.1';
    $this->serviceName = 'content';

    $this->accounts = new ShoppingContent\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'authinfo' => [
              'path' => 'accounts/authinfo',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'claimwebsite' => [
              'path' => '{merchantId}/accounts/{accountId}/claimwebsite',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'overwrite' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'custombatch' => [
              'path' => 'accounts/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'force' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'view' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => '{merchantId}/accounts',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'link' => [
              'path' => '{merchantId}/accounts/{accountId}/link',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
              'path' => '{merchantId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'label' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
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
            ],'listlinks' => [
              'path' => '{merchantId}/accounts/{accountId}/listlinks',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
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
            ],'requestphoneverification' => [
              'path' => '{merchantId}/accounts/{accountId}/requestphoneverification',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
            ],'update' => [
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
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
            ],'updatelabels' => [
              'path' => '{merchantId}/accounts/{accountId}/updatelabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
            ],'verifyphonenumber' => [
              'path' => '{merchantId}/accounts/{accountId}/verifyphonenumber',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->accounts_credentials = new ShoppingContent\Resource\AccountsCredentials(
        $this,
        $this->serviceName,
        'credentials',
        [
          'methods' => [
            'create' => [
              'path' => 'accounts/{accountId}/credentials',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_labels = new ShoppingContent\Resource\AccountsLabels(
        $this,
        $this->serviceName,
        'labels',
        [
          'methods' => [
            'create' => [
              'path' => 'accounts/{accountId}/labels',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'accounts/{accountId}/labels/{labelId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'labelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts/{accountId}/labels',
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
            ],'patch' => [
              'path' => 'accounts/{accountId}/labels/{labelId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'labelId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_returncarrier = new ShoppingContent\Resource\AccountsReturncarrier(
        $this,
        $this->serviceName,
        'returncarrier',
        [
          'methods' => [
            'create' => [
              'path' => 'accounts/{accountId}/returncarrier',
              'httpMethod' => 'POST',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'accounts/{accountId}/returncarrier/{carrierAccountId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'carrierAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'accounts/{accountId}/returncarrier',
              'httpMethod' => 'GET',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'accounts/{accountId}/returncarrier/{carrierAccountId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'carrierAccountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->accountstatuses = new ShoppingContent\Resource\Accountstatuses(
        $this,
        $this->serviceName,
        'accountstatuses',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'accountstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/accountstatuses/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destinations' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/accountstatuses',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destinations' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->accounttax = new ShoppingContent\Resource\Accounttax(
        $this,
        $this->serviceName,
        'accounttax',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'accounttax/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/accounttax/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
              'path' => '{merchantId}/accounttax',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
            ],'update' => [
              'path' => '{merchantId}/accounttax/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->buyongoogleprograms = new ShoppingContent\Resource\Buyongoogleprograms(
        $this,
        $this->serviceName,
        'buyongoogleprograms',
        [
          'methods' => [
            'activate' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}/activate',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'onboard' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}/onboard',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'pause' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}/pause',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'requestreview' => [
              'path' => '{merchantId}/buyongoogleprograms/{regionCode}/requestreview',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->collections = new ShoppingContent\Resource\Collections(
        $this,
        $this->serviceName,
        'collections',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/collections',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => '{merchantId}/collections/{collectionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/collections/{collectionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/collections',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
    $this->collectionstatuses = new ShoppingContent\Resource\Collectionstatuses(
        $this,
        $this->serviceName,
        'collectionstatuses',
        [
          'methods' => [
            'get' => [
              'path' => '{merchantId}/collectionstatuses/{collectionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'collectionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/collectionstatuses',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
    $this->csses = new ShoppingContent\Resource\Csses(
        $this,
        $this->serviceName,
        'csses',
        [
          'methods' => [
            'get' => [
              'path' => '{cssGroupId}/csses/{cssDomainId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'cssGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'cssDomainId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{cssGroupId}/csses',
              'httpMethod' => 'GET',
              'parameters' => [
                'cssGroupId' => [
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
            ],'updatelabels' => [
              'path' => '{cssGroupId}/csses/{cssDomainId}/updatelabels',
              'httpMethod' => 'POST',
              'parameters' => [
                'cssGroupId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'cssDomainId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->datafeeds = new ShoppingContent\Resource\Datafeeds(
        $this,
        $this->serviceName,
        'datafeeds',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'datafeeds/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datafeedId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'fetchnow' => [
              'path' => '{merchantId}/datafeeds/{datafeedId}/fetchNow',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datafeedId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datafeedId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => '{merchantId}/datafeeds',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/datafeeds',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
            ],'update' => [
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datafeedId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->datafeedstatuses = new ShoppingContent\Resource\Datafeedstatuses(
        $this,
        $this->serviceName,
        'datafeedstatuses',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'datafeedstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/datafeedstatuses/{datafeedId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'datafeedId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/datafeedstatuses',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
    $this->freelistingsprogram = new ShoppingContent\Resource\Freelistingsprogram(
        $this,
        $this->serviceName,
        'freelistingsprogram',
        [
          'methods' => [
            'get' => [
              'path' => '{merchantId}/freelistingsprogram',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'requestreview' => [
              'path' => '{merchantId}/freelistingsprogram/requestreview',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->liasettings = new ShoppingContent\Resource\Liasettings(
        $this,
        $this->serviceName,
        'liasettings',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'liasettings/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/liasettings/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
            ],'getaccessiblegmbaccounts' => [
              'path' => '{merchantId}/liasettings/{accountId}/accessiblegmbaccounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
              'path' => '{merchantId}/liasettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
            ],'listposdataproviders' => [
              'path' => 'liasettings/posdataproviders',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'requestgmbaccess' => [
              'path' => '{merchantId}/liasettings/{accountId}/requestgmbaccess',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'gmbEmail' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'requestinventoryverification' => [
              'path' => '{merchantId}/liasettings/{accountId}/requestinventoryverification/{country}',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setinventoryverificationcontact' => [
              'path' => '{merchantId}/liasettings/{accountId}/setinventoryverificationcontact',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'contactName' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'contactEmail' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setposdataprovider' => [
              'path' => '{merchantId}/liasettings/{accountId}/setposdataprovider',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'accountId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'posDataProviderId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'posExternalAccountId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => '{merchantId}/liasettings/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->localinventory = new ShoppingContent\Resource\Localinventory(
        $this,
        $this->serviceName,
        'localinventory',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'localinventory/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'insert' => [
              'path' => '{merchantId}/products/{productId}/localinventory',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->orderinvoices = new ShoppingContent\Resource\Orderinvoices(
        $this,
        $this->serviceName,
        'orderinvoices',
        [
          'methods' => [
            'createchargeinvoice' => [
              'path' => '{merchantId}/orderinvoices/{orderId}/createChargeInvoice',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createrefundinvoice' => [
              'path' => '{merchantId}/orderinvoices/{orderId}/createRefundInvoice',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->orderreports = new ShoppingContent\Resource\Orderreports(
        $this,
        $this->serviceName,
        'orderreports',
        [
          'methods' => [
            'listdisbursements' => [
              'path' => '{merchantId}/orderreports/disbursements',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disbursementEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'disbursementStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
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
            ],'listtransactions' => [
              'path' => '{merchantId}/orderreports/disbursements/{disbursementId}/transactions',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'disbursementId' => [
                  'location' => 'path',
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
                'transactionEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'transactionStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->orderreturns = new ShoppingContent\Resource\Orderreturns(
        $this,
        $this->serviceName,
        'orderreturns',
        [
          'methods' => [
            'acknowledge' => [
              'path' => '{merchantId}/orderreturns/{returnId}/acknowledge',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createorderreturn' => [
              'path' => '{merchantId}/orderreturns/createOrderReturn',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/orderreturns/{returnId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/orderreturns',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acknowledged' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'createdEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'createdStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'googleOrderIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'shipmentStates' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'shipmentStatus' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'shipmentTrackingNumbers' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'shipmentTypes' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'process' => [
              'path' => '{merchantId}/orderreturns/{returnId}/process',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->orderreturns_labels = new ShoppingContent\Resource\OrderreturnsLabels(
        $this,
        $this->serviceName,
        'labels',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/orderreturns/{returnId}/labels',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->orders = new ShoppingContent\Resource\Orders(
        $this,
        $this->serviceName,
        'orders',
        [
          'methods' => [
            'acknowledge' => [
              'path' => '{merchantId}/orders/{orderId}/acknowledge',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'advancetestorder' => [
              'path' => '{merchantId}/testorders/{orderId}/advance',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancel' => [
              'path' => '{merchantId}/orders/{orderId}/cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancellineitem' => [
              'path' => '{merchantId}/orders/{orderId}/cancelLineItem',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'canceltestorderbycustomer' => [
              'path' => '{merchantId}/testorders/{orderId}/cancelByCustomer',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'captureOrder' => [
              'path' => '{merchantId}/orders/{orderId}/captureOrder',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createtestorder' => [
              'path' => '{merchantId}/testorders',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'createtestreturn' => [
              'path' => '{merchantId}/orders/{orderId}/testreturn',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/orders/{orderId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getbymerchantorderid' => [
              'path' => '{merchantId}/ordersbymerchantid/{merchantOrderId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'merchantOrderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'gettestordertemplate' => [
              'path' => '{merchantId}/testordertemplates/{templateName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'templateName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'instorerefundlineitem' => [
              'path' => '{merchantId}/orders/{orderId}/inStoreRefundLineItem',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/orders',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acknowledged' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placedDateEnd' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'placedDateStart' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'statuses' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'refunditem' => [
              'path' => '{merchantId}/orders/{orderId}/refunditem',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'refundorder' => [
              'path' => '{merchantId}/orders/{orderId}/refundorder',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'rejectreturnlineitem' => [
              'path' => '{merchantId}/orders/{orderId}/rejectReturnLineItem',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'returnrefundlineitem' => [
              'path' => '{merchantId}/orders/{orderId}/returnRefundLineItem',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setlineitemmetadata' => [
              'path' => '{merchantId}/orders/{orderId}/setLineItemMetadata',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'shiplineitems' => [
              'path' => '{merchantId}/orders/{orderId}/shipLineItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updatelineitemshippingdetails' => [
              'path' => '{merchantId}/orders/{orderId}/updateLineItemShippingDetails',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updatemerchantorderid' => [
              'path' => '{merchantId}/orders/{orderId}/updateMerchantOrderId',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'updateshipment' => [
              'path' => '{merchantId}/orders/{orderId}/updateShipment',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orderId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->ordertrackingsignals = new ShoppingContent\Resource\Ordertrackingsignals(
        $this,
        $this->serviceName,
        'ordertrackingsignals',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/ordertrackingsignals',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->pos = new ShoppingContent\Resource\Pos(
        $this,
        $this->serviceName,
        'pos',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'pos/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/store/{storeCode}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'storeCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/store/{storeCode}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'storeCode' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/store',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'inventory' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/inventory',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/store',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'sale' => [
              'path' => '{merchantId}/pos/{targetMerchantId}/sale',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'targetMerchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->products = new ShoppingContent\Resource\Products(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'products/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/products/{productId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'feedId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
            ],'insert' => [
              'path' => '{merchantId}/products',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'feedId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/products',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
            ],'update' => [
              'path' => '{merchantId}/products/{productId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
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
    $this->productstatuses = new ShoppingContent\Resource\Productstatuses(
        $this,
        $this->serviceName,
        'productstatuses',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'productstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/productstatuses/{productId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destinations' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/productstatuses',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'destinations' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
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
    $this->productstatuses_repricingreports = new ShoppingContent\Resource\ProductstatusesRepricingreports(
        $this,
        $this->serviceName,
        'repricingreports',
        [
          'methods' => [
            'list' => [
              'path' => '{merchantId}/productstatuses/{productId}/repricingreports',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
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
                'ruleId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->promotions = new ShoppingContent\Resource\Promotions(
        $this,
        $this->serviceName,
        'promotions',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/promotions',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->pubsubnotificationsettings = new ShoppingContent\Resource\Pubsubnotificationsettings(
        $this,
        $this->serviceName,
        'pubsubnotificationsettings',
        [
          'methods' => [
            'get' => [
              'path' => '{merchantId}/pubsubnotificationsettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => '{merchantId}/pubsubnotificationsettings',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->regionalinventory = new ShoppingContent\Resource\Regionalinventory(
        $this,
        $this->serviceName,
        'regionalinventory',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'regionalinventory/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'insert' => [
              'path' => '{merchantId}/products/{productId}/regionalinventory',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->regions = new ShoppingContent\Resource\Regions(
        $this,
        $this->serviceName,
        'regions',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/regions',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => '{merchantId}/regions/{regionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/regions/{regionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/regions',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
              'path' => '{merchantId}/regions/{regionId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'regionId' => [
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
    $this->reports = new ShoppingContent\Resource\Reports(
        $this,
        $this->serviceName,
        'reports',
        [
          'methods' => [
            'search' => [
              'path' => '{merchantId}/reports/search',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->repricingrules = new ShoppingContent\Resource\Repricingrules(
        $this,
        $this->serviceName,
        'repricingrules',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/repricingrules',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => '{merchantId}/repricingrules/{ruleId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/repricingrules/{ruleId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/repricingrules',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'countryCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'languageCode' => [
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
              'path' => '{merchantId}/repricingrules/{ruleId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->repricingrules_repricingreports = new ShoppingContent\Resource\RepricingrulesRepricingreports(
        $this,
        $this->serviceName,
        'repricingreports',
        [
          'methods' => [
            'list' => [
              'path' => '{merchantId}/repricingrules/{ruleId}/repricingreports',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'ruleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'endDate' => [
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
                'startDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->returnaddress = new ShoppingContent\Resource\Returnaddress(
        $this,
        $this->serviceName,
        'returnaddress',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'returnaddress/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/returnaddress/{returnAddressId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnAddressId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/returnaddress/{returnAddressId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnAddressId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => '{merchantId}/returnaddress',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/returnaddress',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'country' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->returnpolicy = new ShoppingContent\Resource\Returnpolicy(
        $this,
        $this->serviceName,
        'returnpolicy',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'returnpolicy/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => '{merchantId}/returnpolicy/{returnPolicyId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnPolicyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/returnpolicy/{returnPolicyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnPolicyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => '{merchantId}/returnpolicy',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/returnpolicy',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->returnpolicyonline = new ShoppingContent\Resource\Returnpolicyonline(
        $this,
        $this->serviceName,
        'returnpolicyonline',
        [
          'methods' => [
            'create' => [
              'path' => '{merchantId}/returnpolicyonline',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => '{merchantId}/returnpolicyonline/{returnPolicyId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnPolicyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => '{merchantId}/returnpolicyonline/{returnPolicyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnPolicyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/returnpolicyonline',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => '{merchantId}/returnpolicyonline/{returnPolicyId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'returnPolicyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->settlementreports = new ShoppingContent\Resource\Settlementreports(
        $this,
        $this->serviceName,
        'settlementreports',
        [
          'methods' => [
            'get' => [
              'path' => '{merchantId}/settlementreports/{settlementId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'settlementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/settlementreports',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
                'transferEndDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'transferStartDate' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->settlementtransactions = new ShoppingContent\Resource\Settlementtransactions(
        $this,
        $this->serviceName,
        'settlementtransactions',
        [
          'methods' => [
            'list' => [
              'path' => '{merchantId}/settlementreports/{settlementId}/transactions',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'settlementId' => [
                  'location' => 'path',
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
                'transactionIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->shippingsettings = new ShoppingContent\Resource\Shippingsettings(
        $this,
        $this->serviceName,
        'shippingsettings',
        [
          'methods' => [
            'custombatch' => [
              'path' => 'shippingsettings/batch',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => '{merchantId}/shippingsettings/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
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
            ],'getsupportedcarriers' => [
              'path' => '{merchantId}/supportedCarriers',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getsupportedholidays' => [
              'path' => '{merchantId}/supportedHolidays',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getsupportedpickupservices' => [
              'path' => '{merchantId}/supportedPickupServices',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => '{merchantId}/shippingsettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
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
            ],'update' => [
              'path' => '{merchantId}/shippingsettings/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'merchantId' => [
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
            ],
          ]
        ]
    );
    $this->shoppingadsprogram = new ShoppingContent\Resource\Shoppingadsprogram(
        $this,
        $this->serviceName,
        'shoppingadsprogram',
        [
          'methods' => [
            'get' => [
              'path' => '{merchantId}/shoppingadsprogram',
              'httpMethod' => 'GET',
              'parameters' => [
                'merchantId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'requestreview' => [
              'path' => '{merchantId}/shoppingadsprogram/requestreview',
              'httpMethod' => 'POST',
              'parameters' => [
                'merchantId' => [
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
class_alias(ShoppingContent::class, 'Google_Service_ShoppingContent');
