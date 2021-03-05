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
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $files = $artifactregistryService->files;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesFiles extends Google_Service_Resource
{
  /**
   * Gets a file. (files.get)
   *
   * @param string $name The name of the file to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_ArtifactregistryFile
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ArtifactRegistry_ArtifactregistryFile");
  }
  /**
   * Lists files. (files.listProjectsLocationsRepositoriesFiles)
   *
   * @param string $parent The name of the parent resource whose files will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request. Filter rules are case insensitive. The fields eligible for filtering
   * are: * `name` * `owner` An example of using a filter: *
   * `name="projects/p1/locations/us-central1/repositories/repo1/files/a/b"` -->
   * Files with an ID starting with "a/b/". * `owner="projects/p1/locations/us-
   * central1/repositories/repo1/packages/pkg1/versions/1.0"` --> Files owned by
   * the version `1.0` in package `pkg1`.
   * @opt_param int pageSize The maximum number of files to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_ArtifactRegistry_ListFilesResponse
   */
  public function listProjectsLocationsRepositoriesFiles($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListFilesResponse");
  }
}
