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
 * Service definition for FirebaseCloudMessaging (v1).
 *
 * <p>
 * FCM send API that provides a cross-platform messaging solution to reliably
 * deliver messages at no cost.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/cloud-messaging" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class FirebaseCloudMessaging extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** Send messages and manage messaging subscriptions for your Firebase applications. */
  const FIREBASE_MESSAGING =
      "https://www.googleapis.com/auth/firebase.messaging";

  public $projects_messages;

  /**
   * Constructs the internal representation of the FirebaseCloudMessaging
   * service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://fcm.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'fcm';

    $this->projects_messages = new FirebaseCloudMessaging\Resource\ProjectsMessages(
        $this,
        $this->serviceName,
        'messages',
        [
          'methods' => [
            'send' => [
              'path' => 'v1/{+parent}/messages:send',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
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
class_alias(FirebaseCloudMessaging::class, 'Google_Service_FirebaseCloudMessaging');
