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
 * Service definition for PaymentsResellerSubscription (v1).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/payments/reseller/subscription/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_PaymentsResellerSubscription extends Google_Service
{


  public $partners_products;
  public $partners_promotions;
  public $partners_subscriptions;

  /**
   * Constructs the internal representation of the PaymentsResellerSubscription
   * service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://paymentsresellersubscription.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'paymentsresellersubscription';

    $this->partners_products = new Google_Service_PaymentsResellerSubscription_Resource_PartnersProducts(
        $this,
        $this->serviceName,
        'products',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/products',
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
    $this->partners_promotions = new Google_Service_PaymentsResellerSubscription_Resource_PartnersPromotions(
        $this,
        $this->serviceName,
        'promotions',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/{+parent}/promotions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
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
    $this->partners_subscriptions = new Google_Service_PaymentsResellerSubscription_Resource_PartnersSubscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        array(
          'methods' => array(
            'cancel' => array(
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'v1/{+parent}/subscriptions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'entitle' => array(
              'path' => 'v1/{+name}:entitle',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'extend' => array(
              'path' => 'v1/{+name}:extend',
              'httpMethod' => 'POST',
              'parameters' => array(
                'name' => array(
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
            ),'provision' => array(
              'path' => 'v1/{+parent}/subscriptions:provision',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'subscriptionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'undoCancel' => array(
              'path' => 'v1/{+name}:undoCancel',
              'httpMethod' => 'POST',
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
