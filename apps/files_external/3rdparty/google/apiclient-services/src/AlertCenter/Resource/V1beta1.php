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

namespace Google\Service\AlertCenter\Resource;

use Google\Service\AlertCenter\Settings;

/**
 * The "v1beta1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $alertcenterService = new Google\Service\AlertCenter(...);
 *   $v1beta1 = $alertcenterService->v1beta1;
 *  </code>
 */
class V1beta1 extends \Google\Service\Resource
{
  /**
   * Returns customer-level settings. (v1beta1.getSettings)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert settings are
   * associated with. Inferred from the caller identity if not provided.
   * @return Settings
   */
  public function getSettings($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getSettings', [$params], Settings::class);
  }
  /**
   * Updates the customer-level settings. (v1beta1.updateSettings)
   *
   * @param Settings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the Google
   * Workspace organization account of the customer the alert settings are
   * associated with. Inferred from the caller identity if not provided.
   * @return Settings
   */
  public function updateSettings(Settings $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateSettings', [$params], Settings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V1beta1::class, 'Google_Service_AlertCenter_Resource_V1beta1');
