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
 * The "keyvaluemaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $keyvaluemaps = $apigeeService->keyvaluemaps;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsKeyvaluemaps extends Google_Service_Resource
{
  /**
   * Creates a key value map in an environment. (keyvaluemaps.create)
   *
   * @param string $parent Required. The name of the environment in which to
   * create the key value map. Must be of the form
   * `organizations/{organization}/environments/{environment}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap");
  }
  /**
   * Delete a key value map in an environment. (keyvaluemaps.delete)
   *
   * @param string $name Required. The name of the key value map. Must be of the
   * form `organizations/{organization}/environments/{environment}/keyvaluemaps/{k
   * eyvaluemap}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1KeyValueMap");
  }
  /**
   * List key value maps in an environment.
   * (keyvaluemaps.listOrganizationsEnvironmentsKeyvaluemaps)
   *
   * @param string $parent Required. The name of the environment in which to list
   * key value maps. Must be of the form
   * `organizations/{organization}/environments/{environment}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_ListResponse
   */
  public function listOrganizationsEnvironmentsKeyvaluemaps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_ListResponse");
  }
}
