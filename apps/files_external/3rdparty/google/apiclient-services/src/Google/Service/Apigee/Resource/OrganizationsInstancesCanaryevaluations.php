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
 * The "canaryevaluations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $canaryevaluations = $apigeeService->canaryevaluations;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsInstancesCanaryevaluations extends Google_Service_Resource
{
  /**
   * Creates a new canary evaluation for an organization.
   * (canaryevaluations.create)
   *
   * @param string $parent Required. Name of the organization. Use the following
   * structure in your request: `organizations/{org}/instances/{instance}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
  /**
   * Gets a CanaryEvaluation for an organization. (canaryevaluations.get)
   *
   * @param string $name Required. Name of the CanaryEvaluation. Use the following
   * structure in your request:
   * `organizations/{org}/instances/canaryevaluations/{evaluation}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1CanaryEvaluation");
  }
}
