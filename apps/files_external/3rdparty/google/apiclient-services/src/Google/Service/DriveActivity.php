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
class Google_Service_DriveActivity extends Google_Service
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
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://driveactivity.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v2';
    $this->serviceName = 'driveactivity';

    $this->activity = new Google_Service_DriveActivity_Resource_Activity(
        $this,
        $this->serviceName,
        'activity',
        array(
          'methods' => array(
            'query' => array(
              'path' => 'v2/activity:query',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
  }
}
