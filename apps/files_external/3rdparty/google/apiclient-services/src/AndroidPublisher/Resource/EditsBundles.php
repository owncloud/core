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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\Bundle;
use Google\Service\AndroidPublisher\BundlesListResponse;

/**
 * The "bundles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $bundles = $androidpublisherService->bundles;
 *  </code>
 */
class EditsBundles extends \Google\Service\Resource
{
  /**
   * Lists all current Android App Bundles of the app and edit.
   * (bundles.listEditsBundles)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param array $optParams Optional parameters.
   * @return BundlesListResponse
   */
  public function listEditsBundles($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BundlesListResponse::class);
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
   * @opt_param bool ackBundleInstallationWarning Must be set to true if the app
   * bundle installation may trigger a warning on user devices (for example, if
   * installation size may be over a threshold, typically 100 MB).
   * @return Bundle
   */
  public function upload($packageName, $editId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], Bundle::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsBundles::class, 'Google_Service_AndroidPublisher_Resource_EditsBundles');
