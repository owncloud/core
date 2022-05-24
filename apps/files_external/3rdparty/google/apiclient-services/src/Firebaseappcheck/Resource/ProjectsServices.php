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

namespace Google\Service\Firebaseappcheck\Resource;

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1BatchUpdateServicesRequest;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1BatchUpdateServicesResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1ListServicesResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1Service;

/**
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $services = $firebaseappcheckService->services;
 *  </code>
 */
class ProjectsServices extends \Google\Service\Resource
{
  /**
   * Atomically updates the specified Service configurations.
   * (services.batchUpdate)
   *
   * @param string $parent Required. The parent project name shared by all Service
   * configurations being updated, in the format ``` projects/{project_number} ```
   * The parent collection in the `name` field of any resource being updated must
   * match this field, or the entire batch fails.
   * @param GoogleFirebaseAppcheckV1BatchUpdateServicesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1BatchUpdateServicesResponse
   */
  public function batchUpdate($parent, GoogleFirebaseAppcheckV1BatchUpdateServicesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdate', [$params], GoogleFirebaseAppcheckV1BatchUpdateServicesResponse::class);
  }
  /**
   * Gets the Service configuration for the specified service name. (services.get)
   *
   * @param string $name Required. The relative resource name of the Service to
   * retrieve, in the format: ``` projects/{project_number}/services/{service_id}
   * ``` Note that the `service_id` element must be a supported service ID.
   * Currently, the following service IDs are supported: *
   * `firebasestorage.googleapis.com` (Cloud Storage for Firebase) *
   * `firebasedatabase.googleapis.com` (Firebase Realtime Database) *
   * `firestore.googleapis.com` (Cloud Firestore)
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1Service
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1Service::class);
  }
  /**
   * Lists all Service configurations for the specified project. Only Services
   * which were explicitly configured using UpdateService or BatchUpdateServices
   * will be returned. (services.listProjectsServices)
   *
   * @param string $parent Required. The relative resource name of the parent
   * project for which to list each associated Service, in the format: ```
   * projects/{project_number} ```
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Services to return in the
   * response. Only explicitly configured services are returned. The server may
   * return fewer than this at its own discretion. If no value is specified (or
   * too large a value is specified), the server will impose its own limit.
   * @opt_param string pageToken Token returned from a previous call to
   * ListServices indicating where in the set of Services to resume listing.
   * Provide this to retrieve the subsequent page. When paginating, all other
   * parameters provided to ListServices must match the call that provided the
   * page token; if they do not match, the result is undefined.
   * @return GoogleFirebaseAppcheckV1ListServicesResponse
   */
  public function listProjectsServices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleFirebaseAppcheckV1ListServicesResponse::class);
  }
  /**
   * Updates the specified Service configuration. (services.patch)
   *
   * @param string $name Required. The relative resource name of the service
   * configuration object, in the format: ```
   * projects/{project_number}/services/{service_id} ``` Note that the
   * `service_id` element must be a supported service ID. Currently, the following
   * service IDs are supported: * `firebasestorage.googleapis.com` (Cloud Storage
   * for Firebase) * `firebasedatabase.googleapis.com` (Firebase Realtime
   * Database) * `firestore.googleapis.com` (Cloud Firestore)
   * @param GoogleFirebaseAppcheckV1Service $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the Service to update. Example: `enforcement_mode`.
   * @return GoogleFirebaseAppcheckV1Service
   */
  public function patch($name, GoogleFirebaseAppcheckV1Service $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleFirebaseAppcheckV1Service::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsServices::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsServices');
