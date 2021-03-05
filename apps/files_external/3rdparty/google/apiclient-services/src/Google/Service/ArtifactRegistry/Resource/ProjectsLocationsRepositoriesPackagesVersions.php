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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $versions = $artifactregistryService->versions;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesPackagesVersions extends Google_Service_Resource
{
  /**
   * Deletes a version and all of its content. The returned operation will
   * complete once the version has been deleted. (versions.delete)
   *
   * @param string $name The name of the version to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force By default, a version that is tagged may not be
   * deleted. If force=true, the version and any tags pointing to the version are
   * deleted.
   * @return Google_Service_ArtifactRegistry_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ArtifactRegistry_Operation");
  }
  /**
   * Gets a version (versions.get)
   *
   * @param string $name The name of the version to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The view that should be returned in the response.
   * @return Google_Service_ArtifactRegistry_Version
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ArtifactRegistry_Version");
  }
  /**
   * Lists versions. (versions.listProjectsLocationsRepositoriesPackagesVersions)
   *
   * @param string $parent The name of the parent resource whose versions will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional. Sorting field and order
   * @opt_param int pageSize The maximum number of versions to return. Maximum
   * page size is 10,000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @opt_param string view The view that should be returned in the response.
   * @return Google_Service_ArtifactRegistry_ListVersionsResponse
   */
  public function listProjectsLocationsRepositoriesPackagesVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListVersionsResponse");
  }
}
