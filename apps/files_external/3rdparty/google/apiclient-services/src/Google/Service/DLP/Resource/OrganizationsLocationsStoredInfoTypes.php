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
 * The "storedInfoTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $storedInfoTypes = $dlpService->storedInfoTypes;
 *  </code>
 */
class Google_Service_DLP_Resource_OrganizationsLocationsStoredInfoTypes extends Google_Service_Resource
{
  /**
   * Creates a pre-built stored infoType to be used for inspection. See
   * https://cloud.google.com/dlp/docs/creating-stored-infotypes to learn more.
   * (storedInfoTypes.create)
   *
   * @param string $parent Required. The parent resource name, for example
   * projects/my-project-id or organizations/my-org-id.
   * @param string $locationId The geographic location to store the stored
   * infoType. Reserved for future extensions.
   * @param Google_Service_DLP_GooglePrivacyDlpV2CreateStoredInfoTypeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType
   */
  public function create($parent, $locationId, Google_Service_DLP_GooglePrivacyDlpV2CreateStoredInfoTypeRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'locationId' => $locationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType");
  }
  /**
   * Deletes a stored infoType. See https://cloud.google.com/dlp/docs/creating-
   * stored-infotypes to learn more. (storedInfoTypes.delete)
   *
   * @param string $name Required. Resource name of the organization and
   * storedInfoType to be deleted, for example
   * `organizations/433245324/storedInfoTypes/432452342` or projects/project-
   * id/storedInfoTypes/432452342.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Gets a stored infoType. See https://cloud.google.com/dlp/docs/creating-
   * stored-infotypes to learn more. (storedInfoTypes.get)
   *
   * @param string $name Required. Resource name of the organization and
   * storedInfoType to be read, for example
   * `organizations/433245324/storedInfoTypes/432452342` or projects/project-
   * id/storedInfoTypes/432452342.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType");
  }
  /**
   * Lists stored infoTypes. See https://cloud.google.com/dlp/docs/creating-
   * stored-infotypes to learn more.
   * (storedInfoTypes.listOrganizationsLocationsStoredInfoTypes)
   *
   * @param string $parent Required. The parent resource name, for example
   * projects/my-project-id or organizations/my-org-id.
   * @param string $locationId The geographic location where stored infoTypes will
   * be retrieved from. Use `-` for all locations. Reserved for future extensions.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   *
   * Example: `name asc, display_name, create_time desc`
   *
   * Supported fields are:
   *
   * - `create_time`: corresponds to time the most recent version of the resource
   * was created. - `state`: corresponds to the state of the resource. - `name`:
   * corresponds to resource name. - `display_name`: corresponds to info type's
   * display name.
   * @opt_param string pageToken Page token to continue retrieval. Comes from
   * previous call to `ListStoredInfoTypes`.
   * @opt_param int pageSize Size of the page, can be limited by server. If zero
   * server returns a page of max size 100.
   * @return Google_Service_DLP_GooglePrivacyDlpV2ListStoredInfoTypesResponse
   */
  public function listOrganizationsLocationsStoredInfoTypes($parent, $locationId, $optParams = array())
  {
    $params = array('parent' => $parent, 'locationId' => $locationId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2ListStoredInfoTypesResponse");
  }
  /**
   * Updates the stored infoType by creating a new version. The existing version
   * will continue to be used until the new version is ready. See
   * https://cloud.google.com/dlp/docs/creating-stored-infotypes to learn more.
   * (storedInfoTypes.patch)
   *
   * @param string $name Required. Resource name of organization and
   * storedInfoType to be updated, for example
   * `organizations/433245324/storedInfoTypes/432452342` or projects/project-
   * id/storedInfoTypes/432452342.
   * @param Google_Service_DLP_GooglePrivacyDlpV2UpdateStoredInfoTypeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType
   */
  public function patch($name, Google_Service_DLP_GooglePrivacyDlpV2UpdateStoredInfoTypeRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DLP_GooglePrivacyDlpV2StoredInfoType");
  }
}
