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
 * The "packages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $packages = $artifactregistryService->packages;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesPackages extends Google_Service_Resource
{
  /**
   * Deletes a package and all of its versions and tags. The returned operation
   * will complete once the package has been deleted. (packages.delete)
   *
   * @param string $name The name of the package to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ArtifactRegistry_Operation");
  }
  /**
   * Gets a package. (packages.get)
   *
   * @param string $name The name of the package to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Package
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ArtifactRegistry_Package");
  }
  /**
   * Lists packages. (packages.listProjectsLocationsRepositoriesPackages)
   *
   * @param string $parent The name of the parent resource whose packages will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of packages to return. Maximum
   * page size is 10,000.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_ArtifactRegistry_ListPackagesResponse
   */
  public function listProjectsLocationsRepositoriesPackages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListPackagesResponse");
  }
}
