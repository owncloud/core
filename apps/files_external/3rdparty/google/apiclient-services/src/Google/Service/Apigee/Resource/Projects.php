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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $projects = $apigeeService->projects;
 *  </code>
 */
class Google_Service_Apigee_Resource_Projects extends Google_Service_Resource
{
  /**
   * Provisions a new Apigee organization with a functioning runtime. This is the
   * standard way to create trial organizations for a free Apigee trial.
   * (projects.provisionOrganization)
   *
   * @param string $project Required. Name of the GCP project with which to
   * associate the Apigee organization.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1ProvisionOrganizationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleLongrunningOperation
   */
  public function provisionOrganization($project, Google_Service_Apigee_GoogleCloudApigeeV1ProvisionOrganizationRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('provisionOrganization', array($params), "Google_Service_Apigee_GoogleLongrunningOperation");
  }
}
