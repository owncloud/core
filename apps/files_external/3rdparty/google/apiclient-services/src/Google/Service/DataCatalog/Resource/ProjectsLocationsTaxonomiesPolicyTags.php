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
 * The "policyTags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $policyTags = $datacatalogService->policyTags;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsTaxonomiesPolicyTags extends Google_Service_Resource
{
  /**
   * Creates a policy tag in the specified taxonomy. (policyTags.create)
   *
   * @param string $parent Required. Resource name of the taxonomy that the policy
   * tag will belong to.
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag");
  }
  /**
   * Deletes a policy tag. Also deletes all of its descendant policy tags.
   * (policyTags.delete)
   *
   * @param string $name Required. Resource name of the policy tag to be deleted.
   * All of its descendant policy tags will also be deleted.
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
   * Gets a policy tag. (policyTags.get)
   *
   * @param string $name Required. Resource name of the requested policy tag.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag");
  }
  /**
   * Gets the IAM policy for a taxonomy or a policy tag. (policyTags.getIamPolicy)
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
   * Lists all policy tags in a taxonomy.
   * (policyTags.listProjectsLocationsTaxonomiesPolicyTags)
   *
   * @param string $parent Required. Resource name of the taxonomy to list the
   * policy tags of.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any. If not set, defaults to an empty string.
   * @opt_param int pageSize The maximum number of items to return. Must be a
   * value between 1 and 1000. If not set, defaults to 50.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListPolicyTagsResponse
   */
  public function listProjectsLocationsTaxonomiesPolicyTags($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1ListPolicyTagsResponse");
  }
  /**
   * Updates a policy tag. (policyTags.patch)
   *
   * @param string $name Output only. Resource name of this policy tag, whose
   * format is: "projects/{project_number}/locations/{location_id}/taxonomies/{tax
   * onomy_id}/policyTags/{id}".
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the resource. Only
   * display_name, description and parent_policy_tag can be updated and thus can
   * be listed in the mask. If update_mask is not provided, all allowed fields
   * (i.e. display_name, description and parent) will be updated. For more
   * information including the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask If not set, defaults to all
   * of the fields that are allowed to update.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1PolicyTag");
  }
  /**
   * Sets the IAM policy for a taxonomy or a policy tag. (policyTags.setIamPolicy)
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
   * tag. (policyTags.testIamPermissions)
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
