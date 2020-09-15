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
 * The "changes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $driveService = new Google_Service_Drive(...);
 *   $changes = $driveService->changes;
 *  </code>
 */
class Google_Service_Drive_Resource_Changes extends Google_Service_Resource
{
  /**
   * Gets the starting pageToken for listing future changes.
   * (changes.getStartPageToken)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string driveId The ID of the shared drive for which the starting
   * pageToken for listing future changes from that shared drive is returned.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param string teamDriveId Deprecated use driveId instead.
   * @return Google_Service_Drive_StartPageToken
   */
  public function getStartPageToken($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getStartPageToken', array($params), "Google_Service_Drive_StartPageToken");
  }
  /**
   * Lists the changes for a user or shared drive. (changes.listChanges)
   *
   * @param string $pageToken The token for continuing a previous list request on
   * the next page. This should be set to the value of 'nextPageToken' from the
   * previous response or to the response from the getStartPageToken method.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string driveId The shared drive from which changes are returned.
   * If specified the change IDs will be reflective of the shared drive; use the
   * combined drive ID and change ID as an identifier.
   * @opt_param bool includeCorpusRemovals Whether changes should include the file
   * resource if the file is still accessible by the user at the time of the
   * request, even when a file was removed from the list of changes and there will
   * be no further change entries for this file.
   * @opt_param bool includeItemsFromAllDrives Whether both My Drive and shared
   * drive items should be included in results.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool includeRemoved Whether to include changes indicating that
   * items have been removed from the list of changes, for example by deletion or
   * loss of access.
   * @opt_param bool includeTeamDriveItems Deprecated use
   * includeItemsFromAllDrives instead.
   * @opt_param int pageSize The maximum number of changes to return per page.
   * @opt_param bool restrictToMyDrive Whether to restrict the results to changes
   * inside the My Drive hierarchy. This omits changes to files such as those in
   * the Application Data folder or shared files which have not been added to My
   * Drive.
   * @opt_param string spaces A comma-separated list of spaces to query within the
   * user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param string teamDriveId Deprecated use driveId instead.
   * @return Google_Service_Drive_ChangeList
   */
  public function listChanges($pageToken, $optParams = array())
  {
    $params = array('pageToken' => $pageToken);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Drive_ChangeList");
  }
  /**
   * Subscribes to changes for a user. (changes.watch)
   *
   * @param string $pageToken The token for continuing a previous list request on
   * the next page. This should be set to the value of 'nextPageToken' from the
   * previous response or to the response from the getStartPageToken method.
   * @param Google_Service_Drive_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string driveId The shared drive from which changes are returned.
   * If specified the change IDs will be reflective of the shared drive; use the
   * combined drive ID and change ID as an identifier.
   * @opt_param bool includeCorpusRemovals Whether changes should include the file
   * resource if the file is still accessible by the user at the time of the
   * request, even when a file was removed from the list of changes and there will
   * be no further change entries for this file.
   * @opt_param bool includeItemsFromAllDrives Whether both My Drive and shared
   * drive items should be included in results.
   * @opt_param string includePermissionsForView Specifies which additional view's
   * permissions to include in the response. Only 'published' is supported.
   * @opt_param bool includeRemoved Whether to include changes indicating that
   * items have been removed from the list of changes, for example by deletion or
   * loss of access.
   * @opt_param bool includeTeamDriveItems Deprecated use
   * includeItemsFromAllDrives instead.
   * @opt_param int pageSize The maximum number of changes to return per page.
   * @opt_param bool restrictToMyDrive Whether to restrict the results to changes
   * inside the My Drive hierarchy. This omits changes to files such as those in
   * the Application Data folder or shared files which have not been added to My
   * Drive.
   * @opt_param string spaces A comma-separated list of spaces to query within the
   * user corpus. Supported values are 'drive', 'appDataFolder' and 'photos'.
   * @opt_param bool supportsAllDrives Whether the requesting application supports
   * both My Drives and shared drives.
   * @opt_param bool supportsTeamDrives Deprecated use supportsAllDrives instead.
   * @opt_param string teamDriveId Deprecated use driveId instead.
   * @return Google_Service_Drive_Channel
   */
  public function watch($pageToken, Google_Service_Drive_Channel $postBody, $optParams = array())
  {
    $params = array('pageToken' => $pageToken, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Drive_Channel");
  }
}
