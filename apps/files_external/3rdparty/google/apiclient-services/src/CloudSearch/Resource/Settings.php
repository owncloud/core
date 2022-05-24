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

namespace Google\Service\CloudSearch\Resource;

use Google\Service\CloudSearch\CustomerSettings;
use Google\Service\CloudSearch\Operation;

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudsearchService = new Google\Service\CloudSearch(...);
 *   $settings = $cloudsearchService->settings;
 *  </code>
 */
class Settings extends \Google\Service\Resource
{
  /**
   * Get customer settings. **Note:** This API requires an admin account to
   * execute. (settings.getCustomer)
   *
   * @param array $optParams Optional parameters.
   * @return CustomerSettings
   */
  public function getCustomer($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getCustomer', [$params], CustomerSettings::class);
  }
  /**
   * Update customer settings. **Note:** This API requires an admin account to
   * execute. (settings.updateCustomer)
   *
   * @param CustomerSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask to control which fields get updated.
   * If you specify a field in the update_mask but don't specify its value here,
   * that field will be cleared. If the mask is not present or empty, all fields
   * will be updated. Currently supported field paths: vpc_settings and
   * audit_logging_settings
   * @return Operation
   */
  public function updateCustomer(CustomerSettings $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateCustomer', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Settings::class, 'Google_Service_CloudSearch_Resource_Settings');
