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
 * The "references" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $references = $apigeeService->references;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsReferences extends Google_Service_Resource
{
  /**
   * Creates a Reference in the specified environment. (references.create)
   *
   * @param string $parent Required. The parent environment name under which the
   * Reference will be created. Must be of the form
   * `organizations/{org}/environments/{env}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Reference $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Reference
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Reference $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Reference");
  }
  /**
   * Deletes a Reference from an environment. Returns the deleted Reference
   * resource. (references.delete)
   *
   * @param string $name Required. The name of the Reference to delete. Must be of
   * the form `organizations/{org}/environments/{env}/references/{ref}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Reference
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Reference");
  }
  /**
   * Gets a Reference resource. (references.get)
   *
   * @param string $name Required. The name of the Reference to get. Must be of
   * the form `organizations/{org}/environments/{env}/references/{ref}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Reference
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Reference");
  }
  /**
   * Lists all References in an environment as a JSON array.
   * (references.listOrganizationsEnvironmentsReferences)
   *
   * @param string $parent Required. The parent environment name. Must be of the
   * form `organizations/{org}/environments/{env}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironmentsReferences($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
  /**
   * Updates an existing Reference. Note that this operation has PUT semantics; it
   * will replace the entirety of the existing Reference with the resource in the
   * request body. (references.update)
   *
   * @param string $name Required. The name of the Reference to update. Must be of
   * the form `organizations/{org}/environments/{env}/references/{ref}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Reference $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Reference
   */
  public function update($name, Google_Service_Apigee_GoogleCloudApigeeV1Reference $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Reference");
  }
}
