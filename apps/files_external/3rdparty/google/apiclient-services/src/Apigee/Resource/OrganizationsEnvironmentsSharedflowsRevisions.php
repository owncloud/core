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

use Google\Service\Apigee\GoogleCloudApigeeV1Deployment;
use Google\Service\Apigee\GoogleProtobufEmpty;

/**
 * The "revisions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $revisions = $apigeeService->revisions;
 *  </code>
 */
class OrganizationsEnvironmentsSharedflowsRevisions extends \Google\Service\Resource
{
  /**
   * Deploys a revision of a shared flow. If another revision of the same shared
   * flow is currently deployed, set the `override` parameter to `true` to have
   * this revision replace the currently deployed revision. You cannot use a
   * shared flow until it has been deployed to an environment. For a request path
   * `organizations/{org}/environments/{env}/sharedflows/{sf}/revisions/{rev}/depl
   * oyments`, two permissions are required: * `apigee.deployments.create` on the
   * resource `organizations/{org}/environments/{env}` *
   * `apigee.sharedflowrevisions.deploy` on the resource
   * `organizations/{org}/sharedflows/{sf}/revisions/{rev}` (revisions.deploy)
   *
   * @param string $name Required. Name of the shared flow revision to deploy in
   * the following format: `organizations/{org}/environments/{env}/sharedflows/{sh
   * aredflow}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool override Flag that specifies whether the new deployment
   * replaces other deployed revisions of the shared flow in the environment. Set
   * `override` to `true` to replace other deployed revisions. By default,
   * `override` is `false` and the deployment is rejected if other revisions of
   * the shared flow are deployed in the environment.
   * @opt_param string serviceAccount Google Cloud IAM service account. The
   * service account represents the identity of the deployed proxy, and determines
   * what permissions it has. The format must be
   * `{ACCOUNT_ID}@{PROJECT}.iam.gserviceaccount.com`.
   * @return GoogleCloudApigeeV1Deployment
   */
  public function deploy($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deploy', [$params], GoogleCloudApigeeV1Deployment::class);
  }
  /**
   * Gets the deployment of a shared flow revision and actual state reported by
   * runtime pods. (revisions.getDeployments)
   *
   * @param string $name Required. Name representing a shared flow in an
   * environment in the following format: `organizations/{org}/environments/{env}/
   * sharedflows/{sharedflow}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1Deployment
   */
  public function getDeployments($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getDeployments', [$params], GoogleCloudApigeeV1Deployment::class);
  }
  /**
   * Undeploys a shared flow revision from an environment. For a request path `org
   * anizations/{org}/environments/{env}/sharedflows/{sf}/revisions/{rev}/deployme
   * nts`, two permissions are required: * `apigee.deployments.delete` on the
   * resource `organizations/{org}/environments/{env}` *
   * `apigee.sharedflowrevisions.undeploy` on the resource
   * `organizations/{org}/sharedflows/{sf}/revisions/{rev}` (revisions.undeploy)
   *
   * @param string $name Required. Name of the shared flow revision to undeploy in
   * the following format: `organizations/{org}/environments/{env}/sharedflows/{sh
   * aredflow}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function undeploy($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('undeploy', [$params], GoogleProtobufEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsEnvironmentsSharedflowsRevisions::class, 'Google_Service_Apigee_Resource_OrganizationsEnvironmentsSharedflowsRevisions');
