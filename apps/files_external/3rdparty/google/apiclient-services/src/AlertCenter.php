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
 * Service definition for AlertCenter (v1beta1).
 *
 * <p>
 * Manages alerts on issues affecting your domain. Note: The current version of
 * this API (v1beta1) is available to all Google Workspace customers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/alertcenter/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AlertCenter extends \Google\Service
{
  /** See and delete your domain's G Suite alerts, and send alert feedback. */
  const APPS_ALERTS =
      "https://www.googleapis.com/auth/apps.alerts";

  public $alerts;
  public $alerts_feedback;
  public $v1beta1;

  /**
   * Constructs the internal representation of the AlertCenter service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://alertcenter.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'alertcenter';

    $this->alerts = new AlertCenter\Resource\Alerts(
        $this,
        $this->serviceName,
        'alerts',
        [
          'methods' => [
            'batchDelete' => [
              'path' => 'v1beta1/alerts:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'batchUndelete' => [
              'path' => 'v1beta1/alerts:batchUndelete',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1beta1/alerts/{alertId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1beta1/alerts/{alertId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getMetadata' => [
              'path' => 'v1beta1/alerts/{alertId}/metadata',
              'httpMethod' => 'GET',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/alerts',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
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
            ],'undelete' => [
              'path' => 'v1beta1/alerts/{alertId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->alerts_feedback = new AlertCenter\Resource\AlertsFeedback(
        $this,
        $this->serviceName,
        'feedback',
        [
          'methods' => [
            'create' => [
              'path' => 'v1beta1/alerts/{alertId}/feedback',
              'httpMethod' => 'POST',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1beta1/alerts/{alertId}/feedback',
              'httpMethod' => 'GET',
              'parameters' => [
                'alertId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->v1beta1 = new AlertCenter\Resource\V1beta1(
        $this,
        $this->serviceName,
        'v1beta1',
        [
          'methods' => [
            'getSettings' => [
              'path' => 'v1beta1/settings',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateSettings' => [
              'path' => 'v1beta1/settings',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerId' => [
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
class_alias(AlertCenter::class, 'Google_Service_AlertCenter');
