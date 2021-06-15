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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google_Service_Baremetalsolution(...);
 *   $instances = $baremetalsolutionService->instances;
 *  </code>
 */
class Google_Service_Baremetalsolution_Resource_ProjectsLocationsInstances extends Google_Service_Resource
{
  /**
   * Perform an ungraceful, hard reset on a machine (equivalent to shutting the
   * power off, and then turning it back on). (instances.resetInstance)
   *
   * @param string $instance Required. Name of the instance to reset.
   * @param Google_Service_Baremetalsolution_ResetInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Baremetalsolution_ResetInstanceResponse
   */
  public function resetInstance($instance, Google_Service_Baremetalsolution_ResetInstanceRequest $postBody, $optParams = array())
  {
    $params = array('instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetInstance', array($params), "Google_Service_Baremetalsolution_ResetInstanceResponse");
  }
}
