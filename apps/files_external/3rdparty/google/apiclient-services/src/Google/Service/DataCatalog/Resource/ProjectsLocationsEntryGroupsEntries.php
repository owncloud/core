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
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $entries = $datacatalogService->entries;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsEntryGroupsEntries extends Google_Service_Resource
{
  /**
   * Creates an entry. Only entries of 'FILESET' type or user-specified type can
   * be created. Users should enable the Data Catalog API in the project
   * identified by the `parent` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). A maximum of 100,000 entries may be created per entry
   * group. (entries.create)
   *
   * @param string $parent Required. The name of the entry group this entry is in.
   * Example: *
   * projects/{project_id}/locations/{location}/entryGroups/{entry_group_id} Note
   * that this Entry and its child resources may not actually be stored in the
   * location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string entryId Required. The id of the entry to create.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry");
  }
  /**
   * Deletes an existing entry. Only entries created through CreateEntry method
   * can be deleted. Users should enable the Data Catalog API in the project
   * identified by the `name` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). (entries.delete)
   *
   * @param string $name Required. The name of the entry. Example: * projects/{pro
   * ject_id}/locations/{location}/entryGroups/{entry_group_id}/entries/{entry_id}
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
   * Gets an entry. (entries.get)
   *
   * @param string $name Required. The name of the entry. Example: * projects/{pro
   * ject_id}/locations/{location}/entryGroups/{entry_group_id}/entries/{entry_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry");
  }
  /**
   * Gets the access control policy for a resource. A `NOT_FOUND` error is
   * returned if the resource does not exist. An empty policy is returned if the
   * resource exists but does not have a policy set on it. Supported resources
   * are: - Tag templates. - Entries. - Entry groups. Note, this method cannot be
   * used to manage policies for BigQuery, Pub/Sub and any external Google Cloud
   * Platform resources synced to Data Catalog. Callers must have following Google
   * IAM permission - `datacatalog.tagTemplates.getIamPolicy` to get policies on
   * tag templates. - `datacatalog.entries.getIamPolicy` to get policies on
   * entries. - `datacatalog.entryGroups.getIamPolicy` to get policies on entry
   * groups. (entries.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_DataCatalog_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_Policy
   */
  public function getIamPolicy($resource, Google_Service_DataCatalog_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_DataCatalog_Policy");
  }
  /**
   * Lists entries. (entries.listProjectsLocationsEntryGroupsEntries)
   *
   * @param string $parent Required. The name of the entry group that contains the
   * entries, which can be provided in URL format. Example: *
   * projects/{project_id}/locations/{location}/entryGroups/{entry_group_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Default is 10.
   * Max limit is 1000. Throws an invalid argument for `page_size > 1000`.
   * @opt_param string pageToken Token that specifies which page is requested. If
   * empty, the first page is returned.
   * @opt_param string readMask The fields to return for each Entry. If not set or
   * empty, all fields are returned. For example, setting read_mask to contain
   * only one path "name" will cause ListEntries to return a list of Entries with
   * only "name" field.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListEntriesResponse
   */
  public function listProjectsLocationsEntryGroupsEntries($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListEntriesResponse");
  }
  /**
   * Updates an existing entry. Users should enable the Data Catalog API in the
   * project identified by the `entry.name` parameter (see [Data Catalog Resource
   * Project] (https://cloud.google.com/data-catalog/docs/concepts/resource-
   * project) for more information). (entries.patch)
   *
   * @param string $name The Data Catalog resource name of the entry in URL
   * format. Example: * projects/{project_id}/locations/{location}/entryGroups/{en
   * try_group_id}/entries/{entry_id} Note that this Entry and its child resources
   * may not actually be stored in the location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update on the entry. If absent or
   * empty, all modifiable fields are updated. The following fields are
   * modifiable: * For entries with type `DATA_STREAM`: * `schema` * For entries
   * with type `FILESET` * `schema` * `display_name` * `description` *
   * `gcs_fileset_spec` * `gcs_fileset_spec.file_patterns` * For entries with
   * `user_specified_type` * `schema` * `display_name` * `description` *
   * user_specified_type * user_specified_system * linked_resource *
   * source_system_timestamps
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry");
  }
  /**
   * Returns the caller's permissions on a resource. If the resource does not
   * exist, an empty set of permissions is returned (We don't return a `NOT_FOUND`
   * error). Supported resources are: - Tag templates. - Entries. - Entry groups.
   * Note, this method cannot be used to manage policies for BigQuery, Pub/Sub and
   * any external Google Cloud Platform resources synced to Data Catalog. A caller
   * is not required to have Google IAM permission to make this request.
   * (entries.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_DataCatalog_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_DataCatalog_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_DataCatalog_TestIamPermissionsResponse");
  }
}
