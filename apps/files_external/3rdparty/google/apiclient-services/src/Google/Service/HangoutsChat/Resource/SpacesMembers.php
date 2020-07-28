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
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google_Service_HangoutsChat(...);
 *   $members = $chatService->members;
 *  </code>
 */
class Google_Service_HangoutsChat_Resource_SpacesMembers extends Google_Service_Resource
{
  /**
   * Returns a membership. (members.get)
   *
   * @param string $name Required. Resource name of the membership to be
   * retrieved, in the form "spaces/members".
   *
   * Example: spaces/AAAAMpdlehY/members/105115627578887013105
   * @param array $optParams Optional parameters.
   * @return Google_Service_HangoutsChat_Membership
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_HangoutsChat_Membership");
  }
  /**
   * Lists human memberships in a space. (members.listSpacesMembers)
   *
   * @param string $parent Required. The resource name of the space for which
   * membership list is to be fetched, in the form "spaces".
   *
   * Example: spaces/AAAAMpdlehY
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The value is capped at 1000.
   * Server may return fewer results than requested. If unspecified, server will
   * default to 100.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return.
   * @return Google_Service_HangoutsChat_ListMembershipsResponse
   */
  public function listSpacesMembers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_HangoutsChat_ListMembershipsResponse");
  }
}
