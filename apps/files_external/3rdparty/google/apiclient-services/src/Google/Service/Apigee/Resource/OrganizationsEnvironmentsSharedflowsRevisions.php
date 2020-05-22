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
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $revisions = $apigeeService->revisions;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsSharedflowsRevisions extends Google_Service_Resource
{
  /**
   * Undeploys a shared flow revision from an environment. (revisions.deployments)
   *
   * @param string $name Required. Name of the shared flow revision to undeploy in
   * the following format:   `organizations/{org}/environments/{env}/sharedflows/{
   * sharedflow}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function deployments($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deployments', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
  /**
   * Gets the deployment of a shared flow revision and actual state reported by
   * runtime pods. (revisions.getDeployments)
   *
   * @param string $name Required. Name representing a shared flow in an
   * environment in the following format:   `organizations/{org}/environments/{env
   * }/sharedflows/{sharedflow}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Deployment
   */
  public function getDeployments($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getDeployments', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Deployment");
  }
}
