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

use Google\Service\Apigee\GoogleCloudApigeeV1TargetServer;

/**
 * The "targetservers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $targetservers = $apigeeService->targetservers;
 *  </code>
 */
class OrganizationsEnvironmentsTargetservers extends \Google\Service\Resource
{
  /**
   * Creates a TargetServer in the specified environment. (targetservers.create)
   *
   * @param string $parent Required. The parent environment name under which the
   * TargetServer will be created. Must be of the form
   * `organizations/{org}/environments/{env}`.
   * @param GoogleCloudApigeeV1TargetServer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Optional. The ID to give the TargetServer. This will
   * overwrite the value in TargetServer.
   * @return GoogleCloudApigeeV1TargetServer
   */
  public function create($parent, GoogleCloudApigeeV1TargetServer $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1TargetServer::class);
  }
  /**
   * Deletes a TargetServer from an environment. Returns the deleted TargetServer
   * resource. (targetservers.delete)
   *
   * @param string $name Required. The name of the TargetServer to delete. Must be
   * of the form
   * `organizations/{org}/environments/{env}/targetservers/{target_server_id}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1TargetServer
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1TargetServer::class);
  }
  /**
   * Gets a TargetServer resource. (targetservers.get)
   *
   * @param string $name Required. The name of the TargetServer to get. Must be of
   * the form
   * `organizations/{org}/environments/{env}/targetservers/{target_server_id}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1TargetServer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1TargetServer::class);
  }
  /**
   * Updates an existing TargetServer. Note that this operation has PUT semantics;
   * it will replace the entirety of the existing TargetServer with the resource
   * in the request body. (targetservers.update)
   *
   * @param string $name Required. The name of the TargetServer to replace. Must
   * be of the form
   * `organizations/{org}/environments/{env}/targetservers/{target_server_id}`.
   * @param GoogleCloudApigeeV1TargetServer $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1TargetServer
   */
  public function update($name, GoogleCloudApigeeV1TargetServer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1TargetServer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsTargetservers::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsTargetservers');
