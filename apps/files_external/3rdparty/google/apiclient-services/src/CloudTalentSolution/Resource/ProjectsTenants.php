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

namespace Google\Service\CloudTalentSolution\Resource;

use Google\Service\CloudTalentSolution\CompleteQueryResponse;
use Google\Service\CloudTalentSolution\JobsEmpty;
use Google\Service\CloudTalentSolution\ListTenantsResponse;
use Google\Service\CloudTalentSolution\Tenant;

/**
 * The "tenants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $jobsService = new Google\Service\CloudTalentSolution(...);
 *   $tenants = $jobsService->tenants;
 *  </code>
 */
class ProjectsTenants extends \Google\Service\Resource
{
  /**
   * Completes the specified prefix with keyword suggestions. Intended for use by
   * a job search auto-complete search box. (tenants.completeQuery)
   *
   * @param string $tenant Required. Resource name of tenant the completion is
   * performed within. The format is "projects/{project_id}/tenants/{tenant_id}",
   * for example, "projects/foo/tenants/bar".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string company If provided, restricts completion to specified
   * company. The format is
   * "projects/{project_id}/tenants/{tenant_id}/companies/{company_id}", for
   * example, "projects/foo/tenants/bar/companies/baz".
   * @opt_param string languageCodes The list of languages of the query. This is
   * the BCP-47 language code, such as "en-US" or "sr-Latn". For more information,
   * see [Tags for Identifying Languages](https://tools.ietf.org/html/bcp47). The
   * maximum number of allowed characters is 255.
   * @opt_param int pageSize Required. Completion result count. The maximum
   * allowed page size is 10.
   * @opt_param string query Required. The query used to generate suggestions. The
   * maximum number of allowed characters is 255.
   * @opt_param string scope The scope of the completion. The defaults is
   * CompletionScope.PUBLIC.
   * @opt_param string type The completion topic. The default is
   * CompletionType.COMBINED.
   * @return CompleteQueryResponse
   */
  public function completeQuery($tenant, $optParams = [])
  {
    $params = ['tenant' => $tenant];
    $params = array_merge($params, $optParams);
    return $this->call('completeQuery', [$params], CompleteQueryResponse::class);
  }
  /**
   * Creates a new tenant entity. (tenants.create)
   *
   * @param string $parent Required. Resource name of the project under which the
   * tenant is created. The format is "projects/{project_id}", for example,
   * "projects/foo".
   * @param Tenant $postBody
   * @param array $optParams Optional parameters.
   * @return Tenant
   */
  public function create($parent, Tenant $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Tenant::class);
  }
  /**
   * Deletes specified tenant. (tenants.delete)
   *
   * @param string $name Required. The resource name of the tenant to be deleted.
   * The format is "projects/{project_id}/tenants/{tenant_id}", for example,
   * "projects/foo/tenants/bar".
   * @param array $optParams Optional parameters.
   * @return JobsEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], JobsEmpty::class);
  }
  /**
   * Retrieves specified tenant. (tenants.get)
   *
   * @param string $name Required. The resource name of the tenant to be
   * retrieved. The format is "projects/{project_id}/tenants/{tenant_id}", for
   * example, "projects/foo/tenants/bar".
   * @param array $optParams Optional parameters.
   * @return Tenant
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Tenant::class);
  }
  /**
   * Lists all tenants associated with the project. (tenants.listProjectsTenants)
   *
   * @param string $parent Required. Resource name of the project under which the
   * tenant is created. The format is "projects/{project_id}", for example,
   * "projects/foo".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of tenants to be returned, at most
   * 100. Default is 100 if a non-positive number is provided.
   * @opt_param string pageToken The starting indicator from which to return
   * results.
   * @return ListTenantsResponse
   */
  public function listProjectsTenants($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTenantsResponse::class);
  }
  /**
   * Updates specified tenant. (tenants.patch)
   *
   * @param string $name Required during tenant update. The resource name for a
   * tenant. This is generated by the service when a tenant is created. The format
   * is "projects/{project_id}/tenants/{tenant_id}", for example,
   * "projects/foo/tenants/bar".
   * @param Tenant $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Strongly recommended for the best service
   * experience. If update_mask is provided, only the specified fields in tenant
   * are updated. Otherwise all the fields are updated. A field mask to specify
   * the tenant fields to be updated. Only top level fields of Tenant are
   * supported.
   * @return Tenant
   */
  public function patch($name, Tenant $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Tenant::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsTenants::class, 'Google_Service_CloudTalentSolution_Resource_ProjectsTenants');
