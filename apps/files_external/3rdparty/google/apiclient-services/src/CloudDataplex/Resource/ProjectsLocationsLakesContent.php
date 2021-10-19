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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\DataplexEmpty;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1Content;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListContentResponse;
use Google\Service\CloudDataplex\GoogleIamV1Policy;
use Google\Service\CloudDataplex\GoogleIamV1SetIamPolicyRequest;
use Google\Service\CloudDataplex\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\CloudDataplex\GoogleIamV1TestIamPermissionsResponse;

/**
 * The "content" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $content = $dataplexService->content;
 *  </code>
 */
class ProjectsLocationsLakesContent extends \Google\Service\Resource
{
  /**
   * Create a content. (content.create)
   *
   * @param string $parent Required. The resource name of the parent lake:
   * projects/{project_id}/locations/{location_id}/lakes/{lake_id}
   * @param GoogleCloudDataplexV1Content $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Content
   */
  public function create($parent, GoogleCloudDataplexV1Content $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDataplexV1Content::class);
  }
  /**
   * Delete a content. (content.delete)
   *
   * @param string $name Required. The resource name of the content: projects/{pro
   * ject_id}/locations/{location_id}/lakes/{lake_id}/content/{content_id}
   * @param array $optParams Optional parameters.
   * @return DataplexEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataplexEmpty::class);
  }
  /**
   * Get a content resource. (content.get)
   *
   * @param string $name Required. The resource name of the content: projects/{pro
   * ject_id}/locations/{location_id}/lakes/{lake_id}/content/{content_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Optional. Specify content view to make a partial
   * request.
   * @return GoogleCloudDataplexV1Content
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDataplexV1Content::class);
  }
  /**
   * Gets the access control policy for a contentitem resource. A NOT_FOUND error
   * is returned if the resource does not exist. An empty policy is returned if
   * the resource exists but does not have a policy set on it.Caller must have
   * Google IAM dataplex.content.getIamPolicy permission on the resource.
   * (content.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy.Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected.Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset.The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1.To learn which resources support conditions in their
   * IAM policies, see the IAM documentation
   * (https://cloud.google.com/iam/help/conditions/resource-policies).
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * List content. (content.listProjectsLocationsLakesContent)
   *
   * @param string $parent Required. The resource name of the parent lake:
   * projects/{project_id}/locations/{location_id}/lakes/{lake_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter request. Filters are case-
   * sensitive. The following formats are supported:labels.key1 = "value1"
   * labels:key1 type = "NOTEBOOK" type = "SQL_SCRIPT"These restrictions can be
   * coinjoined with AND, OR and NOT conjunctions.
   * @opt_param int pageSize Optional. Maximum number of content to return. The
   * service may return fewer than this value. If unspecified, at most 10 content
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListContent call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to ListContent must match the call
   * that provided the page token.
   * @return GoogleCloudDataplexV1ListContentResponse
   */
  public function listProjectsLocationsLakesContent($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListContentResponse::class);
  }
  /**
   * Update a content. Only supports full resource update. (content.patch)
   *
   * @param string $name Output only. The relative resource name of the content,
   * of the form: projects/{project_id}/locations/{location_id}/lakes/{lake_id}/co
   * ntent/{content_id}
   * @param GoogleCloudDataplexV1Content $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask of fields to update.
   * @opt_param bool validateOnly Optional. Only validate the request, but do not
   * perform mutations. The default is false.
   * @return GoogleCloudDataplexV1Content
   */
  public function patch($name, GoogleCloudDataplexV1Content $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDataplexV1Content::class);
  }
  /**
   * Sets the access control policy on the specified contentitem resource.
   * Replaces any existing policy.Caller must have Google IAM
   * dataplex.content.setIamPolicy permission on the resource.
   * (content.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Returns the caller's permissions on a resource. If the resource does not
   * exist, an empty set of permissions is returned (a NOT_FOUND error is not
   * returned).A caller is not required to have Google IAM permission to make this
   * request.Note: This operation is designed to be used for building permission-
   * aware UIs and command-line tools, not for authorization checking. This
   * operation may "fail open" without warning. (content.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesContent::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesContent');
