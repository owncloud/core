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
 * Service definition for ShoppingContent (v2.1).
 *
 * <p>
 * Manages product items, inventory, and Merchant Center accounts for Google
 * Shopping.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/shopping-content" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_ShoppingContent extends Google_Service
{
  /** Manage your product listings and accounts for Google Shopping. */
  const CONTENT =
      "https://www.googleapis.com/auth/content";

  public $accounts;
  public $accountstatuses;
  public $accounttax;
  public $datafeeds;
  public $datafeedstatuses;
  public $liasettings;
  public $localinventory;
  public $orderinvoices;
  public $orderreports;
  public $orderreturns;
  public $orders;
  public $pos;
  public $products;
  public $productstatuses;
  public $pubsubnotificationsettings;
  public $regionalinventory;
  public $returnaddress;
  public $returnpolicy;
  public $settlementreports;
  public $settlementtransactions;
  public $shippingsettings;
  
  /**
   * Constructs the internal representation of the ShoppingContent service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'content/v2.1/';
    $this->batchPath = 'batch/content/v2.1';
    $this->version = 'v2.1';
    $this->serviceName = 'content';

    $this->accounts = new Google_Service_ShoppingContent_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'authinfo' => array(
              'path' => 'accounts/authinfo',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'claimwebsite' => array(
              'path' => '{merchantId}/accounts/{accountId}/claimwebsite',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'overwrite' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'custombatch' => array(
              'path' => 'accounts/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'force' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
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
            ),'insert' => array(
              'path' => '{merchantId}/accounts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'link' => array(
              'path' => '{merchantId}/accounts/{accountId}/link',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
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
              'path' => '{merchantId}/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listlinks' => array(
              'path' => '{merchantId}/accounts/{accountId}/listlinks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/accounts/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
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
            ),
          )
        )
    );
    $this->accountstatuses = new Google_Service_ShoppingContent_Resource_Accountstatuses(
        $this,
        $this->serviceName,
        'accountstatuses',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'accountstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/accountstatuses/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/accountstatuses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
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
    $this->accounttax = new Google_Service_ShoppingContent_Resource_Accounttax(
        $this,
        $this->serviceName,
        'accounttax',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'accounttax/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/accounttax/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
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
              'path' => '{merchantId}/accounttax',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/accounttax/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
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
            ),
          )
        )
    );
    $this->datafeeds = new Google_Service_ShoppingContent_Resource_Datafeeds(
        $this,
        $this->serviceName,
        'datafeeds',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'datafeeds/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datafeedId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'fetchnow' => array(
              'path' => '{merchantId}/datafeeds/{datafeedId}/fetchNow',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datafeedId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datafeedId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{merchantId}/datafeeds',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/datafeeds',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/datafeeds/{datafeedId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datafeedId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->datafeedstatuses = new Google_Service_ShoppingContent_Resource_Datafeedstatuses(
        $this,
        $this->serviceName,
        'datafeedstatuses',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'datafeedstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/datafeedstatuses/{datafeedId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'datafeedId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/datafeedstatuses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
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
    $this->liasettings = new Google_Service_ShoppingContent_Resource_Liasettings(
        $this,
        $this->serviceName,
        'liasettings',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'liasettings/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/liasettings/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
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
            ),'getaccessiblegmbaccounts' => array(
              'path' => '{merchantId}/liasettings/{accountId}/accessiblegmbaccounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
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
              'path' => '{merchantId}/liasettings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listposdataproviders' => array(
              'path' => 'liasettings/posdataproviders',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'requestgmbaccess' => array(
              'path' => '{merchantId}/liasettings/{accountId}/requestgmbaccess',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'gmbEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'requestinventoryverification' => array(
              'path' => '{merchantId}/liasettings/{accountId}/requestinventoryverification/{country}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setinventoryverificationcontact' => array(
              'path' => '{merchantId}/liasettings/{accountId}/setinventoryverificationcontact',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'contactEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'contactName' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'language' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setposdataprovider' => array(
              'path' => '{merchantId}/liasettings/{accountId}/setposdataprovider',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accountId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'posDataProviderId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'posExternalAccountId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/liasettings/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
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
            ),
          )
        )
    );
    $this->localinventory = new Google_Service_ShoppingContent_Resource_Localinventory(
        $this,
        $this->serviceName,
        'localinventory',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'localinventory/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'insert' => array(
              'path' => '{merchantId}/products/{productId}/localinventory',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orderinvoices = new Google_Service_ShoppingContent_Resource_Orderinvoices(
        $this,
        $this->serviceName,
        'orderinvoices',
        array(
          'methods' => array(
            'createchargeinvoice' => array(
              'path' => '{merchantId}/orderinvoices/{orderId}/createChargeInvoice',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'createrefundinvoice' => array(
              'path' => '{merchantId}/orderinvoices/{orderId}/createRefundInvoice',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orderreports = new Google_Service_ShoppingContent_Resource_Orderreports(
        $this,
        $this->serviceName,
        'orderreports',
        array(
          'methods' => array(
            'listdisbursements' => array(
              'path' => '{merchantId}/orderreports/disbursements',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'disbursementStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'disbursementEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'listtransactions' => array(
              'path' => '{merchantId}/orderreports/disbursements/{disbursementId}/transactions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'disbursementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'transactionStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'transactionEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->orderreturns = new Google_Service_ShoppingContent_Resource_Orderreturns(
        $this,
        $this->serviceName,
        'orderreturns',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => '{merchantId}/orderreturns/{returnId}/acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/orderreturns/{returnId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/orderreturns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acknowledged' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'createdEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'googleOrderIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'shipmentStates' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'shipmentStatus' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'shipmentTrackingNumbers' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'shipmentTypes' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'process' => array(
              'path' => '{merchantId}/orderreturns/{returnId}/process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->orders = new Google_Service_ShoppingContent_Resource_Orders(
        $this,
        $this->serviceName,
        'orders',
        array(
          'methods' => array(
            'acknowledge' => array(
              'path' => '{merchantId}/orders/{orderId}/acknowledge',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'advancetestorder' => array(
              'path' => '{merchantId}/testorders/{orderId}/advance',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'cancel' => array(
              'path' => '{merchantId}/orders/{orderId}/cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'cancellineitem' => array(
              'path' => '{merchantId}/orders/{orderId}/cancelLineItem',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'canceltestorderbycustomer' => array(
              'path' => '{merchantId}/testorders/{orderId}/cancelByCustomer',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'createtestorder' => array(
              'path' => '{merchantId}/testorders',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'createtestreturn' => array(
              'path' => '{merchantId}/orders/{orderId}/testreturn',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/orders/{orderId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getbymerchantorderid' => array(
              'path' => '{merchantId}/ordersbymerchantid/{merchantOrderId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'merchantOrderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'gettestordertemplate' => array(
              'path' => '{merchantId}/testordertemplates/{templateName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'templateName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'instorerefundlineitem' => array(
              'path' => '{merchantId}/orders/{orderId}/inStoreRefundLineItem',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/orders',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'acknowledged' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placedDateEnd' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'placedDateStart' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'statuses' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'rejectreturnlineitem' => array(
              'path' => '{merchantId}/orders/{orderId}/rejectReturnLineItem',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'returnrefundlineitem' => array(
              'path' => '{merchantId}/orders/{orderId}/returnRefundLineItem',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setlineitemmetadata' => array(
              'path' => '{merchantId}/orders/{orderId}/setLineItemMetadata',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'shiplineitems' => array(
              'path' => '{merchantId}/orders/{orderId}/shipLineItems',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updatelineitemshippingdetails' => array(
              'path' => '{merchantId}/orders/{orderId}/updateLineItemShippingDetails',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updatemerchantorderid' => array(
              'path' => '{merchantId}/orders/{orderId}/updateMerchantOrderId',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'updateshipment' => array(
              'path' => '{merchantId}/orders/{orderId}/updateShipment',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->pos = new Google_Service_ShoppingContent_Resource_Pos(
        $this,
        $this->serviceName,
        'pos',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'pos/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/store/{storeCode}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'storeCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/store/{storeCode}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'storeCode' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/store',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'inventory' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/inventory',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/store',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'sale' => array(
              'path' => '{merchantId}/pos/{targetMerchantId}/sale',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetMerchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->products = new Google_Service_ShoppingContent_Resource_Products(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'products/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/products/{productId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{merchantId}/products',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'feedId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/products',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
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
    $this->productstatuses = new Google_Service_ShoppingContent_Resource_Productstatuses(
        $this,
        $this->serviceName,
        'productstatuses',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'productstatuses/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/productstatuses/{productId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/productstatuses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'destinations' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'maxResults' => array(
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
    $this->pubsubnotificationsettings = new Google_Service_ShoppingContent_Resource_Pubsubnotificationsettings(
        $this,
        $this->serviceName,
        'pubsubnotificationsettings',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{merchantId}/pubsubnotificationsettings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/pubsubnotificationsettings',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->regionalinventory = new Google_Service_ShoppingContent_Resource_Regionalinventory(
        $this,
        $this->serviceName,
        'regionalinventory',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'regionalinventory/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'insert' => array(
              'path' => '{merchantId}/products/{productId}/regionalinventory',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'productId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->returnaddress = new Google_Service_ShoppingContent_Resource_Returnaddress(
        $this,
        $this->serviceName,
        'returnaddress',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'returnaddress/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/returnaddress/{returnAddressId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnAddressId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/returnaddress/{returnAddressId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnAddressId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{merchantId}/returnaddress',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/returnaddress',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'country' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
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
    $this->returnpolicy = new Google_Service_ShoppingContent_Resource_Returnpolicy(
        $this,
        $this->serviceName,
        'returnpolicy',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'returnpolicy/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => '{merchantId}/returnpolicy/{returnPolicyId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnPolicyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{merchantId}/returnpolicy/{returnPolicyId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'returnPolicyId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{merchantId}/returnpolicy',
              'httpMethod' => 'POST',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/returnpolicy',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->settlementreports = new Google_Service_ShoppingContent_Resource_Settlementreports(
        $this,
        $this->serviceName,
        'settlementreports',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{merchantId}/settlementreports/{settlementId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'settlementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/settlementreports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'transferEndDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'transferStartDate' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->settlementtransactions = new Google_Service_ShoppingContent_Resource_Settlementtransactions(
        $this,
        $this->serviceName,
        'settlementtransactions',
        array(
          'methods' => array(
            'list' => array(
              'path' => '{merchantId}/settlementreports/{settlementId}/transactions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'settlementId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'transactionIds' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->shippingsettings = new Google_Service_ShoppingContent_Resource_Shippingsettings(
        $this,
        $this->serviceName,
        'shippingsettings',
        array(
          'methods' => array(
            'custombatch' => array(
              'path' => 'shippingsettings/batch',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'get' => array(
              'path' => '{merchantId}/shippingsettings/{accountId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
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
            ),'getsupportedcarriers' => array(
              'path' => '{merchantId}/supportedCarriers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getsupportedholidays' => array(
              'path' => '{merchantId}/supportedHolidays',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getsupportedpickupservices' => array(
              'path' => '{merchantId}/supportedPickupServices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{merchantId}/shippingsettings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'merchantId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => '{merchantId}/shippingsettings/{accountId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'merchantId' => array(
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
            ),
          )
        )
    );
  }
}
