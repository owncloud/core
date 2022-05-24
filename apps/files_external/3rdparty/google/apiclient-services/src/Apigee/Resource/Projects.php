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

use Google\Service\Apigee\GoogleCloudApigeeV1ProvisionOrganizationRequest;
use Google\Service\Apigee\GoogleLongrunningOperation;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $projects = $apigeeService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Provisions a new Apigee organization with a functioning runtime. This is the
   * standard way to create trial organizations for a free Apigee trial.
   * (projects.provisionOrganization)
   *
   * @param string $project Required. Name of the GCP project with which to
   * associate the Apigee organization.
   * @param GoogleCloudApigeeV1ProvisionOrganizationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function provisionOrganization($project, GoogleCloudApigeeV1ProvisionOrganizationRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('provisionOrganization', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_Apigee_Resource_Projects');
