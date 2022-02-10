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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\GoogleCloudRunOpV2ListRevisionsResponse;
use Google\Service\CloudRun\GoogleCloudRunOpV2Revision;
use Google\Service\CloudRun\GoogleLongrunningOperation;

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $revisions = $runService->revisions;
 *  </code>
 */
class ProjectsLocationsServicesRevisions extends \Google\Service\Resource
{
  /**
   * Delete a Revision. (revisions.delete)
   *
   * @param string $name Required. The name of the Revision to delete. Format: pro
   * jects/{project}/locations/{location}/services/{service}/revisions/{revision}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag A system-generated fingerprint for this version of the
   * resource. This may be used to detect modification conflict during updates.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * without actually deleting any resources.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets information about a Revision. (revisions.get)
   *
   * @param string $name Required. The full name of the Revision. Format: projects
   * /{project}/locations/{location}/services/{service}/revisions/{revision}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRunOpV2Revision
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRunOpV2Revision::class);
  }
  /**
   * List Revisions from a given Service, or from a given location.
   * (revisions.listProjectsLocationsServicesRevisions)
   *
   * @param string $parent Required. The Service from which the Revisions should
   * be listed. To list all Revisions across Services, use "-" instead of Service
   * name. Format: projects/{project}/locations/{location}/services/{service}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of revisions to return in this call.
   * @opt_param string pageToken A page token received from a previous call to
   * ListRevisions. All other parameters must match.
   * @opt_param bool showDeleted If true, returns deleted (but unexpired)
   * resources along with active ones.
   * @return GoogleCloudRunOpV2ListRevisionsResponse
   */
  public function listProjectsLocationsServicesRevisions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRunOpV2ListRevisionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsServicesRevisions::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsServicesRevisions');
