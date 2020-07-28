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
 * The "datastores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $datastores = $apigeeService->datastores;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsAnalyticsDatastores extends Google_Service_Resource
{
  /**
   * Create a Datastore for an org (datastores.create)
   *
   * @param string $parent Required. The parent organization name. Must be of the
   * form `organizations/{org}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Datastore
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Datastore");
  }
  /**
   * Delete a Datastore from an org. (datastores.delete)
   *
   * @param string $name Required. Resource name of the Datastore to be deleted.
   * Must be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
  /**
   * Get a Datastore (datastores.get)
   *
   * @param string $name Required. Resource name of the Datastore to be get. Must
   * be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Datastore
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Datastore");
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
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListDatastoresResponse
   */
  public function listOrganizationsAnalyticsDatastores($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListDatastoresResponse");
  }
  /**
   * Test if Datastore configuration is correct. This includes checking if
   * credentials provided by customer have required permissions in target
   * destination storage (datastores.test)
   *
   * @param string $parent Required. The parent organization name Must be of the
   * form `organizations/{org}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TestDatastoreResponse
   */
  public function test($parent, Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('test', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1TestDatastoreResponse");
  }
  /**
   * Update a Datastore (datastores.update)
   *
   * @param string $name Required. The resource name of datastore to be updated.
   * Must be of the form `organizations/{org}/analytics/datastores/{datastoreId}`
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Datastore
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1Datastore $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Datastore");
  }
}
