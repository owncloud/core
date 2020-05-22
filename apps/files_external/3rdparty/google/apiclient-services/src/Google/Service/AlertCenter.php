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
 * Service definition for AlertCenter (v1beta1).
 *
 * <p>
 * Manages alerts on issues affecting your domain.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/alertcenter/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_AlertCenter extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://alertcenter.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta1';
    $this->serviceName = 'alertcenter';

    $this->alerts = new Google_Service_AlertCenter_Resource_Alerts(
        $this,
        $this->serviceName,
        'alerts',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'v1beta1/alerts:batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'batchUndelete' => array(
              'path' => 'v1beta1/alerts:batchUndelete',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'v1beta1/alerts/{alertId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta1/alerts/{alertId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'getMetadata' => array(
              'path' => 'v1beta1/alerts/{alertId}/metadata',
              'httpMethod' => 'GET',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/alerts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'undelete' => array(
              'path' => 'v1beta1/alerts/{alertId}:undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->alerts_feedback = new Google_Service_AlertCenter_Resource_AlertsFeedback(
        $this,
        $this->serviceName,
        'feedback',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta1/alerts/{alertId}/feedback',
              'httpMethod' => 'POST',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta1/alerts/{alertId}/feedback',
              'httpMethod' => 'GET',
              'parameters' => array(
                'alertId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->v1beta1 = new Google_Service_AlertCenter_Resource_V1beta1(
        $this,
        $this->serviceName,
        'v1beta1',
        array(
          'methods' => array(
            'getSettings' => array(
              'path' => 'v1beta1/settings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'updateSettings' => array(
              'path' => 'v1beta1/settings',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
