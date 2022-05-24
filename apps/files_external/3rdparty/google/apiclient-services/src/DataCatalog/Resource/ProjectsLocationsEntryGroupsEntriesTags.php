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

namespace Google\Service\DataCatalog\Resource;

use Google\Service\DataCatalog\DatacatalogEmpty;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ListTagsResponse;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1Tag;

/**
 * The "tags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $tags = $datacatalogService->tags;
 *  </code>
 */
class ProjectsLocationsEntryGroupsEntriesTags extends \Google\Service\Resource
{
  /**
   * Creates a tag and assigns it to: * An Entry if the method name is
   * `projects.locations.entryGroups.entries.tags.create`. * Or EntryGroupif the
   * method name is `projects.locations.entryGroups.tags.create`. Note: The
   * project identified by the `parent` parameter for the [tag]
   * (https://cloud.google.com/data-catalog/docs/reference/rest/v1/projects.locati
   * ons.entryGroups.entries.tags/create#path-parameters) and the [tag template]
   * (https://cloud.google.com/data-
   * catalog/docs/reference/rest/v1/projects.locations.tagTemplates/create#path-
   * parameters) used to create the tag must be in the same organization.
   * (tags.create)
   *
   * @param string $parent Required. The name of the resource to attach this tag
   * to. Tags can be attached to entries or entry groups. An entry can have up to
   * 1000 attached tags. Note: The tag and its child resources might not be stored
   * in the location specified in its name.
   * @param GoogleCloudDatacatalogV1Tag $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1Tag
   */
  public function create($parent, GoogleCloudDatacatalogV1Tag $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1Tag::class);
  }
  /**
   * Deletes a tag. (tags.delete)
   *
   * @param string $name Required. The name of the tag to delete.
   * @param array $optParams Optional parameters.
   * @return DatacatalogEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatacatalogEmpty::class);
  }
  /**
   * Lists tags assigned to an Entry. The columns in the response are lowercased.
   * (tags.listProjectsLocationsEntryGroupsEntriesTags)
   *
   * @param string $parent Required. The name of the Data Catalog resource to list
   * the tags of. The resource can be an Entry or an EntryGroup (without
   * `/entries/{entries}` at the end).
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of tags to return. Default is 10.
   * Maximum limit is 1000.
   * @opt_param string pageToken Pagination token that specifies the next page to
   * return. If empty, the first page is returned.
   * @return GoogleCloudDatacatalogV1ListTagsResponse
   */
  public function listProjectsLocationsEntryGroupsEntriesTags($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatacatalogV1ListTagsResponse::class);
  }
  /**
   * Updates an existing tag. (tags.patch)
   *
   * @param string $name The resource name of the tag in URL format where tag ID
   * is a system-generated identifier. Note: The tag itself might not be stored in
   * the location specified in its name.
   * @param GoogleCloudDatacatalogV1Tag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Names of fields whose values to overwrite on a
   * tag. Currently, a tag has the only modifiable field with the name `fields`.
   * In general, if this parameter is absent or empty, all modifiable fields are
   * overwritten. If such fields are non-required and omitted in the request body,
   * their values are emptied.
   * @return GoogleCloudDatacatalogV1Tag
   */
  public function patch($name, GoogleCloudDatacatalogV1Tag $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1Tag::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsEntryGroupsEntriesTags::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsEntryGroupsEntriesTags');
