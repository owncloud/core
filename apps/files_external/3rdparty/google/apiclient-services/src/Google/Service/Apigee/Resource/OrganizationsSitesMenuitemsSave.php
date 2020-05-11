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
 * The "save" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $save = $apigeeService->save;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsSitesMenuitemsSave extends Google_Service_Resource
{
  /**
   * Rearranges the order of menu items. (save.updatePriorities)
   *
   * @param string $parent Required. Use the following structure in your request:
   * `organizations/{org}/sites/{site}/menuitems`
   * @param Google_Service_Apigee_UpdatePrioritiesRequestContent $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper
   */
  public function updatePriorities($parent, Google_Service_Apigee_UpdatePrioritiesRequestContent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatePriorities', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ApiResponseWrapper");
  }
}
