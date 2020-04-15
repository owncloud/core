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
 * The "sha" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google_Service_FirebaseManagement(...);
 *   $sha = $firebaseService->sha;
 *  </code>
 */
class Google_Service_FirebaseManagement_Resource_ProjectsAndroidAppsSha extends Google_Service_Resource
{
  /**
   * Adds a SHA certificate to the specified AndroidApp. (sha.create)
   *
   * @param string $parent The parent App to which a SHA certificate will be
   * added, in the format: projects/projectId/androidApps/appId As an appId is a
   * unique identifier, the Unique Resource from Sub-Collection access pattern may
   * be used here, in the format: projects/-/androidApps/appId
   * @param Google_Service_FirebaseManagement_ShaCertificate $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_ShaCertificate
   */
  public function create($parent, Google_Service_FirebaseManagement_ShaCertificate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseManagement_ShaCertificate");
  }
  /**
   * Removes a SHA certificate from the specified AndroidApp. (sha.delete)
   *
   * @param string $name The fully qualified resource name of the `sha-key`, in
   * the format: projects/projectId/androidApps/appId/sha/shaId You can obtain the
   * full name from the response of
   * [`ListShaCertificates`](../projects.androidApps.sha/list) or the original
   * [`CreateShaCertificate`](../projects.androidApps.sha/create).
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_FirebaseEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseManagement_FirebaseEmpty");
  }
  /**
   * Returns the list of SHA-1 and SHA-256 certificates for the specified
   * AndroidApp. (sha.listProjectsAndroidAppsSha)
   *
   * @param string $parent The parent App for which to list SHA certificates, in
   * the format: projects/projectId/androidApps/appId As an appId is a unique
   * identifier, the Unique Resource from Sub-Collection access pattern may be
   * used here, in the format: projects/-/androidApps/appId
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_ListShaCertificatesResponse
   */
  public function listProjectsAndroidAppsSha($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseManagement_ListShaCertificatesResponse");
  }
}
