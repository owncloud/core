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
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $tags = $datacatalogService->tags;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsEntryGroupsEntriesTags extends Google_Service_Resource
{
  /**
   * Creates a tag on an Entry. Note: The project identified by the `parent`
   * parameter for the [tag](https://cloud.google.com/data-catalog/docs/reference/
   * rest/v1beta1/projects.locations.entryGroups.entries.tags/create#path-
   * parameters) and the [tag template](https://cloud.google.com/data-
   * catalog/docs/reference/rest/v1beta1/projects.locations.tagTemplates/create
   * #path-parameters) used to create the tag must be from the same organization.
   * (tags.create)
   *
   * @param string $parent Required. The name of the resource to attach this tag
   * to. Tags can be attached to Entries. Example: * projects/{project_id}/locatio
   * ns/{location}/entryGroups/{entry_group_id}/entries/{entry_id} Note that this
   * Tag and its child resources may not actually be stored in the location in
   * this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag");
  }
  /**
   * Deletes a tag. (tags.delete)
   *
   * @param string $name Required. The name of the tag to delete. Example: * proje
   * cts/{project_id}/locations/{location}/entryGroups/{entry_group_id}/entries/{e
   * ntry_id}/tags/{tag_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_DatacatalogEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataCatalog_DatacatalogEmpty");
  }
  /**
   * Lists the tags on an Entry.
   * (tags.listProjectsLocationsEntryGroupsEntriesTags)
   *
   * @param string $parent Required. The name of the Data Catalog resource to list
   * the tags of. The resource could be an Entry or an EntryGroup. Examples: *
   * projects/{project_id}/locations/{location}/entryGroups/{entry_group_id} * pro
   * jects/{project_id}/locations/{location}/entryGroups/{entry_group_id}/entries/
   * {entry_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of tags to return. Default is 10.
   * Max limit is 1000.
   * @opt_param string pageToken Token that specifies which page is requested. If
   * empty, the first page is returned.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListTagsResponse
   */
  public function listProjectsLocationsEntryGroupsEntriesTags($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListTagsResponse");
  }
  /**
   * Updates an existing tag. (tags.patch)
   *
   * @param string $name The resource name of the tag in URL format. Example: * pr
   * ojects/{project_id}/locations/{location}/entrygroups/{entry_group_id}/entries
   * /{entry_id}/tags/{tag_id} where `tag_id` is a system-generated identifier.
   * Note that this Tag may not actually be stored in the location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Note: Currently, this parameter can only take
   * `"fields"` as value. Names of fields whose values to overwrite on a tag.
   * Currently, a tag has the only modifiable field with the name `fields`. In
   * general, if this parameter is absent or empty, all modifiable fields are
   * overwritten. If such fields are non-required and omitted in the request body,
   * their values are emptied.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Tag");
  }
}
