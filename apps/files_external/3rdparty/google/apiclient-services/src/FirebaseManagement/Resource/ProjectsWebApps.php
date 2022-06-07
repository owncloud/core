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

use Google\Service\FirebaseManagement\ListWebAppsResponse;
use Google\Service\FirebaseManagement\Operation;
use Google\Service\FirebaseManagement\WebApp;
use Google\Service\FirebaseManagement\WebAppConfig;

/**
 * The "webApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google\Service\FirebaseManagement(...);
 *   $webApps = $firebaseService->webApps;
 *  </code>
 */
class ProjectsWebApps extends \Google\Service\Resource
{
  /**
   * Requests the creation of a new WebApp in the specified FirebaseProject. The
   * result of this call is an `Operation` which can be used to track the
   * provisioning process. The `Operation` is automatically deleted after
   * completion, so there is no need to call `DeleteOperation`. (webApps.create)
   *
   * @param string $parent The resource name of the parent FirebaseProject in
   * which to create a WebApp, in the format: projects/PROJECT_IDENTIFIER/webApps
   * Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, WebApp $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets the specified WebApp. (webApps.get)
   *
   * @param string $name The resource name of the WebApp, in the format:
   * projects/PROJECT_IDENTIFIER /webApps/APP_ID Since an APP_ID is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/webApps/APP_ID Refer to the `WebApp`
   * [`name`](../projects.webApps#WebApp.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER and APP_ID values.
   * @param array $optParams Optional parameters.
   * @return WebApp
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WebApp::class);
  }
  /**
   * Gets the configuration artifact associated with the specified WebApp.
   * (webApps.getConfig)
   *
   * @param string $name The resource name of the WebApp configuration to
   * download, in the format: projects/PROJECT_IDENTIFIER/webApps/APP_ID/config
   * Since an APP_ID is a unique identifier, the Unique Resource from Sub-
   * Collection access pattern may be used here, in the format:
   * projects/-/webApps/APP_ID Refer to the `WebApp`
   * [`name`](../projects.webApps#WebApp.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER and APP_ID values.
   * @param array $optParams Optional parameters.
   * @return WebAppConfig
   */
  public function getConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], WebAppConfig::class);
  }
  /**
   * Lists each WebApp associated with the specified FirebaseProject. The elements
   * are returned in no particular order, but will be a consistent view of the
   * Apps when additional requests are made with a `pageToken`.
   * (webApps.listProjectsWebApps)
   *
   * @param string $parent The resource name of the parent FirebaseProject for
   * which to list each associated WebApp, in the format:
   * projects/PROJECT_IDENTIFIER/webApps Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Apps to return in the response.
   * The server may return fewer than this value at its discretion. If no value is
   * specified (or too large a value is specified), then the server will impose
   * its own limit.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListWebApps` indicating where in the set of Apps to resume listing.
   * @return ListWebAppsResponse
   */
  public function listProjectsWebApps($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWebAppsResponse::class);
  }
  /**
   * Updates the attributes of the specified WebApp. (webApps.patch)
   *
   * @param string $name The resource name of the WebApp, in the format:
   * projects/PROJECT_IDENTIFIER /webApps/APP_ID * PROJECT_IDENTIFIER: the parent
   * Project's
   * [`ProjectNumber`](../projects#FirebaseProject.FIELDS.project_number)
   * ***(recommended)*** or its
   * [`ProjectId`](../projects#FirebaseProject.FIELDS.project_id). Learn more
   * about using project identifiers in Google's [AIP 2510
   * standard](https://google.aip.dev/cloud/2510). Note that the value for
   * PROJECT_IDENTIFIER in any response body will be the `ProjectId`. * APP_ID:
   * the globally unique, Firebase-assigned identifier for the App (see
   * [`appId`](../projects.webApps#WebApp.FIELDS.app_id)).
   * @param WebApp $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies which fields to update. Note that the
   * fields `name`, `appId`, and `projectId` are all immutable.
   * @return WebApp
   */
  public function patch($name, WebApp $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], WebApp::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsWebApps::class, 'Google_Service_FirebaseManagement_Resource_ProjectsWebApps');
