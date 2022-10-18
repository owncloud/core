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
 * Service definition for Directory (directory_v1).
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
class Directory extends \Google\Service
{
  /** See, add, edit, and permanently delete the printers that your organization can use with Chrome. */
  const ADMIN_CHROME_PRINTERS =
      "https://www.googleapis.com/auth/admin.chrome.printers";
  /** See the printers that your organization can use with Chrome. */
  const ADMIN_CHROME_PRINTERS_READONLY =
      "https://www.googleapis.com/auth/admin.chrome.printers.readonly";
  /** View and manage customer related information. */
  const ADMIN_DIRECTORY_CUSTOMER =
      "https://www.googleapis.com/auth/admin.directory.customer";
  /** View customer related information. */
  const ADMIN_DIRECTORY_CUSTOMER_READONLY =
      "https://www.googleapis.com/auth/admin.directory.customer.readonly";
  /** View and manage your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS =
      "https://www.googleapis.com/auth/admin.directory.device.chromeos";
  /** View your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS_READONLY =
      "https://www.googleapis.com/auth/admin.directory.device.chromeos.readonly";
  /** View and manage your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE =
      "https://www.googleapis.com/auth/admin.directory.device.mobile";
  /** Manage your mobile devices by performing administrative tasks. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_ACTION =
      "https://www.googleapis.com/auth/admin.directory.device.mobile.action";
  /** View your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_READONLY =
      "https://www.googleapis.com/auth/admin.directory.device.mobile.readonly";
  /** View and manage the provisioning of domains for your customers. */
  const ADMIN_DIRECTORY_DOMAIN =
      "https://www.googleapis.com/auth/admin.directory.domain";
  /** View domains related to your customers. */
  const ADMIN_DIRECTORY_DOMAIN_READONLY =
      "https://www.googleapis.com/auth/admin.directory.domain.readonly";
  /** View and manage the provisioning of groups on your domain. */
  const ADMIN_DIRECTORY_GROUP =
      "https://www.googleapis.com/auth/admin.directory.group";
  /** View and manage group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER =
      "https://www.googleapis.com/auth/admin.directory.group.member";
  /** View group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER_READONLY =
      "https://www.googleapis.com/auth/admin.directory.group.member.readonly";
  /** View groups on your domain. */
  const ADMIN_DIRECTORY_GROUP_READONLY =
      "https://www.googleapis.com/auth/admin.directory.group.readonly";
  /** View and manage organization units on your domain. */
  const ADMIN_DIRECTORY_ORGUNIT =
      "https://www.googleapis.com/auth/admin.directory.orgunit";
  /** View organization units on your domain. */
  const ADMIN_DIRECTORY_ORGUNIT_READONLY =
      "https://www.googleapis.com/auth/admin.directory.orgunit.readonly";
  /** View and manage the provisioning of calendar resources on your domain. */
  const ADMIN_DIRECTORY_RESOURCE_CALENDAR =
      "https://www.googleapis.com/auth/admin.directory.resource.calendar";
  /** View calendar resources on your domain. */
  const ADMIN_DIRECTORY_RESOURCE_CALENDAR_READONLY =
      "https://www.googleapis.com/auth/admin.directory.resource.calendar.readonly";
  /** Manage delegated admin roles for your domain. */
  const ADMIN_DIRECTORY_ROLEMANAGEMENT =
      "https://www.googleapis.com/auth/admin.directory.rolemanagement";
  /** View delegated admin roles for your domain. */
  const ADMIN_DIRECTORY_ROLEMANAGEMENT_READONLY =
      "https://www.googleapis.com/auth/admin.directory.rolemanagement.readonly";
  /** View and manage the provisioning of users on your domain. */
  const ADMIN_DIRECTORY_USER =
      "https://www.googleapis.com/auth/admin.directory.user";
  /** View and manage user aliases on your domain. */
  const ADMIN_DIRECTORY_USER_ALIAS =
      "https://www.googleapis.com/auth/admin.directory.user.alias";
  /** View user aliases on your domain. */
  const ADMIN_DIRECTORY_USER_ALIAS_READONLY =
      "https://www.googleapis.com/auth/admin.directory.user.alias.readonly";
  /** See info about users on your domain. */
  const ADMIN_DIRECTORY_USER_READONLY =
      "https://www.googleapis.com/auth/admin.directory.user.readonly";
  /** Manage data access permissions for users on your domain. */
  const ADMIN_DIRECTORY_USER_SECURITY =
      "https://www.googleapis.com/auth/admin.directory.user.security";
  /** View and manage the provisioning of user schemas on your domain. */
  const ADMIN_DIRECTORY_USERSCHEMA =
      "https://www.googleapis.com/auth/admin.directory.userschema";
  /** View user schemas on your domain. */
  const ADMIN_DIRECTORY_USERSCHEMA_READONLY =
      "https://www.googleapis.com/auth/admin.directory.userschema.readonly";
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $asps;
  public $channels;
  public $chromeosdevices;
  public $customer_devices_chromeos;
  public $customer_devices_chromeos_commands;
  public $customers;
  public $customers_chrome_printServers;
  public $customers_chrome_printers;
  public $domainAliases;
  public $domains;
  public $groups;
  public $groups_aliases;
  public $members;
  public $mobiledevices;
  public $orgunits;
  public $privileges;
  public $resources_buildings;
  public $resources_calendars;
  public $resources_features;
  public $roleAssignments;
  public $roles;
  public $schemas;
  public $tokens;
  public $twoStepVerification;
  public $users;
  public $users_aliases;
  public $users_photos;
  public $verificationCodes;

  /**
   * Constructs the internal representation of the Directory service.
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
    $this->version = 'directory_v1';
    $this->serviceName = 'admin';

    $this->asps = new Directory\Resource\Asps(
        $this,
        $this->serviceName,
        'asps',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/users/{userKey}/asps/{codeId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'codeId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/users/{userKey}/asps/{codeId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'codeId' => [
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/users/{userKey}/asps',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->channels = new Directory\Resource\Channels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'stop' => [
              'path' => 'admin/directory_v1/channels/stop',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->chromeosdevices = new Directory\Resource\Chromeosdevices(
        $this,
        $this->serviceName,
        'chromeosdevices',
        [
          'methods' => [
            'action' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{resourceId}/action',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeChildOrgunits' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'moveDevicesToOu' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/moveDevicesToOu',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->customer_devices_chromeos = new Directory\Resource\CustomerDevicesChromeos(
        $this,
        $this->serviceName,
        'chromeos',
        [
          'methods' => [
            'issueCommand' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}:issueCommand',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
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
            ],
          ]
        ]
    );
    $this->customer_devices_chromeos_commands = new Directory\Resource\CustomerDevicesChromeosCommands(
        $this,
        $this->serviceName,
        'commands',
        [
          'methods' => [
            'get' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}/commands/{commandId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deviceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commandId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers = new Directory\Resource\Customers(
        $this,
        $this->serviceName,
        'customers',
        [
          'methods' => [
            'get' => [
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customerKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->customers_chrome_printServers = new Directory\Resource\CustomersChromePrintServers(
        $this,
        $this->serviceName,
        'printServers',
        [
          'methods' => [
            'batchCreatePrintServers' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printServers:batchCreatePrintServers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchDeletePrintServers' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printServers:batchDeletePrintServers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printServers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printServers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
            ],'patch' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
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
    $this->customers_chrome_printers = new Directory\Resource\CustomersChromePrinters(
        $this,
        $this->serviceName,
        'printers',
        [
          'methods' => [
            'batchCreatePrinters' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printers:batchCreatePrinters',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchDeletePrinters' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printers:batchDeletePrinters',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'orgUnitId' => [
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
            ],'listPrinterModels' => [
              'path' => 'admin/directory/v1/{+parent}/chrome/printers:listPrinterModels',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
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
            ],'patch' => [
              'path' => 'admin/directory/v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clearMask' => [
                  'location' => 'query',
                  'type' => 'string',
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
    $this->domainAliases = new Directory\Resource\DomainAliases(
        $this,
        $this->serviceName,
        'domainAliases',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases/{domainAliasName}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'domainAliasName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases/{domainAliasName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'domainAliasName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parentDomainName' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->domains = new Directory\Resource\Domains(
        $this,
        $this->serviceName,
        'domains',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/domains/{domainName}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'domainName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/domains/{domainName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'domainName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/domains',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/domains',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->groups = new Directory\Resource\Groups(
        $this,
        $this->serviceName,
        'groups',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/groups',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'admin/directory/v1/groups',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'domain' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->groups_aliases = new Directory\Resource\GroupsAliases(
        $this,
        $this->serviceName,
        'aliases',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alias' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->members = new Directory\Resource\Members(
        $this,
        $this->serviceName,
        'members',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'memberKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'memberKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'hasMember' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/hasMember/{memberKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'memberKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members',
              'httpMethod' => 'POST',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDerivedMembership' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'roles' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'memberKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'groupKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'memberKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->mobiledevices = new Directory\Resource\Mobiledevices(
        $this,
        $this->serviceName,
        'mobiledevices',
        [
          'methods' => [
            'action' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}/action',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'resourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->orgunits = new Directory\Resource\Orgunits(
        $this,
        $this->serviceName,
        'orgunits',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'orgUnitPath' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->privileges = new Directory\Resource\Privileges(
        $this,
        $this->serviceName,
        'privileges',
        [
          'methods' => [
            'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles/ALL/privileges',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->resources_buildings = new Directory\Resource\ResourcesBuildings(
        $this,
        $this->serviceName,
        'buildings',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'buildingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'buildingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'coordinatesSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'buildingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'coordinatesSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'buildingId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'coordinatesSource' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->resources_calendars = new Directory\Resource\ResourcesCalendars(
        $this,
        $this->serviceName,
        'calendars',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'calendarResourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'calendarResourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'calendarResourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'calendarResourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->resources_features = new Directory\Resource\ResourcesFeatures(
        $this,
        $this->serviceName,
        'features',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'featureKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'featureKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'featureKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'rename' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{oldName}/rename',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'oldName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'featureKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->roleAssignments = new Directory\Resource\RoleAssignments(
        $this,
        $this->serviceName,
        'roleAssignments',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments/{roleAssignmentId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleAssignmentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments/{roleAssignmentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleAssignmentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'roleId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'userKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->roles = new Directory\Resource\Roles(
        $this,
        $this->serviceName,
        'roles',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles',
              'httpMethod' => 'POST',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles',
              'httpMethod' => 'GET',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customer' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'roleId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->schemas = new Directory\Resource\Schemas(
        $this,
        $this->serviceName,
        'schemas',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'schemaKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'schemaKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas',
              'httpMethod' => 'POST',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas',
              'httpMethod' => 'GET',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'schemaKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'customerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'schemaKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->tokens = new Directory\Resource\Tokens(
        $this,
        $this->serviceName,
        'tokens',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'clientId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/users/{userKey}/tokens',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->twoStepVerification = new Directory\Resource\TwoStepVerification(
        $this,
        $this->serviceName,
        'twoStepVerification',
        [
          'methods' => [
            'turnOff' => [
              'path' => 'admin/directory/v1/users/{userKey}/twoStepVerification/turnOff',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->users = new Directory\Resource\Users(
        $this,
        $this->serviceName,
        'users',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'customFieldMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'viewType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/users',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'admin/directory/v1/users',
              'httpMethod' => 'GET',
              'parameters' => [
                'customFieldMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'customer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'domain' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'event' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'viewType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'makeAdmin' => [
              'path' => 'admin/directory/v1/users/{userKey}/makeAdmin',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'signOut' => [
              'path' => 'admin/directory/v1/users/{userKey}/signOut',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undelete' => [
              'path' => 'admin/directory/v1/users/{userKey}/undelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'watch' => [
              'path' => 'admin/directory/v1/users/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'customFieldMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'customer' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'domain' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'event' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'orderBy' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projection' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'showDeleted' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'viewType' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_aliases = new Directory\Resource\UsersAliases(
        $this,
        $this->serviceName,
        'aliases',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/users/{userKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'alias' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'admin/directory/v1/users/{userKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/users/{userKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'event' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'watch' => [
              'path' => 'admin/directory/v1/users/{userKey}/aliases/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'event' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->users_photos = new Directory\Resource\UsersPhotos(
        $this,
        $this->serviceName,
        'photos',
        [
          'methods' => [
            'delete' => [
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'patch' => [
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PUT',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->verificationCodes = new Directory\Resource\VerificationCodes(
        $this,
        $this->serviceName,
        'verificationCodes',
        [
          'methods' => [
            'generate' => [
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes/generate',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'invalidate' => [
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes/invalidate',
              'httpMethod' => 'POST',
              'parameters' => [
                'userKey' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes',
              'httpMethod' => 'GET',
              'parameters' => [
                'userKey' => [
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
class_alias(Directory::class, 'Google_Service_Directory');
