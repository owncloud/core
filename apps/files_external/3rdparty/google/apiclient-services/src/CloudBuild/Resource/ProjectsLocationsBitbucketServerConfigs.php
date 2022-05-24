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

namespace Google\Service\CloudBuild\Resource;

use Google\Service\CloudBuild\BitbucketServerConfig;
use Google\Service\CloudBuild\CloudbuildEmpty;
use Google\Service\CloudBuild\ListBitbucketServerConfigsResponse;
use Google\Service\CloudBuild\Operation;
use Google\Service\CloudBuild\RemoveBitbucketServerConnectedRepositoryRequest;

/**
 * The "bitbucketServerConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $bitbucketServerConfigs = $cloudbuildService->bitbucketServerConfigs;
 *  </code>
 */
class ProjectsLocationsBitbucketServerConfigs extends \Google\Service\Resource
{
  /**
   * Creates a new `BitbucketServerConfig`. This API is experimental.
   * (bitbucketServerConfigs.create)
   *
   * @param string $parent Required. Name of the parent resource.
   * @param BitbucketServerConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string bitbucketServerConfigId Optional. The ID to use for the
   * BitbucketServerConfig, which will become the final component of the
   * BitbucketServerConfig's resource name. bitbucket_server_config_id must meet
   * the following requirements: + They must contain only alphanumeric characters
   * and dashes. + They can be 1-64 characters long. + They must begin and end
   * with an alphanumeric character.
   * @return Operation
   */
  public function create($parent, BitbucketServerConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Delete a `BitbucketServerConfig`. This API is experimental.
   * (bitbucketServerConfigs.delete)
   *
   * @param string $name Required. The config resource name.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieve a `BitbucketServerConfig`. This API is experimental.
   * (bitbucketServerConfigs.get)
   *
   * @param string $name Required. The config resource name.
   * @param array $optParams Optional parameters.
   * @return BitbucketServerConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BitbucketServerConfig::class);
  }
  /**
   * List all `BitbucketServerConfigs` for a given project. This API is
   * experimental.
   * (bitbucketServerConfigs.listProjectsLocationsBitbucketServerConfigs)
   *
   * @param string $parent Required. Name of the parent resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of configs to return. The service
   * may return fewer than this value. If unspecified, at most 50 configs will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListBitbucketServerConfigsRequest` call. Provide this to retrieve the
   * subsequent page. When paginating, all other parameters provided to
   * `ListBitbucketServerConfigsRequest` must match the call that provided the
   * page token.
   * @return ListBitbucketServerConfigsResponse
   */
  public function listProjectsLocationsBitbucketServerConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBitbucketServerConfigsResponse::class);
  }
  /**
   * Updates an existing `BitbucketServerConfig`. This API is experimental.
   * (bitbucketServerConfigs.patch)
   *
   * @param string $name The resource name for the config.
   * @param BitbucketServerConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Update mask for the resource. If this is set,
   * the server will only update the fields specified in the field mask.
   * Otherwise, a full update of the mutable resource fields will be performed.
   * @return Operation
   */
  public function patch($name, BitbucketServerConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Remove a Bitbucket Server repository from a given BitbucketServerConfig's
   * connected repositories. This API is experimental.
   * (bitbucketServerConfigs.removeBitbucketServerConnectedRepository)
   *
   * @param string $config Required. The name of the `BitbucketServerConfig` to
   * remove a connected repository. Format:
   * `projects/{project}/locations/{location}/bitbucketServerConfigs/{config}`
   * @param RemoveBitbucketServerConnectedRepositoryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CloudbuildEmpty
   */
  public function removeBitbucketServerConnectedRepository($config, RemoveBitbucketServerConnectedRepositoryRequest $postBody, $optParams = [])
  {
    $params = ['config' => $config, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeBitbucketServerConnectedRepository', [$params], CloudbuildEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsBitbucketServerConfigs::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsBitbucketServerConfigs');
