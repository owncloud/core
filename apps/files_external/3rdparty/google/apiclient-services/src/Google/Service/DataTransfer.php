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
 * Service definition for DataTransfer (datatransfer_v1).
 *
 * <p>
 * Admin SDK lets administrators of enterprise domains to view and manage
 * resources like user, groups etc. It also provides audit and usage reports of
 * domain.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/admin-sdk/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_DataTransfer extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://admin.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'datatransfer_v1';
    $this->serviceName = 'admin';

    $this->applications = new Google_Service_DataTransfer_Resource_Applications(
        $this,
        $this->serviceName,
        'applications',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/datatransfer/v1/applications/{applicationId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'applicationId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/datatransfer/v1/applications',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
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
    $this->transfers = new Google_Service_DataTransfer_Resource_Transfers(
        $this,
        $this->serviceName,
        'transfers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/datatransfer/v1/transfers/{dataTransferId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'dataTransferId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/datatransfer/v1/transfers',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'admin/datatransfer/v1/transfers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'newOwnerUserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'oldOwnerUserId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'status' => array(
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
