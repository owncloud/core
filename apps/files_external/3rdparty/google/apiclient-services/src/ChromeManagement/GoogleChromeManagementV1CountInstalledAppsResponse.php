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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1CountInstalledAppsResponse extends \Google\Collection
{
  protected $collection_key = 'installedApps';
  protected $installedAppsType = GoogleChromeManagementV1InstalledApp::class;
  protected $installedAppsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var int
   */
  public $totalSize;

  /**
   * @param GoogleChromeManagementV1InstalledApp[]
   */
  public function setInstalledApps($installedApps)
  {
    $this->installedApps = $installedApps;
  }
  /**
   * @return GoogleChromeManagementV1InstalledApp[]
   */
  public function getInstalledApps()
  {
    return $this->installedApps;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param int
   */
  public function setTotalSize($totalSize)
  {
    $this->totalSize = $totalSize;
  }
  /**
   * @return int
   */
  public function getTotalSize()
  {
    return $this->totalSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1CountInstalledAppsResponse::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1CountInstalledAppsResponse');
