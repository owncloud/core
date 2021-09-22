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
 * Service definition for DriveActivity (v2).
 *
 * <p>
 * Provides a historical view of activity in Google Drive.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/drive/activity/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class DriveActivity extends \Google\Service
{
  /** View and add to the activity record of files in your Google Drive. */
  const DRIVE_ACTIVITY =
      "https://www.googleapis.com/auth/drive.activity";
  /** View the activity record of files in your Google Drive. */
  const DRIVE_ACTIVITY_READONLY =
      "https://www.googleapis.com/auth/drive.activity.readonly";

  public $activity;

  /**
   * Constructs the internal representation of the DriveActivity service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://driveactivity.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'driveactivity';

    $this->activity = new DriveActivity\Resource\Activity(
        $this,
        $this->serviceName,
        'activity',
        [
          'methods' => [
            'query' => [
              'path' => 'v2/activity:query',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveActivity::class, 'Google_Service_DriveActivity');
