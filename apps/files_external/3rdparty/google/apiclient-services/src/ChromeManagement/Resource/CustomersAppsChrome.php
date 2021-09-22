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

namespace Google\Service\ChromeManagement\Resource;

use Google\Service\ChromeManagement\GoogleChromeManagementV1AppDetails;

/**
 * The "chrome" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromemanagementService = new Google\Service\ChromeManagement(...);
 *   $chrome = $chromemanagementService->chrome;
 *  </code>
 */
class CustomersAppsChrome extends \Google\Service\Resource
{
  /**
   * Get a specific app for a customer by its resource name. (chrome.get)
   *
   * @param string $name Required. The app for which details are being queried.
   * Examples:
   * "customers/my_customer/apps/chrome/gmbmikajjgmnabiglmofipeabaddhgne@2.1.2"
   * for the Save to Google Drive Chrome extension version 2.1.2,
   * "customers/my_customer/apps/android/com.google.android.apps.docs" for the
   * Google Drive Android app's latest version.
   * @param array $optParams Optional parameters.
   * @return GoogleChromeManagementV1AppDetails
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleChromeManagementV1AppDetails::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersAppsChrome::class, 'Google_Service_ChromeManagement_Resource_CustomersAppsChrome');
