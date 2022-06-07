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

namespace Google\Service\Dataproc\Resource;

use Google\Service\Dataproc\DataprocEmpty;
use Google\Service\Dataproc\GetIamPolicyRequest;
use Google\Service\Dataproc\InstantiateWorkflowTemplateRequest;
use Google\Service\Dataproc\ListWorkflowTemplatesResponse;
use Google\Service\Dataproc\Operation;
use Google\Service\Dataproc\Policy;
use Google\Service\Dataproc\SetIamPolicyRequest;
use Google\Service\Dataproc\TestIamPermissionsRequest;
use Google\Service\Dataproc\TestIamPermissionsResponse;
use Google\Service\Dataproc\WorkflowTemplate;

/**
 * The "workflowTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google\Service\Dataproc(...);
 *   $workflowTemplates = $dataprocService->workflowTemplates;
 *  </code>
 */
class ProjectsLocationsWorkflowTemplates extends \Google\Service\Resource
{
  /**
   * Creates new workflow template. (workflowTemplates.create)
   *
   * @param string $parent Required. The resource name of the region or location,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates.create, the resource name of the region
   * has the following format: projects/{project_id}/regions/{region} For
   * projects.locations.workflowTemplates.create, the resource name of the
   * location has the following format: projects/{project_id}/locations/{location}
   * @param WorkflowTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return WorkflowTemplate
   */
  public function create($parent, WorkflowTemplate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], WorkflowTemplate::class);
  }
  /**
   * Deletes a workflow template. It does not cancel in-progress workflows.
   * (workflowTemplates.delete)
   *
   * @param string $name Required. The resource name of the workflow template, as
   * described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates.delete, the resource name of the template
   * has the following format:
   * projects/{project_id}/regions/{region}/workflowTemplates/{template_id} For
   * projects.locations.workflowTemplates.instantiate, the resource name of the
   * template has the following format:
   * projects/{project_id}/locations/{location}/workflowTemplates/{template_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int version Optional. The version of workflow template to delete.
   * If specified, will only delete the template if the current server version
   * matches specified version.
   * @return DataprocEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataprocEmpty::class);
  }
  /**
   * Retrieves the latest workflow template.Can retrieve previously instantiated
   * template by specifying optional version parameter. (workflowTemplates.get)
   *
   * @param string $name Required. The resource name of the workflow template, as
   * described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates.get, the resource name of the template has
   * the following format:
   * projects/{project_id}/regions/{region}/workflowTemplates/{template_id} For
   * projects.locations.workflowTemplates.get, the resource name of the template
   * has the following format:
   * projects/{project_id}/locations/{location}/workflowTemplates/{template_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int version Optional. The version of workflow template to
   * retrieve. Only previously instantiated versions can be retrieved.If
   * unspecified, retrieves the current version.
   * @return WorkflowTemplate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WorkflowTemplate::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (workflowTemplates.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Instantiates a template and begins execution.The returned Operation can be
   * used to track execution of workflow by polling operations.get. The Operation
   * will complete when entire workflow is finished.The running workflow can be
   * aborted via operations.cancel. This will cause any inflight jobs to be
   * cancelled and workflow-owned clusters to be deleted.The Operation.metadata
   * will be WorkflowMetadata (https://cloud.google.com/dataproc/docs/reference/rp
   * c/google.cloud.dataproc.v1#workflowmetadata). Also see Using WorkflowMetadata
   * (https://cloud.google.com/dataproc/docs/concepts/workflows/debugging#using_wo
   * rkflowmetadata).On successful completion, Operation.response will be Empty.
   * (workflowTemplates.instantiate)
   *
   * @param string $name Required. The resource name of the workflow template, as
   * described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates.instantiate, the resource name of the
   * template has the following format:
   * projects/{project_id}/regions/{region}/workflowTemplates/{template_id} For
   * projects.locations.workflowTemplates.instantiate, the resource name of the
   * template has the following format:
   * projects/{project_id}/locations/{location}/workflowTemplates/{template_id}
   * @param InstantiateWorkflowTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function instantiate($name, InstantiateWorkflowTemplateRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('instantiate', [$params], Operation::class);
  }
  /**
   * Instantiates a template and begins execution.This method is equivalent to
   * executing the sequence CreateWorkflowTemplate, InstantiateWorkflowTemplate,
   * DeleteWorkflowTemplate.The returned Operation can be used to track execution
   * of workflow by polling operations.get. The Operation will complete when
   * entire workflow is finished.The running workflow can be aborted via
   * operations.cancel. This will cause any inflight jobs to be cancelled and
   * workflow-owned clusters to be deleted.The Operation.metadata will be
   * WorkflowMetadata (https://cloud.google.com/dataproc/docs/reference/rpc/google
   * .cloud.dataproc.v1#workflowmetadata). Also see Using WorkflowMetadata (https:
   * //cloud.google.com/dataproc/docs/concepts/workflows/debugging#using_workflowm
   * etadata).On successful completion, Operation.response will be Empty.
   * (workflowTemplates.instantiateInline)
   *
   * @param string $parent Required. The resource name of the region or location,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates,instantiateinline, the resource name of
   * the region has the following format: projects/{project_id}/regions/{region}
   * For projects.locations.workflowTemplates.instantiateinline, the resource name
   * of the location has the following format:
   * projects/{project_id}/locations/{location}
   * @param WorkflowTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A tag that prevents multiple concurrent
   * workflow instances with the same tag from running. This mitigates risk of
   * concurrent instances started due to retries.It is recommended to always set
   * this value to a UUID
   * (https://en.wikipedia.org/wiki/Universally_unique_identifier).The tag must
   * contain only letters (a-z, A-Z), numbers (0-9), underscores (_), and hyphens
   * (-). The maximum length is 40 characters.
   * @return Operation
   */
  public function instantiateInline($parent, WorkflowTemplate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('instantiateInline', [$params], Operation::class);
  }
  /**
   * Lists workflows that match the specified filter in the request.
   * (workflowTemplates.listProjectsLocationsWorkflowTemplates)
   *
   * @param string $parent Required. The resource name of the region or location,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates,list, the resource name of the region has
   * the following format: projects/{project_id}/regions/{region} For
   * projects.locations.workflowTemplates.list, the resource name of the location
   * has the following format: projects/{project_id}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of results to return in
   * each response.
   * @opt_param string pageToken Optional. The page token, returned by a previous
   * call, to request the next page of results.
   * @return ListWorkflowTemplatesResponse
   */
  public function listProjectsLocationsWorkflowTemplates($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWorkflowTemplatesResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (workflowTemplates.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (workflowTemplates.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
  /**
   * Updates (replaces) workflow template. The updated template must contain
   * version that matches the current server version. (workflowTemplates.update)
   *
   * @param string $name Output only. The resource name of the workflow template,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.workflowTemplates, the resource name of the template has the
   * following format:
   * projects/{project_id}/regions/{region}/workflowTemplates/{template_id} For
   * projects.locations.workflowTemplates, the resource name of the template has
   * the following format:
   * projects/{project_id}/locations/{location}/workflowTemplates/{template_id}
   * @param WorkflowTemplate $postBody
   * @param array $optParams Optional parameters.
   * @return WorkflowTemplate
   */
  public function update($name, WorkflowTemplate $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], WorkflowTemplate::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsWorkflowTemplates::class, 'Google_Service_Dataproc_Resource_ProjectsLocationsWorkflowTemplates');
