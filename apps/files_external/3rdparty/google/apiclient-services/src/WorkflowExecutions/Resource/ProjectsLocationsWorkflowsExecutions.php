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

namespace Google\Service\WorkflowExecutions\Resource;

use Google\Service\WorkflowExecutions\CancelExecutionRequest;
use Google\Service\WorkflowExecutions\Execution;
use Google\Service\WorkflowExecutions\ListExecutionsResponse;

/**
 * The "executions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $workflowexecutionsService = new Google\Service\WorkflowExecutions(...);
 *   $executions = $workflowexecutionsService->executions;
 *  </code>
 */
class ProjectsLocationsWorkflowsExecutions extends \Google\Service\Resource
{
  /**
   * Cancels an execution of the given name. (executions.cancel)
   *
   * @param string $name Required. Name of the execution to be cancelled. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}/executions/{exec
   * ution}
   * @param CancelExecutionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Execution
   */
  public function cancel($name, CancelExecutionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Execution::class);
  }
  /**
   * Creates a new execution using the latest revision of the given workflow.
   * (executions.create)
   *
   * @param string $parent Required. Name of the workflow for which an execution
   * should be created. Format:
   * projects/{project}/locations/{location}/workflows/{workflow} The latest
   * revision of the workflow will be used.
   * @param Execution $postBody
   * @param array $optParams Optional parameters.
   * @return Execution
   */
  public function create($parent, Execution $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Execution::class);
  }
  /**
   * Returns an execution of the given name. (executions.get)
   *
   * @param string $name Required. Name of the execution to be retrieved. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}/executions/{exec
   * ution}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. A view defining which fields should be
   * filled in the returned execution. The API will default to the FULL view.
   * @return Execution
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Execution::class);
  }
  /**
   * Returns a list of executions which belong to the workflow with the given
   * name. The method returns executions of all workflow revisions. Returned
   * executions are ordered by their start time (newest first).
   * (executions.listProjectsLocationsWorkflowsExecutions)
   *
   * @param string $parent Required. Name of the workflow for which the executions
   * should be listed. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of executions to return per call. Max
   * supported value depends on the selected Execution view: it's 1000 for BASIC
   * and 100 for FULL. The default value used if the field is not specified is
   * 100, regardless of the selected view. Values greater than the max value will
   * be coerced down to it.
   * @opt_param string pageToken A page token, received from a previous
   * `ListExecutions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListExecutions` must match the
   * call that provided the page token.
   * @opt_param string view Optional. A view defining which fields should be
   * filled in the returned executions. The API will default to the BASIC view.
   * @return ListExecutionsResponse
   */
  public function listProjectsLocationsWorkflowsExecutions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListExecutionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsWorkflowsExecutions::class, 'Google_Service_WorkflowExecutions_Resource_ProjectsLocationsWorkflowsExecutions');
