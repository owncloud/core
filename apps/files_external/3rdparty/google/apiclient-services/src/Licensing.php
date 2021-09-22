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
 * Service definition for Licensing (v1).
 *
 * <p>
 * The Google Enterprise License Manager API's allows you to license apps for
 * all the users of a domain managed by you.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/licensing/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Licensing extends \Google\Service
{
  /** View and manage G Suite licenses for your domain. */
  const APPS_LICENSING =
      "https://www.googleapis.com/auth/apps.licensing";

  public $licenseAssignments;

  /**
   * Constructs the internal representation of the Licensing service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://licensing.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'licensing';

    $this->licenseAssignments = new Licensing\Resource\LicenseAssignments(
        $this,
        $this->serviceName,
        'licenseAssignments',
        [
          'methods' => [
            'delete' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/user/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
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
            ],'get' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/user/{userId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
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
            ],'insert' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/user',
              'httpMethod' => 'POST',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'listForProduct' => [
              'path' => 'apps/licensing/v1/product/{productId}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
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
            ],'listForProductAndSku' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
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
            ],'patch' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/user/{userId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
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
            ],'update' => [
              'path' => 'apps/licensing/v1/product/{productId}/sku/{skuId}/user/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'skuId' => [
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
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Licensing::class, 'Google_Service_Licensing');
