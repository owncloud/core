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

use Google\Service\Apigee\GoogleCloudApigeeV1DeploymentChangeReport;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $deployments = $apigeeService->deployments;
 *  </code>
 */
class OrganizationsEnvironmentsApisRevisionsDeployments extends \Google\Service\Resource
{
  /**
   * Generates a report for a dry run analysis of a DeployApiProxy request without
   * committing the deployment. In addition to the standard validations performed
   * when adding deployments, additional analysis will be done to detect possible
   * traffic routing changes that would result from this deployment being created.
   * Any potential routing conflicts or unsafe changes will be reported in the
   * response. This routing analysis is not performed for a non-dry-run
   * DeployApiProxy request. For a request path `organizations/{org}/environments/
   * {env}/apis/{api}/revisions/{rev}/deployments:generateDeployChangeReport`, two
   * permissions are required: * `apigee.deployments.create` on the resource
   * `organizations/{org}/environments/{env}` * `apigee.proxyrevisions.deploy` on
   * the resource `organizations/{org}/apis/{api}/revisions/{rev}`
   * (deployments.generateDeployChangeReport)
   *
   * @param string $name Name of the API proxy revision deployment in the
   * following format:
   * `organizations/{org}/environments/{env}/apis/{api}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool override Flag that specifies whether to force the deployment
   * of the new revision over the currently deployed revision by overriding
   * conflict checks.
   * @return GoogleCloudApigeeV1DeploymentChangeReport
   */
  public function generateDeployChangeReport($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('generateDeployChangeReport', [$params], GoogleCloudApigeeV1DeploymentChangeReport::class);
  }
  /**
   * Generates a report for a dry run analysis of an UndeployApiProxy request
   * without committing the undeploy. In addition to the standard validations
   * performed when removing deployments, additional analysis will be done to
   * detect possible traffic routing changes that would result from this
   * deployment being removed. Any potential routing conflicts or unsafe changes
   * will be reported in the response. This routing analysis is not performed for
   * a non-dry-run UndeployApiProxy request. For a request path `organizations/{or
   * g}/environments/{env}/apis/{api}/revisions/{rev}/deployments:generateUndeploy
   * ChangeReport`, two permissions are required: * `apigee.deployments.delete` on
   * the resource `organizations/{org}/environments/{env}` *
   * `apigee.proxyrevisions.undeploy` on the resource
   * `organizations/{org}/apis/{api}/revisions/{rev}`
   * (deployments.generateUndeployChangeReport)
   *
   * @param string $name Name of the API proxy revision deployment in the
   * following format:
   * `organizations/{org}/environments/{env}/apis/{api}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1DeploymentChangeReport
   */
  public function generateUndeployChangeReport($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('generateUndeployChangeReport', [$params], GoogleCloudApigeeV1DeploymentChangeReport::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsApisRevisionsDeployments::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsApisRevisionsDeployments');
