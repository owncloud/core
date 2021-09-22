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

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1ListDeploymentsResponse;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $deployments = $apigeeService->deployments;
 *  </code>
 */
class OrganizationsSharedflowsRevisionsDeployments extends \Google\Service\Resource
{
  /**
   * Lists all deployments of a shared flow revision.
   * (deployments.listOrganizationsSharedflowsRevisionsDeployments)
   *
   * @param string $parent Required. Name of the API proxy revision for which to
   * return deployment information in the following format:
   * `organizations/{org}/sharedflows/{sharedflow}/revisions/{rev}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ListDeploymentsResponse
   */
  public function listOrganizationsSharedflowsRevisionsDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListDeploymentsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsSharedflowsRevisionsDeployments::class, 'Google_Service_Apigee_Resource_OrganizationsSharedflowsRevisionsDeployments');
