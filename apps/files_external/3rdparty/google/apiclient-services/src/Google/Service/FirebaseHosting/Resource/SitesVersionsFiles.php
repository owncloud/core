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
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasehostingService = new Google_Service_FirebaseHosting(...);
 *   $files = $firebasehostingService->files;
 *  </code>
 */
class Google_Service_FirebaseHosting_Resource_SitesVersionsFiles extends Google_Service_Resource
{
  /**
   * Lists the remaining files to be uploaded for the specified version.
   * (files.listSitesVersionsFiles)
   *
   * @param string $parent Required. The parent to list files for, in the format:
   * sites/site-name/versions/versionID
   * @param array $optParams Optional parameters.
   *
   * @opt_param string status The type of files in the version that should be
   * listed.
   * @opt_param string pageToken The next_page_token from a previous request, if
   * provided. This will be the encoded version of a
   * firebase.hosting.proto.metadata.ListFilesPageToken.
   * @opt_param int pageSize The page size to return. Defaults to 1000.
   * @return Google_Service_FirebaseHosting_ListVersionFilesResponse
   */
  public function listSitesVersionsFiles($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseHosting_ListVersionFilesResponse");
  }
}
