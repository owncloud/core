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
 * Service definition for TagManager (v2).
 *
 * <p>
 * This API allows clients to access and modify container and tag configuration.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/tag-manager" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class TagManager extends \Google\Service
{
  /** Delete your Google Tag Manager containers. */
  const TAGMANAGER_DELETE_CONTAINERS =
      "https://www.googleapis.com/auth/tagmanager.delete.containers";
  /** Manage your Google Tag Manager container and its subcomponents, excluding versioning and publishing. */
  const TAGMANAGER_EDIT_CONTAINERS =
      "https://www.googleapis.com/auth/tagmanager.edit.containers";
  /** Manage your Google Tag Manager container versions. */
  const TAGMANAGER_EDIT_CONTAINERVERSIONS =
      "https://www.googleapis.com/auth/tagmanager.edit.containerversions";
  /** View and manage your Google Tag Manager accounts. */
  const TAGMANAGER_MANAGE_ACCOUNTS =
      "https://www.googleapis.com/auth/tagmanager.manage.accounts";
  /** Manage user permissions of your Google Tag Manager account and container. */
  const TAGMANAGER_MANAGE_USERS =
      "https://www.googleapis.com/auth/tagmanager.manage.users";
  /** Publish your Google Tag Manager container versions. */
  const TAGMANAGER_PUBLISH =
      "https://www.googleapis.com/auth/tagmanager.publish";
  /** View your Google Tag Manager container and its subcomponents. */
  const TAGMANAGER_READONLY =
      "https://www.googleapis.com/auth/tagmanager.readonly";

  public $accounts;
  public $accounts_containers;
  public $accounts_containers_environments;
  public $accounts_containers_version_headers;
  public $accounts_containers_versions;
  public $accounts_containers_workspaces;
  public $accounts_containers_workspaces_built_in_variables;
  public $accounts_containers_workspaces_clients;
  public $accounts_containers_workspaces_folders;
  public $accounts_containers_workspaces_tags;
  public $accounts_containers_workspaces_templates;
  public $accounts_containers_workspaces_triggers;
  public $accounts_containers_workspaces_variables;
  public $accounts_containers_workspaces_zones;
  public $accounts_user_permissions;

  /**
   * Constructs the internal representation of the TagManager service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://tagmanager.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'tagmanager';

    $this->accounts = new TagManager\Resource\Accounts(
        $this,
        $this->serviceName,
        'accounts',
        [
          'methods' => [
            'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/accounts',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers = new TagManager\Resource\AccountsContainers(
        $this,
        $this->serviceName,
        'containers',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/containers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/containers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_environments = new TagManager\Resource\AccountsContainersEnvironments(
        $this,
        $this->serviceName,
        'environments',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/environments',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/environments',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'reauthorize' => [
              'path' => 'tagmanager/v2/{+path}:reauthorize',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_version_headers = new TagManager\Resource\AccountsContainersVersionHeaders(
        $this,
        $this->serviceName,
        'version_headers',
        [
          'methods' => [
            'latest' => [
              'path' => 'tagmanager/v2/{+parent}/version_headers:latest',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/version_headers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->accounts_containers_versions = new TagManager\Resource\AccountsContainersVersions(
        $this,
        $this->serviceName,
        'versions',
        [
          'methods' => [
            'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'containerVersionId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'live' => [
              'path' => 'tagmanager/v2/{+parent}/versions:live',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'publish' => [
              'path' => 'tagmanager/v2/{+path}:publish',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'set_latest' => [
              'path' => 'tagmanager/v2/{+path}:set_latest',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'undelete' => [
              'path' => 'tagmanager/v2/{+path}:undelete',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces = new TagManager\Resource\AccountsContainersWorkspaces(
        $this,
        $this->serviceName,
        'workspaces',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/workspaces',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create_version' => [
              'path' => 'tagmanager/v2/{+path}:create_version',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'getStatus' => [
              'path' => 'tagmanager/v2/{+path}/status',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/workspaces',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'quick_preview' => [
              'path' => 'tagmanager/v2/{+path}:quick_preview',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'resolve_conflict' => [
              'path' => 'tagmanager/v2/{+path}:resolve_conflict',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'sync' => [
              'path' => 'tagmanager/v2/{+path}:sync',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_built_in_variables = new TagManager\Resource\AccountsContainersWorkspacesBuiltInVariables(
        $this,
        $this->serviceName,
        'built_in_variables',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/built_in_variables',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/built_in_variables',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}/built_in_variables:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_clients = new TagManager\Resource\AccountsContainersWorkspacesClients(
        $this,
        $this->serviceName,
        'clients',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/clients',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/clients',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_folders = new TagManager\Resource\AccountsContainersWorkspacesFolders(
        $this,
        $this->serviceName,
        'folders',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/folders',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'entities' => [
              'path' => 'tagmanager/v2/{+path}:entities',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/folders',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'move_entities_to_folder' => [
              'path' => 'tagmanager/v2/{+path}:move_entities_to_folder',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'tagId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
                'variableId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_tags = new TagManager\Resource\AccountsContainersWorkspacesTags(
        $this,
        $this->serviceName,
        'tags',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/tags',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/tags',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_templates = new TagManager\Resource\AccountsContainersWorkspacesTemplates(
        $this,
        $this->serviceName,
        'templates',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/templates',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/templates',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_triggers = new TagManager\Resource\AccountsContainersWorkspacesTriggers(
        $this,
        $this->serviceName,
        'triggers',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/triggers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/triggers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_variables = new TagManager\Resource\AccountsContainersWorkspacesVariables(
        $this,
        $this->serviceName,
        'variables',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/variables',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/variables',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_containers_workspaces_zones = new TagManager\Resource\AccountsContainersWorkspacesZones(
        $this,
        $this->serviceName,
        'zones',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/zones',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/zones',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'revert' => [
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'fingerprint' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->accounts_user_permissions = new TagManager\Resource\AccountsUserPermissions(
        $this,
        $this->serviceName,
        'user_permissions',
        [
          'methods' => [
            'create' => [
              'path' => 'tagmanager/v2/{+parent}/user_permissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => [
                'path' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'tagmanager/v2/{+parent}/user_permissions',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'path' => [
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
class_alias(TagManager::class, 'Google_Service_TagManager');
