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
 * The "entryGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $entryGroups = $datacatalogService->entryGroups;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsEntryGroups extends Google_Service_Resource
{
  /**
   * A maximum of 10,000 entry groups may be created per organization across all
   * locations.
   *
   * Users should enable the Data Catalog API in the project identified by the
   * `parent` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). (entryGroups.create)
   *
   * @param string $parent Required. The name of the project this entry group is
   * in. Example:
   *
   * * projects/{project_id}/locations/{location}
   *
   * Note that this EntryGroup and its child resources may not actually be stored
   * in the location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string entryGroupId Required. The id of the entry group to create.
   * The id must begin with a letter or underscore, contain only English letters,
   * numbers and underscores, and be at most 64 characters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup");
  }
  /**
   * Deletes an EntryGroup. Only entry groups that do not contain entries can be
   * deleted. Users should enable the Data Catalog API in the project identified
   * by the `name` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). (entryGroups.delete)
   *
   * @param string $name Required. The name of the entry group. For example,
   * `projects/{project_id}/locations/{location}/entryGroups/{entry_group_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Optional. If true, deletes all entries in the entry
   * group.
   * @return Google_Service_DataCatalog_DatacatalogEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataCatalog_DatacatalogEmpty");
  }
  /**
   * Gets an EntryGroup. (entryGroups.get)
   *
   * @param string $name Required. The name of the entry group. For example,
   * `projects/{project_id}/locations/{location}/entryGroups/{entry_group_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask The fields to return. If not set or empty, all
   * fields are returned.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup");
  }
  /**
   * Gets the access control policy for a resource. A `NOT_FOUND` error is
   * returned if the resource does not exist. An empty policy is returned if the
   * resource exists but does not have a policy set on it.
   *
   * Supported resources are:   - Tag templates.   - Entries.   - Entry groups.
   * Note, this method cannot be used to manage policies for BigQuery, Pub/Sub and
   * any external Google Cloud Platform resources synced to Data Catalog.
   *
   * Callers must have following Google IAM permission   -
   * `datacatalog.tagTemplates.getIamPolicy` to get policies on tag     templates.
   * - `datacatalog.entries.getIamPolicy` to get policies on entries.   -
   * `datacatalog.entryGroups.getIamPolicy` to get policies on entry groups.
   * (entryGroups.getIamPolicy)
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
   * Lists entry groups. (entryGroups.listProjectsLocationsEntryGroups)
   *
   * @param string $parent Required. The name of the location that contains the
   * entry groups, which can be provided in URL format. Example:
   *
   * * projects/{project_id}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * Default is 10. Max limit is 1000. Throws an invalid argument for `page_size >
   * 1000`.
   * @opt_param string pageToken Optional. Token that specifies which page is
   * requested. If empty, the first page is returned.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListEntryGroupsResponse
   */
  public function listProjectsLocationsEntryGroups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListEntryGroupsResponse");
  }
  /**
   * Updates an EntryGroup. The user should enable the Data Catalog API in the
   * project identified by the `entry_group.name` parameter (see [Data Catalog
   * Resource Project] (https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project) for more information). (entryGroups.patch)
   *
   * @param string $name The resource name of the entry group in URL format.
   * Example:
   *
   * * projects/{project_id}/locations/{location}/entryGroups/{entry_group_id}
   *
   * Note that this EntryGroup and its child resources may not actually be stored
   * in the location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to update on the entry group. If
   * absent or empty, all modifiable fields are updated.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1EntryGroup");
  }
  /**
   * Sets the access control policy for a resource. Replaces any existing policy.
   * Supported resources are:   - Tag templates.   - Entries.   - Entry groups.
   * Note, this method cannot be used to manage policies for BigQuery, Pub/Sub and
   * any external Google Cloud Platform resources synced to Data Catalog.
   *
   * Callers must have following Google IAM permission   -
   * `datacatalog.tagTemplates.setIamPolicy` to set policies on tag     templates.
   * - `datacatalog.entries.setIamPolicy` to set policies on entries.   -
   * `datacatalog.entryGroups.setIamPolicy` to set policies on entry groups.
   * (entryGroups.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_DataCatalog_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_Policy
   */
  public function setIamPolicy($resource, Google_Service_DataCatalog_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_DataCatalog_Policy");
  }
  /**
   * Returns the caller's permissions on a resource. If the resource does not
   * exist, an empty set of permissions is returned (We don't return a `NOT_FOUND`
   * error).
   *
   * Supported resources are:   - Tag templates.   - Entries.   - Entry groups.
   * Note, this method cannot be used to manage policies for BigQuery, Pub/Sub and
   * any external Google Cloud Platform resources synced to Data Catalog.
   *
   * A caller is not required to have Google IAM permission to make this request.
   * (entryGroups.testIamPermissions)
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
