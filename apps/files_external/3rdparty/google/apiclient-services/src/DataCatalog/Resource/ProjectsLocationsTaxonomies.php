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
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ExportTaxonomiesResponse;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ImportTaxonomiesRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ImportTaxonomiesResponse;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ListTaxonomiesResponse;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ReplaceTaxonomyRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1Taxonomy;
use Google\Service\DataCatalog\Policy;
use Google\Service\DataCatalog\SetIamPolicyRequest;
use Google\Service\DataCatalog\TestIamPermissionsRequest;
use Google\Service\DataCatalog\TestIamPermissionsResponse;

/**
 * The "taxonomies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $taxonomies = $datacatalogService->taxonomies;
 *  </code>
 */
class ProjectsLocationsTaxonomies extends \Google\Service\Resource
{
  /**
   * Creates a taxonomy in a specified project. The taxonomy is initially empty,
   * that is, it doesn't contain policy tags. (taxonomies.create)
   *
   * @param string $parent Required. Resource name of the project that the
   * taxonomy will belong to.
   * @param GoogleCloudDatacatalogV1Taxonomy $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1Taxonomy
   */
  public function create($parent, GoogleCloudDatacatalogV1Taxonomy $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1Taxonomy::class);
  }
  /**
   * Deletes a taxonomy, including all policy tags in this taxonomy, their
   * associated policies, and the policy tags references from BigQuery columns.
   * (taxonomies.delete)
   *
   * @param string $name Required. Resource name of the taxonomy to delete. Note:
   * All policy tags in this taxonomy are also deleted.
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
   * Exports taxonomies in the requested type and returns them, including their
   * policy tags. The requested taxonomies must belong to the same project. This
   * method generates `SerializedTaxonomy` protocol buffers with nested policy
   * tags that can be used as input for `ImportTaxonomies` calls.
   * (taxonomies.export)
   *
   * @param string $parent Required. Resource name of the project that the
   * exported taxonomies belong to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool serializedTaxonomies Serialized export taxonomies that
   * contain all the policy tags as nested protocol buffers.
   * @opt_param string taxonomies Required. Resource names of the taxonomies to
   * export.
   * @return GoogleCloudDatacatalogV1ExportTaxonomiesResponse
   */
  public function export($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('export', [$params], GoogleCloudDatacatalogV1ExportTaxonomiesResponse::class);
  }
  /**
   * Gets a taxonomy. (taxonomies.get)
   *
   * @param string $name Required. Resource name of the taxonomy to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1Taxonomy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatacatalogV1Taxonomy::class);
  }
  /**
   * Gets the IAM policy for a policy tag or a taxonomy. (taxonomies.getIamPolicy)
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
   * Creates new taxonomies (including their policy tags) in a given project by
   * importing from inlined or cross-regional sources. For a cross-regional
   * source, new taxonomies are created by copying from a source in another
   * region. For an inlined source, taxonomies and policy tags are created in bulk
   * using nested protocol buffer structures. (taxonomies.import)
   *
   * @param string $parent Required. Resource name of project that the imported
   * taxonomies will belong to.
   * @param GoogleCloudDatacatalogV1ImportTaxonomiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1ImportTaxonomiesResponse
   */
  public function import($parent, GoogleCloudDatacatalogV1ImportTaxonomiesRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleCloudDatacatalogV1ImportTaxonomiesResponse::class);
  }
  /**
   * Lists all taxonomies in a project in a particular location that you have a
   * permission to view. (taxonomies.listProjectsLocationsTaxonomies)
   *
   * @param string $parent Required. Resource name of the project to list the
   * taxonomies of.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Must be a
   * value between 1 and 1000 inclusively. If not set, defaults to 50.
   * @opt_param string pageToken The pagination token of the next results page. If
   * not set, the first page is returned. The token is returned in the response to
   * a previous list request.
   * @return GoogleCloudDatacatalogV1ListTaxonomiesResponse
   */
  public function listProjectsLocationsTaxonomies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatacatalogV1ListTaxonomiesResponse::class);
  }
  /**
   * Updates a taxonomy, including its display name, description, and activated
   * policy types. (taxonomies.patch)
   *
   * @param string $name Output only. Resource name of this taxonomy in URL
   * format. Note: Policy tag manager generates unique taxonomy IDs.
   * @param GoogleCloudDatacatalogV1Taxonomy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies fields to update. If not set, defaults
   * to all fields you can update. For more information, see [FieldMask]
   * (https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask).
   * @return GoogleCloudDatacatalogV1Taxonomy
   */
  public function patch($name, GoogleCloudDatacatalogV1Taxonomy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1Taxonomy::class);
  }
  /**
   * Replaces (updates) a taxonomy and all its policy tags. The taxonomy and its
   * entire hierarchy of policy tags must be represented literally by
   * `SerializedTaxonomy` and the nested `SerializedPolicyTag` messages. This
   * operation automatically does the following: - Deletes the existing policy
   * tags that are missing from the `SerializedPolicyTag`. - Creates policy tags
   * that don't have resource names. They are considered new. - Updates policy
   * tags with valid resources names accordingly. (taxonomies.replace)
   *
   * @param string $name Required. Resource name of the taxonomy to update.
   * @param GoogleCloudDatacatalogV1ReplaceTaxonomyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1Taxonomy
   */
  public function replace($name, GoogleCloudDatacatalogV1ReplaceTaxonomyRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replace', [$params], GoogleCloudDatacatalogV1Taxonomy::class);
  }
  /**
   * Sets the IAM policy for a policy tag or a taxonomy. (taxonomies.setIamPolicy)
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
   * Returns your permissions on a specified policy tag or taxonomy.
   * (taxonomies.testIamPermissions)
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
class_alias(ProjectsLocationsTaxonomies::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsTaxonomies');
