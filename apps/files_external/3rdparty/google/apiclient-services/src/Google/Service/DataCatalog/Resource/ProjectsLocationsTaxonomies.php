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
 * The "taxonomies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $taxonomies = $datacatalogService->taxonomies;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsTaxonomies extends Google_Service_Resource
{
  /**
   * Creates a taxonomy in the specified project. (taxonomies.create)
   *
   * @param string $parent Required. Resource name of the project that the
   * taxonomy will belong to.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy");
  }
  /**
   * Deletes a taxonomy. This operation will also delete all policy tags in this
   * taxonomy along with their associated policies. (taxonomies.delete)
   *
   * @param string $name Required. Resource name of the taxonomy to be deleted.
   * All policy tags in this taxonomy will also be deleted.
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
   * Exports all taxonomies and their policy tags in a project. This method
   * generates SerializedTaxonomy protos with nested policy tags that can be used
   * as an input for future ImportTaxonomies calls. (taxonomies.export)
   *
   * @param string $parent Required. Resource name of the project that taxonomies
   * to be exported will share.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string taxonomies Required. Resource names of the taxonomies to be
   * exported.
   * @opt_param bool serializedTaxonomies Export taxonomies as serialized
   * taxonomies.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ExportTaxonomiesResponse
   */
  public function export($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ExportTaxonomiesResponse");
  }
  /**
   * Gets a taxonomy. (taxonomies.get)
   *
   * @param string $name Required. Resource name of the requested taxonomy.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy");
  }
  /**
   * Gets the IAM policy for a taxonomy or a policy tag. (taxonomies.getIamPolicy)
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
   * Imports all taxonomies and their policy tags to a project as new taxonomies.
   * This method provides a bulk taxonomy / policy tag creation using nested proto
   * structure. (taxonomies.import)
   *
   * @param string $parent Required. Resource name of project that the imported
   * taxonomies will belong to.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ImportTaxonomiesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ImportTaxonomiesResponse
   */
  public function import($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ImportTaxonomiesRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ImportTaxonomiesResponse");
  }
  /**
   * Lists all taxonomies in a project in a particular location that the caller
   * has permission to view. (taxonomies.listProjectsLocationsTaxonomies)
   *
   * @param string $parent Required. Resource name of the project to list the
   * taxonomies of.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Must be a
   * value between 1 and 1000. If not set, defaults to 50.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any. If not set, defaults to an empty string.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListTaxonomiesResponse
   */
  public function listProjectsLocationsTaxonomies($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListTaxonomiesResponse");
  }
  /**
   * Updates a taxonomy. (taxonomies.patch)
   *
   * @param string $name Output only. Resource name of this taxonomy, whose format
   * is: "projects/{project_number}/locations/{location_id}/taxonomies/{id}".
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. For the
   * `FieldMask` definition, see https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask If not set, defaults to all
   * of the fields that are allowed to update.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Taxonomy");
  }
  /**
   * Sets the IAM policy for a taxonomy or a policy tag. (taxonomies.setIamPolicy)
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
   * Returns the permissions that a caller has on the specified taxonomy or policy
   * tag. (taxonomies.testIamPermissions)
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
