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
 * The "orgunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $orgunits = $adminService->orgunits;
 *  </code>
 */
class Google_Service_Directory_Resource_Orgunits extends Google_Service_Resource
{
  /**
   * Removes an organizational unit. (orgunits.delete)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $orgUnitPath The full path of the organizational unit or its
   * unique ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowPlus Parses org unit path without url decode to allow
   * for plus in ou name
   */
  public function delete($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves an organizational unit. (orgunits.get)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $orgUnitPath The full path of the organizational unit or its
   * unique ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowPlus Parses org unit path without url decode to allow
   * for plus in ou name
   * @return Google_Service_Directory_OrgUnit
   */
  public function get($customerId, $orgUnitPath, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Adds an organizational unit. (orgunits.insert)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_OrgUnit
   */
  public function insert($customerId, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Retrieves a list of all organizational units for an account.
   * (orgunits.listOrgunits)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orgUnitPath The full path to the organizational unit or its
   * unique ID. Returns the children of the specified organizational unit.
   * @opt_param string type Whether to return all sub-organizations or just
   * immediate children.
   * @return Google_Service_Directory_OrgUnits
   */
  public function listOrgunits($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_OrgUnits");
  }
  /**
   * Updates an organizational unit. This method supports [patch semantics
   * ](/admin-sdk/directory/v1/guides/performance#patch) (orgunits.patch)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $orgUnitPath The full path of the organizational unit or its
   * unique ID.
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowPlus Parses org unit path without url decode to allow
   * for plus in ou name
   * @return Google_Service_Directory_OrgUnit
   */
  public function patch($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_OrgUnit");
  }
  /**
   * Updates an organizational unit. (orgunits.update)
   *
   * @param string $customerId The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's `customerId`. The `customerId` is also
   * returned as part of the [Users resource](/admin-
   * sdk/directory/v1/reference/users).
   * @param string $orgUnitPath The full path of the organizational unit or its
   * unique ID.
   * @param Google_Service_Directory_OrgUnit $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowPlus Parses org unit path without url decode to allow
   * for plus in ou name
   * @return Google_Service_Directory_OrgUnit
   */
  public function update($customerId, $orgUnitPath, Google_Service_Directory_OrgUnit $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'orgUnitPath' => $orgUnitPath, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_OrgUnit");
  }
}
