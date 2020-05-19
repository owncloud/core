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
 * The "floodlightGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $floodlightGroups = $displayvideoService->floodlightGroups;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_FloodlightGroups extends Google_Service_Resource
{
  /**
   * Gets a Floodlight group. (floodlightGroups.get)
   *
   * @param string $floodlightGroupId Required. The ID of the Floodlight group to
   * fetch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId Required. The partner context by which the
   * Floodlight group is being accessed.
   * @return Google_Service_DisplayVideo_FloodlightGroup
   */
  public function get($floodlightGroupId, $optParams = array())
  {
    $params = array('floodlightGroupId' => $floodlightGroupId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_FloodlightGroup");
  }
  /**
   * Updates an existing Floodlight group. Returns the updated Floodlight group if
   * successful. (floodlightGroups.patch)
   *
   * @param string $floodlightGroupId Output only. The unique ID of the Floodlight
   * group. Assigned by the system.
   * @param Google_Service_DisplayVideo_FloodlightGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string partnerId Required. The partner context by which the
   * Floodlight group is being accessed.
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_FloodlightGroup
   */
  public function patch($floodlightGroupId, Google_Service_DisplayVideo_FloodlightGroup $postBody, $optParams = array())
  {
    $params = array('floodlightGroupId' => $floodlightGroupId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_FloodlightGroup");
  }
}
