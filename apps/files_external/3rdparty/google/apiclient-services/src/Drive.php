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
 * Service definition for Drive (v3).
 *
 * <p>
 * Manages files in Drive including uploading, downloading, searching, detecting
 * changes, and updating sharing permissions.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/drive/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Drive extends \Google\Service
{
  /** See, edit, create, and delete all of your Google Drive files. */
  const DRIVE =
      "https://www.googleapis.com/auth/drive";
  /** See, create, and delete its own configuration data in your Google Drive. */
  const DRIVE_APPDATA =
      "https://www.googleapis.com/auth/drive.appdata";
  /** See, edit, create, and delete only the specific Google Drive files you use with this app. */
  const DRIVE_FILE =
      "https://www.googleapis.com/auth/drive.file";
  /** View and manage metadata of files in your Google Drive. */
  const DRIVE_METADATA =
      "https://www.googleapis.com/auth/drive.metadata";
  /** See information about your Google Drive files. */
  const DRIVE_METADATA_READONLY =
      "https://www.googleapis.com/auth/drive.metadata.readonly";
  /** View the photos, videos and albums in your Google Photos. */
  const DRIVE_PHOTOS_READONLY =
      "https://www.googleapis.com/auth/drive.photos.readonly";
  /** See and download all your Google Drive files. */
  const DRIVE_READONLY =
      "https://www.googleapis.com/auth/drive.readonly";
  /** Modify your Google Apps Script scripts' behavior. */
  const DRIVE_SCRIPTS =
      "https://www.googleapis.com/auth/drive.scripts";

  public $about;
  public $changes;
  public $channels;
  public $comments;
  public $drives;
  public $files;
  public $permissions;
  public $replies;
  public $revisions;
  public $teamdrives;

  /**
   * Constructs the internal representation of the Drive service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://www.googleapis.com/';
    $this->servicePath = 'drive/v3/';
    $this->batchPath = 'batch/drive/v3';
    $this->version = 'v3';
    $this->serviceName = 'drive';

    $this->about = new Drive\Resource\About(
        $this,
        $this->serviceName,
        'about',
        [
          'methods' => [
            'get' => [
              'path' => 'about',
              'httpMethod' => 'GET',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->changes = new Drive\Resource\Changes(
        $this,
        $this->serviceName,
        'changes',
        [
          'methods' => [
            'getStartPageToken' => [
              'path' => 'changes/startPageToken',
              'httpMethod' => 'GET',
              'parameters' => [
                'driveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'teamDriveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'changes',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'driveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeCorpusRemovals' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeItemsFromAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeRemoved' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeTeamDriveItems' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'restrictToMyDrive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'spaces' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'teamDriveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'watch' => [
              'path' => 'changes/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
                'driveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeCorpusRemovals' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeItemsFromAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeRemoved' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includeTeamDriveItems' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'restrictToMyDrive' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'spaces' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'teamDriveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->channels = new Drive\Resource\Channels(
        $this,
        $this->serviceName,
        'channels',
        [
          'methods' => [
            'stop' => [
              'path' => 'channels/stop',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->comments = new Drive\Resource\Comments(
        $this,
        $this->serviceName,
        'comments',
        [
          'methods' => [
            'create' => [
              'path' => 'files/{fileId}/comments',
              'httpMethod' => 'POST',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'files/{fileId}/comments',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'startModifiedTime' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'files/{fileId}/comments/{commentId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->drives = new Drive\Resource\Drives(
        $this,
        $this->serviceName,
        'drives',
        [
          'methods' => [
            'create' => [
              'path' => 'drives',
              'httpMethod' => 'POST',
              'parameters' => [
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'drives/{driveId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'driveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'allowItemDeletion' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'drives/{driveId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'driveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'hide' => [
              'path' => 'drives/{driveId}/hide',
              'httpMethod' => 'POST',
              'parameters' => [
                'driveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'drives',
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
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'unhide' => [
              'path' => 'drives/{driveId}/unhide',
              'httpMethod' => 'POST',
              'parameters' => [
                'driveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'update' => [
              'path' => 'drives/{driveId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'driveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->files = new Drive\Resource\Files(
        $this,
        $this->serviceName,
        'files',
        [
          'methods' => [
            'copy' => [
              'path' => 'files/{fileId}/copy',
              'httpMethod' => 'POST',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ignoreDefaultVisibility' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'keepRevisionForever' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ocrLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'create' => [
              'path' => 'files',
              'httpMethod' => 'POST',
              'parameters' => [
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ignoreDefaultVisibility' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'keepRevisionForever' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ocrLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useContentAsIndexableText' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'files/{fileId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'emptyTrash' => [
              'path' => 'files/trash',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'export' => [
              'path' => 'files/{fileId}/export',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'mimeType' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'generateIds' => [
              'path' => 'files/generateIds',
              'httpMethod' => 'GET',
              'parameters' => [
                'count' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'space' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'type' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'files/{fileId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acknowledgeAbuse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'files',
              'httpMethod' => 'GET',
              'parameters' => [
                'corpora' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'corpus' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'driveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeItemsFromAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'includeTeamDriveItems' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'orderBy' => [
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
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'spaces' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'teamDriveId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'files/{fileId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'addParents' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'keepRevisionForever' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'ocrLanguage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'removeParents' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useContentAsIndexableText' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'watch' => [
              'path' => 'files/{fileId}/watch',
              'httpMethod' => 'POST',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acknowledgeAbuse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'includePermissionsForView' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->permissions = new Drive\Resource\Permissions(
        $this,
        $this->serviceName,
        'permissions',
        [
          'methods' => [
            'create' => [
              'path' => 'files/{fileId}/permissions',
              'httpMethod' => 'POST',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'emailMessage' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'enforceSingleParent' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'moveToNewOwnersRoot' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'sendNotificationEmail' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'transferOwnership' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'delete' => [
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'permissionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'permissionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'files/{fileId}/permissions',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includePermissionsForView' => [
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
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'files/{fileId}/permissions/{permissionId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'permissionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'removeExpiration' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsAllDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'supportsTeamDrives' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'transferOwnership' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->replies = new Drive\Resource\Replies(
        $this,
        $this->serviceName,
        'replies',
        [
          'methods' => [
            'create' => [
              'path' => 'files/{fileId}/comments/{commentId}/replies',
              'httpMethod' => 'POST',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'files/{fileId}/comments/{commentId}/replies',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'includeDeleted' => [
                  'location' => 'query',
                  'type' => 'boolean',
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
            ],'update' => [
              'path' => 'files/{fileId}/comments/{commentId}/replies/{replyId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'commentId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'replyId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->revisions = new Drive\Resource\Revisions(
        $this,
        $this->serviceName,
        'revisions',
        [
          'methods' => [
            'delete' => [
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revisionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revisionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'acknowledgeAbuse' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'files/{fileId}/revisions',
              'httpMethod' => 'GET',
              'parameters' => [
                'fileId' => [
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
              ],
            ],'update' => [
              'path' => 'files/{fileId}/revisions/{revisionId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'fileId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'revisionId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->teamdrives = new Drive\Resource\Teamdrives(
        $this,
        $this->serviceName,
        'teamdrives',
        [
          'methods' => [
            'create' => [
              'path' => 'teamdrives',
              'httpMethod' => 'POST',
              'parameters' => [
                'requestId' => [
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'delete' => [
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'teamDriveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'teamDriveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'list' => [
              'path' => 'teamdrives',
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
                'q' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'update' => [
              'path' => 'teamdrives/{teamDriveId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'teamDriveId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'useDomainAdminAccess' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Drive::class, 'Google_Service_Drive');
