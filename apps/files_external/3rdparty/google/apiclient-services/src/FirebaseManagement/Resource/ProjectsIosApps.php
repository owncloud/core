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

namespace Google\Service\FirebaseManagement\Resource;

use Google\Service\FirebaseManagement\IosApp;
use Google\Service\FirebaseManagement\IosAppConfig;
use Google\Service\FirebaseManagement\ListIosAppsResponse;
use Google\Service\FirebaseManagement\Operation;
use Google\Service\FirebaseManagement\RemoveIosAppRequest;

/**
 * The "iosApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google\Service\FirebaseManagement(...);
 *   $iosApps = $firebaseService->iosApps;
 *  </code>
 */
class ProjectsIosApps extends \Google\Service\Resource
{
  /**
   * Requests the creation of a new IosApp in the specified FirebaseProject. The
   * result of this call is an `Operation` which can be used to track the
   * provisioning process. The `Operation` is automatically deleted after
   * completion, so there is no need to call `DeleteOperation`. (iosApps.create)
   *
   * @param string $parent The resource name of the parent FirebaseProject in
   * which to create an IosApp, in the format: projects/PROJECT_IDENTIFIER/iosApps
   * Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param IosApp $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, IosApp $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets the specified IosApp. (iosApps.get)
   *
   * @param string $name The resource name of the IosApp, in the format:
   * projects/PROJECT_IDENTIFIER /iosApps/APP_ID Since an APP_ID is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/iosApps/APP_ID Refer to the `IosApp`
   * [`name`](../projects.iosApps#IosApp.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER and APP_ID values.
   * @param array $optParams Optional parameters.
   * @return IosApp
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], IosApp::class);
  }
  /**
   * Gets the configuration artifact associated with the specified IosApp.
   * (iosApps.getConfig)
   *
   * @param string $name The resource name of the App configuration to download,
   * in the format: projects/PROJECT_IDENTIFIER/iosApps/APP_ID/config Since an
   * APP_ID is a unique identifier, the Unique Resource from Sub-Collection access
   * pattern may be used here, in the format: projects/-/iosApps/APP_ID Refer to
   * the `IosApp` [`name`](../projects.iosApps#IosApp.FIELDS.name) field for
   * details about PROJECT_IDENTIFIER and APP_ID values.
   * @param array $optParams Optional parameters.
   * @return IosAppConfig
   */
  public function getConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], IosAppConfig::class);
  }
  /**
   * Lists each IosApp associated with the specified FirebaseProject. The elements
   * are returned in no particular order, but will be a consistent view of the
   * Apps when additional requests are made with a `pageToken`.
   * (iosApps.listProjectsIosApps)
   *
   * @param string $parent The resource name of the parent FirebaseProject for
   * which to list each associated IosApp, in the format:
   * projects/PROJECT_IDENTIFIER/iosApps Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Apps to return in the response.
   * The server may return fewer than this at its discretion. If no value is
   * specified (or too large a value is specified), the server will impose its own
   * limit.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListIosApps` indicating where in the set of Apps to resume listing.
   * @opt_param bool showDeleted Controls whether Apps in the DELETED state should
   * be returned. Defaults to false.
   * @return ListIosAppsResponse
   */
  public function listProjectsIosApps($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListIosAppsResponse::class);
  }
  /**
   * Updates the attributes of the specified IosApp. (iosApps.patch)
   *
   * @param string $name The resource name of the IosApp, in the format:
   * projects/PROJECT_IDENTIFIER /iosApps/APP_ID * PROJECT_IDENTIFIER: the parent
   * Project's
   * [`ProjectNumber`](../projects#FirebaseProject.FIELDS.project_number)
   * ***(recommended)*** or its
   * [`ProjectId`](../projects#FirebaseProject.FIELDS.project_id). Learn more
   * about using project identifiers in Google's [AIP 2510
   * standard](https://google.aip.dev/cloud/2510). Note that the value for
   * PROJECT_IDENTIFIER in any response body will be the `ProjectId`. * APP_ID:
   * the globally unique, Firebase-assigned identifier for the App (see
   * [`appId`](../projects.iosApps#IosApp.FIELDS.app_id)).
   * @param IosApp $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies which fields to update. Note that the
   * fields `name`, `appId`, `projectId`, `bundleId`, and `state` are all
   * immutable
   * @return IosApp
   */
  public function patch($name, IosApp $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], IosApp::class);
  }
  /**
   * Removes the specified IosApp from the project. (iosApps.remove)
   *
   * @param string $name Required. The resource name of the IosApp, in the format:
   * projects/ PROJECT_IDENTIFIER/iosApps/APP_ID Since an APP_ID is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/iosApps/APP_ID Refer to the IosApp
   * [name](../projects.iosApps#IosApp.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER and APP_ID values.
   * @param RemoveIosAppRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function remove($name, RemoveIosAppRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('remove', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsIosApps::class, 'Google_Service_FirebaseManagement_Resource_ProjectsIosApps');
