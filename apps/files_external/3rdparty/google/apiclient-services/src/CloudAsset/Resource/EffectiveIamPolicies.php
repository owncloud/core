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

namespace Google\Service\CloudAsset\Resource;

use Google\Service\CloudAsset\BatchGetEffectiveIamPoliciesResponse;

/**
 * The "effectiveIamPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudassetService = new Google\Service\CloudAsset(...);
 *   $effectiveIamPolicies = $cloudassetService->effectiveIamPolicies;
 *  </code>
 */
class EffectiveIamPolicies extends \Google\Service\Resource
{
  /**
   * Gets effective IAM policies for a batch of resources.
   * (effectiveIamPolicies.batchGet)
   *
   * @param string $scope Required. Only IAM policies on or below the scope will
   * be returned. This can only be an organization number (such as
   * "organizations/123"), a folder number (such as "folders/123"), a project ID
   * (such as "projects/my-project-id"), or a project number (such as
   * "projects/12345"). To know how to get organization id, visit [here
   * ](https://cloud.google.com/resource-manager/docs/creating-managing-
   * organization#retrieving_your_organization_id). To know how to get folder or
   * project id, visit [here ](https://cloud.google.com/resource-manager/docs
   * /creating-managing-folders#viewing_or_listing_folders_and_projects).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The names refer to the
   * [full_resource_names] (https://cloud.google.com/asset-inventory/docs
   * /resource-name-format) of [searchable asset types](https://cloud.google.com
   * /asset-inventory/docs/supported-asset-types#searchable_asset_types). A
   * maximum of 20 resources' effective policies can be retrieved in a batch.
   * @return BatchGetEffectiveIamPoliciesResponse
   */
  public function batchGet($scope, $optParams = [])
  {
    $params = ['scope' => $scope];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetEffectiveIamPoliciesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EffectiveIamPolicies::class, 'Google_Service_CloudAsset_Resource_EffectiveIamPolicies');
