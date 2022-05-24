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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1Datastore;
use Google\Service\Apigee\GoogleCloudApigeeV1ListDatastoresResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1TestDatastoreResponse;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "datastores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $datastores = $apigeeService->datastores;
 *  </code>
 */
class OrganizationsAnalyticsDatastores extends \Google\Service\Resource
{
  /**
   * Create a Datastore for an org (datastores.create)
   *
   * @param string $parent Required. The parent organization name. Must be of the
   * form `organizations/{org}`.
   * @param GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Datastore
   */
  public function create($parent, GoogleCloudApigeeV1Datastore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1Datastore::class);
  }
  /**
   * Delete a Datastore from an org. (datastores.delete)
   *
   * @param string $name Required. Resource name of the Datastore to be deleted.
   * Must be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Get a Datastore (datastores.get)
   *
   * @param string $name Required. Resource name of the Datastore to be get. Must
   * be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Datastore
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1Datastore::class);
  }
  /**
   * List Datastores (datastores.listOrganizationsAnalyticsDatastores)
   *
   * @param string $parent Required. The parent organization name. Must be of the
   * form `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string targetType Optional. TargetType is used to fetch all
   * Datastores that match the type
   * @return GoogleCloudApigeeV1ListDatastoresResponse
   */
  public function listOrganizationsAnalyticsDatastores($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListDatastoresResponse::class);
  }
  /**
   * Test if Datastore configuration is correct. This includes checking if
   * credentials provided by customer have required permissions in target
   * destination storage (datastores.test)
   *
   * @param string $parent Required. The parent organization name Must be of the
   * form `organizations/{org}`
   * @param GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1TestDatastoreResponse
   */
  public function test($parent, GoogleCloudApigeeV1Datastore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('test', [$params], GoogleCloudApigeeV1TestDatastoreResponse::class);
  }
  /**
   * Update a Datastore (datastores.update)
   *
   * @param string $name Required. The resource name of datastore to be updated.
   * Must be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Datastore
   */
  public function update($name, GoogleCloudApigeeV1Datastore $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1Datastore::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsAnalyticsDatastores::class, 'Google_Service_Apigee_Resource_OrganizationsAnalyticsDatastores');
