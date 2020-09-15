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
 * The "workflows" collection of methods.
 * Typical usage is:
 *  <code>
 *   $workflowsService = new Google_Service_Workflows(...);
 *   $workflows = $workflowsService->workflows;
 *  </code>
 */
class Google_Service_Workflows_Resource_ProjectsLocationsWorkflows extends Google_Service_Resource
{
  /**
   * Creates a new workflow. If a workflow with the specified name already exists
   * in the specified project and location, the long running operation will return
   * ALREADY_EXISTS error. (workflows.create)
   *
   * @param string $parent Required. Project and location in which the workflow
   * should be created. Format: projects/{project}/locations/{location}
   * @param Google_Service_Workflows_Workflow $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string workflowId Required. The ID of the workflow to be created.
   * It has to fulfill the following requirements: * Must contain only letters,
   * numbers, underscores and hyphens. * Must start with a letter. * Must be
   * between 1-64 characters. * Must end with a number or a letter. * Must be
   * unique within the customer project and location.
   * @return Google_Service_Workflows_Operation
   */
  public function create($parent, Google_Service_Workflows_Workflow $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Workflows_Operation");
  }
  /**
   * Deletes a workflow with the specified name. This method also cancels and
   * deletes all running executions of the workflow. (workflows.delete)
   *
   * @param string $name Required. Name of the workflow to be deleted. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Workflows_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Workflows_Operation");
  }
  /**
   * Gets details of a single Workflow. (workflows.get)
   *
   * @param string $name Required. Name of the workflow which information should
   * be retrieved. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}
   * @param array $optParams Optional parameters.
   * @return Google_Service_Workflows_Workflow
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Workflows_Workflow");
  }
  /**
   * Lists Workflows in a given project and location. The default order is not
   * specified. (workflows.listProjectsLocationsWorkflows)
   *
   * @param string $parent Required. Project and location from which the workflows
   * should be listed. Format: projects/{project}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Comma-separated list of fields that that specify
   * the order of the results. Default sorting order for a field is ascending. To
   * specify descending order for a field, append a " desc" suffix. If not
   * specified, the results will be returned in an unspecified order.
   * @opt_param string filter Filter to restrict results to specific workflows.
   * @opt_param int pageSize Maximum number of workflows to return per call. The
   * service may return fewer than this value. If the value is not specified, a
   * default value of 500 will be used. The maximum permitted value is 1000 and
   * values greater than 1000 will be coerced down to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListWorkflows` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListWorkflows` must match the
   * call that provided the page token.
   * @return Google_Service_Workflows_ListWorkflowsResponse
   */
  public function listProjectsLocationsWorkflows($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Workflows_ListWorkflowsResponse");
  }
  /**
   * Updates an existing workflow. Running this method has no impact on already
   * running executions of the workflow. A new revision of the workflow may be
   * created as a result of a successful update operation. In that case, such
   * revision will be used in new workflow executions. (workflows.patch)
   *
   * @param string $name The resource name of the workflow. Format:
   * projects/{project}/locations/{location}/workflows/{workflow}
   * @param Google_Service_Workflows_Workflow $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask List of fields to be updated. If not present,
   * the entire workflow will be updated.
   * @return Google_Service_Workflows_Operation
   */
  public function patch($name, Google_Service_Workflows_Workflow $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Workflows_Operation");
  }
}
