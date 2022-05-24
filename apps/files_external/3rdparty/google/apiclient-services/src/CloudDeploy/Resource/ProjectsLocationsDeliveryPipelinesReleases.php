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

namespace Google\Service\CloudDeploy\Resource;

use Google\Service\CloudDeploy\ListReleasesResponse;
use Google\Service\CloudDeploy\Operation;
use Google\Service\CloudDeploy\Release;

/**
 * The "releases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddeployService = new Google\Service\CloudDeploy(...);
 *   $releases = $clouddeployService->releases;
 *  </code>
 */
class ProjectsLocationsDeliveryPipelinesReleases extends \Google\Service\Resource
{
  /**
   * Creates a new Release in a given project and location. (releases.create)
   *
   * @param string $parent Required. The parent collection in which the `Release`
   * should be created. Format should be projects/{project_id}/locations/{location
   * _name}/deliveryPipelines/{pipeline_name}.
   * @param Release $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string releaseId Required. ID of the `Release`.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param bool validateOnly Optional. If set to true, the request is
   * validated and the user is provided with an expected result, but no actual
   * change is made.
   * @return Operation
   */
  public function create($parent, Release $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Gets details of a single Release. (releases.get)
   *
   * @param string $name Required. Name of the `Release`. Format must be projects/
   * {project_id}/locations/{location_name}/deliveryPipelines/{pipeline_name}/rele
   * ases/{release_name}.
   * @param array $optParams Optional parameters.
   * @return Release
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Release::class);
  }
  /**
   * Lists Releases in a given project and location.
   * (releases.listProjectsLocationsDeliveryPipelinesReleases)
   *
   * @param string $parent Required. The `DeliveryPipeline` which owns this
   * collection of `Release` objects.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter releases to be returned. See
   * https://google.aip.dev/160 for more details.
   * @opt_param string orderBy Optional. Field to sort by. See
   * https://google.aip.dev/132#ordering for more details.
   * @opt_param int pageSize Optional. The maximum number of `Release` objects to
   * return. The service may return fewer than this value. If unspecified, at most
   * 50 `Release` objects will be returned. The maximum value is 1000; values
   * above 1000 will be set to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListReleases` call. Provide this to retrieve the subsequent page. When
   * paginating, all other provided parameters match the call that provided the
   * page token.
   * @return ListReleasesResponse
   */
  public function listProjectsLocationsDeliveryPipelinesReleases($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReleasesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDeliveryPipelinesReleases::class, 'Google_Service_CloudDeploy_Resource_ProjectsLocationsDeliveryPipelinesReleases');
