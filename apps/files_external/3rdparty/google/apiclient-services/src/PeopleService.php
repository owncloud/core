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
 * Service definition for PeopleService (v1).
 *
 * <p>
 * Provides access to information about profiles and contacts.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/people/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PeopleService extends \Google\Service
{
  /** See, edit, download, and permanently delete your contacts. */
  const CONTACTS =
      "https://www.googleapis.com/auth/contacts";
  /** See and download contact info automatically saved in your "Other contacts". */
  const CONTACTS_OTHER_READONLY =
      "https://www.googleapis.com/auth/contacts.other.readonly";
  /** See and download your contacts. */
  const CONTACTS_READONLY =
      "https://www.googleapis.com/auth/contacts.readonly";
  /** See and download your organization's GSuite directory. */
  const DIRECTORY_READONLY =
      "https://www.googleapis.com/auth/directory.readonly";
  /** View your street addresses. */
  const USER_ADDRESSES_READ =
      "https://www.googleapis.com/auth/user.addresses.read";
  /** See and download your exact date of birth. */
  const USER_BIRTHDAY_READ =
      "https://www.googleapis.com/auth/user.birthday.read";
  /** See and download all of your Google Account email addresses. */
  const USER_EMAILS_READ =
      "https://www.googleapis.com/auth/user.emails.read";
  /** See your gender. */
  const USER_GENDER_READ =
      "https://www.googleapis.com/auth/user.gender.read";
  /** See your education, work history and org info. */
  const USER_ORGANIZATION_READ =
      "https://www.googleapis.com/auth/user.organization.read";
  /** See and download your personal phone numbers. */
  const USER_PHONENUMBERS_READ =
      "https://www.googleapis.com/auth/user.phonenumbers.read";
  /** See your primary Google Account email address. */
  const USERINFO_EMAIL =
      "https://www.googleapis.com/auth/userinfo.email";
  /** See your personal info, including any personal info you've made publicly available. */
  const USERINFO_PROFILE =
      "https://www.googleapis.com/auth/userinfo.profile";

  public $contactGroups;
  public $contactGroups_members;
  public $otherContacts;
  public $people;
  public $people_connections;

  /**
   * Constructs the internal representation of the PeopleService service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://people.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'people';

    $this->contactGroups = new PeopleService\Resource\ContactGroups(
        $this,
        $this->serviceName,
        'contactGroups',
        [
          'methods' => [
            'batchGet' => [
              'path' => 'v1/contactGroups:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxMembers' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'resourceNames' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/contactGroups',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'delete' => [
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'deleteContacts' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'groupFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'maxMembers' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],'list' => [
              'path' => 'v1/contactGroups',
              'httpMethod' => 'GET',
              'parameters' => [
                'groupFields' => [
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
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->contactGroups_members = new PeopleService\Resource\ContactGroupsMembers(
        $this,
        $this->serviceName,
        'members',
        [
          'methods' => [
            'modify' => [
              'path' => 'v1/{+resourceName}/members:modify',
              'httpMethod' => 'POST',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->otherContacts = new PeopleService\Resource\OtherContacts(
        $this,
        $this->serviceName,
        'otherContacts',
        [
          'methods' => [
            'copyOtherContactToMyContactsGroup' => [
              'path' => 'v1/{+resourceName}:copyOtherContactToMyContactsGroup',
              'httpMethod' => 'POST',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/otherContacts',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestSyncToken' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'search' => [
              'path' => 'v1/otherContacts:search',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->people = new PeopleService\Resource\People(
        $this,
        $this->serviceName,
        'people',
        [
          'methods' => [
            'batchCreateContacts' => [
              'path' => 'v1/people:batchCreateContacts',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'batchDeleteContacts' => [
              'path' => 'v1/people:batchDeleteContacts',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'batchUpdateContacts' => [
              'path' => 'v1/people:batchUpdateContacts',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'createContact' => [
              'path' => 'v1/people:createContact',
              'httpMethod' => 'POST',
              'parameters' => [
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'deleteContact' => [
              'path' => 'v1/{+resourceName}:deleteContact',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'deleteContactPhoto' => [
              'path' => 'v1/{+resourceName}:deleteContactPhoto',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestMask.includeField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'getBatchGet' => [
              'path' => 'v1/people:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestMask.includeField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'resourceNames' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'listDirectoryPeople' => [
              'path' => 'v1/people:listDirectoryPeople',
              'httpMethod' => 'GET',
              'parameters' => [
                'mergeSources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestSyncToken' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'syncToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'searchContacts' => [
              'path' => 'v1/people:searchContacts',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'searchDirectoryPeople' => [
              'path' => 'v1/people:searchDirectoryPeople',
              'httpMethod' => 'GET',
              'parameters' => [
                'mergeSources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'query' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'readMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'updateContact' => [
              'path' => 'v1/{+resourceName}:updateContact',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'updatePersonFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'updateContactPhoto' => [
              'path' => 'v1/{+resourceName}:updateContactPhoto',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->people_connections = new PeopleService\Resource\PeopleConnections(
        $this,
        $this->serviceName,
        'connections',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+resourceName}/connections',
              'httpMethod' => 'GET',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'personFields' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestMask.includeField' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'requestSyncToken' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sortOrder' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'sources' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'syncToken' => [
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
class_alias(PeopleService::class, 'Google_Service_PeopleService');
