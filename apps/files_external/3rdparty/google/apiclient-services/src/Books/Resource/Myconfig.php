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

namespace Google\Service\Books\Resource;

use Google\Service\Books\DownloadAccesses;
use Google\Service\Books\RequestAccessData;
use Google\Service\Books\Usersettings;
use Google\Service\Books\Volumes as VolumesModel;

/**
 * The "myconfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google\Service\Books(...);
 *   $myconfig = $booksService->myconfig;
 *  </code>
 */
class Myconfig extends \Google\Service\Resource
{
  /**
   * Gets the current settings for the user. (myconfig.getUserSettings)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country Unused. Added only to workaround TEX mandatory
   * request template requirement
   * @return Usersettings
   */
  public function getUserSettings($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getUserSettings', [$params], Usersettings::class);
  }
  /**
   * Release downloaded content access restriction.
   * (myconfig.releaseDownloadAccess)
   *
   * @param string $cpksver The device/version ID from which to release the
   * restriction.
   * @param string|array $volumeIds The volume(s) to release restrictions for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
   * localization, i.e. en_US.
   * @opt_param string source String to identify the originator of this request.
   * @return DownloadAccesses
   */
  public function releaseDownloadAccess($cpksver, $volumeIds, $optParams = [])
  {
    $params = ['cpksver' => $cpksver, 'volumeIds' => $volumeIds];
    $params = array_merge($params, $optParams);
    return $this->call('releaseDownloadAccess', [$params], DownloadAccesses::class);
  }
  /**
   * Request concurrent and download access restrictions. (myconfig.requestAccess)
   *
   * @param string $cpksver The device/version ID from which to request the
   * restrictions.
   * @param string $nonce The client nonce value.
   * @param string $source String to identify the originator of this request.
   * @param string $volumeId The volume to request concurrent/download
   * restrictions for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string licenseTypes The type of access license to request. If not
   * specified, the default is BOTH.
   * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
   * localization, i.e. en_US.
   * @return RequestAccessData
   */
  public function requestAccess($cpksver, $nonce, $source, $volumeId, $optParams = [])
  {
    $params = ['cpksver' => $cpksver, 'nonce' => $nonce, 'source' => $source, 'volumeId' => $volumeId];
    $params = array_merge($params, $optParams);
    return $this->call('requestAccess', [$params], RequestAccessData::class);
  }
  /**
   * Request downloaded content access for specified volumes on the My eBooks
   * shelf. (myconfig.syncVolumeLicenses)
   *
   * @param string $cpksver The device/version ID from which to release the
   * restriction.
   * @param string $nonce The client nonce value.
   * @param string $source String to identify the originator of this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string features List of features supported by the client, i.e.,
   * 'RENTALS'
   * @opt_param bool includeNonComicsSeries Set to true to include non-comics
   * series. Defaults to false.
   * @opt_param string locale ISO-639-1, ISO-3166-1 codes for message
   * localization, i.e. en_US.
   * @opt_param bool showPreorders Set to true to show pre-ordered books. Defaults
   * to false.
   * @opt_param string volumeIds The volume(s) to request download restrictions
   * for.
   * @return Volumes
   */
  public function syncVolumeLicenses($cpksver, $nonce, $source, $optParams = [])
  {
    $params = ['cpksver' => $cpksver, 'nonce' => $nonce, 'source' => $source];
    $params = array_merge($params, $optParams);
    return $this->call('syncVolumeLicenses', [$params], VolumesModel::class);
  }
  /**
   * Sets the settings for the user. If a sub-object is specified, it will
   * overwrite the existing sub-object stored in the server. Unspecified sub-
   * objects will retain the existing value. (myconfig.updateUserSettings)
   *
   * @param Usersettings $postBody
   * @param array $optParams Optional parameters.
   * @return Usersettings
   */
  public function updateUserSettings(Usersettings $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateUserSettings', [$params], Usersettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Myconfig::class, 'Google_Service_Books_Resource_Myconfig');
