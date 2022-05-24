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
 * Service definition for DataTransfer (datatransfer_v1).
 *
 * <p>
 * Admin SDK lets administrators of enterprise domains to view and manage
 * resources like user, groups etc. It also provides audit and usage reports of
 * domain.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class DataTransfer extends \Google\Service
{
  /** View and manage data transfers between users in your organization. */
  const ADMIN_DATATRANSFER =
      "https://www.googleapis.com/auth/admin.datatransfer";
  /** View data transfers between users in your organization. */
  const ADMIN_DATATRANSFER_READONLY =
      "https://www.googleapis.com/auth/admin.datatransfer.readonly";

  public $applications;
  public $transfers;

  /**
   * Constructs the internal representation of the DataTransfer service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://admin.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'datatransfer_v1';
    $this->serviceName = 'admin';

    $this->applications = new DataTransfer\Resource\Applications(
        $this,
        $this->serviceName,
        'applications',
        [
          'methods' => [
            'get' => [
              'path' => 'admin/datatransfer/v1/applications/{applicationId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/datatransfer/v1/applications',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
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
    $this->transfers = new DataTransfer\Resource\Transfers(
        $this,
        $this->serviceName,
        'transfers',
        [
          'methods' => [
            'get' => [
              'path' => 'admin/datatransfer/v1/transfers/{dataTransferId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'dataTransferId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/datatransfer/v1/transfers',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'admin/datatransfer/v1/transfers',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'newOwnerUserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'oldOwnerUserId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'status' => [
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
class_alias(DataTransfer::class, 'Google_Service_DataTransfer');
