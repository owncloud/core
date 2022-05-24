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

namespace Google\Service\DriveActivity\Resource;

use Google\Service\DriveActivity\QueryDriveActivityRequest;
use Google\Service\DriveActivity\QueryDriveActivityResponse;

/**
 * The "activity" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveactivityService = new Google\Service\DriveActivity(...);
 *   $activity = $driveactivityService->activity;
 *  </code>
 */
class Activity extends \Google\Service\Resource
{
  /**
   * Query past activity in Google Drive. (activity.query)
   *
   * @param QueryDriveActivityRequest $postBody
   * @param array $optParams Optional parameters.
   * @return QueryDriveActivityResponse
   */
  public function query(QueryDriveActivityRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('query', [$params], QueryDriveActivityResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Activity::class, 'Google_Service_DriveActivity_Resource_Activity');
