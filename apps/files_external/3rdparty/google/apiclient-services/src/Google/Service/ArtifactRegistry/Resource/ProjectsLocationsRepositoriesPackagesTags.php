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
 * The "tags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google_Service_ArtifactRegistry(...);
 *   $tags = $artifactregistryService->tags;
 *  </code>
 */
class Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesPackagesTags extends Google_Service_Resource
{
  /**
   * Creates a tag. (tags.create)
   *
   * @param string $parent The name of the parent resource where the tag will be
   * created.
   * @param Google_Service_ArtifactRegistry_Tag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagId The tag id to use for this repository.
   * @return Google_Service_ArtifactRegistry_Tag
   */
  public function create($parent, Google_Service_ArtifactRegistry_Tag $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ArtifactRegistry_Tag");
  }
  /**
   * Deletes a tag. (tags.delete)
   *
   * @param string $name The name of the tag to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_ArtifactregistryEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_ArtifactRegistry_ArtifactregistryEmpty");
  }
  /**
   * Gets a tag. (tags.get)
   *
   * @param string $name The name of the tag to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ArtifactRegistry_Tag
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ArtifactRegistry_Tag");
  }
  /**
   * Lists tags. (tags.listProjectsLocationsRepositoriesPackagesTags)
   *
   * @param string $parent The name of the parent resource whose tags will be
   * listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request. Filter rules are case insensitive. The fields eligible for filtering
   * are:
   *
   *   * `version`
   *
   *  An example of using a filter:
   *
   *   * `version="projects/p1/locations/us-
   * central1/repositories/repo1/packages/pkg1/versions/1.0"`   --> Tags that are
   * applied to the version `1.0` in package `pkg1`.
   * @opt_param int pageSize The maximum number of tags to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_ArtifactRegistry_ListTagsResponse
   */
  public function listProjectsLocationsRepositoriesPackagesTags($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ArtifactRegistry_ListTagsResponse");
  }
  /**
   * Updates a tag. (tags.patch)
   *
   * @param string $name The name of the tag, for example: "projects/p1/locations
   * /us-central1/repositories/repo1/packages/pkg1/tags/tag1".
   * @param Google_Service_ArtifactRegistry_Tag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return Google_Service_ArtifactRegistry_Tag
   */
  public function patch($name, Google_Service_ArtifactRegistry_Tag $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ArtifactRegistry_Tag");
  }
}
