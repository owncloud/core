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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\CalendarResource;
use Google\Service\Directory\CalendarResources;

/**
 * The "calendars" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $calendars = $adminService->calendars;
 *  </code>
 */
class ResourcesCalendars extends \Google\Service\Resource
{
  /**
   * Deletes a calendar resource. (calendars.delete)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $calendarResourceId, $optParams = [])
  {
    $params = ['customer' => $customer, 'calendarResourceId' => $calendarResourceId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a calendar resource. (calendars.get)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return CalendarResource
   */
  public function get($customer, $calendarResourceId, $optParams = [])
  {
    $params = ['customer' => $customer, 'calendarResourceId' => $calendarResourceId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CalendarResource::class);
  }
  /**
   * Inserts a calendar resource. (calendars.insert)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return CalendarResource
   */
  public function insert($customer, CalendarResource $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CalendarResource::class);
  }
  /**
   * Retrieves a list of calendar resources for an account.
   * (calendars.listResourcesCalendars)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string orderBy Field(s) to sort results by in either ascending or
   * descending order. Supported fields include `resourceId`, `resourceName`,
   * `capacity`, `buildingId`, and `floorName`. If no order is specified, defaults
   * to ascending. Should be of the form "field [asc|desc], field [asc|desc],
   * ...". For example `buildingId, capacity desc` would return results sorted
   * first by `buildingId` in ascending order then by `capacity` in descending
   * order.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @opt_param string query String query used to filter results. Should be of the
   * form "field operator value" where field can be any of supported fields and
   * operators can be any of supported operations. Operators include '=' for exact
   * match, '!=' for mismatch and ':' for prefix match or HAS match where
   * applicable. For prefix match, the value should always be followed by a *.
   * Logical operators NOT and AND are supported (in this order of precedence).
   * Supported fields include `generatedResourceName`, `name`, `buildingId`,
   * `floor_name`, `capacity`, `featureInstances.feature.name`, `resourceEmail`,
   * `resourceCategory`. For example `buildingId=US-NYC-9TH AND
   * featureInstances.feature.name:Phone`.
   * @return CalendarResources
   */
  public function listResourcesCalendars($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CalendarResources::class);
  }
  /**
   * Patches a calendar resource. (calendars.patch)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * update.
   * @param CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return CalendarResource
   */
  public function patch($customer, $calendarResourceId, CalendarResource $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'calendarResourceId' => $calendarResourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CalendarResource::class);
  }
  /**
   * Updates a calendar resource. This method supports patch semantics, meaning
   * you only need to include the fields you wish to update. Fields that are not
   * present in the request will be preserved. (calendars.update)
   *
   * @param string $customer The unique ID for the customer's Google Workspace
   * account. As an account administrator, you can also use the `my_customer`
   * alias to represent your account's customer ID.
   * @param string $calendarResourceId The unique ID of the calendar resource to
   * update.
   * @param CalendarResource $postBody
   * @param array $optParams Optional parameters.
   * @return CalendarResource
   */
  public function update($customer, $calendarResourceId, CalendarResource $postBody, $optParams = [])
  {
    $params = ['customer' => $customer, 'calendarResourceId' => $calendarResourceId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CalendarResource::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourcesCalendars::class, 'Google_Service_Directory_Resource_ResourcesCalendars');
