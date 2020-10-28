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
 * Service definition for Playcustomapp (v1).
 *
 * <p>
 * API to create and publish custom Android apps</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/android/work/play/custom-app-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Playcustomapp extends Google_Service
{
  /** View and manage your Google Play Developer account. */
  const ANDROIDPUBLISHER =
      "https://www.googleapis.com/auth/androidpublisher";

  public $accounts_customApps;
  
  /**
   * Constructs the internal representation of the Playcustomapp service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://playcustomapp.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'playcustomapp';

    $this->accounts_customApps = new Google_Service_Playcustomapp_Resource_AccountsCustomApps(
        $this,
        $this->serviceName,
        'customApps',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'playcustomapp/v1/accounts/{account}/customApps',
              'httpMethod' => 'POST',
              'parameters' => array(
                'account' => array(
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
