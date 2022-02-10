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
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1TagTemplate;
use Google\Service\DataCatalog\Policy;
use Google\Service\DataCatalog\SetIamPolicyRequest;
use Google\Service\DataCatalog\TestIamPermissionsRequest;
use Google\Service\DataCatalog\TestIamPermissionsResponse;

/**
 * The "tagTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $tagTemplates = $datacatalogService->tagTemplates;
 *  </code>
 */
class ProjectsLocationsTagTemplates extends \Google\Service\Resource
{
  /**
   * Creates a tag template. You must enable the Data Catalog API in the project
   * identified by the `parent` parameter. For more information, see [Data Catalog
   * resource project] (https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project). (tagTemplates.create)
   *
   * @param string $parent Required. The name of the project and the template
   * location [region](https://cloud.google.com/data-
   * catalog/docs/concepts/regions).
   * @param GoogleCloudDatacatalogV1TagTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagTemplateId Required. The ID of the tag template to
   * create. The ID must contain only lowercase letters (a-z), numbers (0-9), or
   * underscores (_), and must start with a letter or underscore. The maximum size
   * is 64 bytes when encoded in UTF-8.
   * @return GoogleCloudDatacatalogV1TagTemplate
   */
  public function create($parent, GoogleCloudDatacatalogV1TagTemplate $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1TagTemplate::class);
  }
  /**
   * Deletes a tag template and all tags that use it. You must enable the Data
   * Catalog API in the project identified by the `name` parameter. For more
   * information, see [Data Catalog resource project](https://cloud.google.com
   * /data-catalog/docs/concepts/resource-project). (tagTemplates.delete)
   *
   * @param string $name Required. The name of the tag template to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Required. If true, deletes all tags that use this
   * template. Currently, `true` is the only supported value.
   * @return DatacatalogEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatacatalogEmpty::class);
  }
  /**
   * Gets a tag template. (tagTemplates.get)
   *
   * @param string $name Required. The name of the tag template to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1TagTemplate
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatacatalogV1TagTemplate::class);
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
   * groups. (tagTemplates.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
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
   * Updates a tag template. You can't update template fields with this method.
   * These fields are separate resources with their own create, update, and delete
   * methods. You must enable the Data Catalog API in the project identified by
   * the `tag_template.name` parameter. For more information, see [Data Catalog
   * resource project](https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project). (tagTemplates.patch)
   *
   * @param string $name The resource name of the tag template in URL format.
   * Note: The tag template itself and its child resources might not be stored in
   * the location specified in its name.
   * @param GoogleCloudDatacatalogV1TagTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Names of fields whose values to overwrite on a
   * tag template. Currently, only `display_name` and `is_publicly_readable` can
   * be overwritten. If this parameter is absent or empty, all modifiable fields
   * are overwritten. If such fields are non-required and omitted in the request
   * body, their values are emptied. Note: Updating the `is_publicly_readable`
   * field may require up to 12 hours to take effect in search results.
   * Additionally, it also requires the `tagTemplates.getIamPolicy` and
   * `tagTemplates.setIamPolicy` permissions.
   * @return GoogleCloudDatacatalogV1TagTemplate
   */
  public function patch($name, GoogleCloudDatacatalogV1TagTemplate $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1TagTemplate::class);
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
   * (tagTemplates.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
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
   * (tagTemplates.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
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
class_alias(ProjectsLocationsTagTemplates::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplates');
