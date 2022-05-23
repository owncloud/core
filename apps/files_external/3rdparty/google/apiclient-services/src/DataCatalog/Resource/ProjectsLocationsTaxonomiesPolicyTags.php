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
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1ListPolicyTagsResponse;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1PolicyTag;
use Google\Service\DataCatalog\Policy;
use Google\Service\DataCatalog\SetIamPolicyRequest;
use Google\Service\DataCatalog\TestIamPermissionsRequest;
use Google\Service\DataCatalog\TestIamPermissionsResponse;

/**
 * The "policyTags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $policyTags = $datacatalogService->policyTags;
 *  </code>
 */
class ProjectsLocationsTaxonomiesPolicyTags extends \Google\Service\Resource
{
  /**
   * Creates a policy tag in a taxonomy. (policyTags.create)
   *
   * @param string $parent Required. Resource name of the taxonomy that the policy
   * tag will belong to.
   * @param GoogleCloudDatacatalogV1PolicyTag $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1PolicyTag
   */
  public function create($parent, GoogleCloudDatacatalogV1PolicyTag $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1PolicyTag::class);
  }
  /**
   * Deletes a policy tag together with the following: * All of its descendant
   * policy tags, if any * Policies associated with the policy tag and its
   * descendants * References from BigQuery table schema of the policy tag and its
   * descendants (policyTags.delete)
   *
   * @param string $name Required. Resource name of the policy tag to delete.
   * Note: All of its descendant policy tags are also deleted.
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
   * Gets a policy tag. (policyTags.get)
   *
   * @param string $name Required. Resource name of the policy tag.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1PolicyTag
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDatacatalogV1PolicyTag::class);
  }
  /**
   * Gets the IAM policy for a policy tag or a taxonomy. (policyTags.getIamPolicy)
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
   * Lists all policy tags in a taxonomy.
   * (policyTags.listProjectsLocationsTaxonomiesPolicyTags)
   *
   * @param string $parent Required. Resource name of the taxonomy to list the
   * policy tags of.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Must be a
   * value between 1 and 1000 inclusively. If not set, defaults to 50.
   * @opt_param string pageToken The pagination token of the next results page. If
   * not set, returns the first page. The token is returned in the response to a
   * previous list request.
   * @return GoogleCloudDatacatalogV1ListPolicyTagsResponse
   */
  public function listProjectsLocationsTaxonomiesPolicyTags($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatacatalogV1ListPolicyTagsResponse::class);
  }
  /**
   * Updates a policy tag, including its display name, description, and parent
   * policy tag. (policyTags.patch)
   *
   * @param string $name Output only. Resource name of this policy tag in the URL
   * format. The policy tag manager generates unique taxonomy IDs and policy tag
   * IDs.
   * @param GoogleCloudDatacatalogV1PolicyTag $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies the fields to update. You can update
   * only display name, description, and parent policy tag. If not set, defaults
   * to all updatable fields. For more information, see [FieldMask]
   * (https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask).
   * @return GoogleCloudDatacatalogV1PolicyTag
   */
  public function patch($name, GoogleCloudDatacatalogV1PolicyTag $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1PolicyTag::class);
  }
  /**
   * Sets the IAM policy for a policy tag or a taxonomy. (policyTags.setIamPolicy)
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
   * (policyTags.testIamPermissions)
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
class_alias(ProjectsLocationsTaxonomiesPolicyTags::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsTaxonomiesPolicyTags');
