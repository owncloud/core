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

use Google\Service\WorkflowExecutions\Execution;
use Google\Service\WorkflowExecutions\TriggerPubsubExecutionRequest;

/**
 * The "workflows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $workflowexecutionsService = new Google\Service\WorkflowExecutions(...);
 *   $workflows = $workflowexecutionsService->workflows;
 *  </code>
 */
class ProjectsLocationsWorkflows extends \Google\Service\Resource
{
  /**
   * Triggers a new execution using the latest revision of the given workflow by a
   * Pub/Sub push notification. (workflows.triggerPubsubExecution)
   *
   * @param string $workflow Required. Name of the workflow for which an execution
   * should be created. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}
   * @param TriggerPubsubExecutionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Execution
   */
  public function triggerPubsubExecution($workflow, TriggerPubsubExecutionRequest $postBody, $optParams = [])
  {
    $params = ['workflow' => $workflow, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('triggerPubsubExecution', [$params], Execution::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsWorkflows::class, 'Google_Service_WorkflowExecutions_Resource_ProjectsLocationsWorkflows');
