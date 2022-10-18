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

namespace Google\Service\Integrations\Resource;

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaLiftSuspensionRequest;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaLiftSuspensionResponse;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaListSuspensionsResponse;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaResolveSuspensionRequest;
use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaResolveSuspensionResponse;

/**
 * The "suspensions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $integrationsService = new Google\Service\Integrations(...);
 *   $suspensions = $integrationsService->suspensions;
 *  </code>
 */
class ProjectsLocationsProductsIntegrationsExecutionsSuspensions extends \Google\Service\Resource
{
  /**
   * * Lifts suspension for advanced suspension task. Fetch corresponding
   * suspension with provided suspension Id, resolve suspension, and set up
   * suspension result for the Suspension Task. (suspensions.lift)
   *
   * @param string $name Required. The resource that the suspension belongs to. "p
   * rojects/{project}/locations/{location}/products/{product}/integrations/{integ
   * ration}/executions/{execution}/suspensions/{suspenion}" format.
   * @param GoogleCloudIntegrationsV1alphaLiftSuspensionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaLiftSuspensionResponse
   */
  public function lift($name, GoogleCloudIntegrationsV1alphaLiftSuspensionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('lift', [$params], GoogleCloudIntegrationsV1alphaLiftSuspensionResponse::class);
  }
  /**
   * * Lists suspensions associated with a specific execution. Only those with
   * permissions to resolve the relevant suspensions will be able to view them.
   * (suspensions.listProjectsLocationsProductsIntegrationsExecutionsSuspensions)
   *
   * @param string $parent Required. projects/{gcp_project_id}/locations/{location
   * }/products/{product}/integrations/{integration_name}/executions/{execution_na
   * me}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Standard filter field.
   * @opt_param string orderBy Field name to order by.
   * @opt_param int pageSize Maximum number of entries in the response.
   * @opt_param string pageToken Token to retrieve a specific page.
   * @return GoogleCloudIntegrationsV1alphaListSuspensionsResponse
   */
  public function listProjectsLocationsProductsIntegrationsExecutionsSuspensions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudIntegrationsV1alphaListSuspensionsResponse::class);
  }
  /**
   * * Resolves (lifts/rejects) any number of suspensions. If the integration is
   * already running, only the status of the suspension is updated. Otherwise, the
   * suspended integration will begin execution again. (suspensions.resolve)
   *
   * @param string $name Required. projects/{gcp_project_id}/locations/{location}/
   * products/{product}/integrations/{integration_name}/executions/{execution_name
   * }/suspensions/{suspension_id}
   * @param GoogleCloudIntegrationsV1alphaResolveSuspensionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudIntegrationsV1alphaResolveSuspensionResponse
   */
  public function resolve($name, GoogleCloudIntegrationsV1alphaResolveSuspensionRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resolve', [$params], GoogleCloudIntegrationsV1alphaResolveSuspensionResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProductsIntegrationsExecutionsSuspensions::class, 'Google_Service_Integrations_Resource_ProjectsLocationsProductsIntegrationsExecutionsSuspensions');
