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
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsApisRevisions extends Google_Service_Resource
{
  /**
   * Deploys a revision of an API proxy. If an API proxy revision is currently
   * deployed, to ensure seamless deployment with zero downtime set the `override`
   * parameter to `true`. In this case, hybrid attempts to deploy the new revision
   * fully before undeploying the existing revision. You cannot invoke an API
   * proxy until it has been deployed to an environment. After you deploy an API
   * proxy revision, you cannot edit it. To edit the API proxy, you must create
   * and deploy a new revision.  (revisions.deploy)
   *
   * @param string $name Required. Name of the API proxy revision deployment in
   * the following format:
   * `organizations/{org}/environments/{env}/apis/{api}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sequencedRollout If true, a best-effort attempt will be made
   * to roll out the routing rules corresponding to this deployment and the
   * environment changes to add this deployment in a safe order. This reduces the
   * risk of downtime that could be caused by changing the environment group's
   * routing before the new destination for the affected traffic is ready to
   * receive it. This should only be necessary if the new deployment will be
   * capturing traffic from another environment under a shared environment group
   * or if traffic will be rerouted to a different environment due to a basepath
   * removal. The GenerateDeployChangeReport API may be used to examine routing
   * changes before issuing the deployment request, and its response will indicate
   * if a sequenced rollout is recommended for the deployment.
   * @opt_param bool override Flag that specifies whether the new deployment
   * replaces other deployed revisions of the API proxy in the environment. Set
   * override to true to replace other deployed revisions. By default, override is
   * false and the deployment is rejected if other revisions of the API proxy are
   * deployed in the environment.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Deployment
   */
  public function deploy($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('deploy', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Deployment");
  }
  /**
   * Gets the deployment of an API proxy revision and actual state reported by
   * runtime pods. (revisions.getDeployments)
   *
   * @param string $name Required. Name representing an API proxy revision in an
   * environment in the following format:
   * `organizations/{org}/environments/{env}/apis/{api}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Deployment
   */
  public function getDeployments($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getDeployments', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Deployment");
  }
  /**
   * Undeploys an API proxy revision from an environment. Because multiple
   * revisions of the same API proxy can be deployed in the same environment if
   * the base paths are different, you must specify the revision number of the API
   * proxy. (revisions.undeploy)
   *
   * @param string $name Required. Name of the API proxy revision deployment in
   * the following format:
   * `organizations/{org}/environments/{env}/apis/{api}/revisions/{rev}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool sequencedRollout If true, a best-effort attempt will be made
   * to remove the environment group routing rules corresponding to this
   * deployment before removing the deployment from the runtime. This is likely to
   * be a rare use case; it is only needed when the intended effect of undeploying
   * this proxy is to cause the traffic it currently handles to be rerouted to
   * some other existing proxy in the environment group. The
   * GenerateUndeployChangeReport API may be used to examine routing changes
   * before issuing the undeployment request, and its response will indicate if a
   * sequenced rollout is recommended for the undeployment.
   * @return Google_Service_Apigee_GoogleProtobufEmpty
   */
  public function undeploy($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('undeploy', array($params), "Google_Service_Apigee_GoogleProtobufEmpty");
  }
}
