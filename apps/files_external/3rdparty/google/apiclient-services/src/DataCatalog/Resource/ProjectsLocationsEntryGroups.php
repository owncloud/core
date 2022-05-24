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
use Google\Service\DataCatalog\GetIamPolicyRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1EntryGroup;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ListEntryGroupsResponse;
use Google\Service\DataCatalog\Policy;
use Google\Service\DataCatalog\SetIamPolicyRequest;
use Google\Service\DataCatalog\TestIamPermissionsRequest;
use Google\Service\DataCatalog\TestIamPermissionsResponse;

/**
 * The "entryGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $entryGroups = $datacatalogService->entryGroups;
 *  </code>
 */
class ProjectsLocationsEntryGroups extends \Google\Service\Resource
{
  /**
   * Creates an entry group. An entry group contains logically related entries
   * together with [Cloud Identity and Access Management](/data-
   * catalog/docs/concepts/iam) policies. These policies specify users who can
   * create, edit, and view entries within entry groups. Data Catalog
   * automatically creates entry groups with names that start with the `@` symbol
   * for the following resources: * BigQuery entries (`@bigquery`) * Pub/Sub
   * topics (`@pubsub`) * Dataproc Metastore services
   * (`@dataproc_metastore_{SERVICE_NAME_HASH}`) You can create your own entry
   * groups for Cloud Storage fileset entries and custom entries together with the
   * corresponding IAM policies. User-created entry groups can't contain the `@`
   * symbol, it is reserved for automatically created groups. Entry groups, like
   * entries, can be searched. A maximum of 10,000 entry groups may be created per
   * organization across all locations. You must enable the Data Catalog API in
   * the project identified by the `parent` parameter. For more information, see
   * [Data Catalog resource project](https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project). (entryGroups.create)
   *
   * @param string $parent Required. The names of the project and location that
   * the new entry group belongs to. Note: The entry group itself and its child
   * resources might not be stored in the location specified in its name.
   * @param GoogleCloudDatacatalogV1EntryGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string entryGroupId Required. The ID of the entry group to create.
   * The ID must contain only letters (a-z, A-Z), numbers (0-9), underscores (_),
   * and must start with a letter or underscore. The maximum size is 64 bytes when
   * encoded in UTF-8.
   * @return GoogleCloudDatacatalogV1EntryGroup
   */
  public function create($parent, GoogleCloudDatacatalogV1EntryGroup $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1EntryGroup::class);
  }
  /**
   * Deletes an entry group. You must enable the Data Catalog API in the project
   * identified by the `name` parameter. For more information, see [Data Catalog
   * resource project](https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project). (entryGroups.delete)
   *
   * @param string $name Required. The name of the entry group to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Optional. If true, deletes all entries in the entry
   * group.
   * @return DatacatalogEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatacatalogEmpty::class);
  }
  /**
   * Gets an entry group. (entryGroups.get)
   *
   * @param string $name Required. The name of the entry group to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask The fields to return. If empty or omitted, all
   * fields are returned.
   * @return GoogleCloudDatacatalogV1EntryGroup
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatacatalogV1EntryGroup::class);
  }
  /**
   * Gets the access control policy for a resource. May return: * A`NOT_FOUND`
   * error if the resource doesn't exist or you don't have the permission to view
   * it. * An empty policy if the resource exists but doesn't have a set policy.
   * Supported resources are: - Tag templates - Entry groups Note: This method
   * doesn't get policies from Google Cloud Platform resources ingested into Data
   * Catalog. To call this method, you must have the following Google IAM
   * permissions: - `datacatalog.tagTemplates.getIamPolicy` to get policies on tag
   * templates. - `datacatalog.entryGroups.getIamPolicy` to get policies on entry
   * groups. (entryGroups.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists entry groups. (entryGroups.listProjectsLocationsEntryGroups)
   *
   * @param string $parent Required. The name of the location that contains the
   * entry groups to list. Can be provided as a URL.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of items to return.
   * Default is 10. Maximum limit is 1000. Throws an invalid argument if
   * `page_size` is greater than 1000.
   * @opt_param string pageToken Optional. Pagination token that specifies the
   * next page to return. If empty, returns the first page.
   * @return GoogleCloudDatacatalogV1ListEntryGroupsResponse
   */
  public function listProjectsLocationsEntryGroups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatacatalogV1ListEntryGroupsResponse::class);
  }
  /**
   * Updates an entry group. You must enable the Data Catalog API in the project
   * identified by the `entry_group.name` parameter. For more information, see
   * [Data Catalog resource project](https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project). (entryGroups.patch)
   *
   * @param string $name The resource name of the entry group in URL format. Note:
   * The entry group itself and its child resources might not be stored in the
   * location specified in its name.
   * @param GoogleCloudDatacatalogV1EntryGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Names of fields whose values to overwrite on an
   * entry group. If this parameter is absent or empty, all modifiable fields are
   * overwritten. If such fields are non-required and omitted in the request body,
   * their values are emptied.
   * @return GoogleCloudDatacatalogV1EntryGroup
   */
  public function patch($name, GoogleCloudDatacatalogV1EntryGroup $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1EntryGroup::class);
  }
  /**
   * Sets an access control policy for a resource. Replaces any existing policy.
   * Supported resources are: - Tag templates - Entry groups Note: This method
   * sets policies only within Data Catalog and can't be used to manage policies
   * in BigQuery, Pub/Sub, Dataproc Metastore, and any external Google Cloud
   * Platform resources synced with the Data Catalog. To call this method, you
   * must have the following Google IAM permissions: -
   * `datacatalog.tagTemplates.setIamPolicy` to set policies on tag templates. -
   * `datacatalog.entryGroups.setIamPolicy` to set policies on entry groups.
   * (entryGroups.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Gets your permissions on a resource. Returns an empty set of permissions if
   * the resource doesn't exist. Supported resources are: - Tag templates - Entry
   * groups Note: This method gets policies only within Data Catalog and can't be
   * used to get policies from BigQuery, Pub/Sub, Dataproc Metastore, and any
   * external Google Cloud Platform resources ingested into Data Catalog. No
   * Google IAM permissions are required to call this method.
   * (entryGroups.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsEntryGroups::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsEntryGroups');
