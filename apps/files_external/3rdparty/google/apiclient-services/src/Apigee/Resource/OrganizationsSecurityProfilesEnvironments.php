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

use Google\Service\Apigee\GoogleCloudApigeeV1ComputeEnvironmentScoresRequest;
use Google\Service\Apigee\GoogleCloudApigeeV1ComputeEnvironmentScoresResponse;
use Google\Service\Apigee\GoogleCloudApigeeV1SecurityProfileEnvironmentAssociation;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "environments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $environments = $apigeeService->environments;
 *  </code>
 */
class OrganizationsSecurityProfilesEnvironments extends \Google\Service\Resource
{
  /**
   * ComputeEnvironmentScores calculates scores for requested time range for the
   * specified security profile and environment.
   * (environments.computeEnvironmentScores)
   *
   * @param string $profileEnvironment Required. Name of organization and
   * environment and profile id for which score needs to be computed. Format:
   * organizations/{org}/securityProfiles/{profile}/environments/{env}
   * @param GoogleCloudApigeeV1ComputeEnvironmentScoresRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1ComputeEnvironmentScoresResponse
   */
  public function computeEnvironmentScores($profileEnvironment, GoogleCloudApigeeV1ComputeEnvironmentScoresRequest $postBody, $optParams = [])
  {
    $params = ['profileEnvironment' => $profileEnvironment, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('computeEnvironmentScores', [$params], GoogleCloudApigeeV1ComputeEnvironmentScoresResponse::class);
  }
  /**
   * CreateSecurityProfileEnvironmentAssociation creates profile environment
   * association i.e. attaches environment to security profile.
   * (environments.create)
   *
   * @param string $parent Required. Name of organization and security profile ID.
   * Format: organizations/{org}/securityProfiles/{profile}
   * @param GoogleCloudApigeeV1SecurityProfileEnvironmentAssociation $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1SecurityProfileEnvironmentAssociation
   */
  public function create($parent, GoogleCloudApigeeV1SecurityProfileEnvironmentAssociation $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1SecurityProfileEnvironmentAssociation::class);
  }
  /**
   * DeleteSecurityProfileEnvironmentAssociation removes profile environment
   * association i.e. detaches environment from security profile.
   * (environments.delete)
   *
   * @param string $name Required. The name of the environment attachment to
   * delete. Format:
   * organizations/{org}/securityProfiles/{profile}/environments/{env}
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsSecurityProfilesEnvironments::class, 'Google_Service_Apigee_Resource_OrganizationsSecurityProfilesEnvironments');
