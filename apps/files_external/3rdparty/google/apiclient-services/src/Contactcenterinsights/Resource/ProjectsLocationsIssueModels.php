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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1CalculateIssueModelStatsResponse;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1DeployIssueModelRequest;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1IssueModel;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListIssueModelsResponse;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest;
use Google\Service\Contactcenterinsights\GoogleLongrunningOperation;

/**
 * The "issueModels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $issueModels = $contactcenterinsightsService->issueModels;
 *  </code>
 */
class ProjectsLocationsIssueModels extends \Google\Service\Resource
{
  /**
   * Gets an issue model's statistics. (issueModels.calculateIssueModelStats)
   *
   * @param string $issueModel Required. The resource name of the issue model to
   * query against.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1CalculateIssueModelStatsResponse
   */
  public function calculateIssueModelStats($issueModel, $optParams = [])
  {
    $params = ['issueModel' => $issueModel];
    $params = array_merge($params, $optParams);
    return $this->call('calculateIssueModelStats', [$params], GoogleCloudContactcenterinsightsV1CalculateIssueModelStatsResponse::class);
  }
  /**
   * Creates an issue model. (issueModels.create)
   *
   * @param string $parent Required. The parent resource of the issue model.
   * @param GoogleCloudContactcenterinsightsV1IssueModel $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudContactcenterinsightsV1IssueModel $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an issue model. (issueModels.delete)
   *
   * @param string $name Required. The name of the issue model to delete.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deploys an issue model. Returns an error if a model is already deployed. An
   * issue model can only be used in analysis after it has been deployed.
   * (issueModels.deploy)
   *
   * @param string $name Required. The issue model to deploy.
   * @param GoogleCloudContactcenterinsightsV1DeployIssueModelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function deploy($name, GoogleCloudContactcenterinsightsV1DeployIssueModelRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deploy', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets an issue model. (issueModels.get)
   *
   * @param string $name Required. The name of the issue model to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1IssueModel
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1IssueModel::class);
  }
  /**
   * Lists issue models. (issueModels.listProjectsLocationsIssueModels)
   *
   * @param string $parent Required. The parent resource of the issue model.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1ListIssueModelsResponse
   */
  public function listProjectsLocationsIssueModels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListIssueModelsResponse::class);
  }
  /**
   * Updates an issue model. (issueModels.patch)
   *
   * @param string $name Immutable. The resource name of the issue model. Format:
   * projects/{project}/locations/{location}/issueModels/{issue_model}
   * @param GoogleCloudContactcenterinsightsV1IssueModel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return GoogleCloudContactcenterinsightsV1IssueModel
   */
  public function patch($name, GoogleCloudContactcenterinsightsV1IssueModel $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudContactcenterinsightsV1IssueModel::class);
  }
  /**
   * Undeploys an issue model. An issue model can not be used in analysis after it
   * has been undeployed. (issueModels.undeploy)
   *
   * @param string $name Required. The issue model to undeploy.
   * @param GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function undeploy($name, GoogleCloudContactcenterinsightsV1UndeployIssueModelRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('undeploy', [$params], GoogleLongrunningOperation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsIssueModels::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsIssueModels');
