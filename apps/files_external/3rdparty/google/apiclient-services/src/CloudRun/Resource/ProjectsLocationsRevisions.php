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

use Google\Service\CloudRun\ListRevisionsResponse;
use Google\Service\CloudRun\Revision;
use Google\Service\CloudRun\Status;

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $revisions = $runService->revisions;
 *  </code>
 */
class ProjectsLocationsRevisions extends \Google\Service\Resource
{
  /**
   * Delete a revision. (revisions.delete)
   *
   * @param string $name The name of the revision to delete. For Cloud Run (fully
   * managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string apiVersion Cloud Run currently ignores this parameter.
   * @opt_param string dryRun Indicates that the server should validate the
   * request and populate default values without persisting the request. Supported
   * values: `all`
   * @opt_param string kind Cloud Run currently ignores this parameter.
   * @opt_param string propagationPolicy Specifies the propagation policy of
   * delete. Cloud Run currently ignores this setting, and deletes in the
   * background. Please see kubernetes.io/docs/concepts/workloads/controllers
   * /garbage-collection/ for more information.
   * @return Status
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Status::class);
  }
  /**
   * Get information about a revision. (revisions.get)
   *
   * @param string $name The name of the revision to retrieve. For Cloud Run
   * (fully managed), replace {namespace_id} with the project ID or number.
   * @param array $optParams Optional parameters.
   * @return Revision
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Revision::class);
  }
  /**
   * List revisions. (revisions.listProjectsLocationsRevisions)
   *
   * @param string $parent The namespace from which the revisions should be
   * listed. For Cloud Run (fully managed), replace {namespace_id} with the
   * project ID or number.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string continue Optional. Encoded string to continue paging.
   * @opt_param string fieldSelector Allows to filter resources based on a
   * specific value for a field name. Send this in a query string format. i.e.
   * 'metadata.name%3Dlorem'. Not currently used by Cloud Run.
   * @opt_param bool includeUninitialized Not currently used by Cloud Run.
   * @opt_param string labelSelector Allows to filter resources based on a label.
   * Supported operations are =, !=, exists, in, and notIn.
   * @opt_param int limit Optional. The maximum number of records that should be
   * returned.
   * @opt_param string resourceVersion The baseline resource version from which
   * the list or watch operation should start. Not currently used by Cloud Run.
   * @opt_param bool watch Flag that indicates that the client expects to watch
   * this resource as well. Not currently used by Cloud Run.
   * @return ListRevisionsResponse
   */
  public function listProjectsLocationsRevisions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRevisionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRevisions::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsRevisions');
