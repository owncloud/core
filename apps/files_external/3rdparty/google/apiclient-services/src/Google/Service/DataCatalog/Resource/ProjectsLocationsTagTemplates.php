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
 * The "tagTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $tagTemplates = $datacatalogService->tagTemplates;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplates extends Google_Service_Resource
{
  /**
   * Creates a tag template. The user should enable the Data Catalog API in the
   * project identified by the `parent` parameter (see [Data Catalog Resource
   * Project](https://cloud.google.com/data-catalog/docs/concepts/resource-
   * project) for more information). (tagTemplates.create)
   *
   * @param string $parent Required. The name of the project and the template
   * location [region](https://cloud.google.com/data-
   * catalog/docs/concepts/regions.
   *
   * Example:
   *
   * * projects/{project_id}/locations/us-central1
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagTemplateId Required. The id of the tag template to
   * create.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate");
  }
  /**
   * Deletes a tag template and all tags using the template. Users should enable
   * the Data Catalog API in the project identified by the `name` parameter (see
   * [Data Catalog Resource Project] (https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project) for more information).
   * (tagTemplates.delete)
   *
   * @param string $name Required. The name of the tag template to delete.
   * Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Required. Currently, this field must always be set to
   * `true`. This confirms the deletion of any possible tags using this template.
   * `force = false` will be supported in the future.
   * @return Google_Service_DataCatalog_DatacatalogEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataCatalog_DatacatalogEmpty");
  }
  /**
   * Gets a tag template. (tagTemplates.get)
   *
   * @param string $name Required. The name of the tag template. Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate");
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
   * (tagTemplates.getIamPolicy)
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
   * Updates a tag template. This method cannot be used to update the fields of a
   * template. The tag template fields are represented as separate resources and
   * should be updated using their own create/update/delete methods. Users should
   * enable the Data Catalog API in the project identified by the
   * `tag_template.name` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). (tagTemplates.patch)
   *
   * @param string $name The resource name of the tag template in URL format.
   * Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}
   *
   * Note that this TagTemplate and its child resources may not actually be stored
   * in the location in this name.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask specifies the parts of the
   * template to overwrite.
   *
   * Allowed fields:
   *
   *   * `display_name`
   *
   * If absent or empty, all of the allowed fields above will be updated.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplate");
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
   * (tagTemplates.setIamPolicy)
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
   * (tagTemplates.testIamPermissions)
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
