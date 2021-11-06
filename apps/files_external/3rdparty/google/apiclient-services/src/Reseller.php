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
 * Service definition for Reseller (v1).
 *
 * <p>
 * Perform common functions that are available on the Channel Services console
 * at scale, like placing orders and viewing customer information</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/reseller/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Reseller extends \Google\Service
{
  /** Manage users on your domain. */
  const APPS_ORDER =
      "https://www.googleapis.com/auth/apps.order";
  /** Manage users on your domain. */
  const APPS_ORDER_READONLY =
      "https://www.googleapis.com/auth/apps.order.readonly";

  public $customers;
  public $resellernotify;
  public $subscriptions;

  /**
   * Constructs the internal representation of the Reseller service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://reseller.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'reseller';

    $this->customers = new Reseller\Resource\Customers(
        $this,
        $this->serviceName,
        'customers',
        [
          'methods' => [
            'get' => [
              'path' => 'apps/reseller/v1/customers/{customerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'apps/reseller/v1/customers',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerAuthToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'apps/reseller/v1/customers/{customerId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'apps/reseller/v1/customers/{customerId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->resellernotify = new Reseller\Resource\Resellernotify(
        $this,
        $this->serviceName,
        'resellernotify',
        [
          'methods' => [
            'getwatchdetails' => [
              'path' => 'apps/reseller/v1/resellernotify/getwatchdetails',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],'register' => [
              'path' => 'apps/reseller/v1/resellernotify/register',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceAccountEmailAddress' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'unregister' => [
              'path' => 'apps/reseller/v1/resellernotify/unregister',
              'httpMethod' => 'POST',
              'parameters' => [
                'serviceAccountEmailAddress' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->subscriptions = new Reseller\Resource\Subscriptions(
        $this,
        $this->serviceName,
        'subscriptions',
        [
          'methods' => [
            'activate' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/activate',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'changePlan' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/changePlan',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'changeRenewalSettings' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/changeRenewalSettings',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'changeSeats' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/changeSeats',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deletionType' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerAuthToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'apps/reseller/v1/subscriptions',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerAuthToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'customerNamePrefix' => [
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
            ],'startPaidService' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/startPaidService',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'suspend' => [
              'path' => 'apps/reseller/v1/customers/{customerId}/subscriptions/{subscriptionId}/suspend',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'subscriptionId' => [
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
class_alias(Reseller::class, 'Google_Service_Reseller');
