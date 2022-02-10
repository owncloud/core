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

namespace Google\Service\Storagetransfer\Resource;

use Google\Service\Storagetransfer\AgentPool;
use Google\Service\Storagetransfer\ListAgentPoolsResponse;
use Google\Service\Storagetransfer\StoragetransferEmpty;

/**
 * The "agentPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storagetransferService = new Google\Service\Storagetransfer(...);
 *   $agentPools = $storagetransferService->agentPools;
 *  </code>
 */
class ProjectsAgentPools extends \Google\Service\Resource
{
  /**
   * Creates an agent pool resource. (agentPools.create)
   *
   * @param string $projectId Required. The ID of the Google Cloud project that
   * owns the agent pool.
   * @param AgentPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string agentPoolId Required. The ID of the agent pool to create.
   * The `agent_pool_id` must meet the following requirements: * Length of 128
   * characters or less. * Not start with the string `goog`. * Start with a
   * lowercase ASCII character, followed by: * Zero or more: lowercase Latin
   * alphabet characters, numerals, hyphens (`-`), periods (`.`), underscores
   * (`_`), or tildes (`~`). * One or more numerals or lowercase ASCII characters.
   * As expressed by the regular expression:
   * `^(?!goog)[a-z]([a-z0-9-._~]*[a-z0-9])?$`.
   * @return AgentPool
   */
  public function create($projectId, AgentPool $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AgentPool::class);
  }
  /**
   * Deletes an agent pool. (agentPools.delete)
   *
   * @param string $name Required. The name of the agent pool to delete.
   * @param array $optParams Optional parameters.
   * @return StoragetransferEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], StoragetransferEmpty::class);
  }
  /**
   * Gets an agent pool. (agentPools.get)
   *
   * @param string $name Required. The name of the agent pool to get.
   * @param array $optParams Optional parameters.
   * @return AgentPool
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AgentPool::class);
  }
  /**
   * Lists agent pools. (agentPools.listProjectsAgentPools)
   *
   * @param string $projectId Required. The ID of the Google Cloud project that
   * owns the job.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An optional list of query parameters specified as
   * JSON text in the form of:
   * `{"agentPoolNames":["agentpool1","agentpool2",...]}` Since `agentPoolNames`
   * support multiple values, its values must be specified with array notation.
   * When the filter is either empty or not provided, the list returns all agent
   * pools for the project.
   * @opt_param int pageSize The list page size. The max allowed value is `256`.
   * @opt_param string pageToken The list page token.
   * @return ListAgentPoolsResponse
   */
  public function listProjectsAgentPools($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAgentPoolsResponse::class);
  }
  /**
   * Updates an existing agent pool resource. (agentPools.patch)
   *
   * @param string $name Required. Specifies a unique string that identifies the
   * agent pool. Format: `projects/{project_id}/agentPools/{agent_pool_id}`
   * @param AgentPool $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The [field mask] (https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf) of the fields in
   * `agentPool` to update in this request. The following `agentPool` fields can
   * be updated: * display_name * bandwidth_limit
   * @return AgentPool
   */
  public function patch($name, AgentPool $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AgentPool::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAgentPools::class, 'Google_Service_Storagetransfer_Resource_ProjectsAgentPools');
