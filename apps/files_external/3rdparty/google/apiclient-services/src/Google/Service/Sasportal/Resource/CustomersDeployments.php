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
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sasportalService = new Google_Service_Sasportal(...);
 *   $deployments = $sasportalService->deployments;
 *  </code>
 */
class Google_Service_Sasportal_Resource_CustomersDeployments extends Google_Service_Resource
{
  /**
   * Creates a new deployment. (deployments.create)
   *
   * @param string $parent Required. The parent resource name where the deployment
   * is to be created.
   * @param Google_Service_Sasportal_SasPortalDeployment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDeployment
   */
  public function create($parent, Google_Service_Sasportal_SasPortalDeployment $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Sasportal_SasPortalDeployment");
  }
  /**
   * Deletes a deployment. (deployments.delete)
   *
   * @param string $name Required. The name of the deployment.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Sasportal_SasPortalEmpty");
  }
  /**
   * Returns a requested deployment. (deployments.get)
   *
   * @param string $name Required. The name of the deployment.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalDeployment
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sasportal_SasPortalDeployment");
  }
  /**
   * Lists deployments. (deployments.listCustomersDeployments)
   *
   * @param string $parent Required. The parent resource name, for example,
   * "nodes/1", customer/1/nodes/2.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression. The filter should have the
   * following format: "DIRECT_CHILDREN" or format: "direct_children". The filter
   * is case insensitive. If empty, then no deployments are filtered.
   * @opt_param int pageSize The maximum number of deployments to return in the
   * response.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListDeployments that indicates where this listing should continue from.
   * @return Google_Service_Sasportal_SasPortalListDeploymentsResponse
   */
  public function listCustomersDeployments($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Sasportal_SasPortalListDeploymentsResponse");
  }
  /**
   * Moves a deployment under another node or customer. (deployments.move)
   *
   * @param string $name Required. The name of the deployment to move.
   * @param Google_Service_Sasportal_SasPortalMoveDeploymentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalOperation
   */
  public function move($name, Google_Service_Sasportal_SasPortalMoveDeploymentRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_Sasportal_SasPortalOperation");
  }
  /**
   * Updates an existing deployment. (deployments.patch)
   *
   * @param string $name Output only. Resource name.
   * @param Google_Service_Sasportal_SasPortalDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return Google_Service_Sasportal_SasPortalDeployment
   */
  public function patch($name, Google_Service_Sasportal_SasPortalDeployment $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Sasportal_SasPortalDeployment");
  }
}
