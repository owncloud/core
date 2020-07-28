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
 * The "bundles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $bundles = $androidpublisherService->bundles;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_EditsBundles extends Google_Service_Resource
{
  /**
   * Lists all current Android App Bundles of the app and edit.
   * (bundles.listEditsBundles)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_BundlesListResponse
   */
  public function listEditsBundles($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_BundlesListResponse");
  }
  /**
   * Uploads a new Android App Bundle to this edit. If you are using the Google
   * API client libraries, please increase the timeout of the http request before
   * calling this endpoint (a timeout of 2 minutes is recommended). See [Timeouts
   * and Errors](https://developers.google.com/api-client-library/java/google-api-
   * java-client/errors) for an example in java. (bundles.upload)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool ackBundleInstallationWarning Must be set to true if the
   * bundle installation may trigger a warning on user devices (for example, if
   * installation size may be over a threshold, typically 100 MB).
   * @return Google_Service_AndroidPublisher_Bundle
   */
  public function upload($packageName, $editId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'editId' => $editId);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_AndroidPublisher_Bundle");
  }
}
