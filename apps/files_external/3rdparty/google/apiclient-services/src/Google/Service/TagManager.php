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
class Google_Service_TagManager extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://tagmanager.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'tagmanager';

    $this->accounts = new Google_Service_TagManager_Resource_Accounts(
        $this,
        $this->serviceName,
        'accounts',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/accounts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers = new Google_Service_TagManager_Resource_AccountsContainers(
        $this,
        $this->serviceName,
        'containers',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/containers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/containers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_environments = new Google_Service_TagManager_Resource_AccountsContainersEnvironments(
        $this,
        $this->serviceName,
        'environments',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/environments',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/environments',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'reauthorize' => array(
              'path' => 'tagmanager/v2/{+path}:reauthorize',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_version_headers = new Google_Service_TagManager_Resource_AccountsContainersVersionHeaders(
        $this,
        $this->serviceName,
        'version_headers',
        array(
          'methods' => array(
            'latest' => array(
              'path' => 'tagmanager/v2/{+parent}/version_headers:latest',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/version_headers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'includeDeleted' => array(
                  'location' => 'query',
                  'type' => 'boolean',
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
    $this->accounts_containers_versions = new Google_Service_TagManager_Resource_AccountsContainersVersions(
        $this,
        $this->serviceName,
        'versions',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'containerVersionId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'live' => array(
              'path' => 'tagmanager/v2/{+parent}/versions:live',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'publish' => array(
              'path' => 'tagmanager/v2/{+path}:publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'set_latest' => array(
              'path' => 'tagmanager/v2/{+path}:set_latest',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'undelete' => array(
              'path' => 'tagmanager/v2/{+path}:undelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces = new Google_Service_TagManager_Resource_AccountsContainersWorkspaces(
        $this,
        $this->serviceName,
        'workspaces',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/workspaces',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create_version' => array(
              'path' => 'tagmanager/v2/{+path}:create_version',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getStatus' => array(
              'path' => 'tagmanager/v2/{+path}/status',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/workspaces',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'quick_preview' => array(
              'path' => 'tagmanager/v2/{+path}:quick_preview',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resolve_conflict' => array(
              'path' => 'tagmanager/v2/{+path}:resolve_conflict',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'sync' => array(
              'path' => 'tagmanager/v2/{+path}:sync',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_built_in_variables = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesBuiltInVariables(
        $this,
        $this->serviceName,
        'built_in_variables',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/built_in_variables',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/built_in_variables',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}/built_in_variables:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_folders = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesFolders(
        $this,
        $this->serviceName,
        'folders',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/folders',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'entities' => array(
              'path' => 'tagmanager/v2/{+path}:entities',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/folders',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'move_entities_to_folder' => array(
              'path' => 'tagmanager/v2/{+path}:move_entities_to_folder',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'tagId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'triggerId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
                'variableId' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_tags = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesTags(
        $this,
        $this->serviceName,
        'tags',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/tags',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/tags',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_templates = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesTemplates(
        $this,
        $this->serviceName,
        'templates',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/templates',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/templates',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_triggers = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesTriggers(
        $this,
        $this->serviceName,
        'triggers',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/triggers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/triggers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_variables = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesVariables(
        $this,
        $this->serviceName,
        'variables',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/variables',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/variables',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_containers_workspaces_zones = new Google_Service_TagManager_Resource_AccountsContainersWorkspacesZones(
        $this,
        $this->serviceName,
        'zones',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/zones',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/zones',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'revert' => array(
              'path' => 'tagmanager/v2/{+path}:revert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'fingerprint' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->accounts_user_permissions = new Google_Service_TagManager_Resource_AccountsUserPermissions(
        $this,
        $this->serviceName,
        'user_permissions',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tagmanager/v2/{+parent}/user_permissions',
              'httpMethod' => 'POST',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'path' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'tagmanager/v2/{+parent}/user_permissions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'update' => array(
              'path' => 'tagmanager/v2/{+path}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'path' => array(
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
