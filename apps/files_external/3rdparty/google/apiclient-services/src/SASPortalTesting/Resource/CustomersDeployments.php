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

namespace Google\Service\SASPortalTesting\Resource;

use Google\Service\SASPortalTesting\SasPortalDeployment;
use Google\Service\SASPortalTesting\SasPortalEmpty;
use Google\Service\SASPortalTesting\SasPortalListDeploymentsResponse;
use Google\Service\SASPortalTesting\SasPortalMoveDeploymentRequest;
use Google\Service\SASPortalTesting\SasPortalOperation;

/**
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $prod_tt_sasportalService = new Google\Service\SASPortalTesting(...);
 *   $deployments = $prod_tt_sasportalService->deployments;
 *  </code>
 */
class CustomersDeployments extends \Google\Service\Resource
{
  /**
   * Creates a new deployment. (deployments.create)
   *
   * @param string $parent Required. The parent resource name where the deployment
   * is to be created.
   * @param SasPortalDeployment $postBody
   * @param array $optParams Optional parameters.
   * @return SasPortalDeployment
   */
  public function create($parent, SasPortalDeployment $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SasPortalDeployment::class);
  }
  /**
   * Deletes a deployment. (deployments.delete)
   *
   * @param string $name Required. The name of the deployment.
   * @param array $optParams Optional parameters.
   * @return SasPortalEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SasPortalEmpty::class);
  }
  /**
   * Returns a requested deployment. (deployments.get)
   *
   * @param string $name Required. The name of the deployment.
   * @param array $optParams Optional parameters.
   * @return SasPortalDeployment
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SasPortalDeployment::class);
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
   * @return SasPortalListDeploymentsResponse
   */
  public function listCustomersDeployments($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SasPortalListDeploymentsResponse::class);
  }
  /**
   * Moves a deployment under another node or customer. (deployments.move)
   *
   * @param string $name Required. The name of the deployment to move.
   * @param SasPortalMoveDeploymentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SasPortalOperation
   */
  public function move($name, SasPortalMoveDeploymentRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('move', [$params], SasPortalOperation::class);
  }
  /**
   * Updates an existing deployment. (deployments.patch)
   *
   * @param string $name Output only. Resource name.
   * @param SasPortalDeployment $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return SasPortalDeployment
   */
  public function patch($name, SasPortalDeployment $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], SasPortalDeployment::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersDeployments::class, 'Google_Service_SASPortalTesting_Resource_CustomersDeployments');
