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
 * Service definition for AndroidEnterprise (v1).
 *
 * <p>
 * Manages the deployment of apps to Android Enterprise devices.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/android/work/play/emm-api" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class AndroidEnterprise extends \Google\Service
{
  /** Manage corporate Android devices. */
  const ANDROIDENTERPRISE =
      "https://www.googleapis.com/auth/androidenterprise";

  public $devices;
  public $enterprises;
  public $entitlements;
  public $grouplicenses;
  public $grouplicenseusers;
  public $installs;
  public $managedconfigurationsfordevice;
  public $managedconfigurationsforuser;
  public $managedconfigurationssettings;
  public $permissions;
  public $products;
  public $serviceaccountkeys;
  public $storelayoutclusters;
  public $storelayoutpages;
  public $users;
  public $webapps;

  /**
   * Constructs the internal representation of the AndroidEnterprise service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://androidenterprise.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'androidenterprise';

    $this->devices = new AndroidEnterprise\Resource\Devices(
        $this,
        $this->serviceName,
        'devices',
        [
          'methods' => [
            'forceReportUpload' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/forceReportUpload',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getState' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/state',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
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
            ],'setState' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/state',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->enterprises = new AndroidEnterprise\Resource\Enterprises(
        $this,
        $this->serviceName,
        'enterprises',
        [
          'methods' => [
            'acknowledgeNotificationSet' => [
              'path' => 'androidenterprise/v1/enterprises/acknowledgeNotificationSet',
              'httpMethod' => 'POST',
              'parameters' => [
                'notificationSetId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'completeSignup' => [
              'path' => 'androidenterprise/v1/enterprises/completeSignup',
              'httpMethod' => 'POST',
              'parameters' => [
                'completionToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'enterpriseToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'createWebToken' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/createWebToken',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'enroll' => [
              'path' => 'androidenterprise/v1/enterprises/enroll',
              'httpMethod' => 'POST',
              'parameters' => [
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateSignupUrl' => [
              'path' => 'androidenterprise/v1/enterprises/signupUrl',
              'httpMethod' => 'POST',
              'parameters' => [
                'callbackUrl' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getServiceAccount' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/serviceAccount',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keyType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getStoreLayout' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises',
              'httpMethod' => 'GET',
              'parameters' => [
                'domain' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'pullNotificationSet' => [
              'path' => 'androidenterprise/v1/enterprises/pullNotificationSet',
              'httpMethod' => 'POST',
              'parameters' => [
                'requestMode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'sendTestPushNotification' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/sendTestPushNotification',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setAccount' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/account',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'setStoreLayout' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unenroll' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/unenroll',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->entitlements = new AndroidEnterprise\Resource\Entitlements(
        $this,
        $this->serviceName,
        'entitlements',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/entitlements/{entitlementId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'entitlementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/entitlements/{entitlementId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'entitlementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/entitlements',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
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
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/entitlements/{entitlementId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'entitlementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'install' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->grouplicenses = new AndroidEnterprise\Resource\Grouplicenses(
        $this,
        $this->serviceName,
        'grouplicenses',
        [
          'methods' => [
            'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/groupLicenses/{groupLicenseId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'groupLicenseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/groupLicenses',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->grouplicenseusers = new AndroidEnterprise\Resource\Grouplicenseusers(
        $this,
        $this->serviceName,
        'grouplicenseusers',
        [
          'methods' => [
            'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/groupLicenses/{groupLicenseId}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'groupLicenseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->installs = new AndroidEnterprise\Resource\Installs(
        $this,
        $this->serviceName,
        'installs',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/installs/{installId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'installId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/installs/{installId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'installId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/installs',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/installs/{installId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'installId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->managedconfigurationsfordevice = new AndroidEnterprise\Resource\Managedconfigurationsfordevice(
        $this,
        $this->serviceName,
        'managedconfigurationsfordevice',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/managedConfigurationsForDevice/{managedConfigurationForDeviceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForDeviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/managedConfigurationsForDevice/{managedConfigurationForDeviceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForDeviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/managedConfigurationsForDevice',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/devices/{deviceId}/managedConfigurationsForDevice/{managedConfigurationForDeviceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForDeviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->managedconfigurationsforuser = new AndroidEnterprise\Resource\Managedconfigurationsforuser(
        $this,
        $this->serviceName,
        'managedconfigurationsforuser',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/managedConfigurationsForUser/{managedConfigurationForUserId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForUserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/managedConfigurationsForUser/{managedConfigurationForUserId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForUserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/managedConfigurationsForUser',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
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
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/managedConfigurationsForUser/{managedConfigurationForUserId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'userId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'managedConfigurationForUserId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->managedconfigurationssettings = new AndroidEnterprise\Resource\Managedconfigurationssettings(
        $this,
        $this->serviceName,
        'managedconfigurationssettings',
        [
          'methods' => [
            'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/managedConfigurationsSettings',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->permissions = new AndroidEnterprise\Resource\Permissions(
        $this,
        $this->serviceName,
        'permissions',
        [
          'methods' => [
            'get' => [
              'path' => 'androidenterprise/v1/permissions/{permissionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'permissionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->products = new AndroidEnterprise\Resource\Products(
        $this,
        $this->serviceName,
        'products',
        [
          'methods' => [
            'approve' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/approve',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateApprovalUrl' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/generateApprovalUrl',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'languageCode' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getAppRestrictionsSchema' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/appRestrictionsSchema',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'getPermissions' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/permissions',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'approved' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'language' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'token' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'unapprove' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/products/{productId}/unapprove',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'productId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->serviceaccountkeys = new AndroidEnterprise\Resource\Serviceaccountkeys(
        $this,
        $this->serviceName,
        'serviceaccountkeys',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/serviceAccountKeys/{keyId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'keyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/serviceAccountKeys',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/serviceAccountKeys',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->storelayoutclusters = new AndroidEnterprise\Resource\Storelayoutclusters(
        $this,
        $this->serviceName,
        'storelayoutclusters',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}/clusters/{clusterId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clusterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}/clusters/{clusterId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clusterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}/clusters',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}/clusters',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}/clusters/{clusterId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clusterId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->storelayoutpages = new AndroidEnterprise\Resource\Storelayoutpages(
        $this,
        $this->serviceName,
        'storelayoutpages',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/storeLayout/pages/{pageId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new AndroidEnterprise\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
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
            ],'generateAuthenticationToken' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/authenticationToken',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
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
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
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
            ],'getAvailableProductSet' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/availableProductSet',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
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
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'email' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'revokeDeviceAccess' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/deviceAccess',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
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
            ],'setAvailableProductSet' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}/availableProductSet',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
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
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/users/{userId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
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
    $this->webapps = new AndroidEnterprise\Resource\Webapps(
        $this,
        $this->serviceName,
        'webapps',
        [
          'methods' => [
            'delete' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/webApps/{webAppId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webAppId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/webApps/{webAppId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webAppId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/webApps',
              'httpMethod' => 'POST',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/webApps',
              'httpMethod' => 'GET',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'androidenterprise/v1/enterprises/{enterpriseId}/webApps/{webAppId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'enterpriseId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webAppId' => [
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
class_alias(AndroidEnterprise::class, 'Google_Service_AndroidEnterprise');
