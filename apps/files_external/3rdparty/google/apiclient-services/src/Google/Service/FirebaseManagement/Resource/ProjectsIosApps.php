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
 * The "iosApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google_Service_FirebaseManagement(...);
 *   $iosApps = $firebaseService->iosApps;
 *  </code>
 */
class Google_Service_FirebaseManagement_Resource_ProjectsIosApps extends Google_Service_Resource
{
  /**
   * Requests that a new IosApp be created.
   *
   * The result of this call is an `Operation` which can be used to track the
   * provisioning process. The `Operation` is automatically deleted after
   * completion, so there is no need to call `DeleteOperation`. (iosApps.create)
   *
   * @param string $parent The parent Project in which to create an App, in the
   * format: projects/PROJECT_NUMBER
   * @param Google_Service_FirebaseManagement_IosApp $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_Operation
   */
  public function create($parent, Google_Service_FirebaseManagement_IosApp $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseManagement_Operation");
  }
  /**
   * Gets the IosApp identified by the specified resource name. (iosApps.get)
   *
   * @param string $name The fully qualified resource name of the App, in the
   * format: projects/PROJECT_NUMBER/iosApps/APP_ID As an APP_ID is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/iosApps/APP_ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_IosApp
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseManagement_IosApp");
  }
  /**
   * Gets the configuration artifact associated with the specified IosApp.
   * (iosApps.getConfig)
   *
   * @param string $name The resource name of the App configuration to download,
   * in the format: projects/PROJECT_NUMBER/iosApps/APP_ID/config As an APP_ID is
   * a unique identifier, the Unique Resource from Sub-Collection access pattern
   * may be used here, in the format: projects/-/iosApps/APP_ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_IosAppConfig
   */
  public function getConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_FirebaseManagement_IosAppConfig");
  }
  /**
   * Lists each IosApp associated with the specified parent Project.
   *
   * The elements are returned in no particular order, but will be a consistent
   * view of the Apps when additional requests are made with a `pageToken`.
   * (iosApps.listProjectsIosApps)
   *
   * @param string $parent The parent Project for which to list Apps, in the
   * format: projects/PROJECT_NUMBER
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Token returned from a previous call to
   * `ListIosApps` indicating where in the set of Apps to resume listing.
   * @opt_param int pageSize The maximum number of Apps to return in the response.
   *
   * The server may return fewer than this at its discretion. If no value is
   * specified (or too large a value is specified), the server will impose its own
   * limit.
   * @return Google_Service_FirebaseManagement_ListIosAppsResponse
   */
  public function listProjectsIosApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseManagement_ListIosAppsResponse");
  }
  /**
   * Updates the attributes of the IosApp identified by the specified resource
   * name. (iosApps.patch)
   *
   * @param string $name The fully qualified resource name of the App, in the
   * format: projects/projectId/iosApps/appId
   * @param Google_Service_FirebaseManagement_IosApp $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies which fields to update. Note that the
   * fields `name`, `appId`, `projectId`, and `bundleId` are all immutable.
   * @return Google_Service_FirebaseManagement_IosApp
   */
  public function patch($name, Google_Service_FirebaseManagement_IosApp $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_FirebaseManagement_IosApp");
  }
}
