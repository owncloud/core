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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasehostingService = new Google_Service_FirebaseHosting(...);
 *   $versions = $firebasehostingService->versions;
 *  </code>
 */
class Google_Service_FirebaseHosting_Resource_SitesVersions extends Google_Service_Resource
{
  /**
   * Creates a new version on the target site using the content of the specified
   * version. (versions.cloneSitesVersions)
   *
   * @param string $parent Required. The target site where the cloned version will
   * reside, in the format: `sites/{site}`
   * @param Google_Service_FirebaseHosting_CloneVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_Operation
   */
  public function cloneSitesVersions($parent, Google_Service_FirebaseHosting_CloneVersionRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clone', array($params), "Google_Service_FirebaseHosting_Operation");
  }
  /**
   * Creates a new version for a site. (versions.create)
   *
   * @param string $parent Required. The parent to create the version for, in the
   * format: sites/site-name
   * @param Google_Service_FirebaseHosting_Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sizeBytes The self-reported size of the version. This value
   * is used for a pre-emptive quota check for legacy version uploads.
   * @opt_param string versionId A unique id for the new version. This is only
   * specified for legacy version creations.
   * @return Google_Service_FirebaseHosting_Version
   */
  public function create($parent, Google_Service_FirebaseHosting_Version $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseHosting_Version");
  }
  /**
   * Deletes the specified version. (versions.delete)
   *
   * @param string $name Required. The name of the version to be deleted, in the
   * format: sites/site-name/versions/versionID
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_FirebasehostingEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseHosting_FirebasehostingEmpty");
  }
  /**
   * Lists the versions that have been created on the specified site. Will include
   * filtering in the future. (versions.listSitesVersions)
   *
   * @param string $parent Required. The parent for which to list files, in the
   * format: sites/site-name
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of versions to return. The service
   * may return fewer than this value. If unspecified, at most 25 versions will be
   * returned. The maximum value is 100; values above 100 will be coerced to 100
   * @opt_param string filter The filter string used to return a subset of
   * versions in the response. Currently supported fields for filtering are: name,
   * status, and create_time. Filter processing will be implemented in accordance
   * with go/filtering.
   * @opt_param string pageToken The next_page_token from a previous request, if
   * provided.
   * @return Google_Service_FirebaseHosting_ListVersionsResponse
   */
  public function listSitesVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseHosting_ListVersionsResponse");
  }
  /**
   * Updates the specified metadata for a version. Note that this method will fail
   * with `FAILED_PRECONDITION` in the event of an invalid state transition. The
   * only valid transition for a version is currently from a `CREATED` status to a
   * `FINALIZED` status. Use [`DeleteVersion`](../sites.versions/delete) to set
   * the status of a version to `DELETED`. (versions.patch)
   *
   * @param string $name The unique identifier for a version, in the format: sites
   * /site-name/versions/versionID This name is provided in the response body when
   * you call the [`CreateVersion`](../sites.versions/create) endpoint.
   * @param Google_Service_FirebaseHosting_Version $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A set of field names from your
   * [version](../sites.versions) that you want to update. A field will be
   * overwritten if, and only if, it's in the mask. If a mask is not provided then
   * a default mask of only [`status`](../sites.versions#Version.FIELDS.status)
   * will be used.
   * @return Google_Service_FirebaseHosting_Version
   */
  public function patch($name, Google_Service_FirebaseHosting_Version $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_FirebaseHosting_Version");
  }
  /**
   * Adds content files to a version. (versions.populateFiles)
   *
   * @param string $parent Required. The version to add files to, in the format:
   * sites/site-name/versions/versionID
   * @param Google_Service_FirebaseHosting_PopulateVersionFilesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseHosting_PopulateVersionFilesResponse
   */
  public function populateFiles($parent, Google_Service_FirebaseHosting_PopulateVersionFilesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('populateFiles', array($params), "Google_Service_FirebaseHosting_PopulateVersionFilesResponse");
  }
}
