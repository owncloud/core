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
 *   $firebasedatabaseService = new Google_Service_FirebaseRealtimeDatabase(...);
 *   $instances = $firebasedatabaseService->instances;
 *  </code>
 */
class Google_Service_FirebaseRealtimeDatabase_Resource_ProjectsLocationsInstances extends Google_Service_Resource
{
  /**
   * Requests that a new DatabaseInstance be created. The state of a successfully
   * created DatabaseInstance is ACTIVE. Only available for projects on the Blaze
   * plan. Projects can be upgraded using the Cloud Billing API https://cloud.goog
   * le.com/billing/reference/rest/v1/projects/updateBillingInfo. Note that it
   * might take a few minutes for billing enablement state to propagate to
   * Firebase systems. (instances.create)
   *
   * @param string $parent The parent project for which to create a database
   * instance, in the form: `projects/{project-number}/locations/{location-id}`.
   * @param Google_Service_FirebaseRealtimeDatabase_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string databaseId The globally unique identifier of the database
   * instance.
   * @opt_param bool validateOnly When set to true, the request will be validated
   * but not submitted.
   * @return Google_Service_FirebaseRealtimeDatabase_DatabaseInstance
   */
  public function create($parent, Google_Service_FirebaseRealtimeDatabase_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_FirebaseRealtimeDatabase_DatabaseInstance");
  }
  /**
   * Marks a DatabaseInstance to be deleted. The DatabaseInstance will be purged
   * within 30 days. The default database cannot be deleted. IDs for deleted
   * database instances may never be recovered or re-used. The Database may only
   * be deleted if it is already in a DISABLED state. (instances.delete)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRealtimeDatabase_DatabaseInstance
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_FirebaseRealtimeDatabase_DatabaseInstance");
  }
  /**
   * Disables a DatabaseInstance. The database can be re-enabled later using
   * ReenableDatabaseInstance. When a database is disabled, all reads and writes
   * are denied, including view access in the Firebase console.
   * (instances.disable)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param Google_Service_FirebaseRealtimeDatabase_DisableDatabaseInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRealtimeDatabase_DatabaseInstance
   */
  public function disable($name, Google_Service_FirebaseRealtimeDatabase_DisableDatabaseInstanceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disable', array($params), "Google_Service_FirebaseRealtimeDatabase_DatabaseInstance");
  }
  /**
   * Gets the DatabaseInstance identified by the specified resource name.
   * (instances.get)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`. `database-id` is a globally unique identifier
   * across all parent collections. For convenience, this method allows you to
   * supply `-` as a wildcard character in place of specific collections under
   * `projects` and `locations`. The resulting wildcarding form of the method is:
   * `projects/-/locations/-/instances/{database-id}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRealtimeDatabase_DatabaseInstance
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseRealtimeDatabase_DatabaseInstance");
  }
  /**
   * Lists each DatabaseInstance associated with the specified parent project. The
   * list items are returned in no particular order, but will be a consistent view
   * of the database instances when additional requests are made with a
   * `pageToken`. The resulting list contains instances in any STATE. The list
   * results may be stale by a few seconds. Use GetDatabaseInstance for consistent
   * reads. (instances.listProjectsLocationsInstances)
   *
   * @param string $parent The parent project for which to list database
   * instances, in the form: `projects/{project-number}/locations/{location-id}`
   * To list across all locations, use a parent in the form: `projects/{project-
   * number}/locations/-`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of database instances to return in
   * the response. The server may return fewer than this at its discretion. If no
   * value is specified (or too large a value is specified), then the server will
   * impose its own limit.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListDatabaseInstances` indicating where in the set of database instances to
   * resume listing.
   * @return Google_Service_FirebaseRealtimeDatabase_ListDatabaseInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseRealtimeDatabase_ListDatabaseInstancesResponse");
  }
  /**
   * Enables a DatabaseInstance. The database must have been disabled previously
   * using DisableDatabaseInstance. The state of a successfully reenabled
   * DatabaseInstance is ACTIVE. (instances.reenable)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param Google_Service_FirebaseRealtimeDatabase_ReenableDatabaseInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseRealtimeDatabase_DatabaseInstance
   */
  public function reenable($name, Google_Service_FirebaseRealtimeDatabase_ReenableDatabaseInstanceRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('reenable', array($params), "Google_Service_FirebaseRealtimeDatabase_DatabaseInstance");
  }
}
