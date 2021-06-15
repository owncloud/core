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
 * Service definition for Firebaseappcheck (v1beta).
 *
 * <p>
 * App Check works alongside other Firebase services to help protect your
 * backend resources from abuse, such as billing fraud or phishing. With App
 * Check, devices running your app will use an app or device attestation
 * provider that attests to one or both of the following: * Requests originate
 * from your authentic app * Requests originate from an authentic, untampered
 * device This attestation is attached to every request your app makes to your
 * Firebase backend resources. The Firebase App Check REST API allows you to
 * manage your App Check configurations programmatically. It also allows you to
 * exchange attestation material for App Check tokens directly without using a
 * Firebase SDK. Finally, it allows you to obtain the public key set necessary
 * to validate an App Check token yourself. [Learn more about App
 * Check](https://firebase.google.com/docs/app-check).</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://firebase.google.com/docs/app-check" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Firebaseappcheck extends Google_Service
{
  /** See, edit, configure, and delete your Google Cloud Platform data. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";
  /** View and administer all your Firebase data and settings. */
  const FIREBASE =
      "https://www.googleapis.com/auth/firebase";

  public $jwks;
  public $projects_apps;
  public $projects_apps_debugTokens;
  public $projects_apps_deviceCheckConfig;
  public $projects_apps_recaptchaConfig;
  public $projects_services;

  /**
   * Constructs the internal representation of the Firebaseappcheck service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://firebaseappcheck.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1beta';
    $this->serviceName = 'firebaseappcheck';

    $this->jwks = new Google_Service_Firebaseappcheck_Resource_Jwks(
        $this,
        $this->serviceName,
        'jwks',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
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
    $this->projects_apps = new Google_Service_Firebaseappcheck_Resource_ProjectsApps(
        $this,
        $this->serviceName,
        'apps',
        array(
          'methods' => array(
            'exchangeCustomToken' => array(
              'path' => 'v1beta/{+app}:exchangeCustomToken',
              'httpMethod' => 'POST',
              'parameters' => array(
                'app' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'exchangeDebugToken' => array(
              'path' => 'v1beta/{+app}:exchangeDebugToken',
              'httpMethod' => 'POST',
              'parameters' => array(
                'app' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'exchangeDeviceCheckToken' => array(
              'path' => 'v1beta/{+app}:exchangeDeviceCheckToken',
              'httpMethod' => 'POST',
              'parameters' => array(
                'app' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'exchangeRecaptchaToken' => array(
              'path' => 'v1beta/{+app}:exchangeRecaptchaToken',
              'httpMethod' => 'POST',
              'parameters' => array(
                'app' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'exchangeSafetyNetToken' => array(
              'path' => 'v1beta/{+app}:exchangeSafetyNetToken',
              'httpMethod' => 'POST',
              'parameters' => array(
                'app' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects_apps_debugTokens = new Google_Service_Firebaseappcheck_Resource_ProjectsAppsDebugTokens(
        $this,
        $this->serviceName,
        'debugTokens',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'v1beta/{+parent}/debugTokens',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta/{+parent}/debugTokens',
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
            ),'patch' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_apps_deviceCheckConfig = new Google_Service_Firebaseappcheck_Resource_ProjectsAppsDeviceCheckConfig(
        $this,
        $this->serviceName,
        'deviceCheckConfig',
        array(
          'methods' => array(
            'batchGet' => array(
              'path' => 'v1beta/{+parent}/apps/-/deviceCheckConfig:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'names' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_apps_recaptchaConfig = new Google_Service_Firebaseappcheck_Resource_ProjectsAppsRecaptchaConfig(
        $this,
        $this->serviceName,
        'recaptchaConfig',
        array(
          'methods' => array(
            'batchGet' => array(
              'path' => 'v1beta/{+parent}/apps/-/recaptchaConfig:batchGet',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'names' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->projects_services = new Google_Service_Firebaseappcheck_Resource_ProjectsServices(
        $this,
        $this->serviceName,
        'services',
        array(
          'methods' => array(
            'batchUpdate' => array(
              'path' => 'v1beta/{+parent}/services:batchUpdate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'v1beta/{+parent}/services',
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
            ),'patch' => array(
              'path' => 'v1beta/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
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
