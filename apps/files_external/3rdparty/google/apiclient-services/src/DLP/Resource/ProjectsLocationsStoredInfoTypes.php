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

namespace Google\Service\DLP\Resource;

use Google\Service\DLP\GooglePrivacyDlpV2CreateStoredInfoTypeRequest;
use Google\Service\DLP\GooglePrivacyDlpV2ListStoredInfoTypesResponse;
use Google\Service\DLP\GooglePrivacyDlpV2StoredInfoType;
use Google\Service\DLP\GooglePrivacyDlpV2UpdateStoredInfoTypeRequest;
use Google\Service\DLP\GoogleProtobufEmpty;

/**
 * The "storedInfoTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google\Service\DLP(...);
 *   $storedInfoTypes = $dlpService->storedInfoTypes;
 *  </code>
 */
class ProjectsLocationsStoredInfoTypes extends \Google\Service\Resource
{
  /**
   * Creates a pre-built stored infoType to be used for inspection. See
   * https://cloud.google.com/dlp/docs/creating-stored-infotypes to learn more.
   * (storedInfoTypes.create)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on the scope of the request (project or organization)
   * and whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID + Organizations scope, location specified:
   * `organizations/`ORG_ID`/locations/`LOCATION_ID + Organizations scope, no
   * location specified (defaults to global): `organizations/`ORG_ID The following
   * example `parent` string specifies a parent project with the identifier
   * `example-project`, and specifies the `europe-west3` location for processing
   * data: parent=projects/example-project/locations/europe-west3
   * @param GooglePrivacyDlpV2CreateStoredInfoTypeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2StoredInfoType
   */
  public function create($parent, GooglePrivacyDlpV2CreateStoredInfoTypeRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GooglePrivacyDlpV2StoredInfoType::class);
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
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
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
   * @return GooglePrivacyDlpV2StoredInfoType
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GooglePrivacyDlpV2StoredInfoType::class);
  }
  /**
   * Lists stored infoTypes. See https://cloud.google.com/dlp/docs/creating-
   * stored-infotypes to learn more.
   * (storedInfoTypes.listProjectsLocationsStoredInfoTypes)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on the scope of the request (project or organization)
   * and whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param array $optParams Optional parameters.
   *
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   * Example: `name asc, display_name, create_time desc` Supported fields are: -
   * `create_time`: corresponds to the time the most recent version of the
   * resource was created. - `state`: corresponds to the state of the resource. -
   * `name`: corresponds to resource name. - `display_name`: corresponds to info
   * type's display name.
   * @opt_param int pageSize Size of the page, can be limited by the server. If
   * zero server returns a page of max size 100.
   * @opt_param string pageToken Page token to continue retrieval. Comes from
   * previous call to `ListStoredInfoTypes`.
   * @return GooglePrivacyDlpV2ListStoredInfoTypesResponse
   */
  public function listProjectsLocationsStoredInfoTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GooglePrivacyDlpV2ListStoredInfoTypesResponse::class);
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
   * @param GooglePrivacyDlpV2UpdateStoredInfoTypeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GooglePrivacyDlpV2StoredInfoType
   */
  public function patch($name, GooglePrivacyDlpV2UpdateStoredInfoTypeRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GooglePrivacyDlpV2StoredInfoType::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsStoredInfoTypes::class, 'Google_Service_DLP_Resource_ProjectsLocationsStoredInfoTypes');
