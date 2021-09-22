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

use Google\Service\Apigee\GoogleCloudApigeeV1EnvironmentGroup;
use Google\Service\Apigee\GoogleCloudApigeeV1ListEnvironmentGroupsResponse;
use Google\Service\Apigee\GoogleLongrunningOperation;

/**
 * The "envgroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $envgroups = $apigeeService->envgroups;
 *  </code>
 */
class OrganizationsEnvgroups extends \Google\Service\Resource
{
  /**
   * Creates a new environment group. (envgroups.create)
   *
   * @param string $parent Required. Name of the organization in which to create
   * the environment group in the following format: `organizations/{org}`.
   * @param GoogleCloudApigeeV1EnvironmentGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name ID of the environment group. Overrides any ID in the
   * environment_group resource.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudApigeeV1EnvironmentGroup $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an environment group. (envgroups.delete)
   *
   * @param string $name Required. Name of the environment group in the following
   * format: `organizations/{org}/envgroups/{envgroup}`.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets an environment group. (envgroups.get)
   *
   * @param string $name Required. Name of the environment group in the following
   * format: `organizations/{org}/envgroups/{envgroup}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1EnvironmentGroup
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1EnvironmentGroup::class);
  }
  /**
   * Lists all environment groups. (envgroups.listOrganizationsEnvgroups)
   *
   * @param string $parent Required. Name of the organization for which to list
   * environment groups in the following format: `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of environment groups to return. The
   * page size defaults to 25.
   * @opt_param string pageToken Page token, returned from a previous
   * ListEnvironmentGroups call, that you can use to retrieve the next page.
   * @return GoogleCloudApigeeV1ListEnvironmentGroupsResponse
   */
  public function listOrganizationsEnvgroups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListEnvironmentGroupsResponse::class);
  }
  /**
   * Updates an environment group. (envgroups.patch)
   *
   * @param string $name Required. Name of the environment group to update in the
   * format: `organizations/{org}/envgroups/{envgroup}.
   * @param GoogleCloudApigeeV1EnvironmentGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudApigeeV1EnvironmentGroup $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvgroups::class, 'Google_Service_Apigee_Resource_OrganizationsEnvgroups');
