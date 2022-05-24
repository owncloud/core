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
class Playcustomapp extends \Google\Service
{
  /** View and manage your Google Play Developer account. */
  const ANDROIDPUBLISHER =
      "https://www.googleapis.com/auth/androidpublisher";

  public $accounts_customApps;

  /**
   * Constructs the internal representation of the Playcustomapp service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://playcustomapp.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'playcustomapp';

    $this->accounts_customApps = new Playcustomapp\Resource\AccountsCustomApps(
        $this,
        $this->serviceName,
        'customApps',
        [
          'methods' => [
            'create' => [
              'path' => 'playcustomapp/v1/accounts/{account}/customApps',
              'httpMethod' => 'POST',
              'parameters' => [
                'account' => [
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
class_alias(Playcustomapp::class, 'Google_Service_Playcustomapp');
