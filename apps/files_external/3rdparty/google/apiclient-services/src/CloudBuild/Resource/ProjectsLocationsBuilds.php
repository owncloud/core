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

use Google\Service\CloudBuild\ApproveBuildRequest;
use Google\Service\CloudBuild\Build;
use Google\Service\CloudBuild\CancelBuildRequest;
use Google\Service\CloudBuild\ListBuildsResponse;
use Google\Service\CloudBuild\Operation;
use Google\Service\CloudBuild\RetryBuildRequest;

/**
 * The "builds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google\Service\CloudBuild(...);
 *   $builds = $cloudbuildService->builds;
 *  </code>
 */
class ProjectsLocationsBuilds extends \Google\Service\Resource
{
  /**
   * Approves or rejects a pending build. If approved, the returned LRO will be
   * analogous to the LRO returned from a CreateBuild call. If rejected, the
   * returned LRO will be immediately done. (builds.approve)
   *
   * @param string $name Required. Name of the target build. For example:
   * "projects/{$project_id}/builds/{$build_id}"
   * @param ApproveBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function approve($name, ApproveBuildRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('approve', [$params], Operation::class);
  }
  /**
   * Cancels a build in progress. (builds.cancel)
   *
   * @param string $name The name of the `Build` to cancel. Format:
   * `projects/{project}/locations/{location}/builds/{build}`
   * @param CancelBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Build
   */
  public function cancel($name, CancelBuildRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Build::class);
  }
  /**
   * Starts a build with the specified configuration. This method returns a long-
   * running `Operation`, which includes the build ID. Pass the build ID to
   * `GetBuild` to determine the build status (such as `SUCCESS` or `FAILURE`).
   * (builds.create)
   *
   * @param string $parent The parent resource where this build will be created.
   * Format: `projects/{project}/locations/{location}`
   * @param Build $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string projectId Required. ID of the project.
   * @return Operation
   */
  public function create($parent, Build $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Returns information about a previously requested build. The `Build` that is
   * returned includes its status (such as `SUCCESS`, `FAILURE`, or `WORKING`),
   * and timing information. (builds.get)
   *
   * @param string $name The name of the `Build` to retrieve. Format:
   * `projects/{project}/locations/{location}/builds/{build}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string id Required. ID of the build.
   * @opt_param string projectId Required. ID of the project.
   * @return Build
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Build::class);
  }
  /**
   * Lists previously requested builds. Previously requested builds may still be
   * in-progress, or may have finished successfully or unsuccessfully.
   * (builds.listProjectsLocationsBuilds)
   *
   * @param string $parent The parent of the collection of `Builds`. Format:
   * `projects/{project}/locations/location`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The raw filter text to constrain the results.
   * @opt_param int pageSize Number of results to return in the list.
   * @opt_param string pageToken The page token for the next page of Builds. If
   * unspecified, the first page of results is returned. If the token is rejected
   * for any reason, INVALID_ARGUMENT will be thrown. In this case, the token
   * should be discarded, and pagination should be restarted from the first page
   * of results. See https://google.aip.dev/158 for more.
   * @opt_param string projectId Required. ID of the project.
   * @return ListBuildsResponse
   */
  public function listProjectsLocationsBuilds($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBuildsResponse::class);
  }
  /**
   * Creates a new build based on the specified build. This method creates a new
   * build using the original build request, which may or may not result in an
   * identical build. For triggered builds: * Triggered builds resolve to a
   * precise revision; therefore a retry of a triggered build will result in a
   * build that uses the same revision. For non-triggered builds that specify
   * `RepoSource`: * If the original build built from the tip of a branch, the
   * retried build will build from the tip of that branch, which may not be the
   * same revision as the original build. * If the original build specified a
   * commit sha or revision ID, the retried build will use the identical source.
   * For builds that specify `StorageSource`: * If the original build pulled
   * source from Google Cloud Storage without specifying the generation of the
   * object, the new build will use the current object, which may be different
   * from the original build source. * If the original build pulled source from
   * Cloud Storage and specified the generation of the object, the new build will
   * attempt to use the same object, which may or may not be available depending
   * on the bucket's lifecycle management settings. (builds.retry)
   *
   * @param string $name The name of the `Build` to retry. Format:
   * `projects/{project}/locations/{location}/builds/{build}`
   * @param RetryBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function retry($name, RetryBuildRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('retry', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsBuilds::class, 'Google_Service_CloudBuild_Resource_ProjectsLocationsBuilds');
