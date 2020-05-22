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
 * The "calendars" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $calendars = $adminService->calendars;
 *  </code>
 */
class Google_Service_Directory_Resource_ResourcesCalendars extends Google_Service_Resource
{
  /**
   * Deletes a calendar resource. (calendars.delete)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $calendarResourceId, $optParams = array())
  {
    $params = array('customer' => $customer, 'calendarResourceId' => $calendarResourceId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a calendar resource. (calendars.get)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_CalendarResource
   */
  public function get($customer, $calendarResourceId, $optParams = array())
  {
    $params = array('customer' => $customer, 'calendarResourceId' => $calendarResourceId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_CalendarResource");
  }
  /**
   * Inserts a calendar resource. (calendars.insert)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param Google_Service_Directory_CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_CalendarResource
   */
  public function insert($customer, Google_Service_Directory_CalendarResource $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_CalendarResource");
  }
  /**
   * Retrieves a list of calendar resources for an account.
   * (calendars.listResourcesCalendars)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderBy Field(s) to sort results by in either ascending or
   * descending order. Supported fields include resourceId, resourceName,
   * capacity, buildingId, and floorName. If no order is specified, defaults to
   * ascending. Should be of the form "field [asc|desc], field [asc|desc], ...".
   * For example buildingId, capacity desc would return results sorted first by
   * buildingId in ascending order then by capacity in descending order.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @opt_param string query String query used to filter results. Should be of the
   * form "field operator value" where field can be any of supported fields and
   * operators can be any of supported operations. Operators include '=' for exact
   * match and ':' for prefix match or HAS match where applicable. For prefix
   * match, the value should always be followed by a *. Supported fields include
   * generatedResourceName, name, buildingId, featureInstances.feature.name. For
   * example buildingId=US-NYC-9TH AND featureInstances.feature.name:Phone.
   * @return Google_Service_Directory_CalendarResources
   */
  public function listResourcesCalendars($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_CalendarResources");
  }
  /**
   * Updates a calendar resource.
   *
   * This method supports patch semantics, meaning you only need to include the
   * fields you wish to update. Fields that are not present in the request will be
   * preserved. This method supports patch semantics. (calendars.patch)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * update.
   * @param Google_Service_Directory_CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_CalendarResource
   */
  public function patch($customer, $calendarResourceId, Google_Service_Directory_CalendarResource $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'calendarResourceId' => $calendarResourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_CalendarResource");
  }
  /**
   * Updates a calendar resource.
   *
   * This method supports patch semantics, meaning you only need to include the
   * fields you wish to update. Fields that are not present in the request will be
   * preserved. (calendars.update)
   *
   * @param string $customer The unique ID for the customer's G Suite account. As
   * an account administrator, you can also use the my_customer alias to represent
   * your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * update.
   * @param Google_Service_Directory_CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_CalendarResource
   */
  public function update($customer, $calendarResourceId, Google_Service_Directory_CalendarResource $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'calendarResourceId' => $calendarResourceId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_CalendarResource");
  }
}
