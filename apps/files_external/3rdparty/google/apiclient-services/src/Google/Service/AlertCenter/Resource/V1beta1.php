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
 * The "v1beta1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $alertcenterService = new Google_Service_AlertCenter(...);
 *   $v1beta1 = $alertcenterService->v1beta1;
 *  </code>
 */
class Google_Service_AlertCenter_Resource_V1beta1 extends Google_Service_Resource
{
  /**
   * Returns customer-level settings. (v1beta1.getSettings)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the G Suite
   * organization account of the customer the alert settings are associated with.
   * Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_Settings
   */
  public function getSettings($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getSettings', array($params), "Google_Service_AlertCenter_Settings");
  }
  /**
   * Updates the customer-level settings. (v1beta1.updateSettings)
   *
   * @param Google_Service_AlertCenter_Settings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Optional. The unique identifier of the G Suite
   * organization account of the customer the alert settings are associated with.
   * Inferred from the caller identity if not provided.
   * @return Google_Service_AlertCenter_Settings
   */
  public function updateSettings(Google_Service_AlertCenter_Settings $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateSettings', array($params), "Google_Service_AlertCenter_Settings");
  }
}
