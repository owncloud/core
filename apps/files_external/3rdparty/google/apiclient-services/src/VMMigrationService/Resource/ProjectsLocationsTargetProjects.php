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

namespace Google\Service\VMMigrationService\Resource;

use Google\Service\VMMigrationService\ListTargetProjectsResponse;
use Google\Service\VMMigrationService\Operation;
use Google\Service\VMMigrationService\TargetProject;

/**
 * The "targetProjects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $vmmigrationService = new Google\Service\VMMigrationService(...);
 *   $targetProjects = $vmmigrationService->targetProjects;
 *  </code>
 */
class ProjectsLocationsTargetProjects extends \Google\Service\Resource
{
  /**
   * Creates a new TargetProject in a given project. NOTE: TargetProject is a
   * global resource; hence the only supported value for location is `global`.
   * (targetProjects.create)
   *
   * @param string $parent Required. The TargetProject's parent.
   * @param TargetProject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string targetProjectId Required. The target_project identifier.
   * @return Operation
   */
  public function create($parent, TargetProject $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single TargetProject. NOTE: TargetProject is a global resource;
   * hence the only supported value for location is `global`.
   * (targetProjects.delete)
   *
   * @param string $name Required. The TargetProject name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and t he
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single TargetProject. NOTE: TargetProject is a global
   * resource; hence the only supported value for location is `global`.
   * (targetProjects.get)
   *
   * @param string $name Required. The TargetProject name.
   * @param array $optParams Optional parameters.
   * @return TargetProject
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TargetProject::class);
  }
  /**
   * Lists TargetProjects in a given project. NOTE: TargetProject is a global
   * resource; hence the only supported value for location is `global`.
   * (targetProjects.listProjectsLocationsTargetProjects)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * targets.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filter request.
   * @opt_param string orderBy Optional. the order by fields for the result.
   * @opt_param int pageSize Optional. The maximum number of targets to return.
   * The service may return fewer than this value. If unspecified, at most 500
   * targets will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Required. A page token, received from a previous
   * `ListTargets` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListTargets` must match the
   * call that provided the page token.
   * @return ListTargetProjectsResponse
   */
  public function listProjectsLocationsTargetProjects($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTargetProjectsResponse::class);
  }
  /**
   * Updates the parameters of a single TargetProject. NOTE: TargetProject is a
   * global resource; hence the only supported value for location is `global`.
   * (targetProjects.patch)
   *
   * @param string $name The name of the target project.
   * @param TargetProject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A request ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Field mask is used to specify the fields to be
   * overwritten in the TargetProject resource by the update. The fields specified
   * in the update_mask are relative to the resource, not the full request. A
   * field will be overwritten if it is in the mask. If the user does not provide
   * a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, TargetProject $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTargetProjects::class, 'Google_Service_VMMigrationService_Resource_ProjectsLocationsTargetProjects');
