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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\ListProvisioningQuotasResponse;

/**
 * The "provisioningQuotas" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $provisioningQuotas = $baremetalsolutionService->provisioningQuotas;
 *  </code>
 */
class ProjectsLocationsProvisioningQuotas extends \Google\Service\Resource
{
  /**
   * List the budget details to provision resources on a given project.
   * (provisioningQuotas.listProjectsLocationsProvisioningQuotas)
   *
   * @param string $parent Required. Parent value for
   * ListProvisioningQuotasRequest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server might return fewer
   * items than requested. If unspecified, server will pick an appropriate
   * default. Notice that page_size field is not supported and won't be respected
   * in the API request for now, will be updated when pagination is supported.
   * @opt_param string pageToken A token identifying a page of results from the
   * server.
   * @return ListProvisioningQuotasResponse
   */
  public function listProjectsLocationsProvisioningQuotas($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListProvisioningQuotasResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProvisioningQuotas::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsProvisioningQuotas');
