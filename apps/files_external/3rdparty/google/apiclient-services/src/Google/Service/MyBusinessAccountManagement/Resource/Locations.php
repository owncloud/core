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
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessaccountmanagementService = new Google_Service_MyBusinessAccountManagement(...);
 *   $locations = $mybusinessaccountmanagementService->locations;
 *  </code>
 */
class Google_Service_MyBusinessAccountManagement_Resource_Locations extends Google_Service_Resource
{
  /**
   * Moves a location from an account that the user owns to another account that
   * the same user administers. The user must be an owner of the account the
   * location is currently associated with and must also be at least a manager of
   * the destination account. (locations.transfer)
   *
   * @param string $name Required. The name of the location to transfer.
   * `locations/{location_id}`.
   * @param Google_Service_MyBusinessAccountManagement_TransferLocationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_MybusinessaccountmanagementEmpty
   */
  public function transfer($name, Google_Service_MyBusinessAccountManagement_TransferLocationRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('transfer', array($params), "Google_Service_MyBusinessAccountManagement_MybusinessaccountmanagementEmpty");
  }
}
