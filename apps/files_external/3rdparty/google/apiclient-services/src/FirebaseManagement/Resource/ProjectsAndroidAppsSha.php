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

use Google\Service\FirebaseManagement\FirebaseEmpty;
use Google\Service\FirebaseManagement\ListShaCertificatesResponse;
use Google\Service\FirebaseManagement\ShaCertificate;

/**
 * The "sha" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google\Service\FirebaseManagement(...);
 *   $sha = $firebaseService->sha;
 *  </code>
 */
class ProjectsAndroidAppsSha extends \Google\Service\Resource
{
  /**
   * Adds a ShaCertificate to the specified AndroidApp. (sha.create)
   *
   * @param string $parent The resource name of the parent AndroidApp to which to
   * add a ShaCertificate, in the format: projects/PROJECT_IDENTIFIER/androidApps/
   * APP_ID Since an APP_ID is a unique identifier, the Unique Resource from Sub-
   * Collection access pattern may be used here, in the format:
   * projects/-/androidApps/APP_ID Refer to the `AndroidApp`
   * [`name`](../projects.androidApps#AndroidApp.FIELDS.name) field for details
   * about PROJECT_IDENTIFIER and APP_ID values.
   * @param ShaCertificate $postBody
   * @param array $optParams Optional parameters.
   * @return ShaCertificate
   */
  public function create($parent, ShaCertificate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ShaCertificate::class);
  }
  /**
   * Removes a ShaCertificate from the specified AndroidApp. (sha.delete)
   *
   * @param string $name The resource name of the ShaCertificate to remove from
   * the parent AndroidApp, in the format:
   * projects/PROJECT_IDENTIFIER/androidApps/APP_ID /sha/SHA_HASH Refer to the
   * `ShaCertificate`
   * [`name`](../projects.androidApps.sha#ShaCertificate.FIELDS.name) field for
   * details about PROJECT_IDENTIFIER, APP_ID, and SHA_HASH values. You can obtain
   * the full resource name of the `ShaCertificate` from the response of
   * [`ListShaCertificates`](../projects.androidApps.sha/list) or the original
   * [`CreateShaCertificate`](../projects.androidApps.sha/create).
   * @param array $optParams Optional parameters.
   * @return FirebaseEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], FirebaseEmpty::class);
  }
  /**
   * Lists the SHA-1 and SHA-256 certificates for the specified AndroidApp.
   * (sha.listProjectsAndroidAppsSha)
   *
   * @param string $parent The resource name of the parent AndroidApp for which to
   * list each associated ShaCertificate, in the format:
   * projects/PROJECT_IDENTIFIER /androidApps/APP_ID Since an APP_ID is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/androidApps/APP_ID Refer to the
   * `AndroidApp` [`name`](../projects.androidApps#AndroidApp.FIELDS.name) field
   * for details about PROJECT_IDENTIFIER and APP_ID values.
   * @param array $optParams Optional parameters.
   * @return ListShaCertificatesResponse
   */
  public function listProjectsAndroidAppsSha($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListShaCertificatesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAndroidAppsSha::class, 'Google_Service_FirebaseManagement_Resource_ProjectsAndroidAppsSha');
