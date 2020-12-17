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
 * Service definition for Directory (directory_v1).
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
class Google_Service_Directory extends Google_Service
{
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
  /** View users on your domain. */
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
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $asps;
  public $channels;
  public $chromeosdevices;
  public $customer_devices_chromeos;
  public $customer_devices_chromeos_commands;
  public $customers;
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://admin.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'directory_v1';
    $this->serviceName = 'admin';

    $this->asps = new Google_Service_Directory_Resource_Asps(
        $this,
        $this->serviceName,
        'asps',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/users/{userKey}/asps/{codeId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'codeId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/users/{userKey}/asps/{codeId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'codeId' => array(
                  'location' => 'path',
                  'type' => 'integer',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/users/{userKey}/asps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->channels = new Google_Service_Directory_Resource_Channels(
        $this,
        $this->serviceName,
        'channels',
        array(
          'methods' => array(
            'stop' => array(
              'path' => 'admin/directory_v1/channels/stop',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->chromeosdevices = new Google_Service_Directory_Resource_Chromeosdevices(
        $this,
        $this->serviceName,
        'chromeosdevices',
        array(
          'methods' => array(
            'action' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{resourceId}/action',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orgUnitPath' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'moveDevicesToOu' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/moveDevicesToOu',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->customer_devices_chromeos = new Google_Service_Directory_Resource_CustomerDevicesChromeos(
        $this,
        $this->serviceName,
        'chromeos',
        array(
          'methods' => array(
            'issueCommand' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}:issueCommand',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->customer_devices_chromeos_commands = new Google_Service_Directory_Resource_CustomerDevicesChromeosCommands(
        $this,
        $this->serviceName,
        'commands',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/chromeos/{deviceId}/commands/{commandId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'commandId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->customers = new Google_Service_Directory_Resource_Customers(
        $this,
        $this->serviceName,
        'customers',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customers/{customerKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->domainAliases = new Google_Service_Directory_Resource_DomainAliases(
        $this,
        $this->serviceName,
        'domainAliases',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases/{domainAliasName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'domainAliasName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases/{domainAliasName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'domainAliasName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domainaliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'parentDomainName' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->domains = new Google_Service_Directory_Resource_Domains(
        $this,
        $this->serviceName,
        'domains',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domains/{domainName}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'domainName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domains/{domainName}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'domainName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domains',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/domains',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->groups = new Google_Service_Directory_Resource_Groups(
        $this,
        $this->serviceName,
        'groups',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/groups',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'admin/directory/v1/groups',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->groups_aliases = new Google_Service_Directory_Resource_GroupsAliases(
        $this,
        $this->serviceName,
        'aliases',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alias' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->members = new Google_Service_Directory_Resource_Members(
        $this,
        $this->serviceName,
        'members',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'hasMember' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/hasMember/{memberKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members',
              'httpMethod' => 'POST',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members',
              'httpMethod' => 'GET',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDerivedMembership' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'roles' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/groups/{groupKey}/members/{memberKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'groupKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'memberKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->mobiledevices = new Google_Service_Directory_Resource_Mobiledevices(
        $this,
        $this->serviceName,
        'mobiledevices',
        array(
          'methods' => array(
            'action' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}/action',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile/{resourceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'resourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/devices/mobile',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->orgunits = new Google_Service_Directory_Resource_Orgunits(
        $this,
        $this->serviceName,
        'orgunits',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/orgunits/{+orgUnitPath}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orgUnitPath' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->privileges = new Google_Service_Directory_Resource_Privileges(
        $this,
        $this->serviceName,
        'privileges',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles/ALL/privileges',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->resources_buildings = new Google_Service_Directory_Resource_ResourcesBuildings(
        $this,
        $this->serviceName,
        'buildings',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'buildingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'buildingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'coordinatesSource' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'buildingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'coordinatesSource' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/buildings/{buildingId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'buildingId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'coordinatesSource' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->resources_calendars = new Google_Service_Directory_Resource_ResourcesCalendars(
        $this,
        $this->serviceName,
        'calendars',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'calendarResourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'calendarResourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'calendarResourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/calendars/{calendarResourceId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'calendarResourceId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->resources_features = new Google_Service_Directory_Resource_ResourcesFeatures(
        $this,
        $this->serviceName,
        'features',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'featureKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'featureKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'featureKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'rename' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{oldName}/rename',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'oldName' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customer}/resources/features/{featureKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'featureKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->roleAssignments = new Google_Service_Directory_Resource_RoleAssignments(
        $this,
        $this->serviceName,
        'roleAssignments',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments/{roleAssignmentId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleAssignmentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments/{roleAssignmentId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleAssignmentId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roleassignments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'roleId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'userKey' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->roles = new Google_Service_Directory_Resource_Roles(
        $this,
        $this->serviceName,
        'roles',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customer}/roles/{roleId}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customer' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'roleId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->schemas = new Google_Service_Directory_Resource_Schemas(
        $this,
        $this->serviceName,
        'schemas',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'schemaKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'schemaKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'schemaKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/customer/{customerId}/schemas/{schemaKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'customerId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'schemaKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tokens = new Google_Service_Directory_Resource_Tokens(
        $this,
        $this->serviceName,
        'tokens',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/users/{userKey}/tokens/{clientId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'clientId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/users/{userKey}/tokens',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->twoStepVerification = new Google_Service_Directory_Resource_TwoStepVerification(
        $this,
        $this->serviceName,
        'twoStepVerification',
        array(
          'methods' => array(
            'turnOff' => array(
              'path' => 'admin/directory/v1/users/{userKey}/twoStepVerification/turnOff',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->users = new Google_Service_Directory_Resource_Users(
        $this,
        $this->serviceName,
        'users',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'customFieldMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'viewType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/users',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'list' => array(
              'path' => 'admin/directory/v1/users',
              'httpMethod' => 'GET',
              'parameters' => array(
                'customFieldMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'viewType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'makeAdmin' => array(
              'path' => 'admin/directory/v1/users/{userKey}/makeAdmin',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'signOut' => array(
              'path' => 'admin/directory/v1/users/{userKey}/signOut',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'admin/directory/v1/users/{userKey}/undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/users/{userKey}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'watch' => array(
              'path' => 'admin/directory/v1/users/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'customFieldMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'customer' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'domain' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projection' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'query' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'showDeleted' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'sortOrder' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'viewType' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_aliases = new Google_Service_Directory_Resource_UsersAliases(
        $this,
        $this->serviceName,
        'aliases',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/users/{userKey}/aliases/{alias}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'alias' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'admin/directory/v1/users/{userKey}/aliases',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/users/{userKey}/aliases',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'watch' => array(
              'path' => 'admin/directory/v1/users/{userKey}/aliases/watch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'event' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->users_photos = new Google_Service_Directory_Resource_UsersPhotos(
        $this,
        $this->serviceName,
        'photos',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'admin/directory/v1/users/{userKey}/photos/thumbnail',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->verificationCodes = new Google_Service_Directory_Resource_VerificationCodes(
        $this,
        $this->serviceName,
        'verificationCodes',
        array(
          'methods' => array(
            'generate' => array(
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes/generate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'invalidate' => array(
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes/invalidate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'userKey' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'admin/directory/v1/users/{userKey}/verificationCodes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'userKey' => array(
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
