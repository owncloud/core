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

namespace Google\Service\FirebaseRealtimeDatabase\Resource;

use Google\Service\FirebaseRealtimeDatabase\DatabaseInstance;
use Google\Service\FirebaseRealtimeDatabase\DisableDatabaseInstanceRequest;
use Google\Service\FirebaseRealtimeDatabase\ListDatabaseInstancesResponse;
use Google\Service\FirebaseRealtimeDatabase\ReenableDatabaseInstanceRequest;
use Google\Service\FirebaseRealtimeDatabase\UndeleteDatabaseInstanceRequest;

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebasedatabaseService = new Google\Service\FirebaseRealtimeDatabase(...);
 *   $instances = $firebasedatabaseService->instances;
 *  </code>
 */
class ProjectsLocationsInstances extends \Google\Service\Resource
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
   * @param DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string databaseId The globally unique identifier of the database
   * instance.
   * @opt_param bool validateOnly When set to true, the request will be validated
   * but not submitted.
   * @return DatabaseInstance
   */
  public function create($parent, DatabaseInstance $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], DatabaseInstance::class);
  }
  /**
   * Marks a DatabaseInstance to be deleted. The DatabaseInstance will be set to
   * the DELETED state for 20 days, and will be purged within 30 days. The default
   * database cannot be deleted. IDs for deleted database instances may never be
   * recovered or re-used. The Database may only be deleted if it is already in a
   * DISABLED state. (instances.delete)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param array $optParams Optional parameters.
   * @return DatabaseInstance
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatabaseInstance::class);
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
   * @param DisableDatabaseInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DatabaseInstance
   */
  public function disable($name, DisableDatabaseInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('disable', [$params], DatabaseInstance::class);
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
   * @return DatabaseInstance
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DatabaseInstance::class);
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
   * @opt_param bool showDeleted Indicate that DatabaseInstances in the `DELETED`
   * state should also be returned.
   * @return ListDatabaseInstancesResponse
   */
  public function listProjectsLocationsInstances($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDatabaseInstancesResponse::class);
  }
  /**
   * Enables a DatabaseInstance. The database must have been disabled previously
   * using DisableDatabaseInstance. The state of a successfully reenabled
   * DatabaseInstance is ACTIVE. (instances.reenable)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param ReenableDatabaseInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DatabaseInstance
   */
  public function reenable($name, ReenableDatabaseInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('reenable', [$params], DatabaseInstance::class);
  }
  /**
   * Restores a DatabaseInstance that was previously marked to be deleted. After
   * the delete method is used, DatabaseInstances are set to the DELETED state for
   * 20 days, and will be purged within 30 days. Databases in the DELETED state
   * can be undeleted without losing any data. This method may only be used on a
   * DatabaseInstance in the DELETED state. Purged DatabaseInstances may not be
   * recovered. (instances.undelete)
   *
   * @param string $name The fully qualified resource name of the database
   * instance, in the form: `projects/{project-number}/locations/{location-
   * id}/instances/{database-id}`
   * @param UndeleteDatabaseInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DatabaseInstance
   */
  public function undelete($name, UndeleteDatabaseInstanceRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undelete', [$params], DatabaseInstance::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstances::class, 'Google_Service_FirebaseRealtimeDatabase_Resource_ProjectsLocationsInstances');
